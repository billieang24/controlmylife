jQuery(function($){
	var store = '';
	$('a.a-day').click(function(){
		if($(this).parent().next().attr('class')!=$(store).attr('class'))
			$(store).hide(500);
		$(this).parent().next().toggle(500);
		store = $(this).parent().next();
	});
});