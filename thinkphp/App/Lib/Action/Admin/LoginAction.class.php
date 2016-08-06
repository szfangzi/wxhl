<?php

class LoginAction extends Action{

	public function index(){
		$this->display();
	}

	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(1,1,'png',40,32);
	}

	public function login(){
		if(IS_POST){
			if(I('verify', '', 'md5') != session('verify')){
				$this->error('verify wrong!');
			}
			$username = I('username');
			$password = I('password', '', 'md5');

			$user = M('user')->where(array('username'=>$username))->find();

			if(!$user || $password != $user['password']){
				$this->error('account or password wrong!');
			}

			if($user['lock']){
				$this->error('is lock!!!');
			}

			$data = array(
				'id'=>$user['id'],
				'logintime'=>time(),
				'loginip'=>get_client_ip(),
				);

			M('user')->save($data);
			session('uid', $user[id]);
			session('username', $user['username']);
			session('logintime',date('y-m-d H:i:s'));
			session('loginip', $user['loginip']);

			$this->redirect('Admin/Index/index');

		}else{
			halt('no page');
		}
	
	}
}

?>