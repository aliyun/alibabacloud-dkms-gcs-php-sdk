<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class EncryptResponse extends Model {
    protected $_name = [
        'headers' => 'Headers',
        'keyId' => 'KeyId',
        'ciphertextBlob' => 'CiphertextBlob',
        'iv' => 'Iv',
        'algorithm' => 'Algorithm',
        'paddingMode' => 'PaddingMode',
        'requestId' => 'RequestId',
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
        if (null !== $this->ciphertextBlob) {
            $res['CiphertextBlob'] = $this->ciphertextBlob;
        }
        if (null !== $this->iv) {
            $res['Iv'] = $this->iv;
        }
        if (null !== $this->algorithm) {
            $res['Algorithm'] = $this->algorithm;
        }
        if (null !== $this->paddingMode) {
            $res['PaddingMode'] = $this->paddingMode;
        }
        if (null !== $this->requestId) {
            $res['RequestId'] = $this->requestId;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return EncryptResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['Headers'])){
            $model->headers = $map['Headers'];
        }
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['CiphertextBlob'])){
            $model->ciphertextBlob = $map['CiphertextBlob'];
        }
        if(isset($map['Iv'])){
            $model->iv = $map['Iv'];
        }
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
        }
        if(isset($map['PaddingMode'])){
            $model->paddingMode = $map['PaddingMode'];
        }
        if(isset($map['RequestId'])){
            $model->requestId = $map['RequestId'];
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
    public $ciphertextBlob;

    /**
     * @var int[]
     */
    public $iv;

    /**
     * @var string
     */
    public $algorithm;

    /**
     * @var string
     */
    public $paddingMode;

    /**
     * @var string
     */
    public $requestId;

}
