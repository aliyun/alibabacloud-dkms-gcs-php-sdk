<?php

if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}

use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config as AlibabaCloudDkmsGcsOpenApiConfig;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateDataKeyRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\DecryptRequest;
use AlibabaCloud\Tea\Utils\Utils as AlibabaCloudTeaUtils;

// 填写您在KMS应用管理获取的ClientKey文件路径
// $clientKeyFile = '<your client key file path>';

// 或者，填写您在KMS应用管理获取的ClientKey文件内容
$clientKeyContent = '<your client key content>';

// 填写您在KMS应用管理创建ClientKey时输入的加密口令
$password = getenv('CLIENT_KEY_PASSWORD');

// 填写您的专属KMS实例服务地址
$endpoint = '<your dkms instance service address>';

// 填写您在KMS创建的主密钥Id
$keyId = '<your cmk id>';

// 本地待加密数据
$data = 'encrypt data';

// 专属KMS SDK Client对象
$client = getDkmsGcsSdkClient();
if (is_null($client)) exit(1);

// 使用加密服务实例进行信封加解密示例
envelopeEncryptDecryptSample();

/**
 * 使用加密服务实例进行信封加解密示例
 * @return void
 */
function envelopeEncryptDecryptSample()
{
    global $client, $keyId, $data;

    $envelopeCipherText = envelopeEncryptSample($client, $keyId, $data);
    if ($envelopeCipherText !== null){
        $decryptResult = envelopeDecryptSample($client, $keyId, $envelopeCipherText);
        if ($data !== $decryptResult) {
            echo 'decrypt result not match the plaintext' . PHP_EOL;
        } else {
            echo 'envelopeEncryptDecryptSample success' . PHP_EOL;
        }
    }
}

/**
 * 信封加密示例
 * @param AlibabaCloudDkmsGcsSdkClient $client
 * @param string $keyId
 * @param string $data
 * @return EnvelopeCipherText
 */
function envelopeEncryptSample($client, $keyId, $data)
{
    // 获取数据密钥，下面以Aliyun_AES_256密钥为例进行说明，数据密钥长度32字节
    $generateDataKeyRequest = new GenerateDataKeyRequest([
        "keyId" => $keyId,
        "numberOfBytes" => 32,
    ]);
    // 验证服务端证书
    $runtimeOptions = new RuntimeOptions([
        'verify' => 'path/to/caCert.pem',
    ]);
    // 或者，忽略证书
    //$runtimeOptions = new RuntimeOptions([
    //    'ignoreSSL' => true,
    //]);

    try {
        // 调用生成数据密钥接口
        $generateDataKeyResponse = $client->GenerateDataKeyWithOptions($generateDataKeyRequest, $runtimeOptions);
        // 专属KMS返回的数据密钥明文, 加密本地数据使用
        $plainDataKey = $generateDataKeyResponse->plaintext;
	    // 专属KMS返回的数据密钥密文，解密本地数据密文时，先将数据密钥密文解密后使用
	    $encryptedDataKey = $generateDataKeyResponse->ciphertextBlob;
	    // 由专属KMS生成的加密初始向量，解密数据密钥时需要传入
	    $dataKeyIv = $generateDataKeyResponse->iv;
    }catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
        return null;
    }

    // 使用专属KMS返回的数据密钥明文在本地对数据进行加密，下面以AES-256 GCM模式为例
    $iv_len = openssl_cipher_iv_length('aes-256-gcm');
    $iv = openssl_random_pseudo_bytes($iv_len);
    $key = AlibabaCloudTeaUtils::toString($plainDataKey);
    $ciphertext_raw = openssl_encrypt($data, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
    if (false === $ciphertext_raw) {
        echo 'openssl_encrypt failed';
        return null;
    }
    echo "tag: ".bin2hex($tag) . PHP_EOL;
    $ciphertext = $ciphertext_raw . $tag;
    echo "ciphertext: ".bin2hex($ciphertext) . PHP_EOL;

    // 输出密文，密文输出或持久化由用户根据需要进行处理，下面示例仅展示将密文输出到一个对象的情况
    // 假如envelopeCipherText是需要输出的密文对象，至少需要包括以下四个内容:
    // (1) dataKeyIV: 由专属KMS生成的加密初始向量，解密数据密钥密文时需要传入
    // (2) encryptedDataKey: 专属KMS返回的数据密钥密文
    // (3) iv: 加密初始向量
    // (4) cipherText: 密文数据
    $envelopeCipherText = new EnvelopeCipherText([
        'dataKeyIv' => $dataKeyIv,
        'encryptedDataKey' => $encryptedDataKey,
        'iv' => $iv,
        'cipherText' => $ciphertext
    ]);
    return $envelopeCipherText;
}

