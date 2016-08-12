<?php 

//递归重组节点信息为多维数组
function node_merge($nodes, $pid = 0){
	$arr = array();
	foreach ($nodes as $k => $v) {
		if($v['pid'] == $pid){
			$v['child'] = node_merge($nodes, $v['id']);
			$arr[] = $v;
		}
	}
	
	return $arr;
}

?>