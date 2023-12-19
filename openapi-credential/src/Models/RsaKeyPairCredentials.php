<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Models;

use AlibabaCloud\Tea\Model;

class RsaKeyPairCredentials extends Model {
    protected $_name = [
        'privateKeySecret' => 'privateKeySecret',
        'keyId' => 'keyId',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->privateKeySecret) {
            $res['privateKeySecret'] = $this->privateKeySecret;
        }
        if (null !== $this->keyId) {
            $res['keyId'] = $this->keyId;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return RsaKeyPairCredentials
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['privateKeySecret'])){
            $model->privateKeySecret = $map['privateKeySecret'];
        }
        if(isset($map['keyId'])){
            $model->keyId = $map['keyId'];
        }
        return $model;
    }
    /**
     * @description 访问凭证私钥
     * @var string
     */
    public $privateKeySecret;

    /**
     * @description 访问凭证ID
     * @var string
     */
    public $keyId;

}
