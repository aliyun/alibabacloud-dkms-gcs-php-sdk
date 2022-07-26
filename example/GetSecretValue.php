<?php

if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}

use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config as AlibabaCloudDkmsGcsOpenApiConfig;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GetSecretValueRequest;

// 填写您在KMS应用管理获取的ClientKey文件路径
// $clientKeyFile = '<your client key file path>';

// 或者，填写您在KMS应用管理获取的ClientKey文件内容
$clientKeyContent = '<your client key content>';

// 填写您在KMS应用管理创建ClientKey时输入的加密口令
$password = '<your client key password>';

// 填写您的专属KMS实例服务地址
$endpoint = '<your dkms instance service address>';

// 填写您在专属KMS创建的凭据名称
$secretName = '<your secret name>';

// 专属KMS SDK Client对象
$client = getDkmsGcsSdkClient();
if (is_null($client)) exit(1);

// 获取专属KMS凭据示例
getSecretValueSample();

function getSecretValueSample(){
    global $client, $secretName;

    // 构建获取凭据请求
    $getSecretValueRequest = new GetSecretValueRequest([
        'secretName' => $secretName,
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
        // 调用获取凭据接口
        $getSecretValueResponse = $client->getSecretValueWithOptions($getSecretValueRequest, $runtimeOptions);

        // 凭据名称
        $_secretName = $getSecretValueResponse->secretName;
        // 凭据值
        $_secretData = $getSecretValueResponse->secretData;

        var_dump($getSecretValueResponse->toMap());
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
