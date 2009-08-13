	
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


