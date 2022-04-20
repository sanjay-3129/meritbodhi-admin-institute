<?php
require '/var/www/html/admin/php/Connection.php';
use Aws\S3\ObjectUploader;

if (isset($_FILES['facultyImg'])) {

	$CImag=$_FILES['facultyImg']['tmp_name'];
    $Vid = $_POST['uploadName'];

	$source = fopen($CImag, 'rb');

	$uploader = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    $Vid,
	    $source
	);

	$result = $uploader->upload();

	$CImagURL=$result['ObjectURL'];
	echo $CImagURL;
}
?>