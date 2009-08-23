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

function tiny_init()
{
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

}

