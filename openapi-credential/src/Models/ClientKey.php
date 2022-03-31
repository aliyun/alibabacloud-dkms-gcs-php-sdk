<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Models;

use AlibabaCloud\Tea\Model;

class ClientKey extends Model {
    protected $_name = [
        'keyId' => 'KeyId',
        'privateKeyData' => 'PrivateKeyData',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->keyId) {
            $res['KeyId'] = $this->keyId;
        }
        if (null !== $this->privateKeyData) {
            $res['PrivateKeyData'] = $this->privateKeyData;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return ClientKey
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['KeyId'])){
            $model->keyId = $map['KeyId'];
        }
        if(isset($map['PrivateKeyData'])){
            $model->privateKeyData = $map['PrivateKeyData'];
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
    public $privateKeyData;

}
