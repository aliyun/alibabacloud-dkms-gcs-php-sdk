<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GenerateRandomRequest extends Model {
    protected $_name = [
        'length' => 'Length',
        'requestHeaders' => 'requestHeaders',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->length) {
            $res['Length'] = $this->length;
        }
        if (null !== $this->requestHeaders) {
            $res['requestHeaders'] = $this->requestHeaders;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return GenerateRandomRequest
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['Length'])){
            $model->length = $map['Length'];
        }
        if(isset($map['requestHeaders'])){
            $model->requestHeaders = $map['requestHeaders'];
        }
        return $model;
    }
    /**
     * @description 要生成的随机数字节长度
     * @var int
     */
    public $length;

    /**
     * @description 请求头
     * @var string[]
     */
    public $requestHeaders;

}
