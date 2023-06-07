<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class AdvanceDecryptRequest extends Model {
    protected $_name = [
        'ciphertextBlob' => 'CiphertextBlob',
        'keyId' => 'KeyId',
        'algorithm' => 'Algorithm',
        'aad' => 'Aad',
        'iv' => 'Iv',
        'paddingMode' => 'PaddingMode',
        'headers' => 'Headers',
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
        if (null !== $this->headers) {
            $res['Headers'] = $this->headers;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return AdvanceDecryptRequest
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
        if(isset($map['Headers'])){
            $model->headers = $map['Headers'];
        }
        return $model;
    }
    /**
     * @var int[]
     */
    public $ciphertextBlob;

    /**
     * @var string
     */
    public $keyId;

    /**
     * @var string
     */
    public $algorithm;

    /**
     * @var int[]
     */
    public $aad;

    /**
     * @var int[]
     */
    public $iv;

    /**
     * @var string
     */
    public $paddingMode;

    /**
     * @var string[]
     */
    public $headers;

}
