<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use MicrosoftAzure\Storage\Blob\BlobRestProxy;

$connectionString =
$_ENV['AZURE_STORAGE_CONNECTION'];

$blobClient =
BlobRestProxy::createBlobService(
    $connectionString
);

$containerName =
"tugas-praktikum";
?>