var Util = function(){};
Util.toDate = function(timeStamp){
	var date = new Date(timeStamp);
	return date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();
}