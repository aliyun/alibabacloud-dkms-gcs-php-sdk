<?php

if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}

use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config;
use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\DecryptRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\EncryptRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\HmacRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\SignRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\VerifyRequest;


$config = new Config();
$config->protocol = 'https';
$config->clientKeyContent = '';
$config->password = '';
$config->endpoint = '';

$client = new AlibabaCloudDkmsGcsSdkClient($config);

//加密测试
encrypt();
//解密测试
decrypt();
//hmac测试
hmac();
//签名测试
sign();
//验签测试
verify();

/**
 * @return void
 */
function encrypt()
{
    global $client;
    $encryptionKeyId = 'encryptionKeyId';
    $plaintext = null;
    $encryptRequest = new EncryptRequest([
        'keyId' => $encryptionKeyId,
        'plaintext' => $plaintext
    ]);
    $runtimeOptions = new RuntimeOptions([
        'ignoreSSL' => true
    ]);
    try {
        //$encryptResponse = $client->encrypt($encryptRequest);
        $encryptResponse = $client->encryptWithOptions($encryptRequest, $runtimeOptions);
        var_dump($encryptResponse->toMap());
    } catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
}

/**
 * @return void
 */
function decrypt()
{
    global $client;
    $encryptionKeyId = 'encryptionKeyId';
    $ciphertextBlob = null;
    $algorithm = 'algorithm';
    $iv = null;
    $decryptRequest = new DecryptRequest([
        'keyId' => $encryptionKeyId,
        'ciphertextBlob' => $ciphertextBlob,
        'algorithm' => $algorithm,
        'iv' => $iv
    ]);
    $runtimeOptions = new RuntimeOptions([
        'ignoreSSL' => true
    ]);
    try {
        //$decryptResponse = $client->decrypt(decryptRequest);
        $decryptResponse = $client->decryptWithOptions($decryptRequest, $runtimeOptions);
        var_dump($decryptResponse->toMap());
    } catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
}

/**
 * @return void
 */
function hmac()
{
    global $client;
    $hmacKeyId = 'CmkId';
    $message = null;
    $hmacRequest = new HmacRequest([
        'keyId' => $hmacKeyId,
        'message' => $message
    ]);
    $runtimeOptions = new RuntimeOptions([
        'ignoreSSL' => true
    ]);
    try {
        //$hmacResponse = $client->hmac(hmacRequest);
        $hmacResponse = $client->hmacWithOptions($hmacRequest, $runtimeOptions);
        var_dump($hmacResponse->toMap());
    } catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
}

/**
 * @return void
 */
function sign()
{
    global $client;
    $signKeyId = 'signKeyId';
    $message = null;
    $messageType = 'RAW';
    $algorithm = 'algorithm';
    $signRequest = new SignRequest([
        'keyId' => $signKeyId,
        'message' => $message,
        'messageType' => $messageType,
        'algorithm' => $algorithm
    ]);
    $runtimeOptions = new RuntimeOptions([
        'ignoreSSL' => true
    ]);
    try {
        //$signResponse = $client->sign(signRequest);
        $signResponse = $client->signWithOptions($signRequest, $runtimeOptions);
        var_dump($signResponse->toMap());
    } catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
}

/**
 * @return void
 */
function verify()
{
    global $client;
    $signKeyId = 'signKeyId';
    $message = null;
    $messageType = 'RAW';
    $signature = null;
    $algorithm = 'algorithm';
    $verifyRequest = new VerifyRequest([
        'keyId' => $signKeyId,
        'message' => $message,
        'messageType' => $messageType,
        'signature' => $signature,
        'algorithm' => $algorithm
    ]);
    $runtimeOptions = new RuntimeOptions([
        'ignoreSSL' => true
    ]);
    try {
        //$verifyResponse = $client->verify(verifyRequest);
        $verifyResponse = $client->verifyWithOptions($verifyRequest, $runtimeOptions);
        var_dump($verifyResponse->toMap());
    } catch (Exception $error) {
        if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
            var_dump($error->getErrorInfo());
        }
        var_dump($error->getMessage());
        var_dump($error->getTraceAsString());
    }
}