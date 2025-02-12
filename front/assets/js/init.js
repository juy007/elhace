jQuery(document).ready(function(){"use strict";
	tokyo_tm_menu();
	/*tokyo_tm_modalbox_news();*/
	tokyo_tm_modalbox_about();
	tokyo_tm_modalbox_portfolio();
	tokyo_tm_my_progress();
	tokyo_tm_mycounter();
	tokyo_tm_projects();
	tokyo_tm_portfolio();
	tokyo_tm_cursor();
	tokyo_tm_imgtosvg();
	tokyo_tm_popup();
	tokyo_tm_data_images();
	tokyo_tm_contact_form();
	tokyo_tm_owl_carousel();
	jQuery(window).load('body',function(){tokyo_tm_my_load();});});


function tokyo_tm_menu(){"use strict";var list=jQuery('.tokyo_tm_all_wrap .leftpart .menu ul li,.tokyo_tm_mobile_menu .menu ul li');
var vContent=jQuery('.tokyo_tm_all_wrap');
var vSection=jQuery('.tokyo_tm_section');
list.on('click',function(){
	var element=jQuery(this);
	var myHref=element.find('a').attr('href');
	if(!element.hasClass('active')){list.removeClass('active');
	element.addClass('active');
	vSection.removeClass('active');
	vContent.find(myHref).addClass('active').animate({scrollTop:0});}});
}


function tokyo_tm_modalbox_news(){"use strict";
var modalBox=jQuery('.tokyo_tm_modalbox');
var list=jQuery('.tokyo_tm_news ul li');
var closePopup=modalBox.find('.close');
list.each(function(){var element=jQuery(this);
var details=element.find('.list_inner').html();
var buttons=element.find('.details .title a,.tokyo_tm_full_link,.tokyo_tm_read_more a');
var mainImage=element.find('.main');
var imgData=mainImage.data('img-url');
var title=element.find('.title');
var titleHref=element.find('.title a').html();buttons.on('click',function(){jQuery('body').addClass('modal');
modalBox.addClass('opened');modalBox.find('.description_wrap').html(details);
mainImage=modalBox.find('.main');
mainImage.css({backgroundImage:'url('+imgData+')'});
title=modalBox.find('.title');
title.html(titleHref);
tokyo_tm_imgtosvg();
return false;});});
closePopup.on('click',function(){modalBox.removeClass('opened');
modalBox.find('.description_wrap').html('');
jQuery('body').removeClass('modal');return false;});}

