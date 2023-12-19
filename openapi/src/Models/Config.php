<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Models;

use AlibabaCloud\Tea\Model;
use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Client as AlibabaCloudDkmsGcsOpenApiCredentialClient;

class Config extends Model {
    protected $_name = [
        'accessKeyId' => 'accessKeyId',
        'privateKey' => 'privateKey',
        'endpoint' => 'endpoint',
        'protocol' => 'protocol',
        'regionId' => 'regionId',
        'readTimeout' => 'readTimeout',
        'connectTimeout' => 'connectTimeout',
        'httpProxy' => 'httpProxy',
        'httpsProxy' => 'httpsProxy',
        'noProxy' => 'noProxy',
        'maxIdleConns' => 'maxIdleConns',
        'socks5Proxy' => 'socks5Proxy',
        'socks5NetWork' => 'socks5NetWork',
        'type' => 'type',
        'userAgent' => 'userAgent',
        'credential' => 'credential',
        'clientKeyFile' => 'clientKeyFile',
        'clientKeyContent' => 'clientKeyContent',
        'password' => 'password',
        'caFilePath' => 'caFilePath',
        'ignoreSSL' => 'ignoreSSL',
    ];
    public function validate() {
        Model::validatePattern('regionId', $this->regionId, '[a-zA-Z0-9-_]+');
        Model::validateRequired('type', $this->type, true);
    }
    public function toMap() {
        $res = [];
        if (null !== $this->accessKeyId) {
            $res['accessKeyId'] = $this->accessKeyId;
        }
        if (null !== $this->privateKey) {
            $res['privateKey'] = $this->privateKey;
        }
        if (null !== $this->endpoint) {
            $res['endpoint'] = $this->endpoint;
        }
        if (null !== $this->protocol) {
            $res['protocol'] = $this->protocol;
        }
        if (null !== $this->regionId) {
            $res['regionId'] = $this->regionId;
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
        if (null !== $this->type) {
            $res['type'] = $this->type;
        }
        if (null !== $this->userAgent) {
            $res['userAgent'] = $this->userAgent;
        }
        if (null !== $this->credential) {
            $res['credential'] = null !== $this->credential ? $this->credential->toMap() : null;
        }
        if (null !== $this->clientKeyFile) {
            $res['clientKeyFile'] = $this->clientKeyFile;
        }
        if (null !== $this->clientKeyContent) {
            $res['clientKeyContent'] = $this->clientKeyContent;
        }
        if (null !== $this->password) {
            $res['password'] = $this->password;
        }
        if (null !== $this->caFilePath) {
            $res['caFilePath'] = $this->caFilePath;
        }
        if (null !== $this->ignoreSSL) {
            $res['ignoreSSL'] = $this->ignoreSSL;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return Config
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['accessKeyId'])){
            $model->accessKeyId = $map['accessKeyId'];
        }
        if(isset($map['privateKey'])){
            $model->privateKey = $map['privateKey'];
        }
        if(isset($map['endpoint'])){
            $model->endpoint = $map['endpoint'];
        }
        if(isset($map['protocol'])){
            $model->protocol = $map['protocol'];
        }
        if(isset($map['regionId'])){
            $model->regionId = $map['regionId'];
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
        if(isset($map['type'])){
            $model->type = $map['type'];
        }
        if(isset($map['userAgent'])){
            $model->userAgent = $map['userAgent'];
        }
        if(isset($map['credential'])){
            $model->credential = AlibabaCloudDkmsGcsOpenApiCredentialClient::fromMap($map['credential']);
        }
        if(isset($map['clientKeyFile'])){
            $model->clientKeyFile = $map['clientKeyFile'];
        }
        if(isset($map['clientKeyContent'])){
            $model->clientKeyContent = $map['clientKeyContent'];
        }
        if(isset($map['password'])){
            $model->password = $map['password'];
        }
        if(isset($map['caFilePath'])){
            $model->caFilePath = $map['caFilePath'];
        }
        if(isset($map['ignoreSSL'])){
            $model->ignoreSSL = $map['ignoreSSL'];
        }
        return $model;
    }
    /**
     * @description 访问凭证ID
     * @var string
     */
    public $accessKeyId;

    /**
     * @description pkcs1 或 pkcs8 PEM 格式私钥
     * @var string
     */
    public $privateKey;

    /**
     * @description 实例地址
     * @var string
     */
    public $endpoint;

    /**
     * @description 协议
     * @var string
     */
    public $protocol;

    /**
     * @description 区域标识
     * @var string
     */
    public $regionId;

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
     * @description 访问凭证类型
     * @var string
     */
    public $type;

    /**
     * @description 用户代理
     * @var string
     */
    public $userAgent;

    /**
     * @description 访问凭证
     * @var AlibabaCloudDkmsGcsOpenApiCredentialClient
     */
    public $credential;

    /**
     * @description ClientKey文件路径
     * @var string
     */
    public $clientKeyFile;

    /**
     * @description ClientKey文件内容
     * @var string
     */
    public $clientKeyContent;

    /**
     * @description ClientKey密码
     * @var string
     */
    public $password;

    /**
     * @description ca证书文件路径
     * @var string
     */
    public $caFilePath;

    /**
     * @description 是否忽略SSL认证
     * @var bool
     */
    public $ignoreSSL;

}
