<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk;

use AlibabaCloud\Dkms\Gcs\OpenApi\Client as AlibabaCloudDkmsGcsOpenApiClient;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Client as AlibabaCloudDkmsGcsOpenApiUtilClient;

use AlibabaCloud\Dkms\Gcs\Sdk\Models\EncryptRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\EncryptResponse;
use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\DecryptRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\DecryptResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\SignRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\SignResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\VerifyRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\VerifyResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateRandomRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateRandomResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateDataKeyRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateDataKeyResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GetPublicKeyRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GetPublicKeyResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GetSecretValueRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GetSecretValueResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceEncryptRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceEncryptResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceDecryptRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceDecryptResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceGenerateDataKeyRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceGenerateDataKeyResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateDataKeyPairRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateDataKeyPairResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateDataKeyPairWithoutPlaintextRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\GenerateDataKeyPairWithoutPlaintextResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceGenerateDataKeyPairRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceGenerateDataKeyPairResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceGenerateDataKeyPairWithoutPlaintextRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\AdvanceGenerateDataKeyPairWithoutPlaintextResponse;

class Client extends AlibabaCloudDkmsGcsOpenApiClient {
    public function __construct($config){
        parent::__construct($config);
    }

