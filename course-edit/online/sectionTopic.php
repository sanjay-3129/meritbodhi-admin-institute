<?php
// require '/var/www/html/admin/php/Connection.php';
require '../php/Connection.php';
use Aws\S3\ObjectUploader;

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