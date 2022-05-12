<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class VerifyRequest extends Model {
    protected $_name = [
        'headers' => 'Headers',
        'keyId' => 'KeyId',
        'signature' => 'Signature',
        'algorithm' => 'Algorithm',
        'digest' => 'Digest',
        'message' => 'Message',
        'messageType' => 'MessageType',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->headers) {
            $res['Headers'] = $this->headers;
        }
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->signature) {
            $res['Signature'] = $this->signature;
        }
        if (null !== $this->algorithm) {
            $res['Algorithm'] = $this->algorithm;
        }
        if (null !== $this->digest) {
            $res['Digest'] = $this->digest;
        }
        if (null !== $this->message) {
            $res['Message'] = $this->message;
        }
        if (null !== $this->messageType) {
            $res['MessageType'] = $this->messageType;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return VerifyRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['Headers'])){
            $model->headers = $map['Headers'];
        }
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['Signature'])){
            $model->signature = $map['Signature'];
        }
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
        }
        if(isset($map['Digest'])){
            $model->digest = $map['Digest'];
        }
        if(isset($map['Message'])){
            $model->message = $map['Message'];
        }
        if(isset($map['MessageType'])){
            $model->messageType = $map['MessageType'];
        }
        return $model;
    }
    /**
     * @var string[]
     */
    public $headers;

    /**
     * @var string
     */
    public $keyId;

    /**
     * @var int[]
     */
    public $signature;

    /**
     * @var string
     */
    public $algorithm;

    /**
     * @var int[]
     */
    public $digest;

    /**
     * @var int[]
     */
    public $message;

    /**
     * @var string
     */
    public $messageType;

}
