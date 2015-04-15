/* JS Document - Developed by Fabio Rocha (http://solutibrasil.com.br | contato@solutibrasil.com.br) */

jQuery(document).ready(function() {

	jQuery("#go-to-top").click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
		return false;
	});

	jQuery('.btn-toolbar button').html("Buscar");

});