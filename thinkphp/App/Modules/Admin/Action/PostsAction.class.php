<?php

class PostsAction extends CommonAction{
	
	public function index(){

		$sql = 'select p.id,p.post_title,u.username,p.post_date from hd_posts as p LEFT JOIN hd_user as u ON u.id = p.post_author';
		$posts = M('posts')->query($sql);
		$this->assign('posts', $posts)->display();
	}

	public function post(){

		$this->edit = I('edit', 0, 'intval');

		if(IS_POST){

			$now = time();

			if($this->edit){
				$this->id = I('id');
				$data = array(
					'post_title'=>I('post_title'),
					'post_content'=>I('post_content'),
					'post_modified'=>$now,
					);

				$post = M('posts')->where('id='.$this->id)->save($data);
			}else{
				$data = array(
					'post_author'=>session('uid'),
					'post_title'=>I('post_title'),
					'post_content'=>I('post_content'),
					'post_date'=>$now,
					'post_modified'=>$now,
					);

				$post = M('posts')->add($data);
				
			}

			if($post){
				$this->success('success!',U('Admin/Posts/index'));
			}else{
				$this->error('error');
			}

		}else if(IS_GET){
			if($this->edit){
				$this->id = I('id');
				$this->post = M('posts')->where('id='.$this->id)->find();
			}
			$this->display('post');
		}
		
	}

	public function delete(){

		if(IS_POST){
			$id = I('id');
			$isDel = M('posts')->where('id='.$id)->delete();
			if($isDel){
				$this->success();
			}else{
				$this->error('error');
			}
		}
	}

	public function post100(){
		$post = M('posts');
		for ($i=0; $i < 100; $i++) { 
			$now = time()-mt_rand(1,1000000);
			$data = array(
				'post_author'=>session('uid'),
				'post_title'=>'asdasda'.mt_rand(1,1000000),
				'post_content'=>'vvvvvvvvvvvvvvvvvvvvvvvvvvv'.mt_rand(1,1000000),
				'post_date'=>$now,
				'post_modified'=>$now,
				);
		
			$post->add($data);
		}
	}

}

?>