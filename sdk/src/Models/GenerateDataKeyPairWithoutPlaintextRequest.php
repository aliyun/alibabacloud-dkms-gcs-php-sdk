<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GenerateDataKeyPairWithoutPlaintextRequest extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'algorithm' => 'Algorithm',
        'keyPairSpec' => 'KeyPairSpec',
        'keyFormat' => 'KeyFormat',
        'aad' => 'Aad',
        'requestHeaders' => 'requestHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->algorithm) {
            $res['Algorithm'] = $this->algorithm;
        }
        if (null !== $this->keyPairSpec) {
            $res['KeyPairSpec'] = $this->keyPairSpec;
        }
        if (null !== $this->keyFormat) {
            $res['KeyFormat'] = $this->keyFormat;
        }
        if (null !== $this->aad) {
            $res['Aad'] = $this->aad;
        }
        if (null !== $this->requestHeaders) {
            $res['requestHeaders'] = $this->requestHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GenerateDataKeyPairWithoutPlaintextRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
        }
        if(isset($map['KeyPairSpec'])){
            $model->keyPairSpec = $map['KeyPairSpec'];
        }
        if(isset($map['KeyFormat'])){
            $model->keyFormat = $map['KeyFormat'];
        }
        if(isset($map['Aad'])){
            $model->aad = $map['Aad'];
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
     * @description 加密算法
     * @var string
     */
    public $algorithm;

    /**
     * @description 指定生成的数据密钥对类型
     * @var string
     */
    public $keyPairSpec;

    /**
     * @description 生成数据密钥对格式，取值:PEM,DER
     * @var string
     */
    public $keyFormat;

    /**
     * @description 对数据密钥加密时使用的GCM加密模式认证数据
     * @var int[]
     */
    public $aad;

    /**
     * @description 请求头
     * @var string[]
     */
    public $requestHeaders;

}
