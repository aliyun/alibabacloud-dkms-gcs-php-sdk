<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\OpenApi;

use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Client as AlibabaCloudDkmsGcsOpenApiCredentialClient;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaUnableRetryError;
use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Client as AlibabaCloudDkmsGcsOpenApiUtilClient;
use AlibabaCloud\Tea\Tea;
use AlibabaCloud\Tea\Request;
use AlibabaCloud\OpenApiUtil\OpenApiUtilClient;
use AlibabaCloud\Darabonba\String\StringUtil;
use AlibabaCloud\Darabonba\MapUtil\MapUtil;
use AlibabaCloud\Darabonba\ArrayUtil\ArrayUtil;

use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Models\Config;
use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;

class Client {
    protected $_endpoint;

    protected $_regionId;

    protected $_protocol;

    protected $_readTimeout;

    protected $_connectTimeout;

    protected $_httpProxy;

    protected $_httpsProxy;

    protected $_noProxy;

    protected $_userAgent;

    protected $_socks5Proxy;

    protected $_socks5NetWork;

    protected $_maxIdleConns;

    protected $_credential;

    protected $_caFilePath;

    protected $_ignoreSSL;

    public function __construct($config){
        if (Utils::isUnset($config)) {
            throw new TeaError([
                "name" => "ParameterMissing",
                "message" => "'config' can not be unset"
            ]);
        }
        if (Utils::empty_($config->endpoint)) {
            throw new TeaError([
                "code" => "ParameterMissing",
                "message" => "'config.endpoint' can not be empty"
            ]);
        }
        if (!Utils::empty_($config->clientKeyContent)) {
            $config->type = "rsa_key_pair";
            $contentConfig = new Config([
                "type" => $config->type,
                "clientKeyContent" => $config->clientKeyContent,
                "password" => $config->password
            ]);
            $this->_credential = new AlibabaCloudDkmsGcsOpenApiCredentialClient($contentConfig);
        }
        else if (!Utils::empty_($config->clientKeyFile)) {
            $config->type = "rsa_key_pair";
            $clientKeyConfig = new Config([
                "type" => $config->type,
                "clientKeyFile" => $config->clientKeyFile,
                "password" => $config->password
            ]);
            $this->_credential = new AlibabaCloudDkmsGcsOpenApiCredentialClient($clientKeyConfig);
        }
        else if (!Utils::empty_($config->accessKeyId) && !Utils::empty_($config->privateKey)) {
            $config->type = "rsa_key_pair";
            $credentialConfig = new Config([
                "type" => $config->type,
                "accessKeyId" => $config->accessKeyId,
                "privateKey" => $config->privateKey
            ]);
            $this->_credential = new AlibabaCloudDkmsGcsOpenApiCredentialClient($credentialConfig);
        }
        else if (!Utils::isUnset($config->credential)) {
            $this->_credential = $config->credential;
        }
        if (!Utils::isUnset($config->caFilePath)) {
            $this->_caFilePath = $config->caFilePath;
        }
        $this->_endpoint = $config->endpoint;
        $this->_protocol = $config->protocol;
        $this->_regionId = $config->regionId;
        $this->_userAgent = AlibabaCloudDkmsGcsOpenApiUtilClient::getUserAgent($config->userAgent);
        $this->_readTimeout = $config->readTimeout;
        $this->_connectTimeout = $config->connectTimeout;
        $this->_httpProxy = $config->httpProxy;
        $this->_httpsProxy = $config->httpsProxy;
        $this->_noProxy = $config->noProxy;
        $this->_socks5Proxy = $config->socks5Proxy;
        $this->_socks5NetWork = $config->socks5NetWork;
        $this->_maxIdleConns = $config->maxIdleConns;
        $this->_ignoreSSL = $config->ignoreSSL;
    }

