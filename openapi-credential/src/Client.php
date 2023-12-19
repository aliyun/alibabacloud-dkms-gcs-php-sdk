<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential;

use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Darabonba\EncodeUtil\EncodeUtil;
use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Client as AlibabaCloudDkmsGcsOpenApiUtilClient;
use AlibabaCloud\Darabonba\Stream\StreamUtil;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Darabonba\SignatureUtil\SignatureUtil;

class Client {
    protected $_keyId;

    protected $_privateKeySecret;

    public function __construct($config){
        if (Utils::equalString("rsa_key_pair", $config->type)) {
            if (!Utils::empty_($config->clientKeyContent)) {
                $json = Utils::parseJSON($config->clientKeyContent);
                $clientKey = Utils::assertAsMap($json);
                $privateKeyData = EncodeUtil::base64Decode(Utils::assertAsString(@$clientKey["PrivateKeyData"]));
                $this->_privateKeySecret = AlibabaCloudDkmsGcsOpenApiUtilClient::getPrivatePemFromPk12($privateKeyData, $config->password);
                $this->_keyId = Utils::assertAsString(@$clientKey["KeyId"]);
            }
            else if (!Utils::empty_($config->clientKeyFile)) {
                $jsonFromFile = Utils::readAsJSON(StreamUtil::readFromFilePath($config->clientKeyFile));
                if (Utils::isUnset($jsonFromFile)) {
                    throw new TeaError([
                        "message" => "read client key file failed: " . $config->clientKeyFile . ""
                    ]);
                }
                $clientKeyFromFile = Utils::assertAsMap($jsonFromFile);
                $privateKeyDataFromFile = EncodeUtil::base64Decode(Utils::assertAsString(@$clientKeyFromFile["PrivateKeyData"]));
                $this->_privateKeySecret = AlibabaCloudDkmsGcsOpenApiUtilClient::getPrivatePemFromPk12($privateKeyDataFromFile, $config->password);
                $this->_keyId = Utils::assertAsString(@$clientKeyFromFile["KeyId"]);
            }
            else {
                $this->_privateKeySecret = $config->privateKey;
                $this->_keyId = $config->accessKeyId;
            }
        }
        else {
            throw new TeaError([
                "message" => "Only support rsa key pair credential provider now."
            ]);
        }
    }

    /**
     * @return string
     */
    public function getAccessKeyId(){
        return $this->_keyId;
    }

    /**
     * @return string
     */
    public function getAccessKeySecret(){
        return $this->_privateKeySecret;
    }

    /**
     * @param string $strToSign
     * @return string
     */
    public function getSignature($strToSign){
        $prefix = "Bearer ";
        $sign = EncodeUtil::base64EncodeToString(SignatureUtil::SHA256withRSASign($strToSign, $this->getAccessKeySecret()));
        return "" . $prefix . "" . $sign . "";
    }
}
