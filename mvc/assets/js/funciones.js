//Mensaje de alerta
function mensaje_iniciar_sesion(){
    alert("Favor de iniciar sesión con Facebook");
}
//Revisar si has iniciado sesión con Facebook
function statusChangeCallback2(response, liga) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status != 'connected') {
		console.log('Se necesita inicar sesión');
		mensaje_iniciar_sesion();
    } else {
		console.log('La sesión ya fué iniciada');
		var boton = document.getElementById("boton_agregar_palabra");
		boton.href=liga;
	}
}

function checkLoginState2(liga) {
	FB.getLoginStatus(function(response) {
		statusChangeCallback2(response, liga);
	});
}