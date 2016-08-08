<?php

class IndexAction extends Action{

	public function index(){
    	$posts = M('posts')->select();
        $this->assign('posts', $posts)->display();

    }

}

?>