English | [简体中文](README-CN.md)

![](https://aliyunsdk-pages.alicdn.com/icons/AlibabaCloud.svg)

## AlibabaCloud DKMS-GCS SDK for PHP

- [Overview](https://www.alibabacloud.com/help/doc-detail/311016.htm)
- [Quick Start](https://www.alibabacloud.com/help/doc-detail/311368.htm)
- [Sample Code](/example)

## Requirements

- PHP 5.6 or later

## Installation
### As a dependency via Composer(recommended)
Run the following in the base directory of your project to install AlibabaCloud DKMS SDK for PHP as a dependency:
```
composer require alibabacloud/dkms-gcs-sdk
```
Or, You can also declare the dependency on AlibabaCloud DKMS SDK for PHP in the composer.json file:
```
"require": {
     "alibabacloud/dkms-gcs-sdk": "^0.3.0"
 }
```
Then run the following to install the dependency:
```
composer install
```
After the Composer Dependency Manager is installed, import the dependency in your PHP code:
```
require_once __DIR__ . '/vendor/autoload.php';
```
### Download SDK source code directly
Download the SDK source code, and introduce the autoload.php file under the SDK directory to your code:
```
require_once '/path/to/dkms-gcs-sdk/autoload.php';
```
## Quick Examples
```
<?php

require __DIR__ . '/vendor/autoload.php';

use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config as AlibabaCloudDkmsGcsOpenApiConfig;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\EncryptRequest;
use AlibabaCloud\Tea\Utils\Utils as AlibabaCloudTeaUtils;

// 1.Create DKMS SDK client config
$config = new AlibabaCloudDkmsGcsOpenApiConfig();
$config->protocol = 'https';
$config->clientKeyContent = '<your client key content>';
$config->password = '<your client key password>';
$config->endpoint = '<your dkms instance service address>';

// 2.Create DKMS SDK client instance
$client = new AlibabaCloudDkmsGcsSdkClient($config);

// 3.Create and set up parameters RuntimeOptions instance
$runtimeOptions = new RuntimeOptions();
// set CA certificate
//$runtimeOptions->verify = 'path/to/caCert.pem';
// or, ignore certificate
$runtimeOptions->ignoreSSL = true;

// 4.Create an API request and set parameters
$encryptRequest = new EncryptRequest();
$encryptRequest->keyId = '<your cmk id>';
$encryptRequest->plaintext = AlibabaCloudTeaUtils::toBytes('encrypt plaintext');

// 5.Initiate the request and handle the response or exceptions
try {
    $encryptResponse = $client->encryptWithOptions($encryptRequest, $runtimeOptions);
    var_dump($encryptResponse->toMap());
} catch (Exception $error) {
    if ($error instanceof \AlibabaCloud\Tea\Exception\TeaError) {
        var_dump($error->getErrorInfo());
    }
    var_dump($error->getMessage());
    var_dump($error->getTraceAsString());
}
```

## License

[Apache-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Copyright (c) 2009-present, Alibaba Cloud All rights reserved.
