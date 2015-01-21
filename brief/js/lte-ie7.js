/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-home' : '&#xe000;',
			'icon-folder-open' : '&#xe005;',
			'icon-newspaper' : '&#xe002;',
			'icon-images' : '&#xe006;',
			'icon-headphones' : '&#xe001;',
			'icon-film' : '&#xe003;',
			'icon-location' : '&#xe004;',
			'icon-search' : '&#xe008;',
			'icon-list' : '&#xe009;',
			'icon-menu' : '&#xe00a;',
			'icon-eye' : '&#xe00b;',
			'icon-file-xml' : '&#xe00c;',
			'icon-feed' : '&#xe014;',
			'icon-link' : '&#xe017;',
			'icon-arrow-up' : '&#xe015;',
			'icon-arrow-down' : '&#xe016;',
			'icon-arrow-right' : '&#xe018;',
			'icon-arrow-left' : '&#xe019;',
			'icon-quotes-left' : '&#xe01c;',
			'icon-heart' : '&#xe01d;',
			'icon-mail' : '&#xe01e;',
			'icon-file-css' : '&#xe00d;',
			'icon-undo' : '&#xe00e;',
			'icon-redo' : '&#xe00f;',
			'icon-clock' : '&#xe010;',
			'icon-bubble' : '&#xe011;',
			'icon-user' : '&#xe01a;',
			'icon-thumbs-up' : '&#xe007;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};