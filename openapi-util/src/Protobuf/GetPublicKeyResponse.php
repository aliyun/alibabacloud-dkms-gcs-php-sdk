<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>AlibabaCloud.Dkms.Gcs.OpenApi.Util.Protobuf.GetPublicKeyResponse</code>
 */
class GetPublicKeyResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string KeyId = 1;</code>
     */
    private $KeyId = '';
    /**
     * Generated from protobuf field <code>string PublicKey = 2;</code>
     */
    private $PublicKey = '';
    /**
     * Generated from protobuf field <code>string RequestId = 3;</code>
     */
    private $RequestId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $KeyId
     *     @type string $PublicKey
     *     @type string $RequestId
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
     * Generated from protobuf field <code>string PublicKey = 2;</code>
     * @return string
     */
    public function getPublicKey()
    {
        return $this->PublicKey;
    }

    /**
     * Generated from protobuf field <code>string PublicKey = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setPublicKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->PublicKey = $var;

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

}
