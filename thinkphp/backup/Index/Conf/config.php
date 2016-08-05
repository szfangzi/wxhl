<?php
$config = array(
	//'配置项'=>'配置值'
	'USERNAME'=>'Index',
	'URL_HTML_SUFFIX'=>'',
	'TMPL_VAR_IDENTIFY'=>'array',
	//'URL_MODEL'=>0,
);
return array_merge(include './Conf/config.php', $config);
?>