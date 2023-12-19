<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class DecryptRequest extends Model {
    protected $_name = [
        'ciphertextBlob' => 'CiphertextBlob',
        'keyId' => 'KeyId',
        'algorithm' => 'Algorithm',
        'aad' => 'Aad',
        'iv' => 'Iv',
        'paddingMode' => 'PaddingMode',
        'requestHeaders' => 'requestHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->ciphertextBlob) {
            $res['CiphertextBlob'] = $this->ciphertextBlob;
        }
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->algorithm) {
            $res['Algorithm'] = $this->algorithm;
        }
        if (null !== $this->aad) {
            $res['Aad'] = $this->aad;
        }
        if (null !== $this->iv) {
            $res['Iv'] = $this->iv;
        }
        if (null !== $this->paddingMode) {
            $res['PaddingMode'] = $this->paddingMode;
        }
        if (null !== $this->requestHeaders) {
            $res['requestHeaders'] = $this->requestHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return DecryptRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['CiphertextBlob'])){
            $model->ciphertextBlob = $map['CiphertextBlob'];
        }
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
        }
        if(isset($map['Aad'])){
            $model->aad = $map['Aad'];
        }
        if(isset($map['Iv'])){
            $model->iv = $map['Iv'];
        }
        if(isset($map['PaddingMode'])){
            $model->paddingMode = $map['PaddingMode'];
        }
        if(isset($map['requestHeaders'])){
            $model->requestHeaders = $map['requestHeaders'];
        }
        return $model;
    }
    /**
     * @description 数据被指定密钥加密后的密文
     * @var int[]
     */
    public $ciphertextBlob;

    /**
     * @description 密钥的全局唯一标识符该参数也可以被指定为密钥别名
     * @var string
     */
    public $keyId;

    /**
     * @description 加密算法
     * @var string
     */
    public $algorithm;

    /**
     * @description 对数据密钥加密时使用的GCM加密模式认证数据
     * @var int[]
     */
    public $aad;

    /**
     * @description 加密数据时使用的初始向量
     * @var int[]
     */
    public $iv;

    /**
     * @description 填充模式
     * @var string
     */
    public $paddingMode;

    /**
     * @description 请求头
     * @var string[]
     */
    public $requestHeaders;

}
