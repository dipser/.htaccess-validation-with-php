<?php

$testdir = '/test-dir/';


$rdir = $_SERVER['DOCUMENT_ROOT'].$testdir;

if (!file_exists($rdir)) {
    mkdir($rdir, 0777, true);
}

$data = 'ErrorDocument 404 /404.html'; // Korrekt
$data = 'ErrorDocument 404 /404.html'; // Fehler

file_put_contents($rdir.'index.html', '');
file_put_contents($rdir.'.htaccess', $data);


$url = 'http://'.$_SERVER[HTTP_HOST].$testdir;

$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($handle);
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
curl_close($handle);

echo $httpCode;

?>
