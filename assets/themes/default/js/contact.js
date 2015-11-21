$(document).ready(function(){
	$('.contact_form').submit(function(e){
		$(this).find('.form-group').each(function(){
			if($(this).find('.form-control').val().trim().length == 0){
				var pos = $(this).innerWidth()-$(this).find($('.form-control')).outerWidth();
				var error_icon = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span class="error-msg">This can\'t be blank</span>';
				$(this).addClass('has-error');
				$(this).append(error_icon);
				e.preventDefault();
			}else{
				$(this).removeClass('has-error');
			}

			var form_group = $(this);
			$(this).find('.form-control').on('input',function(){
				form_group.removeClass('has-error');
				form_group.find('.form-control-feedback').remove();
				form_group.find('.error-msg').remove();
			});
		});
	});

	if($('.alert').length > -1){
		setTimeout(function(){$('.alert').fadeOut('slow')},5000);
	}
});