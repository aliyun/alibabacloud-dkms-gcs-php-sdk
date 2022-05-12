<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GenerateDataKeyResponse extends Model {
    protected $_name = [
        'headers' => 'Headers',
        'keyId' => 'KeyId',
        'iv' => 'Iv',
        'plaintext' => 'Plaintext',
        'ciphertextBlob' => 'CiphertextBlob',
        'algorithm' => 'Algorithm',
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
        if (null !== $this->iv) {
            $res['Iv'] = $this->iv;
        }
        if (null !== $this->plaintext) {
            $res['Plaintext'] = $this->plaintext;
        }
        if (null !== $this->ciphertextBlob) {
            $res['CiphertextBlob'] = $this->ciphertextBlob;
        }
        if (null !== $this->algorithm) {
            $res['Algorithm'] = $this->algorithm;
        }
        if (null !== $this->requestId) {
            $res['RequestId'] = $this->requestId;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GenerateDataKeyResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['Headers'])){
            $model->headers = $map['Headers'];
        }
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
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
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
    public $iv;

    /**
     * @var int[]
     */
    public $plaintext;

    /**
     * @var int[]
     */
    public $ciphertextBlob;

    /**
     * @var string
     */
    public $algorithm;

    /**
     * @var string
     */
    public $requestId;

}
