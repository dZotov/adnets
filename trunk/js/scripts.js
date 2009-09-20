$(document).ready(function(){

	$("#hide").click(function(){
		if($(this).attr("checked"))
			$("#login_in_top").attr("disabled","disabled");
		else
			$("#login_in_top").attr("disabled","");
	});
	
	$("div.color_block_s").each(
		function()
		{
			var divid=$(this).attr('id');
			var color=$("#field_"+divid).attr('value');
			$(this).css("background-color", color);
		}
	);

	
});


function colorselector(id ,defcolor)
{
	$('#'+id).ColorPicker({
		color: '#'+defcolor,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#'+id).css('background', '#' + hex);
			$('#field_'+id).attr('value', '#' + hex);
	}

	});
}

function show_abs()
{
	$("#show_abs").css("height",window.innerHeight+"px");
	$("#show_abs").css("width","100%");
	$("#show_abs").show();
}

function show_error(message)
{
	$("#show_error").empty(message);
	$("#show_error").append(message);
	$("#show_error").show();
	setTimeout("$('#show_error').fadeOut('slow')",2000);
		
}

function add_playdround()
{
	var error='';
	var title=$("#title").attr('value');
	var url=$("#url").attr('value');
	var cat=$("#cat").attr('value');
	var ignore=$("#ignore[]").attr('value');
	
	alert(ignore);
	var id=$("#pl_id").attr('value');
	var adid=$("#adid").attr('value');
	if(!title)
		error +="Нет названия площадки<br />";
	if(!url)
		error +="Введите URL площадки<br />";
	if(cat==0)
		error +="Выберите категорию площадки<br />";
	if(error!='')
		show_error(error);
	else
	{
		$.ajax({
			type:"POST",
			url: 'ajax.php',
			data:"title="+title+"&url="+url+"&cat="+cat+"&ignore="+ignore+"&act=add_pl"+"&id="+id+"&adid="+adid,
			
			beforeSend: function(){
				$("#btn").hide();
				$("#loader").show();
			},
			
			success: function(data){
				$("#loader").hide();
				if(data=='ok')
				{
					redirect('playgrounds.php');
				}
				else
				{
					$("#btn").show();
					show_error(data);					
				}
			},
			error: function() {return;}
	
		});
	}
}

function registration()
{
	var email =$("#email").attr('value');
	var password =$("#password").attr('value');
	var re_password =$("#repeat_password").attr('value');
	var wmr =$("#wmr").attr('value');
	var owner_id =$("#owner").attr('value');
	var flag=1;
	if(!email.match("/^[0-9A-Za-z\._-]+@([0-9a-z\._-]+\.)+[a-z]{2,4}$/i"))
	{
			flag=0;
			error_show("email_error","Заполните поле корректно <br />(пример: test@example.com)");
	}
	else
		$("#email_error").empty();
	
	if((!password || !re_password) || password!=re_password)
	{
			flag=0;
			error_show("password_error","Заполните поля верно");
			error_show("repeat_password_error","Пароли не совпадают");
	}
	else
	{
		$("#password_error").empty();
		$("#repeat_password_error").empty();
	}
	
	if(!wmr.match("/^R[0-9]$/i"))
	{
			flag=0;
			error_show("wmr_error","Введите Ваш WMR - кошелек <br />(пример: R123456789012)");
	}
	else
		$("#wmr_error").empty();
	if(flag)
	{
		error_show("email_error",'');
		error_show("password_error","");
		error_show("repeat_password_error","");
		error_show("wmr_error","");
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
					error_show("reg_error","Ощибка регистрации. Пожалуйста повторите попытку или обратитесь в слубу поддержки");					
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


