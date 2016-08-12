<?php

class ListAction extends Action{

	public function index(){

		import('@.Util.Page');
		$count = M('posts')->count();
		$page = new Page($count,10);
		
		$limit = $page->firstRow.','.$page->listRows;
    	$posts = M('posts')->order('post_modified DESC')->limit($limit)->select();
        $this->posts = $posts;

        if($posts){
        	if(IS_AJAX){
        		if($posts){
        			$info = array('posts'=>$posts, 'page'=>$page);
        			$this->success($info);
        		}else{
        			$this->error();
        		}
        	}else{
        		$this->info = json_encode(array('posts'=>$posts, 'page'=>$page));
        		$this->display();
        	}
    	}else{
    		halt('no posts!');
    	}

    }

    public function detail(){

        //$post = M('posts')->where( array('id'=>I('id')))->find();

        $id = I('id');
        //本页 上一页 下一页
        
        $posts = M()->query('call getPreNextPosts('.$id.')');//p($posts);die;
        $this->post = $posts[1];
        $this->postPre = $posts[0]['id'] == $posts[1]['id'] ? false : $posts[0];
        $this->postNext = $posts[2]['id'] == $posts[1]['id'] ? false : $posts[2];//p($posts[2]->id == $posts[1]->id ? false : $posts[2]);die;
        $this->display();
    }

}

?>

