/* JS Document - Developed by Fabio Rocha (https://github.com/fabiorochafg | fabiorochafg@gmail.com) */

jQuery(document).ready(function() {

	jQuery("#top-of-the-page").click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
		return false;
	});

	jQuery('.btn-toolbar button').html("Buscar");

});