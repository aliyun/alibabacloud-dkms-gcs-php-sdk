<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * 凭据管家API
 *
 * Generated from protobuf message <code>AlibabaCloud.Dkms.Gcs.OpenApi.Util.Protobuf.GetSecretValueRequest</code>
 */
class GetSecretValueRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string SecretName = 1;</code>
     */
    private $SecretName = '';
    /**
     * Generated from protobuf field <code>string VersionStage = 2;</code>
     */
    private $VersionStage = '';
    /**
     * Generated from protobuf field <code>string VersionId = 3;</code>
     */
    private $VersionId = '';
    /**
     * Generated from protobuf field <code>bool FetchExtendedConfig = 4;</code>
     */
    private $FetchExtendedConfig = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $SecretName
     *     @type string $VersionStage
     *     @type string $VersionId
     *     @type bool $FetchExtendedConfig
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Api::initOnce();
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
     * Generated from protobuf field <code>string VersionStage = 2;</code>
     * @return string
     */
    public function getVersionStage()
    {
        return $this->VersionStage;
    }

    /**
     * Generated from protobuf field <code>string VersionStage = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setVersionStage($var)
    {
        GPBUtil::checkString($var, True);
        $this->VersionStage = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string VersionId = 3;</code>
     * @return string
     */
    public function getVersionId()
    {
        return $this->VersionId;
    }

    /**
     * Generated from protobuf field <code>string VersionId = 3;</code>
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
     * Generated from protobuf field <code>bool FetchExtendedConfig = 4;</code>
     * @return bool
     */
    public function getFetchExtendedConfig()
    {
        return $this->FetchExtendedConfig;
    }

    /**
     * Generated from protobuf field <code>bool FetchExtendedConfig = 4;</code>
     * @param bool $var
     * @return $this
     */
    public function setFetchExtendedConfig($var)
    {
        GPBUtil::checkBool($var);
        $this->FetchExtendedConfig = $var;

        return $this;
    }

}

