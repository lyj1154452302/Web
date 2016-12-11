<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$user = D('user');
    	$result = $user->count();
    	$this->assign('user',$result);
    	$order = D('order');
    	$result1 = $order->count();
    	$this->assign('order',$result1);
    	$book = D('books');
    	$result2 = $book->count();
    	$this->assign('book',$result2);
    	$this->display();
    }
}