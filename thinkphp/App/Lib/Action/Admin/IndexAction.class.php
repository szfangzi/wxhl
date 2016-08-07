<?php

class IndexAction extends CommonAction{

	public function index(){
		// $user = M('user')->order('logintime asc')->select();
		// p($user);die;
		$this->display();
	}


}

?>