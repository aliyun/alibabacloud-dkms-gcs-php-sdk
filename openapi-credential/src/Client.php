<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential;

use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Auth\Signer;
use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Models\Config;
use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Provider\AlibabaCloudCredentialsProvider;
use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Provider\RsaKeyPairCredentialProvider;
use \Exception;

class Client
{
    /**
     * @var AlibabaCloudCredentialsProvider
     */
    private $credentialsProvider;

    /**
     * @param Config $config
     * @throws Exception
     */
    public function __construct($config)
    {
        if ($config->type === 'rsa_key_pair') {
            if (!empty($config->clientKeyContent)) {
                $clientKey = \json_decode($config->clientKeyContent);
                $privateKeyData = \base64_decode($clientKey->{'PrivateKeyData'});
                if (!\openssl_pkcs12_read($privateKeyData, $keystore, $config->password)) {
                    throw new Exception('Could not decrypt the privateKey of clientKey, the password is incorrect, ' . 'or it is not a valid pkcs12.');
                }
                $this->credentialsProvider = new RsaKeyPairCredentialProvider($clientKey->{'KeyId'}, $keystore['pkey']);
            } elseif (!empty($config->clientKeyFile)) {
                if (!\is_file($config->clientKeyFile)) {
                    throw new Exception(\sprintf("Read client key file failed: %s", $config->clientKeyFile));
                }
                $file = \fopen($config->clientKeyFile, 'r');
                $clientKeyJson = \fread($file, \filesize($config->clientKeyFile));
                \fclose($file);
                $clientKey = \json_decode($clientKeyJson);
                $privateKeyData = \base64_decode($clientKey->{'PrivateKeyData'});
                if (!\openssl_pkcs12_read($privateKeyData, $keystore, $config->password)) {
                    throw new Exception('Could not decrypt the privateKey of clientKey, the password is incorrect, ' . 'or it is not a valid pkcs12.');
                }
                $this->credentialsProvider = new RsaKeyPairCredentialProvider($clientKey->{'KeyId'}, $keystore['pkey']);
            } else {
                $this->credentialsProvider = new RsaKeyPairCredentialProvider($config->accessKeyId, $config->privateKey);
            }
        } else {
            throw new Exception('Only support rsa key pair credential provider now.');
        }
    }

    /**
     * @return string
     */
    public function getAccessKeyId()
    {
        return $this->credentialsProvider->getCredentials()->getAccessKeyId();
    }

    /**
     * @return string
     */
    public function getAccessKeySecret()
    {
        return $this->credentialsProvider->getCredentials()->getAccessKeySecret();
    }

    /**
     * @param string $strToSign
     * @return string
     * @throws Exception
     */
    public function getSignature($strToSign)
    {
        $credentials = $this->credentialsProvider->getCredentials();
        $signer = Signer::getSigner($credentials);
        return $signer->signString($strToSign, $credentials->getAccessKeySecret());
    }
}
