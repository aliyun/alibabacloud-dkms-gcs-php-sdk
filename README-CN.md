[English](README.md) | 简体中文

![](https://aliyunsdk-pages.alicdn.com/icons/AlibabaCloud.svg)

## AlibabaCloud DKMS-GCS SDK for PHP

- [概述](https://help.aliyun.com/document_detail/311016.html)
- [入门指南](https://help.aliyun.com/document_detail/311368.html)
- [代码示例](/example)

## 依赖

- PHP >= 5.6

## 安装
### 通过Composer来管理项目依赖(推荐)
请直接在项目目录中运行以下内容来安装AlibabaCloud DKMS-GCS SDK for PHP作为依赖项:
```
composer require alibabacloud/dkms-gcs-sdk
```
或者，在composer.json中添加以下内容声明对AlibabaCloud DKMS-GCS SDK for PHP的依赖：
```
"require": {
     "alibabacloud/dkms-gcs-sdk": "^0.3.0"
 }
```
然后通过运行以下内容安装依赖:
```
composer install
```
使用composer安装完成后，在您的PHP代码中引入依赖即可:
```
require_once __DIR__ . '/vendor/autoload.php';
```

### 直接下载SDK源码
下载SDK源码，在您的代码中引入SDK目录下的autoload.php文件：
```
require_once '/path/to/dkms-gcs-sdk/autoload.php';
```

## 快速使用
以下示例向您展示使用AlibabaCloud DKMS-GCS SDK for PHP的主要步骤:
```
<?php

require __DIR__ . '/vendor/autoload.php';

use AlibabaCloud\Dkms\Gcs\OpenApi\Util\Models\RuntimeOptions;
use AlibabaCloud\Dkms\Gcs\Sdk\Client as AlibabaCloudDkmsGcsSdkClient;
use AlibabaCloud\Dkms\Gcs\OpenApi\Models\Config as AlibabaCloudDkmsGcsOpenApiConfig;
use AlibabaCloud\Dkms\Gcs\Sdk\Models\EncryptRequest;
use AlibabaCloud\Tea\Utils\Utils as AlibabaCloudTeaUtils;

// 1.构建专属KMS SDK Client配置
$config = new AlibabaCloudDkmsGcsOpenApiConfig();
$config->protocol = 'https';
$config->clientKeyContent = '<your client key content>';
$config->password = '<your client key password>';
$config->endpoint = '<your dkms instance service address>';

// 2.构建专属KMS SDK Client对象
$client = new AlibabaCloudDkmsGcsSdkClient($config);

// 3.构建RuntimeOptions实例并设置运行参数
$runtimeOptions = new RuntimeOptions();
// 配置CA证书
//$runtimeOptions->verify = 'path/to/caCert.pem';
// 或者，忽略证书
$runtimeOptions->ignoreSSL = true;

// 4.构建API请求并设置参数
$encryptRequest = new EncryptRequest();
$encryptRequest->keyId = '<your cmk id>';
$encryptRequest->plaintext = AlibabaCloudTeaUtils::toBytes('encrypt plaintext');

// 5.发起请求并处理应答或异常
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

## 许可证

[Apache-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Copyright (c) 2009-present, Alibaba Cloud All rights reserved.
