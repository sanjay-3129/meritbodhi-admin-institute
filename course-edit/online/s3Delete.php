<?php
// require '/var/www/html/admin/php/Connection.php';
require '../php/Connection.php';
use Aws\S3\ObjectUploader;

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