    /**
     * 调用Encrypt接口将明文加密为密文
     * @param EncryptRequest $request
     * @return EncryptResponse EncryptResponse
     */
    public function encrypt($request){
        $runtime = new RuntimeOptions([]);
        return $this->encryptWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用Encrypt接口将明文加密为密文
     * @param EncryptRequest $request
     * @param RuntimeOptions $runtime
     * @return EncryptResponse EncryptResponse
     */
    public function encryptWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedEncryptRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("Encrypt", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseEncryptResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return EncryptResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "CiphertextBlob" => @$respMap["CiphertextBlob"],
            "Iv" => @$respMap["Iv"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "PaddingMode" => @$respMap["PaddingMode"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用Decrypt接口将密文解密为明文
     * @param DecryptRequest $request
     * @return DecryptResponse DecryptResponse
     */
    public function decrypt($request){
        $runtime = new RuntimeOptions([]);
        return $this->decryptWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用Decrypt接口将密文解密为明文
     * @param DecryptRequest $request
     * @param RuntimeOptions $runtime
     * @return DecryptResponse DecryptResponse
     */
    public function decryptWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedDecryptRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("Decrypt", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseDecryptResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return DecryptResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Plaintext" => @$respMap["Plaintext"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "PaddingMode" => @$respMap["PaddingMode"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用Sign接口使用非对称密钥进行签名
     * @param SignRequest $request
     * @return SignResponse SignResponse
     */
    public function sign($request){
        $runtime = new RuntimeOptions([]);
        return $this->signWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用Sign接口使用非对称密钥进行签名
     * @param SignRequest $request
     * @param RuntimeOptions $runtime
     * @return SignResponse SignResponse
     */
    public function signWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedSignRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("Sign", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseSignResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return SignResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Signature" => @$respMap["Signature"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "MessageType" => @$respMap["MessageType"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用Verify接口使用非对称密钥进行验签
     * @param VerifyRequest $request
     * @return VerifyResponse VerifyResponse
     */
    public function verify($request){
        $runtime = new RuntimeOptions([]);
        return $this->verifyWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用Verify接口使用非对称密钥进行验签
     * @param VerifyRequest $request
     * @param RuntimeOptions $runtime
     * @return VerifyResponse VerifyResponse
     */
    public function verifyWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedVerifyRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("Verify", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseVerifyResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return VerifyResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Value" => @$respMap["Value"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "MessageType" => @$respMap["MessageType"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用GenerateRandom接口生成一个随机数
     * @param GenerateRandomRequest $request
     * @return GenerateRandomResponse GenerateRandomResponse
     */
    public function generateRandom($request){
        $runtime = new RuntimeOptions([]);
        return $this->generateRandomWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用GenerateRandom接口生成一个随机数
     * @param GenerateRandomRequest $request
     * @param RuntimeOptions $runtime
     * @return GenerateRandomResponse GenerateRandomResponse
     */
    public function generateRandomWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGenerateRandomRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("GenerateRandom", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGenerateRandomResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return GenerateRandomResponse::fromMap([
            "Random" => @$respMap["Random"],
            "RequestId" => @$respMap["RequestId"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用GenerateDataKey接口生成数据密钥
     * @param GenerateDataKeyRequest $request
     * @return GenerateDataKeyResponse GenerateDataKeyResponse
     */
    public function generateDataKey($request){
        $runtime = new RuntimeOptions([]);
        return $this->generateDataKeyWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用GenerateDataKey接口生成数据密钥
     * @param GenerateDataKeyRequest $request
     * @param RuntimeOptions $runtime
     * @return GenerateDataKeyResponse GenerateDataKeyResponse
     */
    public function generateDataKeyWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGenerateDataKeyRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("GenerateDataKey", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGenerateDataKeyResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return GenerateDataKeyResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Iv" => @$respMap["Iv"],
            "Plaintext" => @$respMap["Plaintext"],
            "CiphertextBlob" => @$respMap["CiphertextBlob"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用GetPublicKey接口获取指定非对称密钥的公钥
     * @param GetPublicKeyRequest $request
     * @return GetPublicKeyResponse GetPublicKeyResponse
     */
    public function getPublicKey($request){
        $runtime = new RuntimeOptions([]);
        return $this->getPublicKeyWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用GetPublicKey接口获取指定非对称密钥的公钥
     * @param GetPublicKeyRequest $request
     * @param RuntimeOptions $runtime
     * @return GetPublicKeyResponse GetPublicKeyResponse
     */
    public function getPublicKeyWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGetPublicKeyRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("GetPublicKey", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGetPublicKeyResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return GetPublicKeyResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "PublicKey" => @$respMap["PublicKey"],
            "RequestId" => @$respMap["RequestId"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用GetSecretValue接口通过KMS实例网关获取凭据值
     * @param GetSecretValueRequest $request
     * @return GetSecretValueResponse GetSecretValueResponse
     */
    public function getSecretValue($request){
        $runtime = new RuntimeOptions([]);
        return $this->getSecretValueWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用GetSecretValue接口通过KMS实例网关获取凭据值
     * @param GetSecretValueRequest $request
     * @param RuntimeOptions $runtime
     * @return GetSecretValueResponse GetSecretValueResponse
     */
    public function getSecretValueWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGetSecretValueRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("GetSecretValue", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGetSecretValueResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return GetSecretValueResponse::fromMap([
            "SecretName" => @$respMap["SecretName"],
            "SecretType" => @$respMap["SecretType"],
            "SecretData" => @$respMap["SecretData"],
            "SecretDataType" => @$respMap["SecretDataType"],
            "VersionStages" => @$respMap["VersionStages"],
            "VersionId" => @$respMap["VersionId"],
            "CreateTime" => @$respMap["CreateTime"],
            "RequestId" => @$respMap["RequestId"],
            "LastRotationDate" => @$respMap["LastRotationDate"],
            "NextRotationDate" => @$respMap["NextRotationDate"],
            "ExtendedConfig" => @$respMap["ExtendedConfig"],
            "AutomaticRotation" => @$respMap["AutomaticRotation"],
            "RotationInterval" => @$respMap["RotationInterval"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用AdvanceEncrypt接口将明文高级加密为密文
     * @param AdvanceEncryptRequest $request
     * @return AdvanceEncryptResponse AdvanceEncryptResponse
     */
    public function advanceEncrypt($request){
        $runtime = new RuntimeOptions([]);
        return $this->advanceEncryptWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用AdvanceEncrypt接口将明文高级加密为密文
     * @param AdvanceEncryptRequest $request
     * @param RuntimeOptions $runtime
     * @return AdvanceEncryptResponse AdvanceEncryptResponse
     */
    public function advanceEncryptWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedAdvanceEncryptRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("AdvanceEncrypt", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseAdvanceEncryptResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return AdvanceEncryptResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "CiphertextBlob" => @$respMap["CiphertextBlob"],
            "Iv" => @$respMap["Iv"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "PaddingMode" => @$respMap["PaddingMode"],
            "KeyVersionId" => @$respMap["KeyVersionId"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用AdvanceDecrypt接口将密文高级解密为明文
     * @param AdvanceDecryptRequest $request
     * @return AdvanceDecryptResponse AdvanceDecryptResponse
     */
    public function advanceDecrypt($request){
        $runtime = new RuntimeOptions([]);
        return $this->advanceDecryptWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用AdvanceDecrypt接口将密文高级解密为明文
     * @param AdvanceDecryptRequest $request
     * @param RuntimeOptions $runtime
     * @return AdvanceDecryptResponse AdvanceDecryptResponse
     */
    public function advanceDecryptWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedAdvanceDecryptRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("AdvanceDecrypt", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseAdvanceDecryptResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return AdvanceDecryptResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Plaintext" => @$respMap["Plaintext"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "PaddingMode" => @$respMap["PaddingMode"],
            "KeyVersionId" => @$respMap["KeyVersionId"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用AdvanceGenerateDataKey接口高级生成数据密钥
     * @param AdvanceGenerateDataKeyRequest $request
     * @return AdvanceGenerateDataKeyResponse AdvanceGenerateDataKeyRequest
     */
    public function advanceGenerateDataKey($request){
        $runtime = new RuntimeOptions([]);
        return $this->advanceGenerateDataKeyWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用AdvanceGenerateDataKey接口高级生成数据密钥
     * @param AdvanceGenerateDataKeyRequest $request
     * @param RuntimeOptions $runtime
     * @return AdvanceGenerateDataKeyResponse AdvanceGenerateDataKeyRequest
     */
    public function advanceGenerateDataKeyWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedAdvanceGenerateDataKeyRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("AdvanceGenerateDataKey", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseAdvanceGenerateDataKeyResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return AdvanceGenerateDataKeyResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Iv" => @$respMap["Iv"],
            "Plaintext" => @$respMap["Plaintext"],
            "CiphertextBlob" => @$respMap["CiphertextBlob"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "KeyVersionId" => @$respMap["KeyVersionId"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用GenerateDataKeyPair接口生成密钥对
     * @param GenerateDataKeyPairRequest $request
     * @return GenerateDataKeyPairResponse GenerateDataKeyPairResponse
     */
    public function generateDataKeyPair($request){
        $runtime = new RuntimeOptions([]);
        return $this->generateDataKeyPairWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用GenerateDataKeyPairWithOptions接口生成密钥对
     * @param GenerateDataKeyPairRequest $request
     * @param RuntimeOptions $runtime
     * @return GenerateDataKeyPairResponse GenerateDataKeyPairResponse
     */
    public function generateDataKeyPairWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGenerateDataKeyPairRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("GenerateDataKeyPair", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGenerateDataKeyPairResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return GenerateDataKeyPairResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Iv" => @$respMap["Iv"],
            "KeyPairSpec" => @$respMap["KeyPairSpec"],
            "PrivateKeyPlaintext" => @$respMap["PrivateKeyPlaintext"],
            "PrivateKeyCiphertextBlob" => @$respMap["PrivateKeyCiphertextBlob"],
            "PublicKey" => @$respMap["PublicKey"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用GenerateDataKeyPairWithoutPlaintext接口生成无明文密钥对
     * @param GenerateDataKeyPairWithoutPlaintextRequest $request
     * @return GenerateDataKeyPairWithoutPlaintextResponse GenerateDataKeyPairWithoutPlaintextResponse
     */
    public function generateDataKeyPairWithoutPlaintext($request){
        $runtime = new RuntimeOptions([]);
        return $this->generateDataKeyPairWithoutPlaintextWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用AdvanceGenerateDataKeyPair接口生成无明文密钥对
     * @param GenerateDataKeyPairWithoutPlaintextRequest $request
     * @param RuntimeOptions $runtime
     * @return GenerateDataKeyPairWithoutPlaintextResponse GenerateDataKeyPairWithoutPlaintextResponse
     */
    public function generateDataKeyPairWithoutPlaintextWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGenerateDataKeyPairWithoutPlaintextRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("GenerateDataKeyPairWithoutPlaintext", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGenerateDataKeyPairWithoutPlaintextResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return GenerateDataKeyPairWithoutPlaintextResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Iv" => @$respMap["Iv"],
            "KeyPairSpec" => @$respMap["KeyPairSpec"],
            "PrivateKeyCiphertextBlob" => @$respMap["PrivateKeyCiphertextBlob"],
            "PublicKey" => @$respMap["PublicKey"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用AdvanceGenerateDataKeyPair接口高级生成密钥对
     * @param AdvanceGenerateDataKeyPairRequest $request
     * @return AdvanceGenerateDataKeyPairResponse AdvanceGenerateDataKeyPairResponse
     */
    public function advanceGenerateDataKeyPair($request){
        $runtime = new RuntimeOptions([]);
        return $this->advanceGenerateDataKeyPairWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用AdvanceGenerateDataKeyPairWithOptions接口高级生成密钥对
     * @param AdvanceGenerateDataKeyPairRequest $request
     * @param RuntimeOptions $runtime
     * @return AdvanceGenerateDataKeyPairResponse AdvanceGenerateDataKeyPairResponse
     */
    public function advanceGenerateDataKeyPairWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedAdvanceGenerateDataKeyPairRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("AdvanceGenerateDataKeyPair", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseAdvanceGenerateDataKeyPairResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return AdvanceGenerateDataKeyPairResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Iv" => @$respMap["Iv"],
            "KeyPairSpec" => @$respMap["KeyPairSpec"],
            "PrivateKeyPlaintext" => @$respMap["PrivateKeyPlaintext"],
            "PrivateKeyCiphertextBlob" => @$respMap["PrivateKeyCiphertextBlob"],
            "PublicKey" => @$respMap["PublicKey"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "KeyVersionId" => @$respMap["KeyVersionId"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }

    /**
     * 调用AdvanceGenerateDataKeyPairWithoutPlaintext接口高级生成无明文密钥对
     * @param AdvanceGenerateDataKeyPairWithoutPlaintextRequest $request
     * @return AdvanceGenerateDataKeyPairWithoutPlaintextResponse AdvanceGenerateDataKeyPairWithoutPlaintextResponse
     */
    public function advanceGenerateDataKeyPairWithoutPlaintext($request){
        $runtime = new RuntimeOptions([]);
        return $this->advanceGenerateDataKeyPairWithoutPlaintextWithOptions($request, $runtime);
    }

    /**
     * 带运行参数调用AdvanceGenerateDataKeyPairWithoutPlaintextWithOptions接口高级生成无明文密钥对
     * @param AdvanceGenerateDataKeyPairWithoutPlaintextRequest $request
     * @param RuntimeOptions $runtime
     * @return AdvanceGenerateDataKeyPairWithoutPlaintextResponse AdvanceGenerateDataKeyPairWithoutPlaintextResponse
     */
    public function advanceGenerateDataKeyPairWithoutPlaintextWithOptions($request, $runtime){
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedAdvanceGenerateDataKeyPairWithoutPlaintextRequest($reqBody);
        $responseEntity = Utils::assertAsMap($this->doRequest("AdvanceGenerateDataKeyPairWithoutPlaintext", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $runtime, $request->requestHeaders));
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseAdvanceGenerateDataKeyPairWithoutPlaintextResponse(Utils::assertAsBytes(@$responseEntity["bodyBytes"]));
        return AdvanceGenerateDataKeyPairWithoutPlaintextResponse::fromMap([
            "KeyId" => @$respMap["KeyId"],
            "Iv" => @$respMap["Iv"],
            "KeyPairSpec" => @$respMap["KeyPairSpec"],
            "PrivateKeyCiphertextBlob" => @$respMap["PrivateKeyCiphertextBlob"],
            "PublicKey" => @$respMap["PublicKey"],
            "RequestId" => @$respMap["RequestId"],
            "Algorithm" => @$respMap["Algorithm"],
            "KeyVersionId" => @$respMap["KeyVersionId"],
            "responseHeaders" => @$responseEntity["responseHeaders"]
        ]);
    }
}
