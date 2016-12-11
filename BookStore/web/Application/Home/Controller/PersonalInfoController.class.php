<?php
namespace Home\Controller;
use Think\Controller;
class PersonalInfoController extends BaseController {
    public function changePassword(){
    	$account = $_COOKIE['account'];
    	$this->assign('account',$account);
    	$this->display();
    }
    public function personalInfo(){
        $account = $_COOKIE['account'];
        $username = $_COOKIE['username'];
        $sex = $_COOKIE['sex'];
        $this->assign('account',$account);
        $this->assign('username',$username);
        $this->assign('sex',$sex);
    	$this->display();
    }
    public function changePersonalInfo(){
        $account = $_COOKIE['account'];
        $username = $_COOKIE['username'];
        $sex = $_COOKIE['sex'];
        $this->assign('account',$account);
        $this->assign('username',$username);
        $this->assign('sex',$sex);
        $this->display();
    }
    public function submitPersonalInfo(){
        $account = $_POST['account'];
        $username = $_POST['username'];
        $sex = $_POST['sex'];
        $user = M('user');
        $data = array('username'=>$username,'sex'=>$sex);
        $result = $user->where("account='$account'")->setField($data);
        if($result >= 0){
            cookie('username', $username);
            cookie('sex', $sex);
            $respsonse = 1;
            $this->ajaxReturn($respsonse);  
        }else{
            $respsonse = 0;
            $this->ajaxReturn($respsonse);
        }
    }
    public function checkOldPassword(){
    	$user = M('user');
    	$oldPassword = SHA1($_POST['oldPassword']);
    	$account = $_POST['account'];
    	$result = $user->where("account='$account'")->getField('passwd');
    	// $respsonse = $result;
    	// $respsonse = $oldPassword;
    	// $this->ajaxReturn($respsonse);
    	if($oldPassword == $result){
    		$tip = 1;
    		$this->ajaxReturn($tip);
    	}else{
    		$tip = 0;
    		$this->ajaxReturn($tip);
    	}
    }
    public function submitNewPassword(){
    	$user = M('user');
    	$account = $_POST['account'];
    	$newPassword = SHA1($_POST['newPassword']);
    	$result = $user->where("account='$account'")->setField('passwd',$newPassword);
    	if($result){
    		$respsonse = 1;
    		$this->ajaxReturn($respsonse);
    	}else{
    		$respsonse = 0;
    		$this->ajaxReturn($respsonse);
    	}
    }
}