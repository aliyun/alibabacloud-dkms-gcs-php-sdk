<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GetSecretValueResponse extends Model {
    protected $_name = [
        'secretName' => 'SecretName',
        'secretType' => 'SecretType',
        'secretData' => 'SecretData',
        'secretDataType' => 'SecretDataType',
        'versionStages' => 'VersionStages',
        'versionId' => 'VersionId',
        'createTime' => 'CreateTime',
        'requestId' => 'RequestId',
        'lastRotationDate' => 'LastRotationDate',
        'nextRotationDate' => 'NextRotationDate',
        'extendedConfig' => 'ExtendedConfig',
        'automaticRotation' => 'AutomaticRotation',
        'rotationInterval' => 'RotationInterval',
        'responseHeaders' => 'responseHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->secretName) {
            $res['SecretName'] = $this->secretName;
        }
        if (null !== $this->secretType) {
            $res['SecretType'] = $this->secretType;
        }
        if (null !== $this->secretData) {
            $res['SecretData'] = $this->secretData;
        }
        if (null !== $this->secretDataType) {
            $res['SecretDataType'] = $this->secretDataType;
        }
        if (null !== $this->versionStages) {
            $res['VersionStages'] = $this->versionStages;
        }
        if (null !== $this->versionId) {
            $res['VersionId'] = $this->versionId;
        }
        if (null !== $this->createTime) {
            $res['CreateTime'] = $this->createTime;
        }
        if (null !== $this->requestId) {
            $res['RequestId'] = $this->requestId;
        }
        if (null !== $this->lastRotationDate) {
            $res['LastRotationDate'] = $this->lastRotationDate;
        }
        if (null !== $this->nextRotationDate) {
            $res['NextRotationDate'] = $this->nextRotationDate;
        }
        if (null !== $this->extendedConfig) {
            $res['ExtendedConfig'] = $this->extendedConfig;
        }
        if (null !== $this->automaticRotation) {
            $res['AutomaticRotation'] = $this->automaticRotation;
        }
        if (null !== $this->rotationInterval) {
            $res['RotationInterval'] = $this->rotationInterval;
        }
        if (null !== $this->responseHeaders) {
            $res['responseHeaders'] = $this->responseHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GetSecretValueResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['SecretName'])){
            $model->secretName = $map['SecretName'];
        }
        if(isset($map['SecretType'])){
            $model->secretType = $map['SecretType'];
        }
        if(isset($map['SecretData'])){
            $model->secretData = $map['SecretData'];
        }
        if(isset($map['SecretDataType'])){
            $model->secretDataType = $map['SecretDataType'];
        }
        if(isset($map['VersionStages'])){
            if(!empty($map['VersionStages'])){
                $model->versionStages = $map['VersionStages'];
            }
        }
        if(isset($map['VersionId'])){
            $model->versionId = $map['VersionId'];
        }
        if(isset($map['CreateTime'])){
            $model->createTime = $map['CreateTime'];
        }
        if(isset($map['RequestId'])){
            $model->requestId = $map['RequestId'];
        }
        if(isset($map['LastRotationDate'])){
            $model->lastRotationDate = $map['LastRotationDate'];
        }
        if(isset($map['NextRotationDate'])){
            $model->nextRotationDate = $map['NextRotationDate'];
        }
        if(isset($map['ExtendedConfig'])){
            $model->extendedConfig = $map['ExtendedConfig'];
        }
        if(isset($map['AutomaticRotation'])){
            $model->automaticRotation = $map['AutomaticRotation'];
        }
        if(isset($map['RotationInterval'])){
            $model->rotationInterval = $map['RotationInterval'];
        }
        if(isset($map['responseHeaders'])){
            $model->responseHeaders = $map['responseHeaders'];
        }
        return $model;
    }
    /**
     * @description 凭据名称
     * @var string
     */
    public $secretName;

    /**
     * @description 凭据类型
     * @var string
     */
    public $secretType;

    /**
     * @description 凭据值
     * @var string
     */
    public $secretData;

    /**
     * @description 凭据值类型
     * @var string
     */
    public $secretDataType;

    /**
     * @description 凭据版本的状态标记
     * @var string[]
     */
    public $versionStages;

    /**
     * @description 凭据版本的标识符
     * @var string
     */
    public $versionId;

    /**
     * @description 创建凭据的时间
     * @var string
     */
    public $createTime;

    /**
     * @description 请求ID
     * @var string
     */
    public $requestId;

    /**
     * @description 最近一次轮转的时间
     * @var string
     */
    public $lastRotationDate;

    /**
     * @description 下一次轮转的时间
     * @var string
     */
    public $nextRotationDate;

    /**
     * @description 凭据的拓展配置
     * @var string
     */
    public $extendedConfig;

    /**
     * @description 是否开启自动轮转
     * @var string
     */
    public $automaticRotation;

    /**
     * @description 凭据自动轮转的周期
     * @var string
     */
    public $rotationInterval;

    /**
     * @description 响应头
     * @var string[]
     */
    public $responseHeaders;

}
