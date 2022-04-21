<?php
// require '/var/www/html/admin/php/Connection.php';
require '../php/Connection.php';
use Aws\S3\ObjectUploader;

if (strcmp($_FILES['openfileformaterial']['tmp_name'], '')!=0) {
	$uploadName=$_POST['uploadName'];
	$file=$_FILES['openfileformaterial']['tmp_name'];

	$source = fopen($file, 'rb');

	$uploader = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    $uploadName,
	    $source
	);

	$result = $uploader->upload();
}
?>