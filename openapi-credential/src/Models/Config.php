<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Models;

use AlibabaCloud\Tea\Model;

class Config extends Model {
    public function validate() {
        Model::validateRequired('type', $this->type, true);
    }
    public function toMap() {
        $res = [];
        if (null !== $this->type) {
            $res['type'] = $this->type;
        }
        if (null !== $this->accessKeyId) {
            $res['accessKeyId'] = $this->accessKeyId;
        }
        if (null !== $this->privateKey) {
            $res['privateKey'] = $this->privateKey;
        }
        if (null !== $this->clientKeyFile) {
            $res['clientKeyFile'] = $this->clientKeyFile;
        }
        if (null !== $this->clientKeyContent) {
            $res['clientKeyContent'] = $this->clientKeyContent;
        }
        if (null !== $this->password) {
            $res['password'] = $this->password;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return Config
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['type'])){
            $model->type = $map['type'];
        }
        if(isset($map['accessKeyId'])){
            $model->accessKeyId = $map['accessKeyId'];
        }
        if(isset($map['privateKey'])){
            $model->privateKey = $map['privateKey'];
        }
        if(isset($map['clientKeyFile'])){
            $model->clientKeyFile = $map['clientKeyFile'];
        }
        if(isset($map['clientKeyContent'])){
            $model->clientKeyContent = $map['clientKeyContent'];
        }
        if(isset($map['password'])){
            $model->password = $map['password'];
        }
        return $model;
    }
    /**
     * @var string
     */
    public $type;

    public $accessKeyId;

    public $privateKey;

    public $clientKeyFile;

    public $clientKeyContent;

    public $password;

}
