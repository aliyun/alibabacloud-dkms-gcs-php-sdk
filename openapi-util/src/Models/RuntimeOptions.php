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
        'responseHeaders' => 'responseHeaders',
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
        if (null !== $this->responseHeaders) {
            $res['responseHeaders'] = $this->responseHeaders;
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
        if(isset($map['responseHeaders'])){
            if(!empty($map['responseHeaders'])){
                $model->responseHeaders = $map['responseHeaders'];
            }
        }
        return $model;
    }
    /**
     * @description 是否自动重试
     * @var bool
     */
    public $autoretry;

    /**
     * @description 是否忽略SSL认证
     * @var bool
     */
    public $ignoreSSL;

    /**
     * @description 最大重试次数
     * @var int
     */
    public $maxAttempts;

    /**
     * @description 回退策略
     * @var string
     */
    public $backoffPolicy;

    /**
     * @description 回退周期
     * @var int
     */
    public $backoffPeriod;

    /**
     * @description 读取超时时间
     * @var int
     */
    public $readTimeout;

    /**
     * @description 连接超时时间
     * @var int
     */
    public $connectTimeout;

    /**
     * @description http代理
     * @var string
     */
    public $httpProxy;

    /**
     * @description https代理
     * @var string
     */
    public $httpsProxy;

    /**
     * @description 无代理
     * @var string
     */
    public $noProxy;

    /**
     * @description 最大闲置连接数
     * @var int
     */
    public $maxIdleConns;

    /**
     * @description socks5代理
     * @var string
     */
    public $socks5Proxy;

    /**
     * @description socks5代理协议
     * @var string
     */
    public $socks5NetWork;

    /**
     * @description 校验
     * @var string
     */
    public $verify;

    /**
     * @description 响应头
     * @var string[]
     */
    public $responseHeaders;

}
