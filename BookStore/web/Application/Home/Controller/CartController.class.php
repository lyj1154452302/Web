<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends BaseController {
    public function cart(){
    	$cart = M('cart');
    	$userid = $_COOKIE['userid'];
    	$list = $cart->where("userId=".$userid)->select();
    	$this->assign('cartlist',$list);
    	$this->display();
    }
    public function submitCart(){
    	$cart = M('cart');
    	$data['userId'] = $_POST['userid'];
    	$data['bookId'] = $_POST['bookId'];
    	$data['bookName'] = $_POST['bookName'];
    	$data['bookNum'] = $_POST['bookNum'];
    	$data['bookPrice'] = $_POST['bookPrice'];
    	$data['countPrice'] = $_POST['countPrice'];

    	$result = $cart->add($data);
    	if($result){
    		$response = 1;
    		$this->ajaxReturn($response);
    	}else{
    		$response = 0;
    		$this->ajaxReturn($response);
    	}
    }
}