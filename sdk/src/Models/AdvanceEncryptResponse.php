<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class AdvanceEncryptResponse extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'ciphertextBlob' => 'CiphertextBlob',
        'iv' => 'Iv',
        'requestId' => 'RequestId',
        'algorithm' => 'Algorithm',
        'paddingMode' => 'PaddingMode',
        'keyVersionId' => 'KeyVersionId',
        'headers' => 'Headers',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->ciphertextBlob) {
            $res['CiphertextBlob'] = $this->ciphertextBlob;
        }
        if (null !== $this->iv) {
            $res['Iv'] = $this->iv;
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
        if (null !== $this->keyVersionId) {
            $res['KeyVersionId'] = $this->keyVersionId;
        }
        if (null !== $this->headers) {
            $res['Headers'] = $this->headers;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return AdvanceEncryptResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['CiphertextBlob'])){
            $model->ciphertextBlob = $map['CiphertextBlob'];
        }
        if(isset($map['Iv'])){
            $model->iv = $map['Iv'];
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
        if(isset($map['KeyVersionId'])){
            $model->keyVersionId = $map['KeyVersionId'];
        }
        if(isset($map['Headers'])){
            $model->headers = $map['Headers'];
        }
        return $model;
    }
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
    public $requestId;

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
    public $keyVersionId;

    /**
     * @var string[]
     */
    public $headers;

}
