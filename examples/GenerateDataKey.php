<?php

if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}

use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config as AlibabaCloudDkmsGcsOpenApiConfig;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateDataKeyRequest;

// 填写您在KMS应用管理获取的ClientKey文件路径
// $clientKeyFile = '<your client key file path>';

// 或者，填写您在KMS应用管理获取的ClientKey文件内容
$clientKeyContent = '<your client key content>';

// 填写您在KMS应用管理创建ClientKey时输入的加密口令
$password = getenv('CLIENT_KEY_PASSWORD');

// 填写您的专属KMS实例服务地址
$endpoint = '<your dkms instance service address>';

// 填写您在KMS创建的对称主密钥Id
$keyId = '<your symmetric cmk id>';

// 填写您要生成的数据密钥长度，示例:32
$numberOfBytes = 32;

// 专属KMS SDK Client对象
$client = getDkmsGcsSdkClient();
if (is_null($client)) exit(1);

//使用专属KMS获取数据密钥示例
generateDataKeySample();

function generateDataKeySample(){
    global $client, $keyId, $numberOfBytes;

    $generateDataKeyRequest = new GenerateDataKeyRequest([
        'keyId' => $keyId,
        'numberOfBytes' => $numberOfBytes
    ]);
    // 忽略服务端证书
    $runtimeOptions = new RuntimeOptions();
    //$runtimeOptions->ignoreSSL = true;

    try {
        // 调用生成数据密钥接口
        $generateDataKeyResponse = $client->generateDataKeyWithOptions($generateDataKeyRequest, $runtimeOptions);

        // 明文数据密钥
        $plaintext = $generateDataKeyResponse->plaintext;
        // 密文数据密钥
        $ciphertextBlob = $generateDataKeyResponse->ciphertextBlob;
        // 由专属KMS生成的加密初始向量，解密数据密钥时需要传入
        $iv = $generateDataKeyResponse->iv;

        var_dump($generateDataKeyResponse->toMap());
    } catch (\Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
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
    // 验证服务端证书
    $config->caFilePath = 'path/to/caCert.pem';

    // 构建专属KMS SDK Client对象
    return new AlibabaCloudDkmsGcsSdkClient($config);
}
