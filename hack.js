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