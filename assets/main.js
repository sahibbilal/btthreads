$(function(){mq_red='(min-width: 1200px)';mq_orange='(min-width: 980px) and (max-width: 1199px)';mq_yellow='(min-width: 768px) and (max-width: 979px)';mq_green='(max-width: 767px)';mq_blue='(max-width: 480px)';forms=$('form');header=$('header');HomeCarousel=$('#HomeCarousel')



checkMQs();checkFeatures();resetMenuEvents();});$(window).load(function(){TweenMax.to(window,1,{scrollTo:0,ease:Linear.easeNone});$('.loader').fadeOut();new WOW().init();if(HomeCarousel.length){HomeCarouselInit();}})



$(window).resize(function(){waitForFinalEvent(function(){sizeOrientationChange();},500,'main resize');resetMenuEvents();if(window.innerHeight==screen.height){$('.fullscreen').addClass("active");};});if(!window.addEventListener){window.attachEvent('orientationchange',sizeOrientationChange);}else{window.addEventListener('orientationchange',sizeOrientationChange,false);}



window.onscroll=function(){myFunction()};function myFunction(){if(document.body.scrollTop>50||document.documentElement.scrollTop>50){$('#HomeCarousel.carousel').carousel('pause');}else{$('.carousel').carousel('cycle');}}



function initNavigation(){}



function sizeOrientationChange(){checkMQs();}



function checkMQs(){if(Modernizr.mq('only all')){mq_red_check=Modernizr.mq(mq_red);mq_orange_check=Modernizr.mq(mq_orange);mq_yellow_check=Modernizr.mq(mq_yellow);mq_green_check=Modernizr.mq(mq_green);mq_blue_check=Modernizr.mq(mq_blue);}else{mq_red_check=false;mq_orange_check=true;mq_yellow_check=false;mq_green_check=false;mq_blue_check=false;}}



function checkFeatures(){touchEnabled=Modernizr.touch;if(touchEnabled){$('html, body').removeClass('no-touch').addClass('touch-mod');}



formPlaceholders=Modernizr.input.placeholder;boxShadows=Modernizr.boxshadow;isIE7=$('html').hasClass('is-ie7');isIE8=$('html').hasClass('is-ie8');if(forms.length){}}



var waitForFinalEvent=(function(){var timers={};return function(callback,ms,uniqueId){if(!uniqueId){uniqueId="Don't call this twice without a uniqueId";}



if(timers[uniqueId]){clearTimeout(timers[uniqueId]);}



timers[uniqueId]=setTimeout(callback,ms);};})();function setLocation(url){}



