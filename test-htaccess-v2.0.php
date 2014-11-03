<?php


/**
 * Write .htaccess directly without causing a server missconfiguration (500)
 * (PHP will end the process even if the browser-window was closed.)
 */


$docroot = $_SERVER['DOCUMENT_ROOT'].'/test/';
$url = 'http://'.$_SERVER[HTTP_HOST].'/test/';


// Get current .htaccess
$curdata = file_get_contents($docroot.'/.htaccess');


// Write new data to .htaccess
$data = 'ErrorDocument 404 /404.html'; // KORREKT
//$data = 'Error Document 404 /404.html'; // FALSCH
file_put_contents($docroot.'/.htaccess', $data);


// Get HTTP-status.
$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($handle);
$httpcode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
curl_close($handle);


// Missconfiguration! Write old data back.
if ($httpcode == 500) {
	file_put_contents($docroot.'/.htaccess', $curdata);
}


?>
