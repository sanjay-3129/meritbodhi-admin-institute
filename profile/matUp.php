<?php
// require '/var/www/html/meritbodhi-admin-institute/php/Connection.php';
// use Aws\S3\ObjectUploader;

$bucketName = 'secure--storage';

date_default_timezone_set('Asia/Kolkata');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

// require '../../vendor/autoload.php';
require '/var/www/html/meritbodhi-admin-institute/vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;
use Aws\S3\S3Client;  
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3MultipartUploadException;
use Aws\S3\ObjectUploader;

use \Firebase\JWT\JWT;
use GuzzleHttp\Client;

define('AWS_ACCESS_KEY_ID', 'AKIAXHXPV4IHXS43NV7X');
define('AWS_SECRET_ACCESS_KEY', '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');

try{
	$credentials = new Aws\Credentials\Credentials(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY);

	$s3client = new Aws\S3\S3Client([
			'version'     => 'latest',
			'region'      => 'ap-south-1',
			'credentials' => $credentials
	]);

	} catch(AwsException $e){
		print_r($e);
	}

if (isset($_FILES['usr_profile'])) {
	$filee=$_FILES['usr_profile']['tmp_name'];

	$source = fopen($filee, 'rb');

	$uploader = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    $_POST['name'],
	    $source
	);

	$result = $uploader->upload();

	$fileURL=$result['ObjectURL'];

	echo $fileURL;
}
?>