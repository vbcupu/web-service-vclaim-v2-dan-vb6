<?php
function configvclaim()
{
    $consid = "";
    $secretkey = "";
    $userkey = "";
    $url = "https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev";
    $arr = array(
        'consid' => $consid,
        'secretkey' => $secretkey,
        'userkey' => $userkey,
        'url' => $url
    );
    return $arr;
}
function getHeader($endpoint = "")
{
    $config = configvclaim();
    $url = $config['url'] . $endpoint;

    // Computes the timestamp
    date_default_timezone_set('UTC');
    $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
    // Computes the signature by hashing the salt with the secret key as the key
    $signature = hash_hmac('sha256', $config['consid'] . "&" . $tStamp, $config['secretkey'], true);

    // base64 encode�
    $encodedSignature = base64_encode($signature);    
    $arr = array(
        'header' => array(
            'X-cons-id:' . $config['consid'],
            'X-timestamp:' . $tStamp,
            'X-signature:' . $encodedSignature,
            'user_key:' . $config['userkey']
        ) ,
        'url' => $url,
        'data' => array(
            'consid' => $config['consid'],
            'secretkey' => $config['secretkey'],
            'userkey' => $config['userkey'],
            'timestamp' => $tStamp
        )
    );
    return $arr;
}
function kirimws($endpoint, $method, $body = array())
{
    if ($method == 'GET')
    {
        $arr = getHeader($endpoint);
        $url = $arr['url'];
        $arrheader = $arr['header'];
        array_push($arrheader, 'Content-Type: application/json; charset=utf-8');
    }
    else
    {
        $arr = getHeader();
        $url = $arr['url'];
        $arrheader = $arr['header'];
        array_push($arrheader, 'Content-Type:  Application/x-www-form-urlencoded');
    }

    if ($method == 'GET')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrheader);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $season_data = curl_exec($ch);
        if (curl_errno($ch))
        {
            print "Error nih: " . curl_error($ch);
            exit();
        }
        curl_close($ch);       
        $data = json_decode($season_data, true);
        $key = $arr['data']['consid'] . $arr['data']['secretkey'] . $arr['data']['timestamp'];
        $text = stringDecrypt($key, $data['response']);
        $arrHasil = array(
            'metaData' => array(
                'code' => $data['metaData']['code'],
                'message' => $data['metaData']['message']
            ) ,
            'response' => json_decode($text)
        );

        return json_encode($arrHasil, JSON_UNESCAPED_SLASHES);
    }
}
function stringDecrypt($key, $string)
{
    $encrypt_method = 'AES-256-CBC';
    // hash
    $key_hash = hex2bin(hash('sha256', $key));
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hex2bin(hash('sha256', $key)) , 0, 16);
    $output = openssl_decrypt(base64_decode($string) , $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
    return \LZCompressor\LZString::decompressFromEncodedURIComponent($output);
}

?>
