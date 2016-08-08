<?php

class ListAction extends Action{

	public function index(){

		import('@.Util.Page');
		$count = M('posts')->count();
		$page = new Page($count,10);
		$limit = $page->firstRow.','.$page->listRows;p($page);die();

    	$posts = M('posts')->order('post_modified DESC')->limit($limit)->select();
        $this->posts = $posts;
        $this->page = json_encode($page);
        $this->display();

    }

}

?>