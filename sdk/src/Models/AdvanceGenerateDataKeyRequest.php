<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class AdvanceGenerateDataKeyRequest extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'numberOfBytes' => 'NumberOfBytes',
        'aad' => 'Aad',
        'headers' => 'Headers',
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
        if (null !== $this->headers) {
            $res['Headers'] = $this->headers;
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
     * @var int
     */
    public $numberOfBytes;

    /**
     * @var int[]
     */
    public $aad;

    /**
     * @var string[]
     */
    public $headers;

}
