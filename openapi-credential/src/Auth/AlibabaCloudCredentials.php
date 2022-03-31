<?php

namespace AlibabaCloud\Dkms\Gcs\OpenApi\Credential\Auth;

interface AlibabaCloudCredentials
{
    /**
     * @return string
     */
    public function getAccessKeyId();

    /**
     * @return string
     */
    public function getAccessKeySecret();
}