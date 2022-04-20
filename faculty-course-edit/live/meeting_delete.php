<?php

require '/var/www/html/admin/php/Connection.php';

if (isset($_POST['meetid'])) {
	$mid=explode("?***?", $_POST['meetid']);

    for ($i=0; $i < count($mid); $i++) { 
        $response = $meetclient->request("DELETE", "/v2/meetings/".$mid[$i], [
            "headers" => [
                "Authorization" => "Bearer " . getZoomAccessToken()
            ]
        ]);  
        if (204 != $response->getStatusCode()) {
            echo 'error';
        } 
    }
}
?>