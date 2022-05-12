<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GetPublicKeyRequest extends Model {
    protected $_name = [
        'headers' => 'Headers',
        'keyId' => 'KeyId',
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
        return $res;
    }
    /**
     * @param array $map
     * @return GetPublicKeyRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['Headers'])){
            $model->headers = $map['Headers'];
        }
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
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

}
