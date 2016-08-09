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
        		$this->info = json_encode(array('posts'=>$posts, 'page'=>$page));//p($this->info);die;
        		$this->display();
        	}
    	}else{
    		halt('no posts!');
    	}

    }

}

?>