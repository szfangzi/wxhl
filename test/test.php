<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<?php
// echo date('H-i-s').'十大';
// $link = mysql_connect('localhost', 'root', '');
// var_dump($link);

echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];

?>


<script type="text/javascript">
	

	for (var i = 1; i <= 100; i++) {
		for (var j = 2; j <= i-1; j++) {
			if(isZhen(i/j)){
				break;
			}
			
		};if(j==i){
				console.log(i);
			}
	};


	function isZhen(x){
		return x%1 == 0;
	}
</script>
</body>
</html>