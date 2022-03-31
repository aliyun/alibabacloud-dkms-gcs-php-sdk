<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>AlibabaCloud.Dkms.Gcs.OpenApi.Util.Protobuf.GenerateRandomResponse</code>
 */
class GenerateRandomResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>bytes Random = 1;</code>
     */
    private $Random = '';
    /**
     * Generated from protobuf field <code>string RequestId = 2;</code>
     */
    private $RequestId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $Random
     *     @type string $RequestId
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Api::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>bytes Random = 1;</code>
     * @return string
     */
    public function getRandom()
    {
        return $this->Random;
    }

    /**
     * Generated from protobuf field <code>bytes Random = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setRandom($var)
    {
        GPBUtil::checkString($var, False);
        $this->Random = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string RequestId = 2;</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->RequestId;
    }

    /**
     * Generated from protobuf field <code>string RequestId = 2;</code>
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

