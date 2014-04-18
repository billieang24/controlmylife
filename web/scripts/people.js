function upperClose()
{
	document.getElementById('upper-close').remove();
}
jQuery(function($) {
	$(document).on('click','.hangout-people',function(e){
		if($(this).parent().parent().attr('class')=='whole-people clearfix'){
			var x = $(this).parent().clone();
			x.children().last().html("Don't Hang Out");
			$("input[name='users']").attr('value',
				$("input[name='users']").attr('value')+
				$(this).attr('id')+
				',');
			$(this).parent().remove();
			$('.user-list').append(x);
		}
		else{
			var x = $(this).parent().clone();
			x.children().last().html("Let's Hang Out");
			$("input[name='users']").attr('value',
				$("input[name='users']").attr('value').replace(
				$(this).attr('id')+',',''));
			$(this).parent().remove();
			$('.whole-people').append(x);
		}
		sizeAdjust('.whole-people');
		sizeAdjust('.user-list');
	});
	$(document).ready(function(e){
		sizeAdjust('.whole-people');
	});
	$("select[name='date-range']").click(function(e){
		$(this).parent().submit();
	});
	$('.btn-next-people').click(function(e){
		$("input[name='users']").attr('value',
			$("input[name='users']").attr('value').substring(0,
				$("input[name='users']").attr('value').length-1));
	});
	function sizeAdjust(string){
		$(string).removeAttr('style');
		if($(string).height()>340){
			$(string).css({'height':'340','overflow-y':'auto'});
		}
	}
	$(document).ready(function(){
		if($('.whole-people').children().length==0)
			$('.whole-people').append('<h4>No one is free on this week.</h4>');
		if($('.user-list').children().length==0)
			$('.user-list').append('<h4>No one is free on this week.</h4>');	
	});
	$(document).on('click','.hangout-people',function(e){
		if($('.whole-people').children().length==0)
			$('.whole-people').append('<h4>No one is free on this week.</h4>');
		else
			$('.whole-people').find('h4').remove();
		if($('.user-list').children().length==0)
			$('.user-list').append('<h4>No one is free on this week.</h4>');
		else
			$('.user-list').find('h4').remove();
	});
});