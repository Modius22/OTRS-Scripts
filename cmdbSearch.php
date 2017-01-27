<?php
//OTRS URL http://<hostname/ip>/otrs/nph-genericinterface.pl/Webservice/<webservice>/<methode>/<user>/<password>
$otrs_url = 'http://172.16.17.220/otrs/nph-genericinterface.pl/Webservice/i-doit/SearchCI/i-doit/i-doit';

$l_data = array(
       'ConfigItem' => [
               'Class'        => 'Computer',
       ]
);
$p_data = json_encode($l_data);

/* CURL Request */
$l_curl_handle = curl_init( $otrs_url );
curl_setopt($l_curl_handle, CURLOPT_POST, 1);
curl_setopt($l_curl_handle, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($l_curl_handle, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($l_curl_handle, CURLOPT_POSTFIELDS, $p_data);
curl_setopt($l_curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($l_curl_handle, CURLOPT_USERAGENT, 'API Tester');
curl_setopt($l_curl_handle, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ));

$l_content = curl_exec($l_curl_handle);

curl_close($l_curl_handle);
print_r($l_content);
$l_content = json_decode($l_content);

echo '<pre>';
var_dump($l_content);
echo '</pre>';

?>
