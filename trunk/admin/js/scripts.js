$(document).ready(function(){
	$("#wmm").mouseover(function(){
		$("#w_menu").slideDown();
		$("#wmm").css("font-weight","bold");
		$("#recm").css("font-weight","");
		$("#r_menu").fadeOut();
	});
	$("#wmm").click(function(){
		$("#w_menu").fadeOut();
		$("#wmm").css("font-weight","");
	});
	
	$("#recm").mouseover(function(){
		$("#r_menu").slideDown();
		$("#recm").css("font-weight","bold");
		$("#wmm").css("font-weight","");
		$("#w_menu").fadeOut();
	});
	$("#recm").click(function(){
		$("#r_menu").fadeOut();
		$("#recm").css("font-weight","");
	});
});

function show_hide(el)
{
	if($('#'+el).css('display')=='none')
		$('#'+el).slideDown();
	else
		$('#'+el).fadeOut();
	
}

function el(id) {
	return document.getElementById(id)
}

function show(id) {
    document.getElementById(id).style.display='';
}    

function hide(id) {
    document.getElementById(id).style.display='none';
}    

function redirect(url) {
	window.location = url;
	return false;
}

function if_confirm(url) {
	if(confirm('Вы уверены?'))
		redirect(url);
}

function select_all_items(form, name, start, end) {
	if(!form) form = 'itemlist'; 
	f = document.forms[form];
	els = f.elements;
	for (e=0; e<els.length; e++) {
		if (els[e].name && els[e].name.substr(start,end)==name) els[e].checked='checked';
	}
}

function clear_all_items(form, name, start, end)  {
	if(!form) form = 'itemlist'; 
	
	f = document.forms[form];
	els = f.elements;
	for (e=0; e<els.length; e++) {
		if (els[e].name && els[e].name.substr(start, end)==name) els[e].checked=null;
	}
}

function select_cb(form, name, start, end)  {
	if(!form) form = 'itemlist'; 
	f = document.forms[form];
	els = f.elements;
	for (e=0; e<els.length; e++) 
		if (els[e].name && els[e].name.substr(start,end)==name) 
			if(!els[e].checked)
				return select_all_items(form, name, start, end);
	clear_all_items(form, name, start, end);
}

function SendItems(target, mode, form) {
	if(!form) form = 'itemlist';
 	f = document.forms[form];
	els = f.elements;
	sel = 0;
	
	for (e=0; e<els.length; e++) {
		if (els[e].name && els[e].name.substr(0,4)=='item' && els[e].checked) sel++;
	}
	
	if (!sel) {
		alert('Ни одного элемента не выбрано');
		return;
	}
	
	if(mode=='delete') 
		if (!confirm('Вы уверены?')) return;
	
	f.action = target;
	//f.mode.value = mode;
	f.submit();
}

function ShowWindow(link, width, height) {
    if (!window.focus) 
		return true;
	
	var href;
	if (typeof(link) == 'string')
   		href=link;
	else
   		href=link.href;

	resizable = 'yes';
	scroll = 'yes';

	window.open(href, '', 'width='+width+',height='+height+',scrollbars='+scroll+',resizable='+resizable+',alwaysRaised=yes');
}

function Submit(form) {
	f = document.forms[form];
	f.submit();
}

function DisableDate(name) {
	for(i = 0; i <= 2; i++) {
		f = el('__dropdown_'+name+'_'+i);
		f.disabled = true;
	}
}

function EnableDate(name) {
	for(i = 0; i <= 2; i++) {
		f = el('__dropdown_'+name+'_'+i);
		f.disabled = false;
	}
}

function EnableWeek(name) {
	f = el('__dropdown_'+name);
	f.disabled = false;
}

function DisableWeek(name) {
	f = el('__dropdown_'+name);
	f.disabled = true;
}

function SortDate() {
	DisableWeek('week'); 
	EnableDate('date_begin'); 
	EnableDate('date_end');
}

function SortWeek() {
	EnableWeek('week'); 
	DisableDate('date_begin'); 
	DisableDate('date_end');
}

function CheckDate(value, name) {
	if (value!=0) {
		DisableDate('date_begin');
		DisableDate('date_end');
	} else {
		EnableDate('date_begin');
		EnableDate('date_end');
	}		
		
}
