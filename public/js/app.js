$(document).ready(function(){
	$('.tree>a').click(function(){
		if($(this).parent().hasClass('open')){
			$(this).closest('li').removeClass('open');
			$(this).parent().find('ul').slideUp('fast');	
		}else{
			$('.tree').removeClass('open');
			$('.tree ul').slideUp('fast');
			$(this).closest('li').addClass('open');		
			$(this).parent().find('ul').slideDown('fast');			
		}
	});

	$('.tree li>a').click(function(){
		$(this).addClass('active');
	});

	$('.sidebar-toggler').click(function(){
		$('.sidebar').toggleClass('visible');
	});

	// $('.sidebar .newscroll').slimScroll({
	// 	height: $(window).height()-$('header').height()
	// });

	$('.sidebar a').each(function(){
		if(window.location.href.replace( /#/, "" ) === this.href){
			$(this).addClass('active');
			$(this).closest('ul').show();
			$(this).parents('.tree').addClass('open');
		}
	});
});