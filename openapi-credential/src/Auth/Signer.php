<?php

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Auth;

use Exception;

abstract class Signer
{
    /**
     * @param AlibabaCloudCredentials $credentials
     * @return Signer
     * @throws Exception
     */
    public static function getSigner($credentials)
    {
        if ($credentials instanceof RsaKeyPairCredentials) {
            return new Sha256withRsaSigner();
        } else {
            throw new Exception('Only support rsa key pair credential now.');
        }
    }

    /**
     * @param string $stringToSign
     * @param string $accessKeySecret
     * @return string
     * @throws Exception
     */
    abstract public function signString($stringToSign, $accessKeySecret);

    /**
     * @return string
     */
    abstract public function getSignerName();

    /**
     * @return string
     */
    abstract public function getSignerVersion();

    /**
     * @return string
     */
    abstract public function getSignerType();

}