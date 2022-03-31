<?php

if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}

use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config as AlibabaCloudDkmsGcsOpenApiConfig;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\DecryptRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\EncryptRequest;

/**
 * ClientKey传参支持以下三种方式：
 * 1、通过指定ClientKey.json文件路径方式
 * 示例：
 *      String clientKeyFile = "<your client key file path>";
 *      String password = "<your client key password>";
 *      Config cfg = new Config();
 *      cfg.setClientKeyFile(clientKeyFile);
 *      cfg.setPassword(password);
 *
 * 2、通过指定ClientKey内容方式
 * 示例：
 *      String clientKeyContent = "<your client key content>";
 *      String password = "<your client key password>";
 *      Config cfg = new Config();
 *      cfg.setClientKeyContent(clientKeyContent);
 *      cfg.setPassword(password);
 *
 * 3、通过指定私钥和AccessKeyId
 * 示例：
 *      String accessKeyId = "<your client key KeyId>";
 *      String privateKey = "<parse from your client key PrivateKeyData>";
 *      Config cfg = new Config();
 *      cfg.setAccessKeyId(accessKeyId);
 *      cfg.setPrivateKey(privateKey);
 *
 */

// 填写您在KMS应用管理获取的ClientKey文件路径
// $clientKeyFile = '<your client key file path>';

// 或者，填写您在KMS应用管理获取的ClientKey文件内容
$clientKeyContent = '<your client key content>';

// 填写您在KMS应用管理创建ClientKey时输入的加密口令
$password = '<your client key password>';

// 填写您的专属KMS实例服务地址
$endpoint = '<your dkms instance service address>';

// 填写您在KMS创建的主密钥Id
$keyId = '<your cmk id>';

// 加解密算法
$algorithm = '<your encrypt algorithm>';

// 待加密明文
$plaintext = 'aes 256 encrypt and decrypt sample';

// 加密返回的Iv
$iv = null;

// 专属KMS SDK Client对象
$client = getDkmsGcsSdkClient();
if (is_null($client)) exit(1);

//使用加密服务实例进行加解密示例
encryptDecryptSample();

/**
 * 使用加密服务实例进行加解密示例
 * @return void
 */
function encryptDecryptSample()
{
    global $plaintext;

    $ciphertext = encryptSample();
    if ($ciphertext !== null) {
        $decryptResult = \AlibabaCloud\Dkms\Gcs\OpenApi\Util\Utils::toString(decryptSample($ciphertext));
        if ($plaintext !== $decryptResult) {
            echo 'Decrypt data not match the plaintext';
        } else {
            echo 'EncryptDecryptSample success';
        }
        echo PHP_EOL;
    }
}

/**
 * 加密示例
 * @return array
 */
function encryptSample()
{
    global $keyId, $plaintext, $client, $iv;

    // 构建加密请求
    $encryptRequest = new EncryptRequest();
    $encryptRequest->keyId = $keyId;
    $encryptRequest->plaintext = \AlibabaCloud\Dkms\Gcs\OpenApi\Util\Utils::toBytes($plaintext);
    $runtimeOptions = new RuntimeOptions();
    // 配置CA证书
    //$runtimeOptions->verify = 'path/to/caCert.pem';
    // 或者，忽略证书
    $runtimeOptions->ignoreSSL = true;

    try {
        // 调用加密接口进行加密
        $encryptResponse = $client->encryptWithOptions($encryptRequest, $runtimeOptions);
        $iv = $encryptResponse->iv;
        var_dump($encryptResponse->toMap());
        return $encryptResponse->ciphertextBlob;
    } catch (\Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
    return null;
}

/**
 * 解密示例
 * @param int[] $ciphertextBlob
 * @return array
 */
function decryptSample($ciphertextBlob)
{
    global $keyId, $algorithm, $iv, $client;

    // 构建解密请求对象
    $decryptRequest = new DecryptRequest();
    $decryptRequest->keyId = $keyId;
    $decryptRequest->ciphertextBlob = $ciphertextBlob;
    $decryptRequest->algorithm = $algorithm;
    $decryptRequest->iv = $iv;
    $runtimeOptions = new RuntimeOptions();
    // 配置CA证书
    //$runtimeOptions->verify = 'path/to/caCert.pem';
    // 或者，忽略证书
    $runtimeOptions->ignoreSSL = true;

    try {
        // 调用解密接口进行解密
        $decryptResponse = $client->decryptWithOptions($decryptRequest, $runtimeOptions);
        var_dump($decryptResponse->toMap());
        return $decryptResponse->plaintext;
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

    // 构建专属KMS SDK Client对象
    return new AlibabaCloudDkmsGcsSdkClient($config);
}
