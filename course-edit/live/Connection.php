<?php
$bucketName = 'secure--storage';

date_default_timezone_set('Asia/Kolkata');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require '/var/www/html/vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;
use Aws\S3\S3Client;  
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3MultipartUploadException;
use Aws\S3\ObjectUploader;

try{

    $s3client =new  S3Client([
        'profile' => 'default',
        'region' => 'ap-south-1',
        'version' => 'latest'
    ]);

    }catch(AwsException $e){
      print_r($e);
    }
?>