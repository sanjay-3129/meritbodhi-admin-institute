<?php
if (isset($_POST['meetname'])) {
	require '/var/www/html/admin/php/Connection.php';

	$mname=$_POST['meetname'];
	$mdate=$_POST['date'];
	$mtime=$_POST['time'];
	$mduration=$_POST['dur'];
	$mpassword=$_POST['pass'];
	$meetingdatetime=$mdate."T".$mtime;
 
    $response = $meetclient->request('POST', '/v2/users/me/meetings', [
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
 
    $data = json_decode($response->getBody());

    echo strval($data->id);
}
?>