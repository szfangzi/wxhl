<?php

class IndexAction extends Action{

	public function index(){

		//echo C('APP_GROUP_PATH');die();

    	$posts = M('posts')->select();
        $this->assign('posts', $posts)->display();

    }

    public function about(){

		$this->display('about');
	}

}

?>