<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\Dkms\Gcs\Sdk;

use AlibabaCloud\Dkms\Gcs\OpenApi\Client as AlibabaCloudDkmsGcsOpenApiClient;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Client as AlibabaCloudDkmsGcsOpenApiUtilClient;

use AlibabaCloud\Dkms\Gcs\Sdk\Models\EncryptRequest;
use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\EncryptResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\DecryptRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\DecryptResponse;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\HmacRequest;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\HmacResponse;
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
use Exception;

class Client extends AlibabaCloudDkmsGcsOpenApiClient
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param EncryptRequest $request
     * @param RuntimeOptions $runtime
     * @return EncryptResponse
     * @throws Exception
     */
    public function encryptWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedEncryptRequest($reqBody);
        $response = $this->doRequest("Encrypt", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseEncryptResponse($respBody);
        return EncryptResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "KeyId" => @$respMap["KeyId"],
            "CiphertextBlob" => @$respMap["CiphertextBlob"],
            "Iv" => @$respMap["Iv"],
            "Algorithm" => @$respMap["Algorithm"],
            "PaddingMode" => @$respMap["PaddingMode"]
        ]);
    }

    /**
     * @param EncryptRequest $request
     * @return EncryptResponse
     * @throws Exception
     */
    public function encrypt($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->encryptWithOptions($request, $runtime);
    }

    /**
     * @param DecryptRequest $request
     * @param RuntimeOptions $runtime
     * @return DecryptResponse
     * @throws Exception
     */
    public function decryptWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedDecryptRequest($reqBody);
        $response = $this->doRequest("Decrypt", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseDecryptResponse($respBody);
        return DecryptResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "KeyId" => @$respMap["KeyId"],
            "Plaintext" => @$respMap["Plaintext"],
            "Algorithm" => @$respMap["Algorithm"],
            "PaddingMode" => @$respMap["PaddingMode"]
        ]);
    }

    /**
     * @param DecryptRequest $request
     * @return DecryptResponse
     * @throws Exception
     */
    public function decrypt($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->decryptWithOptions($request, $runtime);
    }

    /**
     * @param HmacRequest $request
     * @param RuntimeOptions $runtime
     * @return HmacResponse
     * @throws Exception
     */
    public function hmacWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedHmacRequest($reqBody);
        $response = $this->doRequest("Hmac", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseHmacResponse($respBody);
        return HmacResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "KeyId" => @$respMap["KeyId"],
            "Signature" => @$respMap["Signature"]
        ]);
    }

    /**
     * @param HmacRequest $request
     * @return HmacResponse
     * @throws Exception
     */
    public function hmac($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->hmacWithOptions($request, $runtime);
    }

    /**
     * @param SignRequest $request
     * @param RuntimeOptions $runtime
     * @return SignResponse
     * @throws Exception
     */
    public function signWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedSignRequest($reqBody);
        $response = $this->doRequest("Sign", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseSignResponse($respBody);
        return SignResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "KeyId" => @$respMap["KeyId"],
            "Signature" => @$respMap["Signature"],
            "Algorithm" => @$respMap["Algorithm"],
            "MessageType" => @$respMap["MessageType"]
        ]);
    }

    /**
     * @param SignRequest $request
     * @return SignResponse
     * @throws Exception
     */
    public function sign($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->signWithOptions($request, $runtime);
    }

    /**
     * @param VerifyRequest $request
     * @param RuntimeOptions $runtime
     * @return VerifyResponse
     * @throws Exception
     */
    public function verifyWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedVerifyRequest($reqBody);
        $response = $this->doRequest("Verify", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseVerifyResponse($respBody);
        return VerifyResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "KeyId" => @$respMap["KeyId"],
            "Value" => @$respMap["Value"],
            "Algorithm" => @$respMap["Algorithm"],
            "MessageType" => @$respMap["MessageType"]
        ]);
    }

    /**
     * @param VerifyRequest $request
     * @return VerifyResponse
     * @throws Exception
     */
    public function verify($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->verifyWithOptions($request, $runtime);
    }

    /**
     * @param GenerateRandomRequest $request
     * @param RuntimeOptions $runtime
     * @return GenerateRandomResponse
     * @throws Exception
     */
    public function generateRandomWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGenerateRandomRequest($reqBody);
        $response = $this->doRequest("GenerateRandom", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGenerateRandomResponse($respBody);
        return GenerateRandomResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "Random" => @$respMap["Random"]
        ]);
    }

    /**
     * @param GenerateRandomRequest $request
     * @return GenerateRandomResponse
     * @throws Exception
     */
    public function generateRandom($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->generateRandomWithOptions($request, $runtime);
    }

    /**
     * @param GenerateDataKeyRequest $request
     * @param RuntimeOptions $runtime
     * @return GenerateDataKeyResponse
     * @throws Exception
     */
    public function generateDataKeyWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGenerateDataKeyRequest($reqBody);
        $response = $this->doRequest("GenerateDataKey", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGenerateDataKeyResponse($respBody);
        return GenerateDataKeyResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "KeyId" => @$respMap["KeyId"],
            "Iv" => @$respMap["Iv"],
            "Plaintext" => @$respMap["Plaintext"],
            "CiphertextBlob" => @$respMap["CiphertextBlob"],
            "Algorithm" => @$respMap["Algorithm"]
        ]);
    }

    /**
     * @param GenerateDataKeyRequest $request
     * @return GenerateDataKeyResponse
     * @throws Exception
     */
    public function generateDataKey($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->generateDataKeyWithOptions($request, $runtime);
    }

    /**
     * @param GetPublicKeyRequest $request
     * @param RuntimeOptions $runtime
     * @return GetPublicKeyResponse
     * @throws Exception
     */
    public function getPublicKeyWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGetPublicKeyRequest($reqBody);
        $response = $this->doRequest("GetPublicKey", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGetPublicKeyResponse($respBody);
        return GetPublicKeyResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "KeyId" => @$respMap["KeyId"],
            "PublicKey" => @$respMap["PublicKey"]
        ]);
    }

    /**
     * @param GetPublicKeyRequest $request
     * @return GetPublicKeyResponse
     * @throws Exception
     */
    public function getPublicKey($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->getPublicKeyWithOptions($request, $runtime);
    }

    /**
     * @param GetSecretValueRequest $request
     * @param RuntimeOptions $runtime
     * @return GetSecretValueResponse
     * @throws Exception
     */
    public function getSecretValueWithOptions($request, $runtime)
    {
        Utils::validateModel($request);
        $reqBody = Utils::toMap($request);
        $reqBodyBytes = AlibabaCloudDkmsGcsOpenApiUtilClient::getSerializedGetSecretValueRequest($reqBody);
        $response = $this->doRequest("GetSecretValue", "dkms-gcs-0.2", "https", "POST", "RSA_PKCS1_SHA_256", $reqBodyBytes, $request->headers, $runtime);
        $respBody = Utils::assertAsArray(@$response["body"]);
        $respMap = AlibabaCloudDkmsGcsOpenApiUtilClient::parseGetSecretValueResponse($respBody);
        return GetSecretValueResponse::fromMap([
            "Headers" => @$response["headers"],
            "RequestId" => @$respMap["RequestId"],
            "SecretName" => @$respMap["SecretName"],
            "SecretType" => @$respMap["SecretType"],
            "SecretData" => @$respMap["SecretData"],
            "SecretDataType" => @$respMap["SecretDataType"],
            "VersionStages" => @$respMap["VersionStages"],
            "VersionId" => @$respMap["VersionId"],
            "CreateTime" => @$respMap["CreateTime"],
            "LastRotationDate" => @$respMap["LastRotationDate"],
            "NextRotationDate" => @$respMap["NextRotationDate"],
            "ExtendedConfig" => @$respMap["ExtendedConfig"],
            "AutomaticRotation" => @$respMap["AutomaticRotation"],
            "RotationInterval" => @$respMap["RotationInterval"]
        ]);
    }

    /**
     * @param GetSecretValueRequest $request
     * @return GetSecretValueResponse
     * @throws Exception
     */
    public function getSecretValue($request)
    {
        $runtime = new RuntimeOptions([]);
        return $this->getSecretValueWithOptions($request, $runtime);
    }
}
