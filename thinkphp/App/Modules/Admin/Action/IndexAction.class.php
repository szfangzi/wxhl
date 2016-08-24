<?php

class IndexAction extends CommonAction{

	public function index(){
		
		if(IS_POST){//写配置文件例子
			if(F('test', $_POST, APP_PATH)){
				$this->success('修改成功', U(GROUP_NAME.'/Index/index'));
			}else{
				$this->error('修改失败！'.CONF_PATH);
			}
		}else{
			$this->display();
		}
		
	}


}

?>