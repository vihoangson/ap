<?php

namespace App\Services;

class AlertService {

    public static function chatwork(string $message) {
        $message = '[toall]'. config('app.url')." : ".$message;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.chatwork.com/v2/rooms/295837714/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'body='.$message,
            CURLOPT_HTTPHEADER => array(
                'X-ChatWorkToken: 6598c5b05c7c3a1508f35fe465474caf',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }
}
