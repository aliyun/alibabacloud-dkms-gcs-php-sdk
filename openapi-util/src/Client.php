<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util;

use \Exception;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Darabonba\MapUtil\MapUtil;
use AlibabaCloud\Darabonba\ArrayUtil\ArrayUtil;
use AlibabaCloud\Darabonba\String\StringUtil;
use AlibabaCloud\Tea\Exception\TeaError;

const SDK_NAME = "kms-gcs-php-sdk-version";
const SDK_VERSION = "0.4.0";

class Client {

    /**
     * @param int[] $msg
     * @return array
     */
    public static function getErrMessage($msg){
        $err = new Protobuf\Error();
        $err->mergeFromString(Utils::toString($msg));
        return [
            'RequestId' => $err->getRequestId(),
            'Code' => $err->getErrorCode(),
            'Message' => $err->getErrorMessage()
        ];        
    }

    /**
     * @param int[] $reqBody
     * @return string
     */
    public static function getContentLength($reqBody){
        return (string)\sizeof($reqBody);        
    }

    /**
     * @param int[] $privateKeyData
     * @param string $password
     * @return string
     * @throws Exception
     */
    public static function getPrivatePemFromPk12($privateKeyData, $password){
        $pkcs12Str = Utils::toString($privateKeyData);
        if (!\openssl_pkcs12_read($pkcs12Str, $keystore, $password)) {
            throw new Exception('Could not decrypt the privateKey of clientKey, the password is incorrect,' . 'or it is not a valid pkcs12.');
        }
        $pem = str_replace("-----BEGIN PRIVATE KEY-----\n", "", $keystore['pkey']);
        return trim(str_replace("\n-----END PRIVATE KEY-----", "", $pem));        
    }

    /**
     * @param string $method
     * @param string $pathname
     * @param string[] $headers
     * @param string[] $query
     * @return string
     */
    public static function getStringToSign($method, $pathname, $headers, $query){
        $contentSHA256 = @$headers["content-sha256"];
        if (Utils::isUnset($contentSHA256)) {
            $contentSHA256 = "";
        }
        $contentType = @$headers["content-type"];
        if (Utils::isUnset($contentType)) {
            $contentType = "";
        }
        $date = @$headers["date"];
        if (Utils::isUnset($date)) {
            $date = "";
        }
        $header = "" . $method . "\n" . $contentSHA256 . "\n" . $contentType . "\n" . $date . "\n";
        $canonicalizedHeaders = self::getCanonicalizedHeaders($headers);
        $canonicalizedResource = self::getCanonicalizedResource($pathname, $query);
        return "" . $header . "" . $canonicalizedHeaders . "" . $canonicalizedResource . "";
    }

    /**
     * @param string[] $headers
     * @return string
     */
    public static function getCanonicalizedHeaders($headers){
        if (Utils::isUnset($headers)) {
            return null;
        }
        $prefix = "x-kms-";
        $keys = MapUtil::keySet($headers);
        $sortedKeys = ArrayUtil::ascSort($keys);
        $canonicalizedHeaders = "";
        foreach($sortedKeys as $key){
            if (StringUtil::hasPrefix($key, $prefix)) {
                $canonicalizedHeaders = "" . $canonicalizedHeaders . "" . $key . ":" . StringUtil::trim(@$headers[$key]) . "\n";
            }
        }
        return $canonicalizedHeaders;
    }

    /**
     * @param string $pathname
     * @param string[] $query
     * @return string
     */
    public static function getCanonicalizedResource($pathname, $query){
        if (!Utils::isUnset($pathname)) {
            return $pathname;
        }
        if (Utils::isUnset($query)) {
            return $pathname;
        }
        $canonicalizedResource = "";
        $queryArray = MapUtil::keySet($query);
        $sortedQueryArray = ArrayUtil::ascSort($queryArray);
        $separator = "";
        $canonicalizedResource = "" . $pathname . "?";
        foreach($sortedQueryArray as $key){
            $canonicalizedResource = "" . $canonicalizedResource . "" . $separator . "" . $key . "";
            if (!Utils::empty_(@$query[$key])) {
                $canonicalizedResource = "" . $canonicalizedResource . "=" . @$query[$key] . "";
            }
            $separator = "&";
        }
        return $canonicalizedResource;
    }

