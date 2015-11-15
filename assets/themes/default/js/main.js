$(document).ready(function(){
	// Automagically add active class if current page matches the href of the anchor tag
 	$('ul.navbar-nav').children().each(function(){
 		if(window.location.pathname.indexOf($(this).find('a').attr('href')) > -1){
 			$(this).addClass('active');
 		}
 	});
});   