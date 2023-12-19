<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GetPublicKeyResponse extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'publicKey' => 'PublicKey',
        'requestId' => 'RequestId',
        'responseHeaders' => 'responseHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->publicKey) {
            $res['PublicKey'] = $this->publicKey;
        }
        if (null !== $this->requestId) {
            $res['RequestId'] = $this->requestId;
        }
        if (null !== $this->responseHeaders) {
            $res['responseHeaders'] = $this->responseHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GetPublicKeyResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['PublicKey'])){
            $model->publicKey = $map['PublicKey'];
        }
        if(isset($map['RequestId'])){
            $model->requestId = $map['RequestId'];
        }
        if(isset($map['responseHeaders'])){
            $model->responseHeaders = $map['responseHeaders'];
        }
        return $model;
    }
    /**
     * @description 密钥的全局唯一标识符该参数也可以被指定为密钥别名
     * @var string
     */
    public $keyId;

    /**
     * @description PEM格式的公钥
     * @var string
     */
    public $publicKey;

    /**
     * @description 请求ID
     * @var string
     */
    public $requestId;

    /**
     * @description 响应头
     * @var string[]
     */
    public $responseHeaders;

}