    /**
     * @param string $apiName
     * @param string $apiVersion
     * @param string $protocol
     * @param string $method
     * @param string $signatureMethod
     * @param int[] $reqBodyBytes
     * @param RuntimeOptions $runtime
     * @param string[] $requestHeaders
     * @return array
     * @throws TeaError
     * @throws Exception
     * @throws TeaUnableRetryError
     */
    public function doRequest($apiName, $apiVersion, $protocol, $method, $signatureMethod, $reqBodyBytes, $runtime, $requestHeaders){
        $runtime->validate();
        $_runtime = [
            "timeouted" => "retry",
            "readTimeout" => Utils::defaultNumber($runtime->readTimeout, $this->_readTimeout),
            "connectTimeout" => Utils::defaultNumber($runtime->connectTimeout, $this->_connectTimeout),
            "httpProxy" => Utils::defaultString($runtime->httpProxy, $this->_httpProxy),
            "httpsProxy" => Utils::defaultString($runtime->httpsProxy, $this->_httpsProxy),
            "noProxy" => Utils::defaultString($runtime->noProxy, $this->_noProxy),
            "socks5Proxy" => Utils::defaultString($runtime->socks5Proxy, $this->_socks5Proxy),
            "socks5NetWork" => Utils::defaultString($runtime->socks5NetWork, $this->_socks5NetWork),
            "maxIdleConns" => Utils::defaultNumber($runtime->maxIdleConns, $this->_maxIdleConns),
            "retry" => [
                "retryable" => AlibabaCloudDkmsGcsOpenApiUtilClient::defaultBoolean($runtime->autoretry, true),
                "maxAttempts" => Utils::defaultNumber($runtime->maxAttempts, 3)
            ],
            "backoff" => [
                "policy" => Utils::defaultString($runtime->backoffPolicy, "yes"),
                "period" => Utils::defaultNumber($runtime->backoffPeriod, 1)
            ],
            "ignoreSSL" => AlibabaCloudDkmsGcsOpenApiUtilClient::defaultBoolean($this->_ignoreSSL, $runtime->ignoreSSL),
            "ca" => Utils::defaultString($this->_caFilePath, $runtime->verify)
        ];
        $_lastRequest = null;
        $_lastException = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry(@$_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime(@$_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                $_request->protocol = Utils::defaultString($this->_protocol, $protocol);
                $_request->method = $method;
                $_request->pathname = "/";
                $_request->headers = Tea::merge($requestHeaders);
                $_request->headers["accept"] = "application/x-protobuf";
                $_request->headers["host"] = $this->_endpoint;
                $_request->headers["date"] = Utils::getDateUTCString();
                $_request->headers["user-agent"] = $this->_userAgent;
                $_request->headers["x-kms-apiversion"] = $apiVersion;
                $_request->headers["x-kms-apiname"] = $apiName;
                $_request->headers["x-kms-signaturemethod"] = $signatureMethod;
                $_request->headers["x-kms-acccesskeyid"] = $this->_credential->getAccessKeyId();
                $_request->headers["content-type"] = "application/x-protobuf";
                $_request->headers["content-length"] = AlibabaCloudDkmsGcsOpenApiUtilClient::getContentLength($reqBodyBytes);
                $_request->headers["content-sha256"] = StringUtil::toUpper(OpenApiUtilClient::hexEncode(OpenApiUtilClient::hash($reqBodyBytes, "ACS3-RSA-SHA256")));
                $_request->body = $reqBodyBytes;
                $strToSign = AlibabaCloudDkmsGcsOpenApiUtilClient::getStringToSign($method, $_request->pathname, $_request->headers, $_request->query);
                $_request->headers["authorization"] = $this->_credential->getSignature($strToSign);
                $_lastRequest = $_request;
               if (!empty(@$_runtime["ca"]))
                    Tea::config(['verify' => @$_runtime["ca"]]);
                $_response= Tea::send($_request, $_runtime);
                $bodyBytes = null;
                if (Utils::is4xx($_response->statusCode) || Utils::is5xx($_response->statusCode)) {
                    $bodyBytes = Utils::readAsBytes($_response->body);
                    $respMap = Utils::assertAsMap(AlibabaCloudDkmsGcsOpenApiUtilClient::getErrMessage($bodyBytes));
                    throw new TeaError([
                        "code" => @$respMap["Code"],
                        "message" => @$respMap["Message"],
                        "data" => [
                            "httpCode" => $_response->statusCode,
                            "requestId" => @$respMap["RequestId"],
                            "hostId" => @$respMap["HostId"]
                        ]
                    ]);
                }
                $bodyBytes = Utils::readAsBytes($_response->body);
                $responseHeaders = [];
                $headers = $_response->headers;
                if (!Utils::isUnset($runtime->responseHeaders)) {
                    foreach(MapUtil::keySet($headers) as $key){
                        $lowerKey = strtolower($key);
                        if (ArrayUtil::contains($runtime->responseHeaders, $lowerKey)) {
                            $responseHeaders[$lowerKey] = current(@$headers[$key]);
                        }
                    }
                }
                return [
                    "bodyBytes" => $bodyBytes,
                    "responseHeaders" => $responseHeaders
                ];
            }
            catch (Exception $e) {
                if (!($e instanceof TeaError)) {
                    $e = new TeaError([], $e->getMessage(), $e->getCode(), $e);
                }
                if (Tea::isRetryable($e) or AlibabaCloudDkmsGcsOpenApiUtilClient::isRetryErr($e)) {
                    $_lastException = $e;
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest, $_lastException);
    }
}