/**
 * 信封解密示例
 * @param AlibabaCloudDkmsGcsSdkClient $client
 * @param string $keyId
 * @param EnvelopeCipherText $envelopeCipherText
 * @return string|null
 */
function envelopeDecryptSample($client, $keyId, $envelopeCipherText)
{
    // 由专属KMS生成的加密初始向量，解密数据密钥需要传入
    $dataKeyIv = $envelopeCipherText->dataKeyIv;
    // 待解密数据密钥密文，由专属KMS生成
    $encryptedDataKey = $envelopeCipherText->encryptedDataKey;

    // 使用专属KMS服务解密数据密钥密文，得到数据密钥明文
    $decryptRequest = new DecryptRequest([
        'keyId' => $keyId,
        'ciphertextBlob' => $encryptedDataKey,
        'iv' => $dataKeyIv
    ]);
    // 验证服务端证书
    $runtimeOptions = new RuntimeOptions([
        'verify' => 'path/to/caCert.pem',
    ]);
    // 或者，忽略证书
    //$runtimeOptions = new RuntimeOptions([
    //    'ignoreSSL' => true,
    //]);

    try {
        // 调用解密接口进行解密
        $decryptResponse = $client->decryptWithOptions($decryptRequest, $runtimeOptions);
        // 数据密钥明文
        $plainDataKey = $decryptResponse->plaintext;
    } catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
        return null;
    }

    // 使用数据密钥明文在本地进行解密, 下面是以AES-256 GCM模式为例
    // 本地加密时使用的初始向量
    $iv = $envelopeCipherText->iv;
    // 待解密本地数据密文及tag
    $cipherText = $envelopeCipherText->cipherText;
    $ciphertext_raw = substr($cipherText,0, -16);
    $tag = substr($cipherText, -16);
    $key = AlibabaCloudTeaUtils::toString($plainDataKey);
    $original_plaintext = openssl_decrypt($ciphertext_raw, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
    if (false === $original_plaintext){
        echo 'openssl_decrypt failed';
        return null;
    }
    return $original_plaintext;
}

/**
 * 构建专属KMS SDK Client对象
 * @return AlibabaCloudDkmsGcsSdkClient
 */
function getDkmsGcsSdkClient()
{
    global $clientKeyContent, $password, $endpoint;

    // 构建专属KMS SDK Client配置
    $config = new AlibabaCloudDkmsGcsOpenApiConfig();
    $config->protocol = 'https';
    $config->clientKeyContent = $clientKeyContent;
    $config->password = $password;
    $config->endpoint = $endpoint;

    // 构建专属KMS SDK Client对象
    return new AlibabaCloudDkmsGcsSdkClient($config);
}

/**
 * 信封加密密文结构
 */
class EnvelopeCipherText {
    public function __construct($config = [])
    {
        if (!empty($config)) {
            foreach ($config as $k => $v) {
                $this->{$k} = $v;
            }
        }
    }

    /**
     * 由专属KMS生成的加密初始向量，解密数据密钥密文时需要传入
     * @var int[]
     */
    public $dataKeyIv;

    /**
     * 专属KMS返回的数据密钥密文
     * @var int[]
     */
    public $encryptedDataKey;

    /**
     * 本地数据加密初始向量
     * @var string
     */
    public $iv;

    /**
     * 本地数据加密后的密文数据
     * @var string
     */
    public $cipherText;
}
