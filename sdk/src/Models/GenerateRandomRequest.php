<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk\Models;

use AlibabaCloud\Tea\Model;

class GenerateRandomRequest extends Model {
    protected $_name = [
        'length' => 'Length',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->length) {
            $res['Length'] = $this->length;
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
        return $model;
    }
    /**
     * @var int
     */
    public $length;

}
