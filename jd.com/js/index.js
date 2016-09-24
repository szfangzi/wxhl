window.onload = function () {

	//广告关闭
	var banner = $('top-banner');
	var xx = $('xx');
	xx.onclick = function () {
		banner.style.display = 'none';
	};

	//图片轮播
	lunbo();

	//搜索框文字提示
	searchBox();
};

function searchBox() {
	var searchInput = $('textt');

	searchInput.oninput = searchInput.onpropertychange = function (e) {
		//兼容IE searchInput.onpropertychange
		if (this.value == '') {
			show($('searchInputLabel'));
		} else {
			hide($('searchInputLabel'));
		}
	};
}

function lunbo() {

	var lBtn = $('left');
	var rBtn = $('right');
	var lunboBox = $('lunbo');
	var lunboBtnsBox = $('two');
	var lunbos = $('one').children;

	//生成轮播圆点
	for (var i = 0; i < lunbos.length; i++) {
		var btn = document.createElement('li');
		if (i == 0) {
			btn.className = 'on';
		}
		btn.innerHTML = i + 1;
		lunboBtnsBox.appendChild(btn);
	};

	var lunboBtns = lunboBtnsBox.children;
	//轮播圆点居中
	lunboBtnsBox.style.right = (lunboBox.clientWidth - lunboBtnsBox.clientWidth) / 2 + 'px';

	var currentIndex = 0;
	//初始化圆点事件
	for (var i = 0; i < lunboBtns.length; i++) {

		lunboBtns[i].onmouseover = function () {
			e = this;
			for (var i = 0; i < lunboBtns.length; i++) {
				if (lunboBtns[i].innerHTML == e.innerHTML) {
					currentIndex = i;
				}
				lunboBtns[i].className = '';
				lunbos[i].className = '';
			};
			e.className = 'on';
			lunbos[currentIndex].className = 'on';
		};
	}
	//初始化左右按钮事件
	rBtn.onclick = lBtn.onclick = function () {
		lrBtn(this);
	};

	function lrBtn(e) {
		var currentIndex = 0,
		    newIndex = 0;

		for (var i = 0; i < lunboBtns.length; i++) {
			if (lunboBtns[i].className == 'on') {
				currentIndex = i;
			}
			lunboBtns[i].className = '';
			lunbos[i].className = '';
		};

		if (e.id == 'left') {
			newIndex = prevEl(lunbos, currentIndex);
		} else {
			newIndex = nextEl(lunbos, currentIndex);
		}

		lunbos[newIndex].className = 'on';
		lunboBtns[newIndex].className = 'on';
	}

	// 自动轮播
	var autoInterval = null;
	autoPlay();

	function autoPlay() {
		autoInterval = setInterval(function () {
			rBtn.click();
		}, 1000);
	}

	lunboBox.onmouseenter = function () {
		clearInterval(autoInterval);
	};
	lunboBox.onmouseleave = function () {
		autoPlay();
	};
}

function nextEl(els, index) {
	for (var i = index + 1; i <= els.length; i++) {
		if (i == els.length) {
			i = -1;
			continue;
		}
		return i;
	};
}

function prevEl(els, index) {
	for (var i = index - 1; i >= -1; i--) {
		if (i == -1) {
			i = els.length - 1;
		}
		return i;
	};
}

function $(id) {
	return document.getElementById(id);
}

function attr(el, name) {
	return el.attributes[name].nodeValue;
}
function show(el) {
	el.style.display = 'block';
}
function hide(el) {
	el.style.display = 'none';
}
function getElsByClass(cls) {
	if (document.getElementsByClassName) {
		return document.getElementsByClassName(cls);
	} else {
		var tags = document.getElementsByTagName('*');
		var arr = [];
		for (var i = 0; i < tags.length; i++) {
			if (hasClass(tags[i], cls)) {
				arr.push(tags[i]);
			}
		}
		return arr;
	}
}
function trim(str) {
	return str.replace(/(^\s*)|(\s*$)/g, "");
}
function addClass(el, className) {
	if (!hasClass(el, className)) {
		el.className += ' ' + className;
	}
	el.className = prettyClass(el.className);
}
function prettyClass(cls) {
	var classReg = /[\t\r\n\f\s]+/g;
	return trim(cls.replace(classReg, " "));
}

function removeClass(el, className) {
	if (hasClass(el, className)) {
		var reg = new RegExp(className, "g");
		el.className = el.className.replace(reg, '');
	}
	el.className = prettyClass(el.className);
}
function hasClass(el, className) {
	var classReg = /[\t\r\n\f]/g;
	return (" " + el.className + " ").replace(classReg, " ").indexOf(className) >= 0;
}