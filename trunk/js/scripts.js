$(document).ready(function(){
	

});

function show_hide(el)
{
	if($('#'+el).css('display')=='none')
		$('#'+el).slideDown();
	else
		$('#'+el).fadeOut();
	
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


