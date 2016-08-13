<?php 

//递归重组节点信息为多维数组
function node_merge($nodes, $access = null, $pid = 0){
	$arr = array();
	foreach ($nodes as $k => $v) {
		if(is_array($access)){
			$v['access'] = in_array($v['id'], $access)?1:0;
		}
		if($v['pid'] == $pid){
			$v['child'] = node_merge($nodes, $access, $v['id']);
			$arr[] = $v;
		}
	}
	
	return $arr;
}

?>