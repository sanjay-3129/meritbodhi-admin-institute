<?php
require '/var/www/html/meritbodhi-admin-institute/php/Connection.php';
use Aws\S3\ObjectUploader;

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