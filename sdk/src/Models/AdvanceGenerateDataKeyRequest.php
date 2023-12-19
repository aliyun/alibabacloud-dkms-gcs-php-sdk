<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class AdvanceGenerateDataKeyRequest extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'numberOfBytes' => 'NumberOfBytes',
        'aad' => 'Aad',
        'requestHeaders' => 'requestHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->numberOfBytes) {
            $res['NumberOfBytes'] = $this->numberOfBytes;
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
     * @return AdvanceGenerateDataKeyRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['NumberOfBytes'])){
            $model->numberOfBytes = $map['NumberOfBytes'];
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
     * @description 生成的数据密钥的长度
     * @var int
     */
    public $numberOfBytes;

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
