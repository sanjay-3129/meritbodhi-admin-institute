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
if (isset($_POST['fileNames'])) {
	$fnames=explode('?***?', $_POST['fileNames']);

	for ($i=0; $i < count($fnames); $i++) { 
		$result = $s3client->deleteObject([
	        'Bucket' => $bucketName,
	        'Key' => $fnames[$i]
	    ]);	
	}
}
?>