<?php

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Provider;

use AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Auth\AlibabaCloudCredentials;

interface AlibabaCloudCredentialsProvider
{
    /**
     * @return AlibabaCloudCredentials
     */
    public function getCredentials();
}