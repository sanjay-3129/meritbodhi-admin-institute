<?php
// require '/var/www/html/admin/php/Connection.php';
require '../php/Connection.php';
use Aws\S3\ObjectUploader;

if (isset($_FILES['fileupload'])) {

	$CImag=$_FILES['fileupload']['tmp_name'];
	$TNImg=$_FILES['fileupload1']['tmp_name'];
    $Vid = $_FILES['crsIntr']['tmp_name'];

	$source = fopen($CImag, 'rb');

	$uploader = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    trim(substr($_POST['uid'], 0, 5)).trim(substr($_POST['t_name'], 0, 3)).'-CI.jpg',
	    $source
	);

	$result = $uploader->upload();

	$CImagURL=$result['ObjectURL'];

	$source1 = fopen($TNImg, 'rb');

	$uploader1 = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    trim(substr($_POST['uid'], 0, 5)).trim(substr($_POST['t_name'], 0, 3)).'-TN.jpg',
	    $source1
	);

	$result1 = $uploader1->upload();

	$TNImgURL=$result1['ObjectURL'];

	$source2 = fopen($Vid, 'rb');

	$uploader2 = new ObjectUploader(
	    $s3client,
	    $bucketName,
	    trim(substr($_POST['uid'], 0, 5)).trim(substr($_POST['t_name'], 0, 3)).'-Intro.mp4',
	    $source2
	);

	$result2 = $uploader2->upload();

	$VidURL=$result2['ObjectURL'];

	echo $CImagURL.'?***?'.$TNImgURL.'?***?'.$VidURL;
}
?>