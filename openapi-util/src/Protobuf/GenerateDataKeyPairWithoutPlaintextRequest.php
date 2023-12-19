<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>api.GenerateDataKeyPairWithoutPlaintextRequest</code>
 */
class GenerateDataKeyPairWithoutPlaintextRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string KeyId = 1;</code>
     */
    protected $KeyId = '';
    /**
     * Generated from protobuf field <code>string Algorithm = 2;</code>
     */
    protected $Algorithm = '';
    /**
     * Generated from protobuf field <code>string KeyPairSpec = 3;</code>
     */
    protected $KeyPairSpec = '';
    /**
     * Generated from protobuf field <code>string KeyFormat = 4;</code>
     */
    protected $KeyFormat = '';
    /**
     * Generated from protobuf field <code>bytes Aad = 5;</code>
     */
    protected $Aad = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $KeyId
     *     @type string $Algorithm
     *     @type string $KeyPairSpec
     *     @type string $KeyFormat
     *     @type string $Aad
     * }
     */
    public function __construct($data = NULL) {
        \AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf\GPBMetadata\Api::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string KeyId = 1;</code>
     * @return string
     */
    public function getKeyId()
    {
        return $this->KeyId;
    }

    /**
     * Generated from protobuf field <code>string KeyId = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setKeyId($var)
    {
        GPBUtil::checkString($var, True);
        $this->KeyId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Algorithm = 2;</code>
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->Algorithm;
    }

    /**
     * Generated from protobuf field <code>string Algorithm = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setAlgorithm($var)
    {
        GPBUtil::checkString($var, True);
        $this->Algorithm = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string KeyPairSpec = 3;</code>
     * @return string
     */
    public function getKeyPairSpec()
    {
        return $this->KeyPairSpec;
    }

    /**
     * Generated from protobuf field <code>string KeyPairSpec = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setKeyPairSpec($var)
    {
        GPBUtil::checkString($var, True);
        $this->KeyPairSpec = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string KeyFormat = 4;</code>
     * @return string
     */
    public function getKeyFormat()
    {
        return $this->KeyFormat;
    }

    /**
     * Generated from protobuf field <code>string KeyFormat = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setKeyFormat($var)
    {
        GPBUtil::checkString($var, True);
        $this->KeyFormat = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes Aad = 5;</code>
     * @return string
     */
    public function getAad()
    {
        return $this->Aad;
    }

    /**
     * Generated from protobuf field <code>bytes Aad = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setAad($var)
    {
        GPBUtil::checkString($var, False);
        $this->Aad = $var;

        return $this;
    }

}
