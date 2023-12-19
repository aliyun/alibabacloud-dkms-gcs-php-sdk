<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GetSecretValueRequest extends Model {
    protected $_name = [
        'secretName' => 'SecretName',
        'versionStage' => 'VersionStage',
        'versionId' => 'VersionId',
        'fetchExtendedConfig' => 'FetchExtendedConfig',
        'requestHeaders' => 'requestHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
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
        if (null !== $this->requestHeaders) {
            $res['requestHeaders'] = $this->requestHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GetSecretValueRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
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
        if(isset($map['requestHeaders'])){
            $model->requestHeaders = $map['requestHeaders'];
        }
        return $model;
    }
    /**
     * @description 凭据名称
     * @var string
     */
    public $secretName;

    /**
     * @description 版本状态
     * @var string
     */
    public $versionStage;

    /**
     * @description 版本号
     * @var string
     */
    public $versionId;

    /**
     * @description 是否获取凭据的拓展配置true（默认值）：是,false：否
     * @var bool
     */
    public $fetchExtendedConfig;

    /**
     * @description 请求头
     * @var string[]
     */
    public $requestHeaders;

}
