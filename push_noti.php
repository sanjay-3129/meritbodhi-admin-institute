<?php
    $url ="https://fcm.googleapis.com/fcm/send";

    $fields=array(
        "to"=> "f1_kltXLwGf568STxx-V3_:APA91bHp9kUvOWzs3dU78EAS5RrkTWQUZFFV8WuKP49jbwMYTm4VqH7EjvH-MCzrsNC8cfdXlVRBhPM7wlQ1x-fN67F6k-HAM746Z6iCI_N9Lu2oZIVbJlwiMhosUwwA2fuZQK74Z8RL",
        "notification"=>array(
            "body"=> 'Hello',
            "title"=> 'How are you ',
            "icon"=> '/courses/joker.jpg',
            "click_action"=>"https://meritbodhi.co.in"
        )
    );

    $headers=array(
        'Authorization' =>'key=AAAAUi6HnJE:APA91bEpTskVZZr3SfsV7BuXYZhN1baI2aF1mjmoF3zOr8LuKGsHKoo6yLNMWXUmMZutl_vkmCC5rFa6lmdIg2kLZNmhDYzvmpUX-ljQNXKRv1ZyEbog4I5CXnuuUF923Y-y3yY8x7PC',
        'Content-Type' => 'application/json'
    );

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result=curl_exec($ch);
    print_r($result);
    curl_close($ch);
