<?php

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Auth;

use Exception;

class RsaKeyPairCredentials implements AlibabaCloudCredentials
{
    /**
     * @var string
     */
    private $privateKeySecret;

    /**
     * @var string
     */
    private $keyId;

    /**
     * @param string $keyId
     * @param string $privateKeySecret
     * @throws Exception
     */
    public function __construct($keyId, $privateKeySecret)
    {
        if (!empty($privateKeySecret)) {
            $this->keyId = $keyId;
            $this->privateKeySecret = $privateKeySecret;
        } else {
            throw new Exception('You must provide a valid Private Key Secret.');
        }
    }

    /**
     * @return string
     */
    public function getAccessKeyId()
    {
        return $this->keyId;
    }

    /**
     * @return string
     */
    public function getAccessKeySecret()
    {
        return $this->privateKeySecret;
    }
}