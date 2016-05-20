$(document).ready(function() {


//segundo index de la pagina principal MODO PRUEBA


$(window).scroll(function() { //FUNCION PARA LA BARRA DE SCROLL

var Scrole = $(this).scrollTop(); //CAPTURAMOS LOS VALORES DEL SCROLL


$('.logo').css({'transform' : 'translate(0px,'+Scrole/5+'% )'}); //MOVEMOS EL LOGO

if(Scrole>1){
		$('#menu_clientes').removeClass('navbar navbar-default');
		$('#menu_clientes').addClass('navbar navbar-inverse');

}else{
		$('#menu_clientes').removeClass('navbar navbar-inverse');
		$('#menu_clientes').addClass('navbar navbar-default');

}




//if(Scrole > ($('#menu_clientes').offset().top/2) ){ //CON EL OFFSET TOP OBTENEMOS LA POSCION DEL ELEMENTO

	//console.log('hi');
	/*$('#menu_clientes').removeClass('navbar navbar-inverse');
	$('#menu_clientes').addClass('navbar navbar-inverse');*/


//} 



});








}); //termina el document function