<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>api.SignResponse</code>
 */
class SignResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string KeyId = 1;</code>
     */
    protected $KeyId = '';
    /**
     * Generated from protobuf field <code>bytes Signature = 2;</code>
     */
    protected $Signature = '';
    /**
     * Generated from protobuf field <code>string RequestId = 3;</code>
     */
    protected $RequestId = '';
    /**
     * Generated from protobuf field <code>string Algorithm = 4;</code>
     */
    protected $Algorithm = '';
    /**
     * Generated from protobuf field <code>string MessageType = 5;</code>
     */
    protected $MessageType = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $KeyId
     *     @type string $Signature
     *     @type string $RequestId
     *     @type string $Algorithm
     *     @type string $MessageType
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
     * Generated from protobuf field <code>bytes Signature = 2;</code>
     * @return string
     */
    public function getSignature()
    {
        return $this->Signature;
    }

    /**
     * Generated from protobuf field <code>bytes Signature = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setSignature($var)
    {
        GPBUtil::checkString($var, False);
        $this->Signature = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string RequestId = 3;</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->RequestId;
    }

    /**
     * Generated from protobuf field <code>string RequestId = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setRequestId($var)
    {
        GPBUtil::checkString($var, True);
        $this->RequestId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Algorithm = 4;</code>
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->Algorithm;
    }

    /**
     * Generated from protobuf field <code>string Algorithm = 4;</code>
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
     * Generated from protobuf field <code>string MessageType = 5;</code>
     * @return string
     */
    public function getMessageType()
    {
        return $this->MessageType;
    }

    /**
     * Generated from protobuf field <code>string MessageType = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setMessageType($var)
    {
        GPBUtil::checkString($var, True);
        $this->MessageType = $var;

        return $this;
    }

}

