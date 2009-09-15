$(document).ready(function(){

	$("#hide").click(function(){
		if($(this).attr("checked"))
			$("#login_in_top").attr("disabled","disabled");
		else
			$("#login_in_top").attr("disabled","");
	});
	
});

function show_error(message)
{
	$("#show_error").empty(message);
	$("#show_error").append(message);
	$("#show_error").show();
	setTimeout("$('#show_error').fadeOut('slow')",2000);
	
}

function registration()
{
	var email =$("#email").attr('value');
	var password =$("#password").attr('value');
	var re_password =$("#repeat_password").attr('value');
	var wmr =$("#wmr").attr('value');
	var owner_id =$("#owner").attr('value');
	var flag=1;
	if(!email)
	{
			flag=0;
			error_show("email_error","Введите email");
	}
	if((!password || !re_password) || password!=re_password)
	{
			flag=0;
			error_show("password_error","Заполните поля верно");
			error_show("repeat_password_error","Пароли не совпадают");
	}
	if(!wmr)
	{
			flag=0;
			error_show("wmr_error","Введите Ваш WMR - кошелек");
	}
	if(flag)
	{
		$.ajax({
			type:"POST",
			url: 'ajax.php',
			data:"email="+email+"&password="+password+"&wmr="+wmr+"&start="+$("#work_as").attr("value")+"&act=registration"+"&owner_id="+owner_id,
			
			beforeSend: function(){
				$("#registr").hide();
				$("#loader").show();
			},
			
			success: function(data){
				$("#loader").hide();
				if(data=='ok')
				{
					$('#reg').hide();
					$('#suc').show();
				}
				else
				{
					$("#registr").show();
					error_show("reg_error","Ощибка регистрации. Такой аккаунт уже зарегестрирован");					
				}
			},
			error: function() {return;}
	
		});
	}
	
}


function error_show(el,value)
{
	$("#"+el).empty();
	$("#"+el).append(value);
}

function show_hide(el)
{
	if($('#'+el).css('display')=='none')
		$('#'+el).slideDown();
	else
		$('#'+el).fadeOut();
	
}	
function Submit(form) {
	f = document.forms[form];
	f.submit();
}

function redirect(url) {
	window.location = url;
	return false;
}

function if_confirm(url) {
	if(confirm(text_are_you_sure))
		redirect(url);
}




function popup(link, width, height, resizable, scroll) {
    if (!window.focus) 
		return true;
	
	var href;
	if (typeof(link) == 'string')
   		href=link;
	else
   		href=link.href;
	if(!resizable) 
		resizable = 'no';
	
	if(!scroll) 
		scroll = 'no';

	window.open(href, '', 'width='+width+',height='+height+',scrollbars='+scroll+',resizable='+resizable+',alwaysRaised=yes');
}


function Bookmark(title, url) {
	if (window.sidebar) {
		window.sidebar.addPanel(title, url, "");
	} else if (window.external) { 
		window.external.AddFavorite(url, title);
	} else if (window.opera && window.print) { 
		var a = document.createElement('A');
		if (!a) return false; //IF Opera 6
		a.setAttribute('rel','sidebar');
		a.setAttribute('href',url);
		a.setAttribute('title',title);
		a.click();
	}
}


