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

if (strcmp($_FILES['topicVidNew']['tmp_name'], '')!=0) {
	$uploadName=$_POST['uploadName'];
	$uploadName1=$_POST['uploadName'].'-55755.mp4';
	$cutDuration=$_POST['duration'];
	$bitrate="700k";
	$filee=$_FILES['topicVidNew']['tmp_name'];

	$cmd="/usr/bin/ffmpeg -ss $cutDuration -i $filee -t 00:15:00 -c copy /var/www/html/$uploadName";
    $compo="/usr/bin/ffmpeg -i /var/www/html/$uploadName -b:v $bitrate -bufsize $bitrate /var/www/html/$uploadName1";

    system($cmd);
    system($compo);

    function getDuration($file){
	   $dur = shell_exec("/usr/bin/ffmpeg -i ".$file." 2>&1");
	   if(preg_match("/: Invalid /", $dur)){
	      return false;
	   }
	   preg_match("/Duration: (.{2}):(.{2}):(.{2})/", $dur, $duration);
	   if(!isset($duration[1])){
	      return false;
	   }
	   $hours = $duration[1];
	   $minutes = $duration[2];
	   $seconds = $duration[3];
	   return $seconds + ($minutes*60) + ($hours*60*60);
	}

	$length=getDuration("/var/www/html/$uploadName1");

	$source = fopen("/var/www/html/$uploadName1", 'rb');

	$uploader = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    $uploadName,
	    $source
	);

	$result = $uploader->upload();

	$deleteCMD="unlink /var/www/html/$uploadName";
	$deleteCMD1="unlink /var/www/html/$uploadName1";

	system($deleteCMD);
	system($deleteCMD1);

	echo $length;
}
?>