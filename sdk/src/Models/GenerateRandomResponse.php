<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GenerateRandomResponse extends Model {
    protected $_name = [
        'random' => 'Random',
        'requestId' => 'RequestId',
        'responseHeaders' => 'responseHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->random) {
            $res['Random'] = $this->random;
        }
        if (null !== $this->requestId) {
            $res['RequestId'] = $this->requestId;
        }
        if (null !== $this->responseHeaders) {
            $res['responseHeaders'] = $this->responseHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GenerateRandomResponse
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['Random'])){
            $model->random = $map['Random'];
        }
        if(isset($map['RequestId'])){
            $model->requestId = $map['RequestId'];
        }
        if(isset($map['responseHeaders'])){
            $model->responseHeaders = $map['responseHeaders'];
        }
        return $model;
    }
    /**
     * @description 随机数
     * @var int[]
     */
    public $random;

    /**
     * @description 请求ID
     * @var string
     */
    public $requestId;

    /**
     * @description 响应头
     * @var string[]
     */
    public $responseHeaders;

}
