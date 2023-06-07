<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>AlibabaCloud.Dkms.Gcs.OpenApi.Util.Protobuf.AdvanceEncryptResponse</code>
 */
class AdvanceEncryptResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string KeyId = 1;</code>
     */
    private $KeyId = '';
    /**
     * Generated from protobuf field <code>bytes CiphertextBlob = 2;</code>
     */
    private $CiphertextBlob = '';
    /**
     * Generated from protobuf field <code>bytes Iv = 3;</code>
     */
    private $Iv = '';
    /**
     * Generated from protobuf field <code>string RequestId = 4;</code>
     */
    private $RequestId = '';
    /**
     * Generated from protobuf field <code>string Algorithm = 5;</code>
     */
    private $Algorithm = '';
    /**
     * Generated from protobuf field <code>string PaddingMode = 6;</code>
     */
    private $PaddingMode = '';
    /**
     * Generated from protobuf field <code>string KeyVersionId = 7;</code>
     */
    private $KeyVersionId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $KeyId
     *     @type string $CiphertextBlob
     *     @type string $Iv
     *     @type string $RequestId
     *     @type string $Algorithm
     *     @type string $PaddingMode
     *     @type string $KeyVersionId
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Api::initOnce();
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
     * Generated from protobuf field <code>bytes CiphertextBlob = 2;</code>
     * @return string
     */
    public function getCiphertextBlob()
    {
        return $this->CiphertextBlob;
    }

    /**
     * Generated from protobuf field <code>bytes CiphertextBlob = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCiphertextBlob($var)
    {
        GPBUtil::checkString($var, False);
        $this->CiphertextBlob = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes Iv = 3;</code>
     * @return string
     */
    public function getIv()
    {
        return $this->Iv;
    }

    /**
     * Generated from protobuf field <code>bytes Iv = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setIv($var)
    {
        GPBUtil::checkString($var, False);
        $this->Iv = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string RequestId = 4;</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->RequestId;
    }

    /**
     * Generated from protobuf field <code>string RequestId = 4;</code>
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
     * Generated from protobuf field <code>string Algorithm = 5;</code>
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->Algorithm;
    }

    /**
     * Generated from protobuf field <code>string Algorithm = 5;</code>
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
     * Generated from protobuf field <code>string PaddingMode = 6;</code>
     * @return string
     */
    public function getPaddingMode()
    {
        return $this->PaddingMode;
    }

    /**
     * Generated from protobuf field <code>string PaddingMode = 6;</code>
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
     * Generated from protobuf field <code>string KeyVersionId = 7;</code>
     * @return string
     */
    public function getKeyVersionId()
    {
        return $this->KeyVersionId;
    }

    /**
     * Generated from protobuf field <code>string KeyVersionId = 7;</code>
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
