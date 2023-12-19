<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>api.AdvanceGenerateDataKeyRequest</code>
 */
class AdvanceGenerateDataKeyRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string KeyId = 1;</code>
     */
    protected $KeyId = '';
    /**
     * Generated from protobuf field <code>int32 NumberOfBytes = 2;</code>
     */
    protected $NumberOfBytes = 0;
    /**
     * Generated from protobuf field <code>bytes Aad = 3;</code>
     */
    protected $Aad = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $KeyId
     *     @type int $NumberOfBytes
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
     * Generated from protobuf field <code>int32 NumberOfBytes = 2;</code>
     * @return int
     */
    public function getNumberOfBytes()
    {
        return $this->NumberOfBytes;
    }

    /**
     * Generated from protobuf field <code>int32 NumberOfBytes = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setNumberOfBytes($var)
    {
        GPBUtil::checkInt32($var);
        $this->NumberOfBytes = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes Aad = 3;</code>
     * @return string
     */
    public function getAad()
    {
        return $this->Aad;
    }

    /**
     * Generated from protobuf field <code>bytes Aad = 3;</code>
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

