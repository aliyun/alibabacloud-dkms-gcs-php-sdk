<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GenerateDataKeyResponse extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'iv' => 'Iv',
        'plaintext' => 'Plaintext',
        'ciphertextBlob' => 'CiphertextBlob',
        'requestId' => 'RequestId',
        'algorithm' => 'Algorithm',
        'responseHeaders' => 'responseHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->iv) {
            $res['Iv'] = $this->iv;
        }
        if (null !== $this->plaintext) {
            $res['Plaintext'] = $this->plaintext;
        }
        if (null !== $this->ciphertextBlob) {
            $res['CiphertextBlob'] = $this->ciphertextBlob;
        }
        if (null !== $this->requestId) {
            $res['RequestId'] = $this->requestId;
        }
        if (null !== $this->algorithm) {
            $res['Algorithm'] = $this->algorithm;
        }
        if (null !== $this->responseHeaders) {
            $res['responseHeaders'] = $this->responseHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GenerateDataKeyResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['Iv'])){
            $model->iv = $map['Iv'];
        }
        if(isset($map['Plaintext'])){
            $model->plaintext = $map['Plaintext'];
        }
        if(isset($map['CiphertextBlob'])){
            $model->ciphertextBlob = $map['CiphertextBlob'];
        }
        if(isset($map['RequestId'])){
            $model->requestId = $map['RequestId'];
        }
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
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
     * @description 加密数据时使用的初始向量
     * @var int[]
     */
    public $iv;

    /**
     * @description 待加密的明文数据
     * @var int[]
     */
    public $plaintext;

    /**
     * @description 数据被指定密钥加密后的密文
     * @var int[]
     */
    public $ciphertextBlob;

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
     * @description 响应头
     * @var string[]
     */
    public $responseHeaders;

}
