<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GetSecretValueRequest extends Model {
    protected $_name = [
        'headers' => 'Headers',
        'secretName' => 'SecretName',
        'versionStage' => 'VersionStage',
        'versionId' => 'VersionId',
        'fetchExtendedConfig' => 'FetchExtendedConfig',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->headers) {
            $res['Headers'] = $this->headers;
        }
        if (null !== $this->secretName) {
            $res['SecretName'] = $this->secretName;
        }
        if (null !== $this->versionStage) {
            $res['VersionStage'] = $this->versionStage;
        }
        if (null !== $this->versionId) {
            $res['VersionId'] = $this->versionId;
        }
        if (null !== $this->fetchExtendedConfig) {
            $res['FetchExtendedConfig'] = $this->fetchExtendedConfig;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GetSecretValueRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['Headers'])){
            $model->headers = $map['Headers'];
        }
        if(isset($map['SecretName'])){
            $model->secretName = $map['SecretName'];
        }
        if(isset($map['VersionStage'])){
            $model->versionStage = $map['VersionStage'];
        }
        if(isset($map['VersionId'])){
            $model->versionId = $map['VersionId'];
        }
        if(isset($map['FetchExtendedConfig'])){
            $model->fetchExtendedConfig = $map['FetchExtendedConfig'];
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
    public $secretName;

    /**
     * @var string
     */
    public $versionStage;

    /**
     * @var string
     */
    public $versionId;

    /**
     * @var bool
     */
    public $fetchExtendedConfig;

}
