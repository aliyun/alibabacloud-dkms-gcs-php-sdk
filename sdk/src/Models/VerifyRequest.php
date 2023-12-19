<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class VerifyRequest extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'signature' => 'Signature',
        'algorithm' => 'Algorithm',
        'message' => 'Message',
        'messageType' => 'MessageType',
        'requestHeaders' => 'requestHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->signature) {
            $res['Signature'] = $this->signature;
        }
        if (null !== $this->algorithm) {
            $res['Algorithm'] = $this->algorithm;
        }
        if (null !== $this->message) {
            $res['Message'] = $this->message;
        }
        if (null !== $this->messageType) {
            $res['MessageType'] = $this->messageType;
        }
        if (null !== $this->requestHeaders) {
            $res['requestHeaders'] = $this->requestHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return VerifyRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['Signature'])){
            $model->signature = $map['Signature'];
        }
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
        }
        if(isset($map['Message'])){
            $model->message = $map['Message'];
        }
        if(isset($map['MessageType'])){
            $model->messageType = $map['MessageType'];
        }
        if(isset($map['requestHeaders'])){
            $model->requestHeaders = $map['requestHeaders'];
        }
        return $model;
    }
    /**
     * @description 密钥的全局唯一标识符该参数也可以被指定为密钥别名
     * @var string
     */
    public $keyId;

    /**
     * @description 计算出来的签名值
     * @var int[]
     */
    public $signature;

    /**
     * @description 加密算法
     * @var string
     */
    public $algorithm;

    /**
     * @description 签名消息
     * @var int[]
     */
    public $message;

    /**
     * @description 消息类型: 1. RAW（默认值）：原始数据2. DIGEST：原始数据的消息摘要
     * @var string
     */
    public $messageType;

    /**
     * @description 请求头
     * @var string[]
     */
    public $requestHeaders;

}
