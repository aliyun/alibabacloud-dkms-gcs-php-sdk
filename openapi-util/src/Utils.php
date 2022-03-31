<?php

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util;

use AlibabaCloud\Tea\Request;
use \Exception;
use AlibabaCloud\Tea\Utils\Utils as AlibabaCloudTeaUtils;

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
        $err->mergeFromString(self::toString($msg));
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
        return strtoupper(hash('sha256', self::toString($reqBody), false));
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
            $request->setPlaintext(self::toString($reqBody['Plaintext']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(self::toString($reqBody['Iv']));
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(self::toString($reqBody['Aad']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseEncryptResponse($resBody)
    {
        $response = new Protobuf\EncryptResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'CiphertextBlob' => self::toBytes($response->getCiphertextBlob()),
            'Iv' => self::toBytes($response->getIv()),
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
            $request->setCiphertextBlob(self::toString($reqBody['CiphertextBlob']));
        }
        if (isset($reqBody['Algorithm'])) {
            $request->setAlgorithm($reqBody['Algorithm']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(self::toString($reqBody['Aad']));
        }
        if (isset($reqBody['Iv'])) {
            $request->setIv(self::toString($reqBody['Iv']));
        }
        if (isset($reqBody['PaddingMode'])) {
            $request->setPaddingMode($reqBody['PaddingMode']);
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseDecryptResponse($resBody)
    {
        $response = new Protobuf\DecryptResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Plaintext' => self::toBytes($response->getPlaintext()),
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
            $request->setMessage(self::toString($reqBody['Message']));
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseHmacResponse($resBody)
    {
        $response = new Protobuf\HmacResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Signature' => self::toBytes($response->getSignature()),
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
            $request->setMessage(self::toString($reqBody['Message']));
        }
        if (isset($reqBody['MessageType'])) {
            $request->setMessageType($reqBody['MessageType']);
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseSignResponse($resBody)
    {
        $response = new Protobuf\SignResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Signature' => self::toBytes($response->getSignature()),
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
            $request->setSignature(self::toString($reqBody['Signature']));
        }
        if (isset($reqBody['Message'])) {
            $request->setMessage(self::toString($reqBody['Message']));
        }
        if (isset($reqBody['MessageType'])) {
            $request->setMessageType($reqBody['MessageType']);
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseVerifyResponse($resBody)
    {
        $response = new Protobuf\VerifyResponse();
        $response->mergeFromString(self::toString($resBody));
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
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGenerateRandomResponse($resBody)
    {
        $response = new Protobuf\GenerateRandomResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'Random' => self::toBytes($response->getRandom()),
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
            $request->setAad(self::toString($reqBody['Aad']));
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGenerateDataKeyResponse($resBody)
    {
        $response = new Protobuf\GenerateDataKeyResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Iv' => self::toBytes($response->getIv()),
            'Plaintext' => self::toBytes($response->getPlaintext()),
            'CiphertextBlob' => self::toBytes($response->getCiphertextBlob()),
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
            $request->setMessage(self::toString($reqBody['Message']));
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseHashResponse($resBody)
    {
        $response = new Protobuf\HashResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'Digest' => self::toBytes($response->getDigest()),
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
            $request->setPlaintext(self::toString($reqBody['Plaintext']));
        }
        if (isset($reqBody['KeyId'])) {
            $request->setKeyId($reqBody['KeyId']);
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(self::toString($reqBody['Aad']));
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseKmsEncryptResponse($resBody)
    {
        $response = new Protobuf\KmsEncryptResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'CiphertextBlob' => self::toBytes($response->getCiphertextBlob()),
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
            $request->setCiphertextBlob(self::toString($reqBody['CiphertextBlob']));
        }
        if (isset($reqBody['Aad'])) {
            $request->setAad(self::toString($reqBody['Aad']));
        }
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseKmsDecryptResponse($resBody)
    {
        $response = new Protobuf\KmsDecryptResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'Plaintext' => self::toBytes($response->getPlaintext()),
            'RequestId' => $response->getRequestId()
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
        return self::toBytes($request->serializeToString());
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGetPublicKeyResponse($resBody){
        $response = new Protobuf\GetPublicKeyResponse();
        $response->mergeFromString(self::toString($resBody));
        return [
            'KeyId' => $response->getKeyId(),
            'PublicKey' => $response->getPublicKey(),
            'RequestId' => $response->getRequestId()
        ];
    }
}