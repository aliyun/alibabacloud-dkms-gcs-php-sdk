<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models;

use AlibabaCloud\Tea\Model;

class ErrorResponse extends Model {
    protected $_name = [
        'statusCode' => 'StatusCode',
        'errorCode' => 'ErrorCode',
        'errorMessage' => 'ErrorMessage',
        'requestId' => 'RequestId',
    ];
    public function validate() {
        Model::validateRequired('statusCode', $this->statusCode, true);
        Model::validateRequired('errorCode', $this->errorCode, true);
        Model::validateRequired('errorMessage', $this->errorMessage, true);
        Model::validateRequired('requestId', $this->requestId, true);
    }
    public function toMap() {
        $res = [];
        if (null !== $this->statusCode) {
            $res['StatusCode'] = $this->statusCode;
        }
        if (null !== $this->errorCode) {
            $res['ErrorCode'] = $this->errorCode;
        }
        if (null !== $this->errorMessage) {
            $res['ErrorMessage'] = $this->errorMessage;
        }
        if (null !== $this->requestId) {
            $res['RequestId'] = $this->requestId;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return ErrorResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['StatusCode'])){
            $model->statusCode = $map['StatusCode'];
        }
        if(isset($map['ErrorCode'])){
            $model->errorCode = $map['ErrorCode'];
        }
        if(isset($map['ErrorMessage'])){
            $model->errorMessage = $map['ErrorMessage'];
        }
        if(isset($map['RequestId'])){
            $model->requestId = $map['RequestId'];
        }
        return $model;
    }
    /**
     * @var string
     */
    public $statusCode;

    /**
     * @var string
     */
    public $errorCode;

    /**
     * @var string
     */
    public $errorMessage;

    /**
     * @var string
     */
    public $requestId;

}
