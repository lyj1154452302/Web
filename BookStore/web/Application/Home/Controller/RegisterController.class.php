<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends BaseController {
    public function index(){
        $this->assign('name','注册界面');
    	$this->display();
    }
    public function insert(){
        header("Content-type:text/html;charset=utf-8");
        $user = D('user');
    	if($user->create()){
    		$result = $user->add();
            $account=$_POST['account'];
            date_default_timezone_set();  
            $time=date("Y-m-d H:i:s");
            if($result){
                $user->where("account='$account'")->setField('registeration_date',$time);
                $this->success('注册成功',U('Public/success_jump'));
            }else{
                $this->error();   //帐号重负导致的注册失败还无法完成提示，可用JS在用户输入时就检测是否重复
            }
    	}else{
            exit($user->getError());
        }
    }
    public function checkAccount(){
        header("Content-type:text/html;charset=utf-8");
        $user = D('user');
        $admin = D('admin');
        $account = $_POST['account'];
        $result = $user->where("account='$account'")->find();
        $result1 = $admin->where("account='$account'")->find();
        if($result || $result1){
            $response = 0;
            $this->ajaxReturn($response);
        }else{
            $response = 1;
            $this->ajaxReturn($response);
        }
    }
}