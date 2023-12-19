<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>api.AdvanceDecryptResponse</code>
 */
class AdvanceDecryptResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string KeyId = 1;</code>
     */
    protected $KeyId = '';
    /**
     * Generated from protobuf field <code>bytes Plaintext = 2;</code>
     */
    protected $Plaintext = '';
    /**
     * Generated from protobuf field <code>string RequestId = 3;</code>
     */
    protected $RequestId = '';
    /**
     * Generated from protobuf field <code>string Algorithm = 4;</code>
     */
    protected $Algorithm = '';
    /**
     * Generated from protobuf field <code>string PaddingMode = 5;</code>
     */
    protected $PaddingMode = '';
    /**
     * Generated from protobuf field <code>string KeyVersionId = 6;</code>
     */
    protected $KeyVersionId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $KeyId
     *     @type string $Plaintext
     *     @type string $RequestId
     *     @type string $Algorithm
     *     @type string $PaddingMode
     *     @type string $KeyVersionId
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
     * Generated from protobuf field <code>bytes Plaintext = 2;</code>
     * @return string
     */
    public function getPlaintext()
    {
        return $this->Plaintext;
    }

    /**
     * Generated from protobuf field <code>bytes Plaintext = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setPlaintext($var)
    {
        GPBUtil::checkString($var, False);
        $this->Plaintext = $var;

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
     * Generated from protobuf field <code>string PaddingMode = 5;</code>
     * @return string
     */
    public function getPaddingMode()
    {
        return $this->PaddingMode;
    }

    /**
     * Generated from protobuf field <code>string PaddingMode = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setPaddingMode($var)
    {
        GPBUtil::checkString($var, True);
        $this->PaddingMode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string KeyVersionId = 6;</code>
     * @return string
     */
    public function getKeyVersionId()
    {
        return $this->KeyVersionId;
    }

    /**
     * Generated from protobuf field <code>string KeyVersionId = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setKeyVersionId($var)
    {
        GPBUtil::checkString($var, True);
        $this->KeyVersionId = $var;

        return $this;
    }

}

