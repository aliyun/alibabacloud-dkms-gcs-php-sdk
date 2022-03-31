<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models;

use AlibabaCloud\Tea\Model;

class RuntimeOptions extends Model {
    protected $_name = [
        'autoretry' => 'autoretry',
        'ignoreSSL' => 'ignoreSSL',
        'maxAttempts' => 'maxAttempts',
        'backoffPolicy' => 'backoffPolicy',
        'backoffPeriod' => 'backoffPeriod',
        'readTimeout' => 'readTimeout',
        'connectTimeout' => 'connectTimeout',
        'httpProxy' => 'httpProxy',
        'httpsProxy' => 'httpsProxy',
        'noProxy' => 'noProxy',
        'maxIdleConns' => 'maxIdleConns',
        'socks5Proxy' => 'socks5Proxy',
        'socks5NetWork' => 'socks5NetWork',
        'verify' => 'verify',
    ];
    public function validate() {}
    public function toMap() {
        $res = [];
        if (null !== $this->autoretry) {
            $res['autoretry'] = $this->autoretry;
        }
        if (null !== $this->ignoreSSL) {
            $res['ignoreSSL'] = $this->ignoreSSL;
        }
        if (null !== $this->maxAttempts) {
            $res['maxAttempts'] = $this->maxAttempts;
        }
        if (null !== $this->backoffPolicy) {
            $res['backoffPolicy'] = $this->backoffPolicy;
        }
        if (null !== $this->backoffPeriod) {
            $res['backoffPeriod'] = $this->backoffPeriod;
        }
        if (null !== $this->readTimeout) {
            $res['readTimeout'] = $this->readTimeout;
        }
        if (null !== $this->connectTimeout) {
            $res['connectTimeout'] = $this->connectTimeout;
        }
        if (null !== $this->httpProxy) {
            $res['httpProxy'] = $this->httpProxy;
        }
        if (null !== $this->httpsProxy) {
            $res['httpsProxy'] = $this->httpsProxy;
        }
        if (null !== $this->noProxy) {
            $res['noProxy'] = $this->noProxy;
        }
        if (null !== $this->maxIdleConns) {
            $res['maxIdleConns'] = $this->maxIdleConns;
        }
        if (null !== $this->socks5Proxy) {
            $res['socks5Proxy'] = $this->socks5Proxy;
        }
        if (null !== $this->socks5NetWork) {
            $res['socks5NetWork'] = $this->socks5NetWork;
        }
        if (null !== $this->verify) {
            $res['verify'] = $this->verify;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return RuntimeOptions
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['autoretry'])){
            $model->autoretry = $map['autoretry'];
        }
        if(isset($map['ignoreSSL'])){
            $model->ignoreSSL = $map['ignoreSSL'];
        }
        if(isset($map['maxAttempts'])){
            $model->maxAttempts = $map['maxAttempts'];
        }
        if(isset($map['backoffPolicy'])){
            $model->backoffPolicy = $map['backoffPolicy'];
        }
        if(isset($map['backoffPeriod'])){
            $model->backoffPeriod = $map['backoffPeriod'];
        }
        if(isset($map['readTimeout'])){
            $model->readTimeout = $map['readTimeout'];
        }
        if(isset($map['connectTimeout'])){
            $model->connectTimeout = $map['connectTimeout'];
        }
        if(isset($map['httpProxy'])){
            $model->httpProxy = $map['httpProxy'];
        }
        if(isset($map['httpsProxy'])){
            $model->httpsProxy = $map['httpsProxy'];
        }
        if(isset($map['noProxy'])){
            $model->noProxy = $map['noProxy'];
        }
        if(isset($map['maxIdleConns'])){
            $model->maxIdleConns = $map['maxIdleConns'];
        }
        if(isset($map['socks5Proxy'])){
            $model->socks5Proxy = $map['socks5Proxy'];
        }
        if(isset($map['socks5NetWork'])){
            $model->socks5NetWork = $map['socks5NetWork'];
        }
        if(isset($map['verify'])){
            $model->verify = $map['verify'];
        }
        return $model;
    }
    /**
     * @var bool
     */
    public $autoretry;

    /**
     * @var bool
     */
    public $ignoreSSL;

    /**
     * @var int
     */
    public $maxAttempts;

    /**
     * @var string
     */
    public $backoffPolicy;

    /**
     * @var int
     */
    public $backoffPeriod;

    /**
     * @var int
     */
    public $readTimeout;

    /**
     * @var int
     */
    public $connectTimeout;

    /**
     * @var string
     */
    public $httpProxy;

    /**
     * @var string
     */
    public $httpsProxy;

    /**
     * @var string
     */
    public $noProxy;

    /**
     * @var int
     */
    public $maxIdleConns;

    /**
     * @var string
     */
    public $socks5Proxy;

    /**
     * @var string
     */
    public $socks5NetWork;

    /**
     * @var string
     */
    public $verify;

}
