<?php

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util;

use AlibabaCloud\Tea\Request;
use AlibabaCloud\Tea\Utils\Utils as AlibabaCloudTeaUtils;
use Exception;
use Google\Protobuf\Value;

class Utils
{
    /**
     * @param array $bytes
     * @return string
     */
    public static function toString($bytes)
    {
        if (is_string($bytes)) {
            return $bytes;
        }
        return AlibabaCloudTeaUtils::toString($bytes);
    }

    /**
     * @param string $string
     * @return array
     */
    public static function toBytes($string)
    {
        if (is_array($string)) {
            return $string;
        }
        return AlibabaCloudTeaUtils::toBytes($string);
    }

    public static function str2Bytes($string)
    {
        return unpack('C*', $string);
    }

    public static function bytes2Str($bytes)
    {
        $chars = array_map("chr", $bytes);
        return join($chars);
    }

    public static function bytes2Hex($bytes)
    {
        $chars = array_map("chr", $bytes);
        $bin = join($chars);
        return bin2hex($bin);
    }

    function hex2Bytes($hex)
    {
        $string = hex2bin($hex);
        return unpack('C*', $string);
    }

    /**
     * @param string[] $headers
     * @param string[] $constraint
     * @return array
     */
    public static function filterHeaders($headers, $constraint)
    {
        $tmp = [];
        if (AlibabaCloudTeaUtils::isUnset($constraint)) {
            return $tmp;
        }
        foreach ($headers as $key) {
            if (isset($constraint[$key])) {
                $tmp[$key] = $headers[$key];
            }
        }
        return $tmp;
    }

    /**
     * @param string $regionId
     * @param string $endpoint
     * @return string
     */
    public static function getHost($regionId, $endpoint)
    {
        if (!empty(trim($endpoint))) {
            return $endpoint;
        }
        if (empty(trim($regionId))) {
            $regionId = 'cn-hangzhou';
        }
        return 'kms-instance.' . $regionId . '.aliyuncs.com';
    }

    /**
     * @param int[] $msg
     * @return array
     * @throws Exception
     */
    public static function getErrMessage($msg)
    {
        $err = new Protobuf\Error();
        $err->mergeFromString(AlibabaCloudTeaUtils::toString($msg));
        return [
            'RequestId' => $err->getRequestId(),
            'Code' => $err->getErrorCode(),
            'Message' => $err->getErrorMessage()
        ];
    }

    /**
     * @param Request $request
     * @return string
     */
    public static function getStringToSign($request)
    {
        $pathname = $request->pathname ?: '';
        $contentSHA256 = isset($request->headers['content-sha256']) ? $request->headers['content-sha256'] : '';
        $contentType = isset($request->headers['content-type']) ? $request->headers['content-type'] : '';
        $date = isset($request->headers['date']) ? $request->headers['date'] : '';
        $result = $request->method . "\n" .
            $contentSHA256 . "\n" .
            $contentType . "\n" .
            $date . "\n";
        $canonicalizedHeaders = self::getCanonicalizedHeaders($request->headers);
        $canonicalizedResource = self::getCanonicalizedResource($pathname, $request->query);
        return $result . $canonicalizedHeaders . $canonicalizedResource;
    }

    private static function getCanonicalizedHeaders($headers, $prefix = 'x-kms-')
    {
        ksort($headers);
        $str = '';
        foreach ($headers as $k => $v) {
            if (0 === strpos(strtolower($k), $prefix)) {
                $str .= $k . ':' . trim(self::filter($v)) . "\n";
            }
        }
        return $str;
    }

    private static function getCanonicalizedResource($pathname, $query)
    {
        if (0 === \count($query)) {
            return $pathname;
        }
        ksort($query);
        $tmp = [];
        foreach ($query as $k => $v) {
            if (!empty($v)) {
                $tmp[] = $k . '=' . $v;
            } else {
                $tmp[] = $k;
            }
        }
        return $pathname . '?' . implode('&', $tmp);
    }

    private static function filter($str)
    {
        return str_replace(["\t", "\n", "\r", "\f"], '', $str);
    }

    /**
     * @param int[] $reqBody
     * @return string
     */
    public static function getContentLength($reqBody)
    {
        return (string)\sizeof($reqBody);
    }