    /**
     * @param bool $bool1
     * @param bool $bool2
     * @return bool
     */
    public static function defaultBoolean($bool1, $bool2){
        if (Utils::isUnset($bool1)) {
            return $bool2;
        }
        else {
            return $bool1;
        }
    }

    /**
     * @param TeaError $err
     * @return bool
     */
    public static function isRetryErr($err){
        if ($err->getCode() == 'Rejected.Throttling') {
            return true;
        }
        return false;        
    }

    /**
     * @param string $userAgent
     * @return string
     */
    public static function getUserAgent($userAgent){
        if (!empty($userAgent)) {
            return sprintf('AlibabaCloud (%s; %s) PHP/%s %s %s/%s', PHP_OS, \PHP_SAPI, PHP_VERSION, $userAgent, SDK_NAME, SDK_VERSION);
        }
        return sprintf('AlibabaCloud (%s; %s) PHP/%s %s/%s', PHP_OS, \PHP_SAPI, PHP_VERSION, SDK_NAME, SDK_VERSION);        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseEncryptResponse($resBody){
        $response = new Protobuf\EncryptResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'CiphertextBlob' => Utils::toBytes($response->getCiphertextBlob()),
            'Iv' => Utils::toBytes($response->getIv()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'PaddingMode' => $response->getPaddingMode(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedDecryptRequest($reqBody){
        $request = new Protobuf\DecryptRequest();
        if (isset($reqBody['CiphertextBlob'])) {
            $request->setCiphertextBlob(Utils::toString($reqBody['CiphertextBlob']));
        }
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(Utils::toString($reqBody['Iv']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseDecryptResponse($resBody){
        $response = new Protobuf\DecryptResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Plaintext' => Utils::toBytes($response->getPlaintext()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'PaddingMode' => $response->getPaddingMode(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedSignRequest($reqBody){
        $request = new Protobuf\SignRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Digest'])) {
            $request->setDigest(Utils::toString($reqBody['Digest']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Message'])) {
            $request->setMessage(Utils::toString($reqBody['Message']));
        }
        if (isset($reqBody['MessageType'])) {
            $request->setMessageType($reqBody['MessageType']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseSignResponse($resBody){
        $response = new Protobuf\SignResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Signature' => Utils::toBytes($response->getSignature()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'MessageType' => $response->getMessageType(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedVerifyRequest($reqBody){
        $request = new Protobuf\VerifyRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Digest'])) {
            $request->setDigest(Utils::toString($reqBody['Digest']));
        }
        if (isset($reqBody['Signature'])) {
            $request->setSignature(Utils::toString($reqBody['Signature']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Message'])) {
            $request->setMessage(Utils::toString($reqBody['Message']));
        }
        if (isset($reqBody['MessageType'])) {
            $request->setMessageType($reqBody['MessageType']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseVerifyResponse($resBody){
        $response = new Protobuf\VerifyResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Value' => $response->getValue(),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'MessageType' => $response->getMessageType(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGenerateRandomRequest($reqBody){
        $request = new Protobuf\GenerateRandomRequest();
        if (isset($reqBody['Length'])) {
            $request->setLength($reqBody['Length']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseGenerateRandomResponse($resBody){
        $response = new Protobuf\GenerateRandomResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'Random' => Utils::toBytes($response->getRandom()),
            'RequestId' => $response->getRequestId(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGenerateDataKeyRequest($reqBody){
        $request = new Protobuf\GenerateDataKeyRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['NumberOfBytes'])) {
            $request->setNumberOfBytes($reqBody['NumberOfBytes']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseGenerateDataKeyResponse($resBody){
        $response = new Protobuf\GenerateDataKeyResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => Utils::toBytes($response->getIv()),
            'Plaintext' => Utils::toBytes($response->getPlaintext()),
            'CiphertextBlob' => Utils::toBytes($response->getCiphertextBlob()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGetPublicKeyRequest($reqBody){
        $request = new Protobuf\GetPublicKeyRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseGetPublicKeyResponse($resBody){
        $response = new Protobuf\GetPublicKeyResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'PublicKey' => $response->getPublicKey(),
            'RequestId' => $response->getRequestId(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGetSecretValueRequest($reqBody){
        $request = new Protobuf\GetSecretValueRequest();
        if (isset($reqBody['SecretName'])) {
            $request->setSecretName($reqBody['SecretName']);
        }
        if (isset($reqBody['VersionStage'])) {
            $request->setVersionStage($reqBody['VersionStage']);
        }
        if (isset($reqBody['VersionId'])) {
            $request->setVersionId($reqBody['VersionId']);
        }
        if (isset($reqBody['FetchExtendedConfig'])) {
            $request->setFetchExtendedConfig($reqBody['FetchExtendedConfig']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseGetSecretValueResponse($resBody){
        $response = new Protobuf\GetSecretValueResponse();
        $response->mergeFromString(Utils::toString($resBody));
        $tmp = $response->getVersionStages();
        $versionStages = [];
        foreach ($tmp as $key) {
            $versionStages[] = $key;
        }
        return [
            'SecretName' => $response->getSecretName(),
            'SecretType' => $response->getSecretType(),
            'SecretData' => $response->getSecretData(),
            'SecretDataType' => $response->getSecretDataType(),
            'VersionStages' => $versionStages,
            'VersionId' => $response->getVersionId(),
            'CreateTime' => $response->getCreateTime(),
            'RequestId' => $response->getRequestId(),
            'LastRotationDate' => $response->getLastRotationDate(),
            'NextRotationDate' => $response->getNextRotationDate(),
            'ExtendedConfig' => $response->getExtendedConfig(),
            'AutomaticRotation' => $response->getAutomaticRotation(),
            'RotationInterval' => $response->getRotationInterval(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedAdvanceEncryptRequest($reqBody){
        $request = new Protobuf\AdvanceEncryptRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Plaintext'])) {
            $request->setPlaintext(Utils::toString($reqBody['Plaintext']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(Utils::toString($reqBody['Iv']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseAdvanceEncryptResponse($resBody){
        $response = new Protobuf\AdvanceEncryptResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'CiphertextBlob' => Utils::toBytes($response->getCiphertextBlob()),
            'Iv' => Utils::toBytes($response->getIv()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'PaddingMode' => $response->getPaddingMode(),
            'KeyVersionId' => $response->getKeyVersionId(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedAdvanceDecryptRequest($reqBody){
        $request = new Protobuf\AdvanceDecryptRequest();
        if (isset($reqBody['CiphertextBlob'])) {
            $request->setCiphertextBlob(Utils::toString($reqBody['CiphertextBlob']));
        }
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(Utils::toString($reqBody['Iv']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseAdvanceDecryptResponse($resBody){
        $response = new Protobuf\AdvanceDecryptResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Plaintext' => Utils::toBytes($response->getPlaintext()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'PaddingMode' => $response->getPaddingMode(),
            'KeyVersionId' => $response->getKeyVersionId(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedAdvanceGenerateDataKeyRequest($reqBody){
        $request = new Protobuf\AdvanceGenerateDataKeyRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['NumberOfBytes'])) {
            $request->setNumberOfBytes($reqBody['NumberOfBytes']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseAdvanceGenerateDataKeyResponse($resBody){
        $response = new Protobuf\AdvanceGenerateDataKeyResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => Utils::toBytes($response->getIv()),
            'Plaintext' => Utils::toBytes($response->getPlaintext()),
            'CiphertextBlob' => Utils::toBytes($response->getCiphertextBlob()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'KeyVersionId' => $response->getKeyVersionId(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedEncryptRequest($reqBody){
        $request = new Protobuf\EncryptRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Plaintext'])) {
            $request->setPlaintext(Utils::toString($reqBody['Plaintext']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(Utils::toString($reqBody['Iv']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGenerateDataKeyPairRequest($reqBody){
        $request = new Protobuf\GenerateDataKeyPairRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['KeyPairSpec'])) {
            $request->setKeyPairSpec($reqBody['KeyPairSpec']);
        }
        if (isset($reqBody['KeyFormat'])) {
            $request->setKeyFormat($reqBody['KeyFormat']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseGenerateDataKeyPairResponse($resBody){
        $response = new Protobuf\GenerateDataKeyPairResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => Utils::toBytes($response->getIv()),
            'KeyPairSpec' => $response->getKeyPairSpec(),
            'PrivateKeyPlaintext' => Utils::toBytes($response->getPrivateKeyPlaintext()),
            'PrivateKeyCiphertextBlob' => Utils::toBytes($response->getPrivateKeyCiphertextBlob()),
            'PublicKey' => Utils::toBytes($response->getPublicKey()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGenerateDataKeyPairWithoutPlaintextRequest($reqBody){
        $request = new Protobuf\GenerateDataKeyPairWithoutPlaintextRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['KeyPairSpec'])) {
            $request->setKeyPairSpec($reqBody['KeyPairSpec']);
        }
        if (isset($reqBody['KeyFormat'])) {
            $request->setKeyFormat($reqBody['KeyFormat']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseGenerateDataKeyPairWithoutPlaintextResponse($resBody){
        $response = new Protobuf\GenerateDataKeyPairWithoutPlaintextResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => Utils::toBytes($response->getIv()),
            'KeyPairSpec' => $response->getKeyPairSpec(),
            'PrivateKeyCiphertextBlob' => Utils::toBytes($response->getPrivateKeyCiphertextBlob()),
            'PublicKey' => Utils::toBytes($response->getPublicKey()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedAdvanceGenerateDataKeyPairRequest($reqBody){
        $request = new Protobuf\AdvanceGenerateDataKeyPairRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['KeyPairSpec'])) {
            $request->setKeyPairSpec($reqBody['KeyPairSpec']);
        }
        if (isset($reqBody['KeyFormat'])) {
            $request->setKeyFormat($reqBody['KeyFormat']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseAdvanceGenerateDataKeyPairResponse($resBody){
        $response = new Protobuf\AdvanceGenerateDataKeyPairResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => Utils::toBytes($response->getIv()),
            'KeyPairSpec' => $response->getKeyPairSpec(),
            'PrivateKeyPlaintext' => Utils::toBytes($response->getPrivateKeyPlaintext()),
            'PrivateKeyCiphertextBlob' => Utils::toBytes($response->getPrivateKeyCiphertextBlob()),
            'PublicKey' => Utils::toBytes($response->getPublicKey()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'KeyVersionId' => $response->getKeyVersionId(),
        ];        
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedAdvanceGenerateDataKeyPairWithoutPlaintextRequest($reqBody){
        $request = new Protobuf\AdvanceGenerateDataKeyPairWithoutPlaintextRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['KeyPairSpec'])) {
            $request->setKeyPairSpec($reqBody['KeyPairSpec']);
        }
        if (isset($reqBody['KeyFormat'])) {
            $request->setKeyFormat($reqBody['KeyFormat']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(Utils::toString($reqBody['Aad']));
        }
        return Utils::toBytes($request->serializeToString());        
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseAdvanceGenerateDataKeyPairWithoutPlaintextResponse($resBody){
        $response = new Protobuf\AdvanceGenerateDataKeyPairWithoutPlaintextResponse();
        $response->mergeFromString(Utils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => Utils::toBytes($response->getIv()),
            'KeyPairSpec' => $response->getKeyPairSpec(),
            'PrivateKeyCiphertextBlob' => Utils::toBytes($response->getPrivateKeyCiphertextBlob()),
            'PublicKey' => Utils::toBytes($response->getPublicKey()),
            'RequestId' => $response->getRequestId(),
            'Algorithm' => $response->getAlgorithm(),
            'KeyVersionId' => $response->getKeyVersionId(),
        ];        
    }
}
