jQuery(document).ready(function ($) {

	var $toggle = $('.nav-toggle');
	var $menu = $('.nav-menu');

	$toggle.click(function() {
		$(this).toggleClass('is-active');
		$menu.toggleClass('is-active');
	});

	var form = $('#ajax-contact');

	// Get the messages div.
	var formMessages = $('#form-messages');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();



		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('is-danger');
			$(formMessages).addClass('is-success');

			// Set the message text.
			$(formMessages).text('Thank You! Your message has been sent.');

			// Clear the form.
			$('#name, #email, #message').val('');
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('is-success');
			$(formMessages).addClass('is-danger');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).html('Oops! An error occured and your message could not be sent.');
			}
		});

	});

	$('.woocommerce-account').find('.woocommerce').addClass('columns');

	var $ess = $.now();
	if(Cookies.get('BnB')){
		$('#cookieInfo').hide();
		console.log('You already have some The BednBreakfasttt cookies set. You can change your broswer preferences to stop them if you want.');
	} else {
		Cookies.set('BnB', $ess, {expires: 365, path: '/'});
		$('body').append('<div id="cookieInfo">This site uses cookies in order to function properly. By continuing to browse, you agree that we can save them on your device.</div>');
		$('#cookieInfo').show().delay(10000).animate({bottom: '-500px'}, 5000).fadeOut(1500);
	}

	$('div.addon').hide();

	$('form .product-addon .addon-title').each(function() {
		$(this).click(function() {
			if ($(this).hasClass('openQ')) {
				$(this).removeClass('openQ');
				$(this).nextAll('div.addon').slideUp();
				$(this).children('.fa-minus').replaceWith('<i class="fa fa-plus"></i>');
			} else {
				$('.product-addon .addon-title').removeClass('openQ');
				$('.product-addon div.addon').slideUp();
				$('form .product-addon .addon-title').children('.fa-minus').replaceWith('<i class="fa fa-plus"></i>');
				$(this).nextAll('div.addon').slideDown();
				$(this).addClass('openQ');
				$(this).children('.fa-plus').replaceWith('<i class="fa fa-minus"></i>');
			}
		});
	});

	$('.product-addon-choose-your-bnb-bundle-2-sides .addon-checkbox').change(function () {
		var maxAllowed = 2;
		if ($('.product-addon-choose-your-bnb-bundle-2-sides .addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
	});

	$('.product-addon-choose-your-bnb-bundle-1-side .addon-checkbox').change(function () {
		var maxAllowed = 1;
		if ($('.product-addon-choose-your-bnb-bundle-1-side .addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
	});

	$('.product-addon-pancake-topping .addon-checkbox').change(function () {
		var maxAllowed = 1;
		if ($('.product-addon-pancake-topping .addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
	});

	$('.product-addon-meat-options .addon-checkbox').change(function () {
		var maxAllowed = 2;
		if ($('.product-addon-meat-options .addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
	});

	$('.product-addon-non-meat-options .addon-checkbox').change(function () {
		var maxAllowed = 4;
		if ($('.product-addon-non-meat-options .addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
	});

	$('.product-addon-roasttt-bundle-sides .addon-checkbox').change(function () {
		var maxAllowed = 4;
		if ($('.product-addon-roasttt-bundle-sides .addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
		if ($('.product-addon-roasttt-bundle-sides .addon-checkbox:checked').length >= 1) {
			$('.product-addon-roasttt-bundle-premium-sides').slideUp();
		} else {
			$('.product-addon-roasttt-bundle-premium-sides').slideDown();
		}
	});

	$('.product-addon-roasttt-bundle-premium-sides .addon-checkbox').change(function () {
		var maxAllowed = 2;
		if ($('.product-addon-roasttt-bundle-premium-sides .addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
		if ($('.product-addon-roasttt-bundle-premium-sides .addon-checkbox:checked').length >= 1) {
			$('.product-addon-roasttt-bundle-sides').slideUp();
		} else {
			$('.product-addon-roasttt-bundle-sides').slideDown();
		}
	});

});

function element_exists(id){
	if($(id).length > 0){
		return true;
	}
	return false;
}

/*!
 * JavaScript Cookie v2.1.0
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
(function(factory){if(typeof define==='function'&&define.amd){define(factory);}else if(typeof exports==='object'){module.exports=factory();}else{var _OldCookies=window.Cookies;var api=window.Cookies=factory();api.noConflict=function(){window.Cookies=_OldCookies;return api;};}}(function(){function extend(){var i=0;var result={};for(;i<arguments.length;i++){var attributes=arguments[i];for(var key in attributes){result[key]=attributes[key];}}
return result;}
function init(converter){function api(key,value,attributes){var result;if(arguments.length>1){attributes=extend({path:'/'},api.defaults,attributes);if(typeof attributes.expires==='number'){var expires=new Date();expires.setMilliseconds(expires.getMilliseconds()+attributes.expires*864e+5);attributes.expires=expires;}
try{result=JSON.stringify(value);if(/^[\{\[]/.test(result)){value=result;}}catch(e){}
if(!converter.write){value=encodeURIComponent(String(value)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent);}else{value=converter.write(value,key);}
key=encodeURIComponent(String(key));key=key.replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent);key=key.replace(/[\(\)]/g,escape);return(document.cookie=[key,'=',value,attributes.expires&&'; expires='+attributes.expires.toUTCString(),attributes.path&&'; path='+attributes.path,attributes.domain&&'; domain='+attributes.domain,attributes.secure?'; secure':''].join(''));}
if(!key){result={};}
var cookies=document.cookie?document.cookie.split('; '):[];var rdecode=/(%[0-9A-Z]{2})+/g;var i=0;for(;i<cookies.length;i++){var parts=cookies[i].split('=');var name=parts[0].replace(rdecode,decodeURIComponent);var cookie=parts.slice(1).join('=');if(cookie.charAt(0)==='"'){cookie=cookie.slice(1,-1);}
try{cookie=converter.read?converter.read(cookie,name):converter(cookie,name)||cookie.replace(rdecode,decodeURIComponent);if(this.json){try{cookie=JSON.parse(cookie);}catch(e){}}
if(key===name){result=cookie;break;}
if(!key){result[name]=cookie;}}catch(e){}}
return result;}
api.get=api.set=api;api.getJSON=function(){return api.apply({json:true},[].slice.call(arguments));};api.defaults={};api.remove=function(key,attributes){api(key,'',extend(attributes,{expires:-1}));};api.withConverter=init;return api;}
return init(function(){});}));