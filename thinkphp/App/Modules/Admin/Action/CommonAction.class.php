<?php
	
class CommonAction extends Action{

	public function _initialize(){
		if(!isset($_SESSION[C('USER_AUTH_KEY')]) && MODULE_NAME != 'Login' && ACTION_NAME != 'index'){
			$this->redirect('Admin/Login/index');
		}
		//
		$notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE'))) ||
					in_array(MODULE_NAME.'/'.ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));
// p(in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE'))).'aaa');
// p(in_array(MODULE_NAME.'/'.ACTION_NAME, explode(',', C('NOT_AUTH_ACTION'))).'bbb');
// p((!$notAuth).'ccc');
// p((C('USER_AUTH_ON') && !$notAuth).'ddd');
// p($_SESSION);


		if(C('USER_AUTH_ON') && !$notAuth ){
			import('ORG.Util.RBAC');
			RBAC::AccessDecision(GROUP_NAME) || $this->error('no access!');
		}
	}
} 

?>