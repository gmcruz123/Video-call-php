<?php

    define("SERVER_API_KEY","AIzaSyDcL1FqsjtHfN6CuBVNelSp2ifp0o699Jw");
    $tokens = ["e9uupKMW_Ns:APA91bGhMuOuxEhIIzkI5hgxoS2iN3JfVeFdmFD7bab1Fs_FHxgh0Teda66ISgRcdHesifoiwL3Ms4O4TquZqXXQBRTkpkWtY1TvlP6ScoJBnmUNEpVNMGR-K618Z_jPBi7o9QEUQ8_e"];

    $header = ['Authorization: Key='. SERVER_API_KEY,
                'Content-Type : Application/json'];

    $code = "938547985756";

    $msj=['title' => "Notification",
          'body' => 'https://appr.tc/r/' . $code,
          'icon' => 'img/icon.png',
          'image' => 'img/icon.png'];

    $payload = ['registration_ids' => $tokens,
                'data' => $msj];


                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode( $payload ),
                  CURLOPT_HTTPHEADER => $header
                ));
                
                $response = curl_exec($curl);
                $err = curl_error($curl);
                
                curl_close($curl);
                
                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  echo $response;
                }


?>