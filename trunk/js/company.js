
function ClearMulti(id) {
	multi = el(id);
	for(i=0; i < multi.options.length; i++) {
		multi.options[i].selected = '';
	}
}

function SelectMulti(id, v1, v2) {
	ClearMulti(id);
	
	multi = el(id);
	for(i = v1; i < v2; i++) {
		multi.options[i].selected = 'selected';
	}
	
}