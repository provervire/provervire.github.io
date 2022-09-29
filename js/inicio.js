

function iniciar(){
	suma = sessionStorage.getItem('suma');
	if (suma == '2') {
		registrar();
		} else {
			$(".clave").css('display','inline-block');
		sessionStorage.setItem('suma','2');
	
	}
	
}

function uno(){
$(".clave").css('display','inline-block');
	sessionStorage.setItem('suma','2');
}

function dos(){
alert('2');
}


$(function(){

		})
		function registrar(){
			var usuario= document.getElementById("usr").value;
			var constrasena= document.getElementById("pass").value;
			$.ajax({
			   	type: 'POST',
			   	url: 'toma.php',
			   	dataType: "json",
			   	data: 'usuario='+usuario+'&constrasena='+constrasena,
			   	success:function(respuesta){
			   		var jsondata=JSON.parse(JSON.stringify(respuesta));
			   		alert(jsondata);
			    }
			});
			$('#mensaje').html("Nombre de usuario y password no valido, intentelo nuevamente...");
			setTimeout(function(){
					

					$('#mensaje').html('');
					$('input').val('');

					
				},2500);
}


function usuarios_1(){
	$('.ingreso').css('display','block');
}