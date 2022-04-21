<?php
// require '/var/www/html/admin/php/Connection.php';
// use Aws\S3\ObjectUploader;

$bucketName = 'secure--storage';

date_default_timezone_set('Asia/Kolkata');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

// require '../../vendor/autoload.php';
require '/var/www/html/admin/vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;
use Aws\S3\S3Client;  
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3MultipartUploadException;
use Aws\S3\ObjectUploader;

use \Firebase\JWT\JWT;
use GuzzleHttp\Client;

define('ZOOM_API_KEY', '_KqJ2LhdS72IEtQxkgIePg');
define('ZOOM_SECRET_KEY', 'is6KgZKTYTZDw1Cs1R4RQyYWrkIKNoLH7lPm');
define('AWS_ACCESS_KEY_ID', 'AKIAXHXPV4IHXS43NV7X');
define('AWS_SECRET_ACCESS_KEY', '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');

function getZoomAccessToken() {
    $key = ZOOM_SECRET_KEY;
    $payload = array(
        "iss" => ZOOM_API_KEY,
        'exp' => time() + 3600,
    );
    return JWT::encode($payload, $key);    
}

try{

    $meetclient = new Client([
        'base_uri' => 'https://api.zoom.us',
    ]);

    // $s3client =new  S3Client([
    //     'profile' => 'default',
    //     'region' => 'ap-south-1',
    //     'version' => 'latest'
    // ]);

    $credentials = new Aws\Credentials\Credentials(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY);

    $s3client = new Aws\S3\S3Client([
        'version'     => 'latest',
        'region'      => 'ap-south-1',
        'credentials' => $credentials
    ]);

    }catch(AwsException $e){
      print_r($e);
    }


//Original

if (strcmp($_FILES['newCIimg']['tmp_name'], '')!=0) {
	echo "<script>alert('solli munchu')</script>";
	$filee=$_FILES['newCIimg']['tmp_name'];

	$source = fopen($filee, 'rb');

	$uploader = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    $_POST['CINAME'],
	    $source
	);

	$result = $uploader->upload();
}

if (strcmp($_FILES['newTNimg']['tmp_name'], '')!=0) {
	$filee=$_FILES['newTNimg']['tmp_name'];

	$source = fopen($filee, 'rb');

	$uploader = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    $_POST['TNNAME'],
	    $source
	);

	$result = $uploader->upload();
}

if (strcmp($_FILES['newVideoClickClick']['tmp_name'], '')!=0) {
	$filee=$_FILES['newVideoClickClick']['tmp_name'];

	$source = fopen($filee, 'rb');

	$uploader = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    $_POST['IVNAME'],
	    $source
	);

	$result = $uploader->upload();
}
?>