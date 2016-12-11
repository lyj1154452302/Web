<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends BaseController {
    public function success_jump(){
    	// $this->assign("jumpUrl","__APP__/Index/index");
    	$this->display();
    }
    public function error_jump(){
    	$this->display();
    }
}