function tokyo_tm_modalbox_about(){"use strict";var modalBox=jQuery('.tokyo_tm_modalbox_about');var opener=jQuery('.tokyo_tm_about .tokyo_tm_button a');var closer=modalBox.find('.close');opener.on('click',function(){modalBox.addClass('opened');tokyo_tm_my_progress();tokyo_tm_mycounter();return false;});closer.on('click',function(){modalBox.removeClass('opened');return false;});}
function tokyo_tm_modalbox_portfolio(){"use strict";var modalBox=jQuery('.tokyo_tm_modalbox');var button=jQuery('.tokyo_tm_portfolio .popup_info');button.on('click',function(){var element=jQuery(this);var parent=element.closest('li');var details=parent.find('.details_all_wrap').html();var title=parent.find('.entry').data('title');var category=parent.find('.entry').data('category');modalBox.addClass('opened');modalBox.find('.description_wrap').html(details);modalBox.find('.top_image').html(parent.find('.popup_info').html());modalBox.find('.portfolio_main_title').html('<h3>'+title+'</h3>'+'<span>'+category+'</span>');tokyo_tm_popup();});}
function tokyo_tm_projects(){"use strict";jQuery('.tokyo_tm_portfolio_animation_wrap').each(function(){jQuery(this).on('mouseenter',function(){if(jQuery(this).data('title')){jQuery('.tokyo_tm_portfolio_titles').html(jQuery(this).data('title')+'<span class="work__cat">'+jQuery(this).data('category')+'</span>');jQuery('.tokyo_tm_portfolio_titles').addClass('visible');}
jQuery(document).on('mousemove',function(e){jQuery('.tokyo_tm_portfolio_titles').css({left:e.clientX-10,top:e.clientY+25});});}).on('mouseleave',function(){jQuery('.tokyo_tm_portfolio_titles').removeClass('visible');});});}
function tokyo_tm_portfolio(){"use strict";if(jQuery().isotope){var list=jQuery('.tokyo_tm_portfolio .portfolio_list');var filter=jQuery('.tokyo_tm_portfolio .portfolio_filter ul');if(filter.length){filter.find('a').on('click',function(){var selector=jQuery(this).attr('data-filter');list.isotope({filter:selector,animationOptions:{duration:750,easing:'linear',queue:false}});return false;});filter.find('a').on('click',function(){filter.find('a').removeClass('current');jQuery(this).addClass('current');return false;});}}}
function tokyo_tm_my_progress(){"use strict";jQuery('.tokyo_progress .bar_in').css({width:'0px'});jQuery('.tokyo_progress .bar').removeClass('open');function tdProgress(container){container.find('.progress_inner').each(function(){var progress=jQuery(this);var pValue=parseInt(progress.data('value'),10);var pColor=progress.data('color');var pBarWrap=progress.find('.bar');var pBar=progress.find('.bar_in');pBar.css({width:pValue+'%',backgroundColor:pColor});setTimeout(function(){pBarWrap.addClass('open');});});}
jQuery('.tokyo_progress').each(function(){var pWrap=jQuery(this);pWrap.waypoint({handler:function(){tdProgress(pWrap);},offset:'90%'});});}
function tokyo_tm_preloader(){"use strict";var isMobile=/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)?true:false;var preloader=$('#preloader');if(!isMobile){setTimeout(function(){preloader.addClass('preloaded');},800);setTimeout(function(){preloader.remove();},2000);}else{preloader.remove();}}
function tokyo_tm_mycounter(){"use strict";jQuery('.tokyo_tm_counter').removeClass('stop');jQuery('.tokyo_tm_counter').each(function(){var el=jQuery(this);el.waypoint({handler:function(){if(!el.hasClass('stop')){el.addClass('stop').countTo({refreshInterval:50,formatter:function(value,options){return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g,',');},});}},offset:'95%'});});}
function tokyo_tm_my_load(){"use strict";var speed=500;setTimeout(function(){tokyo_tm_preloader();},speed);}
function tokyo_tm_cursor(){"use strict";var myCursor=jQuery('.mouse-cursor');if(myCursor.length){if($("body")){const e=document.querySelector(".cursor-inner"),t=document.querySelector(".cursor-outer");let n,i=0,o=!1;window.onmousemove=function(s){o||(t.style.transform="translate("+s.clientX+"px, "+s.clientY+"px)"),e.style.transform="translate("+s.clientX+"px, "+s.clientY+"px)",n=s.clientY,i=s.clientX},$("body").on("mouseenter","a, .cursor-pointer",function(){e.classList.add("cursor-hover"),t.classList.add("cursor-hover")}),$("body").on("mouseleave","a, .cursor-pointer",function(){$(this).is("a")&&$(this).closest(".cursor-pointer").length||(e.classList.remove("cursor-hover"),t.classList.remove("cursor-hover"))}),e.style.visibility="visible",t.style.visibility="visible"}}};function tokyo_tm_imgtosvg(){"use strict";jQuery('img.html').each(function(){var jQueryimg=jQuery(this);var imgClass=jQueryimg.attr('class');var imgURL=jQueryimg.attr('src');jQuery.get(imgURL,function(data){var jQuerysvg=jQuery(data).find('svg');if(typeof imgClass!=='undefined'){jQuerysvg=jQuerysvg.attr('class',imgClass+' replaced-svg');}
jQuerysvg=jQuerysvg.removeAttr('xmlns:a');jQueryimg.replaceWith(jQuerysvg);},'xml');});}
function tokyo_tm_popup(){"use strict";jQuery('.gallery_zoom').each(function(){jQuery(this).magnificPopup({delegate:'a.zoom',type:'image',gallery:{enabled:true},removalDelay:300,mainClass:'mfp-fade'});});jQuery('.popup-youtube, .popup-vimeo').each(function(){jQuery(this).magnificPopup({disableOn:700,type:'iframe',mainClass:'mfp-fade',removalDelay:160,preloader:false,fixedContentPos:false});});jQuery('.soundcloude_link').magnificPopup({type:'image',gallery:{enabled:true,},});}
function tokyo_tm_data_images(){"use strict";var data=jQuery('*[data-img-url]');data.each(function(){var element=jQuery(this);var url=element.data('img-url');element.css({backgroundImage:'url('+url+')'});});}
function tokyo_tm_contact_form(){"use strict";jQuery(".contact_form #send_message").on('click',function(){var name=jQuery(".contact_form #name").val();var email=jQuery(".contact_form #email").val();var message=jQuery(".contact_form #message").val();var subject=jQuery(".contact_form #subject").val();var success=jQuery(".contact_form .returnmessage").data('success');jQuery(".contact_form .returnmessage").empty();if(name===''||email===''||message===''){jQuery('div.empty_notice').slideDown(500).delay(2000).slideUp(500);}
else{jQuery.post("modal/contact.html",{ajax_name:name,ajax_email:email,ajax_message:message,ajax_subject:subject},function(data){jQuery(".contact_form .returnmessage").append(data);if(jQuery(".contact_form .returnmessage span.contact_error").length){jQuery(".contact_form .returnmessage").slideDown(500).delay(2000).slideUp(500);}else{jQuery(".contact_form .returnmessage").append("<span class='contact_success'>"+success+"</span>");jQuery(".contact_form .returnmessage").slideDown(500).delay(4000).slideUp(500);}
if(data===""){jQuery("#contact_form")[0].reset();}});}
return false;});}
function tokyo_tm_owl_carousel(){"use strict";var carousel=jQuery('.partners .owl-carousel');var rtlMode=false;if(jQuery('body').hasClass('rtl')){rtlMode='true';}
carousel.owlCarousel({loop:true,items:4,lazyLoad:false,margin:50,autoplay:true,autoplayTimeout:7000,rtl:rtlMode,dots:true,nav:false,navSpeed:true,responsive:{0:{items:1},480:{items:2},768:{items:3},1040:{items:3},1200:{items:3},1600:{items:4},1920:{items:4}}});tokyo_tm_imgtosvg();}