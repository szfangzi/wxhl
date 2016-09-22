function scrollData(){
	//以下取法兼容顺序 IE9+(最新的浏览器) || FIREFOX || CHROME
	var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
	var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft || 0;
	return {
		top:scrollTop,
		left:scrollLeft
	}
}

function screenData(){
	//屏幕宽度
	//以下取法兼容顺序 IE9+(最新的浏览器) FIREFOX CHROME
	var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth || 0;
	var screenHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight || 0;
	return {
		w:screenWidth,
		h:screenHeight
	}
}

// BackCompat：标准兼容模式关闭。chrome firefox.....
// CSS1Compat：标准兼容模式开启。ie7 ie8
// 当document.compatMode等于BackCompat时，浏览器客户区宽度是document.body.clientWidth；
// 当document.compatMode等于CSS1Compat时，浏览器客户区宽度是document.documentElement.clientWidth。

function stopBubble(e){
//如果传入了事件对象，那么就时非IE浏览器
	if(e&&e.stopPropagation){
    	e.stopPropagation();
    }else{
    	window.event.cancelBubble=true;
    }
}

//冒泡(blur focus load unload没有冒泡)
//IE
//div > body > html > document
//other
//div > body > html > document > window

function stopDefault(e) { 
    //阻止默认浏览器动作(W3C) 
    if(e&&e.preventDefault){
        e.preventDefault(); 
    }else{//IE中阻止函数器默认动作的方式 
        window.event.returnValue = false; 
    }
}

function getCss(el, css){
	if(window.getComputedStyle){
		return window.getComputedStyle(el, null)[css];
	}else{
		return el.currentStyle[css];
	}
}

/* ie未验证 start*/
function $(id){
	return document.getElementById(id);
}
function show(el){
	el.style.display = 'block';
}
function hide(el){
	el.style.display = 'none';
}
function getElsByClass(cls){
	if(document.getElementsByClassName){
		return document.getElementsByClassName(cls);
	}else{
		var tags = document.getElementsByTagName('*');
		var arr = [];
		for (var i = 0; i < tags.length; i++){
			if(hasClass(tags[i], cls)){
				arr.push(tags[i]);
			}
		}
		return arr;
	}
}
function trim(str){
	return str.replace(/(^\s*)|(\s*$)/g, "");
}
function addClass(el, className){
	if(!hasClass(el, className)){
		el.className += ' ' + className;
	}
	el.className = prettyClass(el.className);
}
function prettyClass(cls){
	var classReg = /[\t\r\n\f\s]+/g;
	return trim(cls.replace(classReg, " "));
}

function removeClass(el, className){
	if(hasClass(el, className)){
		var reg = new RegExp(className,"g");
		el.className = el.className.replace(reg, '');
	}
	el.className = prettyClass(el.className);
}
function hasClass(el, className){
	var classReg = /[\t\r\n\f]/g;
	return (" " + el.className + " ").replace(classReg, " ").indexOf( className ) >= 0;
}
/* ie未验证 end*/


//构造函数继承
Object.prototype.extend = function(parent){
    var c = this.prototype;
    var p = parent.prototype;
    for (var k in p) {
        c[k] = p[k];
    };
    c.uber = p;
}
//对象继承
Object.prototype.deepCopy = function(p) {
　　var c = this || {};
　　for (var i in p) {
　　　　if (typeof p[i] === 'object') {
　　　　　　c[i] = (p[i].constructor === Array) ? [] : {};
　　　　　　deepCopy(p[i], c[i]);
　　　　} else {
　　　　　　　c[i] = p[i];
　　　　}
　　}
　　return c;
}

Date.prototype.Format = function (fmt) { //author: meizz 
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}