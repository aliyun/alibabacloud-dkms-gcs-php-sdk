<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GenerateDataKeyRequest extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'algorithm' => 'Algorithm',
        'numberOfBytes' => 'NumberOfBytes',
        'aad' => 'Aad',
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
        if (null !== $this->numberOfBytes) {
            $res['NumberOfBytes'] = $this->numberOfBytes;
        }
        if (null !== $this->aad) {
            $res['Aad'] = $this->aad;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GenerateDataKeyRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['Algorithm'])){
            $model->algorithm = $map['Algorithm'];
        }
        if(isset($map['NumberOfBytes'])){
            $model->numberOfBytes = $map['NumberOfBytes'];
        }
        if(isset($map['Aad'])){
            $model->aad = $map['Aad'];
        }
        return $model;
    }
    /**
     * @var string
     */
    public $keyId;

    /**
     * @var string
     */
    public $algorithm;

    /**
     * @var int
     */
    public $numberOfBytes;

    /**
     * @var int[]
     */
    public $aad;

}
