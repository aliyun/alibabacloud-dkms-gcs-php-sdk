<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: api.proto

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>api.GenerateRandomRequest</code>
 */
class GenerateRandomRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 Length = 1;</code>
     */
    protected $Length = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $Length
     * }
     */
    public function __construct($data = NULL) {
        \AlibabaCloud\Dkms\Gcs\OpenApi\Util\Protobuf\GPBMetadata\Api::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 Length = 1;</code>
     * @return int
     */
    public function getLength()
    {
        return $this->Length;
    }

    /**
     * Generated from protobuf field <code>int32 Length = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setLength($var)
    {
        GPBUtil::checkInt32($var);
        $this->Length = $var;

        return $this;
    }

}

