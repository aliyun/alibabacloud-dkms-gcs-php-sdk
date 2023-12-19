<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class DecryptResponse extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'plaintext' => 'Plaintext',
        'requestId' => 'RequestId',
        'algorithm' => 'Algorithm',
        'paddingMode' => 'PaddingMode',
        'responseHeaders' => 'responseHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->plaintext) {
            $res['Plaintext'] = $this->plaintext;
        }
        if (null !== $this->requestId) {
            $res['RequestId'] = $this->requestId;
        }
        if (null !== $this->algorithm) {
            $res['Algorithm'] = $this->algorithm;
        }
        if (null !== $this->paddingMode) {
            $res['PaddingMode'] = $this->paddingMode;
        }
        if (null !== $this->responseHeaders) {
            $res['responseHeaders'] = $this->responseHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return DecryptResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['Plaintext'])){
            $model->plaintext = $map['Plaintext'];
        }
        if(isset($map['RequestId'])){
            $model->requestId = $map['RequestId'];
        }
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
        }
        if(isset($map['PaddingMode'])){
            $model->paddingMode = $map['PaddingMode'];
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
     * @description 待加密的明文数据
     * @var int[]
     */
    public $plaintext;

    /**
     * @description 请求ID
     * @var string
     */
    public $requestId;

    /**
     * @description 加密算法
     * @var string
     */
    public $algorithm;

    /**
     * @description 填充模式
     * @var string
     */
    public $paddingMode;

    /**
     * @description 响应头
     * @var string[]
     */
    public $responseHeaders;

}
