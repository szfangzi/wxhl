<?php

class UserRelationModel extends RelationModel{

	// 定义主表名称
	protected $tableName = 'user';

	// 定义关联关系
	protected $_link = array(
		'role' => array(
			'mapping_type'=>MANY_TO_MANY,
			'relation_table'=>'hd_role_user',
			'foreign_key'=>'user_id',
			'relation_key'=>'role_id',
			'mapping_fields'=>'id, name, remark'
			)
		, );

}

?>