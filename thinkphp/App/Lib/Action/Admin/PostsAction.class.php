<?php

class PostsAction extends CommonAction{
	
	public function index(){

		$posts = M('posts')->where(array('post_author'=>session('uid')))->select();
		$this->assign('posts', $posts)->display();
	}

	public function post(){

		$edit = I('edit')?true:false;

		if(IS_POST){

			
			$now = time();

			if($edit){
				$id = I('id');

				$data['post_title']=I('post_title');
				$data['post_content']=I('post_content');
				$data['post_modified']=$now;

				$post = M('posts')->where('id='.$id)->save($data);
			}else{
				$post = M('posts');
				$data = array(
					'post_author'=>session('uid'),
					'post_title'=>I('post_title'),
					'post_content'=>I('post_content'),
					'post_date'=>$now,
					'post_modified'=>$now,
					);
	
				$post->add($data);
				
			}

			if($post){
				$posts = M('posts')->where(array('post_author'=>session('uid')))->select();
				//$this->assign('posts', $posts)->display('index');
				$this->display();
			}else{
				$this->error('error');
			}

		}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
			if($edit){
				$id = I('id');
				$post = M('posts')->where('id='.$id)->find();
				$this->assign('post', $post);
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
			$now = time()+mt_rand(1,1000000);
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