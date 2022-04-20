<?php
if (isset($_POST['mid'])) {
	require '/var/www/html/admin/php/Connection.php';

	$mname=$_POST['meetname'];
	$mdate=$_POST['date'];
	$mtime=$_POST['time'].":00";
	$mduration=$_POST['dur'];
	$mpassword=$_POST['pass'];
	$mid=$_POST['mid'];
	$meetingdatetime=$mdate."T".$mtime;

	$response = $meetclient->request('PATCH', '/v2/meetings/'.$mid, [
        "headers" => [
            "Authorization" => "Bearer " . getZoomAccessToken()
        ],
        'json' => [
            "topic" => $mname,
            "type" => 2,
            "start_time" => $meetingdatetime,
            "duration" => $mduration,
            "password" => $mpassword,
            "settings" => [
                "auto_recording" => "cloud"
            ],
        ],
    ]);
    if (204 == $response->getStatusCode()) {
        echo 'success';
    }else{
        echo "error";
    }
}
?>