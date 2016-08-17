<?php
return array(
	'TMPL_PARSE_STRING'=> array(
		'__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Tpl/Public',
		'__INDEX_PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Public',
	),
	'SHOW_PAGE_TRACE'=>true,
	'RBAC_SUPER_ADMIN'=>'admin',//自定义-超级管理员名称
	'ADMIN_AUTH_KEY'=>'superadmin',//自定义-超级管理员识别
	'USER_AUTH_ON'=>true,   //自定义-是否开启验证
	'USER_AUTH_TYPE'=>1,    //自定义-验证类型（1：登录验证，2：实时验证）
	'USER_AUTH_KEY'=>'uid', //自定义-用户认证识别号
	'NOT_AUTH_MODULE'=>'Login',    //自定义-无需验证的控制器
	'NOT_AUTH_ACTION'=>'',    //自定义-无需验证的动作方法 Login/index,Login/verify,Login/login,Login/logout
	'RBAC_ROLE_TABLE'=>'hd_role',    //自定义-角色表名称
	'RBAC_USER_TABLE'=>'hd_role_user',    //自定义-角色与用户中间表名称
	'RBAC_ACCESS_TABLE'=>'hd_access', //自定义-权限表名称
	'RBAC_NODE_TABLE'=>'hd_node',     //自定义-节点表名称


);
?>