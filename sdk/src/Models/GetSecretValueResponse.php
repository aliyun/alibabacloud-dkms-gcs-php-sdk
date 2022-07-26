<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GetSecretValueResponse extends Model {
    protected $_name = [
        'headers' => 'Headers',
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
        return $res;
    }
    /**
     * @param array $map
     * @return GetSecretValueResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['Headers'])){
            $model->headers = $map['Headers'];
        }
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
    public $secretType;

    /**
     * @var string
     */
    public $secretData;

    /**
     * @var string
     */
    public $secretDataType;

    /**
     * @var string[]
     */
    public $versionStages;

    /**
     * @var string
     */
    public $versionId;

    /**
     * @var string
     */
    public $createTime;

    /**
     * @var string
     */
    public $requestId;

    /**
     * @var string
     */
    public $lastRotationDate;

    /**
     * @var string
     */
    public $nextRotationDate;

    /**
     * @var string
     */
    public $extendedConfig;

    /**
     * @var string
     */
    public $automaticRotation;

    /**
     * @var string
     */
    public $rotationInterval;

}
