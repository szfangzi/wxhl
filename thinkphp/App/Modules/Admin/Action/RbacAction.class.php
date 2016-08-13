<?php

class RbacAction extends CommonAction{

	public function index(){

		$this->users = D('UserRelation')->field('password',true)->relation(true)->select();
		$this->display();
	}

	public function role(){
		
		$roles = M('role')->select();
		$this->assign('roles',$roles)->display();
	}

	public function node(){

		$nodes = M('node')->order('sort')->select();
		$this->assign('nodes',$nodes)->display();
	}

	public function addUser(){
		
		$this->edit = I('edit', 0, 'intval');
		$this->roles = M('role')->select();

		if(IS_POST){
			if($this->edit){
				$this->id = I('id');

				$data = array(
					'name'=>I('name'),
					'remark'=>I('remark'),
					'status'=>I('status')=='on'?1:0
				);

				$role = M('role')->where('id='.$this->id)->save($data);
			}else{
				
				$data = array(
					'username'=>I('username'),
					'password'=>I('password', '', 'md5'),
					'logintime'=>time(),
					'loginip'=>get_client_ip(),
					'lock'=>I('lock')=='on'?0:1
				);
				if($this->id = M('user')->add($data)){
					$arr = [];
					foreach ($this->roles as $k => $v) {
						$arr[] = array(
							'role_id'=>$v['id'],
							'user_id'=>$this->id
							);
					}
					
					M('role_user')->addAll($arr);
				}
			}

			if($this->id){
				$this->success('success!',U('Admin/Rbac/index'));
			}else{
				$this->error('error!');
			}
			
			
		}else if(IS_GET){
			if($this->edit){
				$this->id = I('id');
				$role = M('user')->where('id='.$this->id)->find();
				$this->assign('user', $user);
			}
			$this->display();

		}else{

		}
		
	}

	public function addRole(){

		$this->edit = I('edit', 0, 'intval');

		if(IS_POST){

			if($this->edit){
				$this->id = I('id');

				$data = array(
					'name'=>I('name'),
					'remark'=>I('remark'),
					'status'=>I('status')=='on'?1:0
				);

				$role = M('role')->where('id='.$this->id)->save($data);
			}else{
				$data = array(
					'name'=>I('name'),
					'remark'=>I('remark'),
					'status'=>I('status')=='on'?1:0
				);
				$role = M('role')->add($data);
			}

			if($role){
				$this->success('success!',U('Admin/Rbac/role'));
			}else{
				$this->error('error!');
			}
			
			
		}else if(IS_GET){
			if($this->edit){
				$this->id = I('id');
				$role = M('role')->where('id='.$this->id)->find();
				$this->assign('role', $role);
			}
			$this->display();

		}else{

		}
		
		
	}

	public function delRole(){

		if(IS_POST){
			$id = I('id');
			$isDel = M('role')->where('id='.$id)->delete();
			if($isDel){
				$this->success();
			}else{
				$this->error('error');
			}
		}
	}

	public function addNode(){

		$this->pid = I('pid', 0, 'intval');
		$this->level = I('level', 1, 'intval');
		$this->edit = I('edit', 0, 'intval');

		if(IS_POST){

			if($this->edit){
				$this->id = I('id');

				$data = array(
					'name'=>I('name'),
					'title'=>I('title'),
					'sort'=>I('sort'),
					'status'=>I('status')=='on'?1:0
				);

				$node = M('node')->where('id='.$this->id)->save($data);
			}else{
				$data = array(
					'name'=>I('name'),
					'title'=>I('title'),
					'sort'=>I('sort'),
					'level'=>I('level'),
					'pid'=>$this->pid,
					'status'=>I('status')=='on'?1:0
				);
				$node = M('node')->add($data);
			}

			if($node){
				$this->success('success!',U('Admin/Rbac/node'));
			}else{
				$this->error('error!');
			}
			
			
		}elseif(IS_GET){
			if($this->edit){
				$this->id = I('id');
				$node = M('node')->where('id='.$this->id)->find();
				$this->assign('node', $node);
			}
			switch ($this->level) {
				case 1:
					$this->type = '应用';
					break;
				case 2:
					$this->type = '控制器';
					break;
				case 3:
					$this->type = '动作方法';
					break;
				default:
					break;
			}
			$this->display();

		}else{

		}

	}

	public function access(){

		$this->rid = I('rid', 0, 'intval');
		$accessDb = M('access');

		if(IS_GET){		
			$field = array('id','name','title','pid');
			$nodes = M('node')->field($field)->order('sort')->select();
			$nidArr = $accessDb->where(array('role_id'=>$this->rid))->getField('node_id', true);
			$this->nidArr = json_encode($nidArr);
			$this->nodes = node_merge($nodes, $nidArr);
			$this->display();
		}elseif(IS_POST) {
			$access = I('access');
			$accessDb->where(array('role_id'=>$this->rid))->delete();
			$data = [];
			foreach ($access as $k => $v) {
				$tmp = explode('_', $v);
				$data[] = array(
					'role_id'=>$this->rid,
					'node_id'=>$tmp[0],
					'level'=>$tmp[1]
					);
			}
			
			if($accessDb->addAll($data)){
				$this->success('success!',U('Admin/Rbac/role'));
			}else{
				$this->error('error!');
			}

		}
		
	}


}

?>