
function el(id) {
	return document.getElementById(id)
}

function show(id) {
    document.getElementById(id).style.display='';
}    

function hide(id) {
    document.getElementById(id).style.display='none';
}    

function show_hide(id) {
    var sec =document.getElementById(id);
	if (sec == null) return;
	if (sec.style.display == '') {   
        sec.style.display = 'none';
   	} else {
        sec.style.display = '';
	}
}

function redirect(url) {
	window.location = url;
	return false;
}

function if_confirm(url) {
	if(confirm(text_are_you_sure))
		redirect(url);
}

function select_all_items(form) {
	if(!form) form = 'itemlist'; 
	f = document.forms[form];
	els = f.elements;
	for (e=0; e<els.length; e++) {
		if (els[e].name && els[e].name.substr(0,5)=='item_') els[e].checked='checked';
	}
}

function clear_all_items(form) {
	if(!form) form = 'itemlist'; 
	
	f = document.forms[form];
	els = f.elements;
	for (e=0; e<els.length; e++) {
		if (els[e].name && els[e].name.substr(0,5)=='item_') els[e].checked=null;
	}
}

function select_clear(form) {
	if(!form) form = 'itemlist'; 
	f = document.forms[form];
	els = f.elements;
	for (e=0; e<els.length; e++) 
		if (els[e].name && els[e].name.substr(0,5)=='item_') 
			if(!els[e].checked)
				return select_all_items(form);
	clear_all_items(form);
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
		if (!confirm(text_are_you_sure)) return;
	
	f.action = target;
	f.mode.value = mode;
	f.submit();
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

function Submit(form) {
	f = document.forms[form];
	f.submit();
}

function Locale(lang) {
	switch(lang) {
		case 'en':
			document.cookie = "language=en";
			break;
		case 'ru':
			document.cookie = "language=ru";
			break;	
		default: document.cookie = "language=en";
	}
	window.location.reload();
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