function HomeCarouselInit(){$('#HomeCarousel').addClass('carousel carousel-fade');$('.carousel').carousel('cycle');var totalItems=$('.carousel-item').length;var currentIndex=$('.carousel-item.active').index()+1;$('.slide-curr').html(currentIndex)



$('.slide-count').html(totalItems)



$('#HomeCarousel').on('slid.bs.carousel',function(){currentIndex=$('.carousel-item.active').index()+1;$('.slide-curr').html(currentIndex)



$('.slide-count').html(totalItems)});var ScrollCount=$(window).scrollTop();var ScrollLeft=$(window).scrollTop();var ScrollPos=$('#HomeCarousel .active .banner-text').height()+100;var ScrollEnable=$('#HomeCarousel .active .banner-text').height()+$('header').height()+15;var ScrollPosActive=$('#HomeCarousel .active .banner-text').height()-180;};function adjustMenu(){ww=document.body.clientWidth;if(ww<767){$(".toggleMenu").css("display","inline-block");if(!$(".toggleMenu").hasClass("active")){$(".nav").hide();}



else{$(".nav").show();}



$(".nav li").unbind('mouseenter mouseleave');}



else if(ww>=767){$(".toggleMenu").css("display","none");$(".nav").show();$(".nav li").removeClass("navhover");$(".nav li a").bind('click');$(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave touchstart',function(){$(this).toggleClass('navhover');});}};function menuset(){var ww2=document.body.clientWidth;if(ww2<767){$(".toggleMenu").toggleClass("active");$(this).toggleClass("active");$(".nav").toggle();}};$("#MobileMenu").click(function(){if($(this).hasClass('open')){$("#megamenu").stop().animate({"height":"0","opacity":1},500);}else{$("#megamenu").stop().animate({"height":"65vh","opacity":1},500);}



$('header').toggleClass('menu-open')



$(this).toggleClass('open');});$("#MobileMenu.open").click(function(){$("#megamenu").stop().animate({"height":"0","opacity":0},300);});$(".nav li a").each(function(){if($(this).next().length>0){$(this).addClass("parent");};})



$(".toggleMenu").click(function(e){e.preventDefault();$(this).toggleClass("active");$(".nav").toggle();});$(window).scroll(function(){if($(window).scrollTop()>=70){$('header').addClass('header-white');}else{$('header').removeClass('header-white');}



didScroll=true;if($(window).scrollTop()>=200){$('#HomeCarousel').addClass('scrolled')}else{$('#HomeCarousel').removeClass('scrolled')}});var didScroll;var lastScrollTop=0;var delta=5;var navbarHeight=$('header').outerHeight();setInterval(function(){if(didScroll){hasScrolled();didScroll=false;}},250);function hasScrolled(){var st=$(this).scrollTop();if(Math.abs(lastScrollTop-st)<=delta)



return;if(st>lastScrollTop&&st>navbarHeight){$('header').removeClass('nav-down').addClass('nav-up');}else{if(st+$(window).height()<$(document).height()){$('header').removeClass('nav-up').addClass('nav-down');}}



lastScrollTop=st;}



$.fn.isInViewport=function(){var elementTop=$(this).offset().top;var elementBottom=elementTop+$(this).outerHeight();var viewportTop=$(window).scrollTop();var viewportBottom=viewportTop+$(window).height();return elementBottom>viewportTop&&elementTop<viewportBottom;};if($('.cust-tabs').length){$('.cust-tabs').each(function(){var thisElem=$(this);thisElem.find('.tab_cont').hide();var thisElemCont=thisElem.find('.tab-sect').children()



thisElemCont.hide();var tabList=thisElem.find(".tab-img").children();thisElem.find('ul.tabs-nav li').click(function(index){var activeTab=$(this).index();if(!$(this).find('a').hasClass('active')){thisElem.find('ul.tabs-nav li a').removeClass('active');$(this).find('a').addClass('active');tabList.removeClass('active');thisElem.find('.tab_cont').stop().animate({"opacity":0},500,function(){thisElem.find('.tab_cont').stop().hide().css({"opacity":1});$($(thisElemCont)[activeTab]).stop().fadeIn();$(tabList[activeTab]).css({"opacity":1}).stop().fadeIn(function(){$(this).addClass('active');})})}}).first().trigger('click');})}



$(window).scroll(function(){if($(this).scrollTop()>=50){$('#return-to-top').fadeIn(200);}else{$('#return-to-top').fadeOut(200);}});$('#return-to-top').click(function(){$('body,html').animate({scrollTop:0},500);});if($('.videobox, .videobox-lg').length){$('.videobox, .videobox-lg').click(function(){var thisVid=$(this),thisVidUrl=thisVid.attr("data-src"),vidContainer=$('#video-overlay-wrapper');vidTarget=vidContainer.find('.video-wrapper').find('#plyr-div');vidContainer.addClass('active-overlay');vidTarget.empty();$('#video-overlay-wrapper .popup-close-btn').removeClass('disabled');vidTarget.append('<video crossorigin playsinline poster="'+thisVidUrl+'.jpg" id="FullVid" autoplay="" loop="" muted><source src="'+thisVidUrl+'.mp4" type="video/mp4" size="576" /><source src="'+



+thisVidUrl+'.webm" type="video/webm" size="576"/><a href="'+thisVidUrl+'.mp4" download>Download</a></video>');const player=new Plyr(document.querySelector('#FullVid'),{controls:["play-large","play","progress","current-time","mute","volume"]});});};$('#video-overlay-wrapper .popup-close-btn').click(function(){if(!$(this).hasClass('disabled')){vidContainer=$('#video-overlay-wrapper');vidTarget=vidContainer.find('.video-wrapper').find('#plyr-div');vidContainer.removeClass('active-overlay');setTimeout(function(){$(this).addClass('disabled');vidTarget.empty();},2000)}});if($('.plx-txt-hrz').length){$('.plx-txt-hrz').each(function(){plxTarget=$(this)



plxDuration=($(this).width())*2;plxTrigger=$(this).closest('.plx-target').offset().top-($(this).height()+100);plxAnim=-($(window).width())/2;var tween=TweenMax.fromTo(plxTarget,1,{left:300},{left:plxAnim,ease:Linear.easeNone});var controller1=new ScrollMagic.Controller();new ScrollMagic.Scene({duration:plxDuration,offset:plxTrigger}).setTween(tween).addTo(controller1);})}



if($('.teamlist').length){$('.teamlist li').one('inview',function(){$(this).addClass('inview')});}



if($('.count_sec').length){$('.count_sec li').one('inview',function(){$(this).addClass('inview')})}



if($('.num-counter').length){$('.num-counter .num').one('inview',function(){$(this).addClass('inview')})}



if($('.counter').length){$('.counter').each(function(){$(this).on('inview',function(event,isInView){if(isInView){var $this=$(this).find('.counter-value'),countTo=$this.attr('data-count');$({countNum:$this.text()}).animate({countNum:countTo},{duration:3000,easing:'swing',step:function(){$this.text(Math.floor(this.countNum));},complete:function(){$this.text(this.countNum);}})}else{}});})}



$(function(){var url=window.location.pathname;var activePage=url.substring(url.lastIndexOf('/')+1);$('body a').each(function(){var linkPage=this.href.substring(this.href.lastIndexOf('/')+1);if(activePage==linkPage){$(this).addClass('active-link');}});})



if($('.contactmap_cont').length){var usemap;function addMarkers(lat,long,content){var marker;marker=new google.maps.Marker({icon:"resources/images/bullet.png",position:new google.maps.LatLng(lat,long),draggable:false,map:usemap,currIndex:1});var iw=new InfoBubble({map:usemap,content:content,disableAutoPan:true,position:new google.maps.LatLng(lat,long),backgroundClassName:'maptooltip',shadowStyle:0,padding:0,borderRadius:1,borderWidth:1,borderColor:'transparent',arrowPosition:49,arrowStyle:0,disableAutoPan:true,backgroundColor:'transparent',arrowSize:0});iw.open(usemap,marker);google.maps.event.addListener(marker,'click',(function(e){iw.open(usemap,marker);}));}



var map;var i=0;function intializeMap(add,flag,lat,lang){var geocoder=new google.maps.Geocoder();geocoder.geocode({'address':add+"India"},function(results,status){if(status==google.maps.GeocoderStatus.OK){latit=results[0].geometry.location.lat();longi=results[0].geometry.location.lng();initialize(latit,longi);}});}



function initialize(latit,long){var styledMapType=new google.maps.StyledMapType([{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#303030"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#cccccc"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#dbdbdb"},{"lightness":19}]},{"featureType":"transit.line","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":17}]}],{name:'Styled Map'});var latLng=new google.maps.LatLng(latit,long);var mapZoom;mapZoom=18;usemap=new google.maps.Map(document.getElementById('map'),{zoom:mapZoom,scrollwheel:true,navigationControl:false,mapTypeControl:true,scaleControl:true,draggable:true,center:{lat:latit,lng:long},streetViewControl:false,mapTypeId:google.maps.MapTypeId.ROADMAP,mapTypeControlOptions:{mapTypeIds:[google.maps.MapTypeId.ROADMAP,google.maps.MapTypeId.HYBRID,'AYM'],}});usemap.mapTypes.set('styled_map',styledMapType);usemap.setMapTypeId('styled_map');var url='resources/js/map-info.php?xAction=CITYLISTFRONT';$.ajax({url:url,dataType:'json',success:function(data){var str='';len=data.length;for(i=0;i<len;i++){str=str.concat(data[i].addr);addMarkers(data[i].lat,data[i].long,data[i].addr);}}});}



$(document).ready(function(){$('.contactmap_sec .tab_links a').click(function(event){event.preventDefault();$('.contactmap_sec .tab_links a').removeClass('active')



var longi=$(this).attr("long");var lat=$(this).attr("lat");var city=$(this).text();var aUrl="resources/js/map-info.php?xAction=loadAddress&cityName="+city;console.log(city+'----'+aUrl);$(this).addClass('active')



$('div.sect-loader').css({"opacity":0}).stop().show().animate({"opacity":1},500,function(){$.ajax({type:'post',url:aUrl,dataType:'json',success:function(data){intializeMap(city,1,data.latit,data.longi);$('div.sect-loader').delay(1000).animate({"opacity":0},400,function(){$('div.sect-loader').stop().hide()})}});return false;});})});intializeMap("MUMBAI (HEAD OFFICE)",1,19.0025,72.828953);}



$('.vertTabz').easyResponsiveTabs();$('.teamlink').magnificPopup({type:'inline',removalDelay:300,callbacks:{beforeOpen:function(){this.st.mainClass=this.st.el.attr('data-effect');$('body').addClass('overflow-hd');},close:function(){$('body').removeClass('overflow-hd');}},midClick:true});$('.teamlink').click(function(){var ttTxt=$(this).find('h5').text();var postTxt=$(this).find('.designationtxt').text();var infoTxt=$(this).find('.selfinfo').html();var selfImg=$(this).find('figure').html();$('.popup-box').children('.leftpop').find('figure').html(selfImg);$('.popup-box').children('.rightpop').find('h4').text(ttTxt);$('.popup-box').children('.rightpop').find('h5').text(postTxt);$('.popup-box').children('.rightpop').find('.team-intro').html(infoTxt);});$(".investor-carousel").owlCarousel({items:4,dots:false,responsive:{0:{items:1,nav:true},700:{items:2,nav:true},1000:{items:4}}});$('.accordian-link').click(function(e){e.preventDefault();if(!$(this).hasClass('active')){$(this).siblings('.accordian-block').slideDown();$(this).addClass('active');$(this).parent('li').siblings('li').find('.accordian-block').slideUp();$(this).parent('li').siblings('li').find('.accordian-link').removeClass('active');}



else{$(this).parent('li').find('.accordian-block').slideUp();$(this).parent('li').find('.accordian-link').removeClass('active');}});$('.gallery-carousel').each(function(){var liItems=$(this);var Sum=0;if(liItems.children('li').length>=1){$(this).children('li').each(function(i,e){Sum+=$(e).outerWidth(true);});$(this).width(Sum+1);}});$(".gallery-wrapper").niceScroll({scrollspeed:120,mousescrollstep:120,background:"rgba(201,201,201,1)",cursorwidth:"9px",cursorfixedheight:155,railoffset:{top:60,left:50,right:50},touchbehavior:true,autohidemode:false,preventmultitouchscrolling:false,});let menuHovItem=$("header.primary-header .nav-item");let subMenuHovItem=$(".submenu li");let subMenuHovItemDet=$(".submenu li .rightlinkspanel");let megamenu=$("#megamenu");var megaMenuHeight;var resetMenuEvents=function(){$(".submenu li").unbind('mouseenter  hover')



console.log('resized')



if($(window).width()>767){menuHovItem.hover(function(){$(".submenu li").bind('mouseenter  hover')



let index=menuHovItem.index(this);megaMenuHeight='80vh';$(this).siblings('li').removeClass('active')



$(megamenu).stop().animate({"height":"40vh","opacity":1},500);$("#megamenu .menu_links > ul").hide()



$("#megamenu .menu_links > ul").eq(index).css({'display':'flex'})



$(this).addClass('active');},function(){resetTab();menuHovItem.removeClass('active');$(megamenu).stop().animate({"height":0,"opacity":1},500);});$(".submenu li").hover(function(){$(this).siblings('li').removeClass('active')



$(this).parent().find('.rightlinkspanel').hide()



$(this).find('.rightlinkspanel').css({'display':'flex'})



$(this).addClass('active');},function(){});$('.submenu > li:first-child').addClass('active')



$('.submenu > li:first-child .rightlinkspanel').css({'display':'flex'})}



else{$('.submenu > li:first-child').removeClass('active');$('.submenu > li:first-child .rightlinkspanel.tabsnav').css({'display':'none'})



$(".submenu li").click(function(){if($(this).hasClass('active')){$(".submenu li").removeClass('active')



$(this).parent().find('.rightlinkspanel').stop().slideUp()}



else{$(this).siblings('li').removeClass('active')



$(this).parent().find('.rightlinkspanel').stop().slideUp()



$(this).find('.rightlinkspanel').stop().slideDown();$(this).addClass('active');}})}}



$(megamenu).hover(function(){$(megamenu).stop().animate({"height":"40vh","opacity":1},500);},function(){menuHovItem.removeClass('active')



$("#megamenu").stop().animate({"height":"0","opacity":0},500);});$('.header-icons, #logo').hover(function(){menuHovItem.removeClass('active')



$("#megamenu").stop().animate({"height":"0","opacity":0},500);});$(".mob-primary-links").click(function(){if($(this).hasClass('open')){$(this).removeClass('open');$(this).next('ul').removeClass('active');$(this).next('ul').stop().slideUp();}



else{$(this).addClass('open');$(this).next('ul').addClass('active');$(this).next('ul').stop().slideDown();}});wrapper=$(".tabs");tabs=wrapper.find(".tab");tabToggle=wrapper.find(".tab-toggle");function openTab(){var content=$(this).parent().next(".content"),activeItems=wrapper.find(".active");if(!$(this).hasClass('active')){$(this).add(content).add(activeItems).toggleClass('active');wrapper.css('min-height',content.outerHeight());}};tabToggle.on('mouseover',openTab);function resetTab(){$('.tab, .tab-toggle, .content').removeClass('active');};$(document).ready(function(){$('#nav-icon1').click(function(){$(this).toggleClass('open');});});window.onscroll=function(){myFunction()};



var active_link=document.getElementsByClassName("active");var content=document.getElementsByClassName("content");active_link.onmouseover=function(){content.style.display="block";}



active_link.onmouseout=function(){content.style.display="none";}



$('.dropdown-menu a.dropdown-toggle').on('click',function(e){if(!$(this).next().hasClass('show')){$(this).parents('.dropdown-menu').first().find('.show').removeClass('show');}



var $subMenu=$(this).next('.dropdown-menu');$subMenu.toggleClass('show');$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown',function(e){$('.dropdown-submenu .show').removeClass('show');});return false;});function init(){var vidDefer=document.getElementsByTagName('iframe');for(var i=0;i<vidDefer.length;i++){if(vidDefer[i].getAttribute('data-src')){vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));}}}



window.onload=init();