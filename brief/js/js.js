//作者:kailee
//时间:2013.09
//主题:brief
//网址:www.kai-lee.com
$(function(){	
	jQuery(document).ready(function($){
	 //===================================存档页面 jQ伸缩
	         $('#al_expand_collapse,#archives span.al_mon').css({cursor:"s-resize"});
	         $('#archives span.al_mon').each(function(){
	             var num=$(this).next().children('li').size();
	             var text=$(this).text();
	             $(this).html(text+'<em> ( '+num+' 篇文章 )</em>');
	         });
	         var $al_post_list=$('#archives ul .al_post_list'),
	             $al_post_list_f=$('#archives ul .al_post_list:first');
	         $al_post_list.hide(1,function(){
	             $al_post_list_f.show();
	         });
	         $('#archives span.al_mon').click(function(){
	             $(this).next().slideToggle(400);
	             return false;
	         });
	         $('#al_expand_collapse').click(function(event) {
	         	/* Act on the event */
	         	if ($al_post_list.is(":visible")) {
	         		$al_post_list.hide();
	         	}else{
	         		$al_post_list.show();
	         	}
	         });
	 });
	/*头部*/
	$(window).load( function() {
		// var boh = $('body').height();
		var doh = $(document).height();
		$('#top-header').height(doh);
	});
	/*MENU按钮*/
	$('#menu-button').click(function() {
		/* Act on the event */
		if ($(this).hasClass('open')) {
			$(".menu").slideUp('600',function(){
				$(this).removeAttr('style');
			});
			$(this).removeClass('open');
		}else{
			$(".menu").slideDown('600', function() {
				
			});
			$(this).addClass('open');
		}		
	});
	/*搜索框*/
	$('html').on('click',function(){

		//search-submit-toggle
		if ( $('.search-input').val() == '' ) {

			$('.search-input').animate({opacity:'0',right:'100%'}, 200,function(){
				$('.submit-toggle').css('z-index','3');
				$(this).removeAttr('style');
				$('.search-submit').hide();
			});

		}
	});
	//search-submit-toggle
	$('.submit-toggle').click(function(event) {
		event.stopPropagation();
		$('.search-input').show().animate({opacity:'1',right:'0'}, 200).focus();
		$(this).css('z-index','-1');
		$('.search-submit').show();
	});
	$('.search-form').click(function(event) {
		event.stopPropagation();
	});
	/*回到顶部*/
	$('a[href="#"]').click(function($e) {
		/* Act on the event */
		$e.preventDefault();
	});
	$('.back-to-top').click(function() {
		/* Act on the event */
		$('html,body').animate({scrollTop:'0'}, 200);
	});
	$(window).scroll(function(){
		var scrollH = document.documentElement.scrollTop + document.body.scrollTop;
		if( scrollH > 200 ){
			$('.back-to-top').fadeIn(200);
		}else{
			$('.back-to-top').fadeOut(200);
		}
	});
});