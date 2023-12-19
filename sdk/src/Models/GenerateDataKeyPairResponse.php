<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GenerateDataKeyPairResponse extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'iv' => 'Iv',
        'keyPairSpec' => 'KeyPairSpec',
        'privateKeyPlaintext' => 'PrivateKeyPlaintext',
        'privateKeyCiphertextBlob' => 'PrivateKeyCiphertextBlob',
        'publicKey' => 'PublicKey',
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
        if (null !== $this->keyPairSpec) {
            $res['KeyPairSpec'] = $this->keyPairSpec;
        }
        if (null !== $this->privateKeyPlaintext) {
            $res['PrivateKeyPlaintext'] = $this->privateKeyPlaintext;
        }
        if (null !== $this->privateKeyCiphertextBlob) {
            $res['PrivateKeyCiphertextBlob'] = $this->privateKeyCiphertextBlob;
        }
        if (null !== $this->publicKey) {
            $res['PublicKey'] = $this->publicKey;
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
     * @return GenerateDataKeyPairResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['Iv'])){
            $model->iv = $map['Iv'];
        }
        if(isset($map['KeyPairSpec'])){
            $model->keyPairSpec = $map['KeyPairSpec'];
        }
        if(isset($map['PrivateKeyPlaintext'])){
            $model->privateKeyPlaintext = $map['PrivateKeyPlaintext'];
        }
        if(isset($map['PrivateKeyCiphertextBlob'])){
            $model->privateKeyCiphertextBlob = $map['PrivateKeyCiphertextBlob'];
        }
        if(isset($map['PublicKey'])){
            $model->publicKey = $map['PublicKey'];
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
     * @description 指定生成的数据密钥对类型
     * @var string
     */
    public $keyPairSpec;

    /**
     * @description 私钥明文
     * @var int[]
     */
    public $privateKeyPlaintext;

    /**
     * @description 私钥密文
     * @var int[]
     */
    public $privateKeyCiphertextBlob;

    /**
     * @description 公钥
     * @var int[]
     */
    public $publicKey;

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
