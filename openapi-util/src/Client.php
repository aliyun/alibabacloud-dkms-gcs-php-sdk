<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util;

use \Exception;
use AlibabaCloud\Tea\Request;

class Client
{

    /**
     * @param string[] $headers
     * @param string[] $constraint
     * @return array
     */
    public static function filterHeaders($headers, $constraint)
    {
        return Utils::filterHeaders($headers, $constraint);
    }

    /**
     * @param string $regionId
     * @param string $endpoint
     * @return string
     */
    public static function getHost($regionId, $endpoint)
    {
        return Utils::getHost($regionId, $endpoint);
    }

    /**
     * @param int[] $msg
     * @return array
     * @throws Exception
     */
    public static function getErrMessage($msg)
    {
        return Utils::getErrMessage($msg);
    }

    /**
     * @param Request $request
     * @return string
     */
    public static function getStringToSign($request)
    {
        return Utils::getStringToSign($request);
    }

    /**
     * @param int[] $reqBody
     * @return string
     */
    public static function getContentLength($reqBody)
    {
        return Utils::getContentLength($reqBody);
    }

    /**
     * @param int[] $reqBody
     * @return string
     */
    public static function getContentSHA256($reqBody)
    {
        return Utils::getContentSHA256($reqBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedEncryptRequest($reqBody)
    {
        return Utils::getSerializedEncryptRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseEncryptResponse($resBody)
    {
        return Utils::parseEncryptResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedDecryptRequest($reqBody)
    {
        return Utils::getSerializedDecryptRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseDecryptResponse($resBody)
    {
        return Utils::parseDecryptResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedHmacRequest($reqBody)
    {
        return Utils::getSerializedHmacRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseHmacResponse($resBody)
    {
        return Utils::parseHmacResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedSignRequest($reqBody)
    {
        return Utils::getSerializedSignRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseSignResponse($resBody)
    {
        return Utils::parseSignResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedVerifyRequest($reqBody)
    {
        return Utils::getSerializedVerifyRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseVerifyResponse($resBody)
    {
        return Utils::parseVerifyResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGenerateRandomRequest($reqBody)
    {
        return Utils::getSerializedGenerateRandomRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGenerateRandomResponse($resBody)
    {
        return Utils::parseGenerateRandomResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGenerateDataKeyRequest($reqBody)
    {
        return Utils::getSerializedGenerateDataKeyRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGenerateDataKeyResponse($resBody)
    {
        return Utils::parseGenerateDataKeyResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedGetPublicKeyRequest($reqBody)
    {
        return Utils::getSerializedGetPublicKeyRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     */
    public static function parseGetPublicKeyResponse($resBody)
    {
        return Utils::parseGetPublicKeyResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedHashRequest($reqBody)
    {
        return Utils::getSerializedHashRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseHashResponse($resBody)
    {
        return Utils::parseHashResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedKmsEncryptRequest($reqBody)
    {
        return Utils::getSerializedKmsEncryptRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseKmsEncryptResponse($resBody)
    {
        return Utils::parseKmsEncryptResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     */
    public static function getSerializedKmsDecryptRequest($reqBody)
    {
        return Utils::getSerializedKmsDecryptRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseKmsDecryptResponse($resBody)
    {
        return Utils::parseKmsDecryptResponse($resBody);
    }

    /**
     * @param mixed[] $reqBody
     * @return array
     * @throws Exception
     */
    public static function getSerializedGetSecretValueRequest($reqBody)
    {
        return Utils::getSerializedGetSecretValueRequest($reqBody);
    }

    /**
     * @param int[] $resBody
     * @return array
     * @throws Exception
     */
    public static function parseGetSecretValueResponse($resBody)
    {
        return Utils::parseGetSecretValueResponse($resBody);
    }
}
