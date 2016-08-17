//IE9+ FIREFOX CHROME
var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

// BackCompat：标准兼容模式关闭。chrome firefox.....
// CSS1Compat：标准兼容模式开启。ie7 ie8
// 当document.compatMode等于BackCompat时，浏览器客户区宽度是document.body.clientWidth；
// 当document.compatMode等于CSS1Compat时，浏览器客户区宽度是document.documentElement.clientWidth。