    /**
     * @param int[] $reqBody
     * @return string
     */
    public static function getContentSHA256($reqBody)
    {
        return strtoupper(hash('sha256', AlibabaCloudTeaUtils::toString($reqBody), false));
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedEncryptRequest($reqBody)
    {
        $request = new Protobuf\EncryptRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Plaintext'])) {
            $request->setPlaintext(AlibabaCloudTeaUtils::toString($reqBody['Plaintext']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(AlibabaCloudTeaUtils::toString($reqBody['Iv']));
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(AlibabaCloudTeaUtils::toString($reqBody['Aad']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseEncryptResponse($resBody)
    {
        $response = new Protobuf\EncryptResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'CiphertextBlob' => AlibabaCloudTeaUtils::toBytes($response->getCiphertextBlob()),
            'Iv' => AlibabaCloudTeaUtils::toBytes($response->getIv()),
            'Algorithm' => $response->getAlgorithm(),
            'PaddingMode' => $response->getPaddingMode(),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedDecryptRequest($reqBody)
    {
        $request = new Protobuf\DecryptRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['CiphertextBlob'])) {
            $request->setCiphertextBlob(AlibabaCloudTeaUtils::toString($reqBody['CiphertextBlob']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(AlibabaCloudTeaUtils::toString($reqBody['Aad']));
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(AlibabaCloudTeaUtils::toString($reqBody['Iv']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseDecryptResponse($resBody)
    {
        $response = new Protobuf\DecryptResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Plaintext' => AlibabaCloudTeaUtils::toBytes($response->getPlaintext()),
            'Algorithm' => $response->getAlgorithm(),
            'PaddingMode' => $response->getPaddingMode(),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedHmacRequest($reqBody)
    {
        $request = new Protobuf\HmacRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Message'])) {
            $request->setMessage(AlibabaCloudTeaUtils::toString($reqBody['Message']));
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseHmacResponse($resBody)
    {
        $response = new Protobuf\HmacResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Signature' => AlibabaCloudTeaUtils::toBytes($response->getSignature()),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedSignRequest($reqBody)
    {
        $request = new Protobuf\SignRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Message'])) {
            $request->setMessage(AlibabaCloudTeaUtils::toString($reqBody['Message']));
        }
        if (isset($reqBody['MessageType'])) {
            $request->setMessageType($reqBody['MessageType']);
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseSignResponse($resBody)
    {
        $response = new Protobuf\SignResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Signature' => AlibabaCloudTeaUtils::toBytes($response->getSignature()),
            'Algorithm' => $response->getAlgorithm(),
            'MessageType' => $response->getMessageType(),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedVerifyRequest($reqBody)
    {
        $request = new Protobuf\VerifyRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Signature'])) {
            $request->setSignature(AlibabaCloudTeaUtils::toString($reqBody['Signature']));
        }
        if (isset($reqBody['Message'])) {
            $request->setMessage(AlibabaCloudTeaUtils::toString($reqBody['Message']));
        }
        if (isset($reqBody['MessageType'])) {
            $request->setMessageType($reqBody['MessageType']);
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseVerifyResponse($resBody)
    {
        $response = new Protobuf\VerifyResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Value' => $response->getValue(),
            'Algorithm' => $response->getAlgorithm(),
            'MessageType' => $response->getMessageType(),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGenerateRandomRequest($reqBody)
    {
        $request = new Protobuf\GenerateRandomRequest();
        if (isset($reqBody['Length'])) {
            $request->setLength($reqBody['Length']);
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGenerateRandomResponse($resBody)
    {
        $response = new Protobuf\GenerateRandomResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'Random' => AlibabaCloudTeaUtils::toBytes($response->getRandom()),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGenerateDataKeyRequest($reqBody)
    {
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
            $request->setAad(AlibabaCloudTeaUtils::toString($reqBody['Aad']));
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGenerateDataKeyResponse($resBody)
    {
        $response = new Protobuf\GenerateDataKeyResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => AlibabaCloudTeaUtils::toBytes($response->getIv()),
            'Plaintext' => AlibabaCloudTeaUtils::toBytes($response->getPlaintext()),
            'CiphertextBlob' => AlibabaCloudTeaUtils::toBytes($response->getCiphertextBlob()),
            'Algorithm' => $response->getAlgorithm(),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedHashRequest($reqBody)
    {
        $request = new Protobuf\HashRequest();
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Message'])) {
            $request->setMessage(AlibabaCloudTeaUtils::toString($reqBody['Message']));
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseHashResponse($resBody)
    {
        $response = new Protobuf\HashResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'Digest' => AlibabaCloudTeaUtils::toBytes($response->getDigest()),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedKmsEncryptRequest($reqBody)
    {
        $request = new Protobuf\KmsEncryptRequest();
        if (isset($reqBody['Plaintext'])) {
            $request->setPlaintext(AlibabaCloudTeaUtils::toString($reqBody['Plaintext']));
        }
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(AlibabaCloudTeaUtils::toString($reqBody['Aad']));
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseKmsEncryptResponse($resBody)
    {
        $response = new Protobuf\KmsEncryptResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'CiphertextBlob' => AlibabaCloudTeaUtils::toBytes($response->getCiphertextBlob()),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedKmsDecryptRequest($reqBody)
    {
        $request = new Protobuf\KmsDecryptRequest();
        if (isset($reqBody['CiphertextBlob'])) {
            $request->setCiphertextBlob(AlibabaCloudTeaUtils::toString($reqBody['CiphertextBlob']));
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(AlibabaCloudTeaUtils::toString($reqBody['Aad']));
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseKmsDecryptResponse($resBody)
    {
        $response = new Protobuf\KmsDecryptResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Plaintext' => AlibabaCloudTeaUtils::toBytes($response->getPlaintext()),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGetPublicKeyRequest($reqBody)
    {
        $request = new Protobuf\GetPublicKeyRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGetPublicKeyResponse($resBody)
    {
        $response = new Protobuf\GetPublicKeyResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'PublicKey' => $response->getPublicKey(),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGetSecretValueRequest($reqBody)
    {
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
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGetSecretValueResponse($resBody)
    {
        $response = new Protobuf\GetSecretValueResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
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
    public static function getSerializedAdvanceEncryptRequest($reqBody)
    {
        $request = new Protobuf\AdvanceEncryptRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Plaintext'])) {
            $request->setPlaintext(AlibabaCloudTeaUtils::toString($reqBody['Plaintext']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(AlibabaCloudTeaUtils::toString($reqBody['Iv']));
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(AlibabaCloudTeaUtils::toString($reqBody['Aad']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseAdvanceEncryptResponse($resBody)
    {
        $response = new Protobuf\AdvanceEncryptResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'CiphertextBlob' => AlibabaCloudTeaUtils::toBytes($response->getCiphertextBlob()),
            'Iv' => AlibabaCloudTeaUtils::toBytes($response->getIv()),
            'Algorithm' => $response->getAlgorithm(),
            'PaddingMode' => $response->getPaddingMode(),
            'KeyVersionId' => $response->getKeyVersionId(),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedAdvanceDecryptRequest($reqBody)
    {
        $request = new Protobuf\AdvanceDecryptRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['CiphertextBlob'])) {
            $request->setCiphertextBlob(AlibabaCloudTeaUtils::toString($reqBody['CiphertextBlob']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(AlibabaCloudTeaUtils::toString($reqBody['Aad']));
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(AlibabaCloudTeaUtils::toString($reqBody['Iv']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseAdvanceDecryptResponse($resBody)
    {
        $response = new Protobuf\AdvanceDecryptResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Plaintext' => AlibabaCloudTeaUtils::toBytes($response->getPlaintext()),
            'Algorithm' => $response->getAlgorithm(),
            'PaddingMode' => $response->getPaddingMode(),
            'KeyVersionId' => $response->getKeyVersionId(),
            'RequestId' => $response->getRequestId()
        ];
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedAdvanceGenerateDataKeyRequest($reqBody)
    {
        $request = new Protobuf\AdvanceGenerateDataKeyRequest();
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['NumberOfBytes'])) {
            $request->setNumberOfBytes($reqBody['NumberOfBytes']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(AlibabaCloudTeaUtils::toString($reqBody['Aad']));
        }
        return AlibabaCloudTeaUtils::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseAdvanceGenerateDataKeyResponse($resBody)
    {
        $response = new Protobuf\AdvanceGenerateDataKeyResponse();
        $response->mergeFromString(AlibabaCloudTeaUtils::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => AlibabaCloudTeaUtils::toBytes($response->getIv()),
            'Plaintext' => AlibabaCloudTeaUtils::toBytes($response->getPlaintext()),
            'CiphertextBlob' => AlibabaCloudTeaUtils::toBytes($response->getCiphertextBlob()),
            'Algorithm' => $response->getAlgorithm(),
            'KeyVersionId' => $response->getKeyVersionId(),
            'RequestId' => $response->getRequestId()
        ];
    }
}
