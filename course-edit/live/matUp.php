<?php
require '/var/www/html/admin/php/Connection.php';
use Aws\S3\ObjectUploader;

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