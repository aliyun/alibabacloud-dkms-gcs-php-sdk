<?php

if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}

use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config as AlibabaCloudDkmsGcsOpenApiConfig;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\SignRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\VerifyRequest;
use AlibabaCloud\Tea\Utils\Utils as AlibabaCloudTeaUtils;

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

// 签名算法
$algorithm = '<your sign algorithm>';

// 待签名消息
$message = 'message data';

// 待签名消息数据类型，RAW-原始数据 DIGEST-摘要
$messageType = "RAW";

// 专属KMS SDK Client对象
$client = getDkmsGcsSdkClient();
if (is_null($client)) exit(1);

//使用加密服务实例进行签名验签示例
signVerifySample();

/**
 * 使用加密服务实例进行签名验签示例
 * @return void
 */
function signVerifySample(){
    global $client, $keyId, $message, $messageType, $algorithm;

    $signatureCtx = signSample($client, $keyId, $message, $messageType, $algorithm);
    if ($signatureCtx !== null) {
        $verifyResult = verifySample($client, $message, $signatureCtx);
        if (!$verifyResult) {
            echo 'verify failed' . PHP_EOL;
        } else {
            echo 'signVerifySample success' . PHP_EOL;
        }
    }
}

/**
 * 签名示例
 * @param AlibabaCloudDkmsGcsSdkClient $client
 * @param string $keyId
 * @param string $message
 * @param string $messageType
 * @param string $algorithm
 * @return SignatureContext
 */
function signSample($client, $keyId, $message, $messageType, $algorithm) {
    // 构建签名请求
    $signRequest = new SignRequest();
    $signRequest->keyId = $keyId;
    $signRequest->algorithm = $algorithm;
    $signRequest->message = AlibabaCloudTeaUtils::toBytes($message);
    $signRequest->messageType = $messageType;
    $runtimeOptions = new RuntimeOptions();
    // 忽略证书
    //$runtimeOptions->ignoreSSL = true;

    try {
        // 调用签名接口进行签名
        $signResponse = $client->signWithOptions($signRequest, $runtimeOptions);
        // 密钥ID
        $keyId = $signResponse->keyId;
        // 签名值
        $signature = $signResponse->signature;
        // 消息类型
        $messageType = $signResponse->messageType;
        // 签名算法
        $algorithm = $signResponse->algorithm;
        var_dump($signResponse->toMap());
        return new SignatureContext([
            'keyId' => $keyId,
            'signature' => $signature,
            'messageType' => $messageType,
            'algorithm' => $algorithm
        ]);
    } catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
    return null;
}

/**
 * 验签示例
 * @param AlibabaCloudDkmsGcsSdkClient $client
 * @param string $message
 * @param SignatureContext $ctx
 * @return bool|null
 */
function verifySample($client, $message, $ctx) {
    // 构建验签请求
    $verifyRequest = new VerifyRequest();
    $verifyRequest->keyId = $ctx->keyId;
    $verifyRequest->signature = $ctx->signature;
    $verifyRequest->message = AlibabaCloudTeaUtils::toBytes($message);
    $verifyRequest->messageType = $ctx->messageType;
    $verifyRequest->algorithm = $ctx->algorithm;
    $runtimeOptions = new RuntimeOptions();
    // 忽略服务端证书
    //$runtimeOptions->ignoreSSL = true;

    try {
        // 调用验签接口进行验签
        $verifyResponse = $client->verifyWithOptions($verifyRequest, $runtimeOptions);
        // 验签结果
        $value = $verifyResponse->value;
        var_dump($verifyResponse->toMap());
        return $value;
    } catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
    return null;
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

/**
 * The signature context may be stored
 */
class SignatureContext
{
    public function __construct($config = [])
    {
        if (!empty($config)) {
            foreach ($config as $k => $v) {
                $this->{$k} = $v;
            }
        }
    }
    /**
     * @var string
     */
    public $keyId;

    /**
     * @var int[]
     */
    public $signature;

    /**
     * @var string
     */
    public $messageType;

    /**
     * @var string
     * Use default algorithm value, if the value is not set
     */
    public $algorithm;
}
