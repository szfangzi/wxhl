<?php

class LoginAction extends CommonAction{

	public function index(){
		if(isset($_SESSION['uid']) && isset($_SESSION['username']) ){
			$this->redirect('Admin/Index/index');
		}else{
			$this->display();
		}
		
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
			session(C('USER_AUTH_KEY'), $user['id']);
			session('username', $user['username']);
			session('logintime',date('y-m-d H:i:s'));
			session('loginip', $user['loginip']);
			//超级管理员识别
			if($user['username'] == C('RBAC_SUPER_ADMIN')){
				session(C('ADMIN_AUTH_KEY'), true);
			}
			//读取用户权限
			import('ORG.Util.RBAC');
			RBAC::saveAccessList();

			$this->redirect('Admin/Index/index');

		}else{
			halt('no page');
		}
	
	}

	public function logout(){
		session_unset();
		session_destroy();
		$this->redirect('Admin/Login/index');
	}
}

?>
