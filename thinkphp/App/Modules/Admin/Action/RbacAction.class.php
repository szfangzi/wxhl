<?php

class RbacAction extends CommonAction{

	public function index(){
		
		$this->display();
	}

	public function role(){
		
		$roles = M('role')->select();
		$this->assign('roles',$roles)->display();
	}

	public function node(){

		// $field = array('id','name','title','pid');
		// $nodes = M('node')->field($field)->order('sort')->select();
		// $nodes = node_merge($nodes);

		$nodes = M('node')->order('sort')->select();
		$this->assign('nodes',$nodes)->display();
	}

	public function addUser(){
		
		$this->display();
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
			$nodes = M('node')->order('sort')->select();
			$access = $accessDb->where(array('role_id'=>$this->rid))->select();
			p($access);die;
			$this->nodes = node_merge($nodes);
			$this->display();
		}elseif(IS_POST) {
			$access = I('access');
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