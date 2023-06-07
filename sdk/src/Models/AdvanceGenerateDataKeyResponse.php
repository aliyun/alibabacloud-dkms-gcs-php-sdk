<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class AdvanceGenerateDataKeyResponse extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'iv' => 'Iv',
        'plaintext' => 'Plaintext',
        'ciphertextBlob' => 'CiphertextBlob',
        'requestId' => 'RequestId',
        'algorithm' => 'Algorithm',
        'keyVersionId' => 'KeyVersionId',
        'headers' => 'Headers',
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
     * @return AdvanceGenerateDataKeyResponse
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
    public $requestId;

    /**
     * @var string
     */
    public $algorithm;

    /**
     * @var string
     */
    public $keyVersionId;

    /**
     * @var string[]
     */
    public $headers;

}
