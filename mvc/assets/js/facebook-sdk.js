function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
		testAPI();
    } else {
		var _status = document.getElementById('status');
		_status.textContent = "Sesión no iniciada";
	}
}

function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

window.fbAsyncInit = function() {
	FB.init({
		appId      : '2213665778883505',
		cookie     : true,
		xfbml      : true,// parse social plugins on this page
		version    : 'v3.2'
	});
	//FB.AppEvents.logPageView();

// 1. Logged into your app ('connected')
// 2. Logged into Facebook, but not your app ('not_authorized')
// 3. Not logged into Facebook and can't tell if they are logged into your app or not.

	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
};
// Load the SDK asynchronously
(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/es_LA/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function testAPI() {
	console.log('Bienvenido(a)! Estamos obteniendo su información.... ');
	FB.api('/me', function(response) {
		console.log('Inicio de sesión completado para: ' + response.name);
		var _status = document.getElementById('status');
		_status.textContent = "Usuario: " + response.name;
	});
}