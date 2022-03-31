<?php

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Auth;

use Exception;

class Sha256withRsaSigner extends Signer
{
    /**
     * @param string $stringToSign
     * @param string $accessKeySecret
     * @return string
     * @throws Exception
     */
    public function signString($stringToSign, $accessKeySecret)
    {
        $signature = '';
        try {
            \openssl_sign($stringToSign, $signature, $accessKeySecret, \OPENSSL_ALGO_SHA256);
        } catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return 'Bearer ' . base64_encode($signature);
    }

    /**
     * @return string
     */
    public function getSignerName()
    {
        return 'RSA_PKCS1_SHA_256';
    }

    /**
     * @return string
     */
    public function getSignerVersion()
    {
        return '1.0';
    }

    /**
     * @return string
     */
    public function getSignerType()
    {
        return 'rsa_key_pair';
    }
}