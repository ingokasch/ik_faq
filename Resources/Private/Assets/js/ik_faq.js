function toggle(el) {
	var openClass			= 'is-open';
	
	if(!hasClass(el, openClass)) {
		addClass(el, openClass);
	}
	else {
		removeClass(el, openClass);
	}
}

function hasClass(ele, cls) {
	return ele.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
}

function addClass(ele,cls) {
  if (!hasClass(ele,cls)) ele.className += " "+cls;
}

function removeClass(ele,cls) {
  if (hasClass(ele,cls)) {
      var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
      ele.className=ele.className.replace(reg,' ');
  }
}