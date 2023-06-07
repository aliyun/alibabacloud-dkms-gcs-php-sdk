<?php

if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}

use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config as AlibabaCloudDkmsGcsOpenApiConfig;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GetPublicKeyRequest;

// 填写您在KMS应用管理获取的ClientKey文件路径
// $clientKeyFile = '<your client key file path>';

// 或者，填写您在KMS应用管理获取的ClientKey文件内容
$clientKeyContent = '<your client key content>';

// 填写您在KMS应用管理创建ClientKey时输入的加密口令
$password = getenv('CLIENT_KEY_PASSWORD');

// 填写您的专属KMS实例服务地址
$endpoint = '<your dkms instance service address>';

// 填写您在KMS创建的非对称主密钥Id
$keyId = '<your asymmetric cmk id>';

// 专属KMS SDK Client对象
$client = getDkmsGcsSdkClient();
if (is_null($client)) exit(1);

//使用专属KMS获取非对称密钥公钥示例
getPublicKeySample();

function getPublicKeySample(){
    global $client, $keyId;

    // 构建获取公钥请求
    $getPublicKeyRequest = new GetPublicKeyRequest([
        'keyId' => $keyId,
    ]);
    // 验证服务端证书
    $runtimeOptions = new RuntimeOptions([
        'verify' => 'path/to/caCert.pem',
    ]);
    // 或者，忽略服务端证书
    //$runtimeOptions = new RuntimeOptions([
    //    'ignoreSSL' => true,
    //]);

    try {
        // 调用获取公钥接口
        $getPublicKeyResponse = $client->getPublicKeyWithOptions($getPublicKeyRequest, $runtimeOptions);

        // 公钥
        $publicKey = $getPublicKeyResponse->publicKey;

        var_dump($getPublicKeyResponse->toMap());
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

    // 构建专属KMS SDK Client对象
    return new AlibabaCloudDkmsGcsSdkClient($config);
}
