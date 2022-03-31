<?php

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Provider;

use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Auth\AlibabaCloudCredentials;
use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Auth\RsaKeyPairCredentials;
use Exception;

class RsaKeyPairCredentialProvider implements AlibabaCloudCredentialsProvider
{
    /**
     * @var AlibabaCloudCredentials
     */
    private $credentials;

    /**
     * @param string $keyId
     * @param string $privateKey
     * @throws Exception
     */
    public function __construct($keyId, $privateKey)
    {
        $this->credentials = new RsaKeyPairCredentials($keyId, $privateKey);
    }

    /**
     * @inheritDoc
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
}