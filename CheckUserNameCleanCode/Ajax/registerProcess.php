<?php

$email = $_POST['email'];
$mes = "";

if ($email == "songtao@attitudetech.ie"){
    $mes = '{"status":"error"}';
} else {
    $mes = '{"status":"ok"}';
}

echo $mes;
?>
