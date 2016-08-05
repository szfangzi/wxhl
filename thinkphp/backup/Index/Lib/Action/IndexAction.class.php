<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$user = M('user')->select();

    	//echo U('show',array('uid'=>12,'username'=>'asda'), '',false, true);die;
    	$this->assign('user',$user)->display();
  //   	p($_SERVER);
  //   	die();
		// $db = M('user');
		// $rs = $db->select();
		// dump($rs);
    }
    public function add(){
    	if(!IS_POST){
    		//halt('no page');
    		_404('no page');
    	}
    	$data = array(
    		'id' => I('id'),
    		'username' => I('username'),
    		'time'=>time()
    	);

    	if(M('user')->data($data)->add()){
    		$this->success('success!', 'index');
    	}else{
    		$this->error('error!');
    	}
    	
    }
    public function delete(){
    	$rs = M('user')->where(array(
    		'id'=>array('gt',0)
    		))->delete();
    	var_dump($rs);
    }
}