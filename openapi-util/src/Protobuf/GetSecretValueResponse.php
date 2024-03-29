<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>api.GetSecretValueResponse</code>
 */
class GetSecretValueResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string SecretName = 1;</code>
     */
    protected $SecretName = '';
    /**
     * Generated from protobuf field <code>string SecretType = 2;</code>
     */
    protected $SecretType = '';
    /**
     * Generated from protobuf field <code>string SecretData = 3;</code>
     */
    protected $SecretData = '';
    /**
     * Generated from protobuf field <code>string SecretDataType = 4;</code>
     */
    protected $SecretDataType = '';
    /**
     * Generated from protobuf field <code>repeated string VersionStages = 5;</code>
     */
    private $VersionStages;
    /**
     * Generated from protobuf field <code>string VersionId = 6;</code>
     */
    protected $VersionId = '';
    /**
     * Generated from protobuf field <code>string CreateTime = 7;</code>
     */
    protected $CreateTime = '';
    /**
     * Generated from protobuf field <code>string RequestId = 8;</code>
     */
    protected $RequestId = '';
    /**
     * Generated from protobuf field <code>string LastRotationDate = 9;</code>
     */
    protected $LastRotationDate = '';
    /**
     * Generated from protobuf field <code>string NextRotationDate = 10;</code>
     */
    protected $NextRotationDate = '';
    /**
     * Generated from protobuf field <code>string ExtendedConfig = 11;</code>
     */
    protected $ExtendedConfig = '';
    /**
     * Generated from protobuf field <code>string AutomaticRotation = 12;</code>
     */
    protected $AutomaticRotation = '';
    /**
     * Generated from protobuf field <code>string RotationInterval = 13;</code>
     */
    protected $RotationInterval = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $SecretName
     *     @type string $SecretType
     *     @type string $SecretData
     *     @type string $SecretDataType
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $VersionStages
     *     @type string $VersionId
     *     @type string $CreateTime
     *     @type string $RequestId
     *     @type string $LastRotationDate
     *     @type string $NextRotationDate
     *     @type string $ExtendedConfig
     *     @type string $AutomaticRotation
     *     @type string $RotationInterval
     * }
     */
    public function __construct($data = NULL) {
        \AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf\GPBMetadata\Api::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string SecretName = 1;</code>
     * @return string
     */
    public function getSecretName()
    {
        return $this->SecretName;
    }

    /**
     * Generated from protobuf field <code>string SecretName = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setSecretName($var)
    {
        GPBUtil::checkString($var, True);
        $this->SecretName = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string SecretType = 2;</code>
     * @return string
     */
    public function getSecretType()
    {
        return $this->SecretType;
    }

    /**
     * Generated from protobuf field <code>string SecretType = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setSecretType($var)
    {
        GPBUtil::checkString($var, True);
        $this->SecretType = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string SecretData = 3;</code>
     * @return string
     */
    public function getSecretData()
    {
        return $this->SecretData;
    }

    /**
     * Generated from protobuf field <code>string SecretData = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setSecretData($var)
    {
        GPBUtil::checkString($var, True);
        $this->SecretData = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string SecretDataType = 4;</code>
     * @return string
     */
    public function getSecretDataType()
    {
        return $this->SecretDataType;
    }

    /**
     * Generated from protobuf field <code>string SecretDataType = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setSecretDataType($var)
    {
        GPBUtil::checkString($var, True);
        $this->SecretDataType = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string VersionStages = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getVersionStages()
    {
        return $this->VersionStages;
    }

    /**
     * Generated from protobuf field <code>repeated string VersionStages = 5;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setVersionStages($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->VersionStages = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string VersionId = 6;</code>
     * @return string
     */
    public function getVersionId()
    {
        return $this->VersionId;
    }

    /**
     * Generated from protobuf field <code>string VersionId = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setVersionId($var)
    {
        GPBUtil::checkString($var, True);
        $this->VersionId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string CreateTime = 7;</code>
     * @return string
     */
    public function getCreateTime()
    {
        return $this->CreateTime;
    }

    /**
     * Generated from protobuf field <code>string CreateTime = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->CreateTime = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string RequestId = 8;</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->RequestId;
    }

    /**
     * Generated from protobuf field <code>string RequestId = 8;</code>
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
     * Generated from protobuf field <code>string LastRotationDate = 9;</code>
     * @return string
     */
    public function getLastRotationDate()
    {
        return $this->LastRotationDate;
    }

    /**
     * Generated from protobuf field <code>string LastRotationDate = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setLastRotationDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->LastRotationDate = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string NextRotationDate = 10;</code>
     * @return string
     */
    public function getNextRotationDate()
    {
        return $this->NextRotationDate;
    }

    /**
     * Generated from protobuf field <code>string NextRotationDate = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setNextRotationDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->NextRotationDate = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string ExtendedConfig = 11;</code>
     * @return string
     */
    public function getExtendedConfig()
    {
        return $this->ExtendedConfig;
    }

    /**
     * Generated from protobuf field <code>string ExtendedConfig = 11;</code>
     * @param string $var
     * @return $this
     */
    public function setExtendedConfig($var)
    {
        GPBUtil::checkString($var, True);
        $this->ExtendedConfig = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string AutomaticRotation = 12;</code>
     * @return string
     */
    public function getAutomaticRotation()
    {
        return $this->AutomaticRotation;
    }

    /**
     * Generated from protobuf field <code>string AutomaticRotation = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setAutomaticRotation($var)
    {
        GPBUtil::checkString($var, True);
        $this->AutomaticRotation = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string RotationInterval = 13;</code>
     * @return string
     */
    public function getRotationInterval()
    {
        return $this->RotationInterval;
    }

    /**
     * Generated from protobuf field <code>string RotationInterval = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setRotationInterval($var)
    {
        GPBUtil::checkString($var, True);
        $this->RotationInterval = $var;

        return $this;
    }

}

