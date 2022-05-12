<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi\Models;

use AlibabaCloud\Tea\Model;
use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Client as AlibabaCloudDkmsGcsOpenApiCredentialClient;

class Config extends Model {
    public function validate() {
        Model::validatePattern('regionId', $this->regionId, '[a-zA-Z0-9-_]+');
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
        if (null !== $this->socks5Proxy) {
            $res['socks5Proxy'] = $this->socks5Proxy;
        }
        if (null !== $this->socks5NetWork) {
            $res['socks5NetWork'] = $this->socks5NetWork;
        }
        if (null !== $this->noProxy) {
            $res['noProxy'] = $this->noProxy;
        }
        if (null !== $this->maxIdleConns) {
            $res['maxIdleConns'] = $this->maxIdleConns;
        }
        if (null !== $this->userAgent) {
            $res['userAgent'] = $this->userAgent;
        }
        if (null !== $this->type) {
            $res['type'] = $this->type;
        }
        if (null !== $this->credential) {
            $res['credential'] =  $this->credential;
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
        if(isset($map['socks5Proxy'])){
            $model->socks5Proxy = $map['socks5Proxy'];
        }
        if(isset($map['socks5NetWork'])){
            $model->socks5NetWork = $map['socks5NetWork'];
        }
        if(isset($map['noProxy'])){
            $model->noProxy = $map['noProxy'];
        }
        if(isset($map['maxIdleConns'])){
            $model->maxIdleConns = $map['maxIdleConns'];
        }
        if(isset($map['userAgent'])){
            $model->userAgent = $map['userAgent'];
        }
        if(isset($map['type'])){
            $model->type = $map['type'];
        }
        if(isset($map['credential'])){
            $model->credential = $map['credential'];
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
        return $model;
    }
    public $accessKeyId;

    /**
     * @description pkcs1 or pkcs8 PEM format private key
     * @var string
     */
    public $privateKey;

    /**
     * @description crypto service address
     * @var string
     */
    public $endpoint;

    public $protocol;

    /**
     * @var string
     */
    public $regionId;

    public $readTimeout;

    public $connectTimeout;

    public $httpProxy;

    public $httpsProxy;

    public $socks5Proxy;

    public $socks5NetWork;

    public $noProxy;

    public $maxIdleConns;

    public $userAgent;

    public $type;

    public $credential;

    public $clientKeyFile;

    /**
     * @description client key content
     * @var string
     */
    public $clientKeyContent;

    public $password;

}
