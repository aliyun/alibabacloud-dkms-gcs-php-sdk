<?php

function openapiCredentialClassLoader($class)
{
    $path = str_replace('AlibabaCloud\\Dkms\\Gcs\\OpenApi\\Credential\\','',$class);
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . \str_replace('\\', \DIRECTORY_SEPARATOR, $path) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('openapiCredentialClassLoader');
