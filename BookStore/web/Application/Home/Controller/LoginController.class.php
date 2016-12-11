<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController {
    public function index(){
    	$this->display();
    }
    public function loggedin(){
        if($_COOKIE['identity'] == 'user'){
            echo '<p class="success">恭喜你！<em>'.$_COOKIE['username'].'</em> , 你已登录成功！';
            echo '<br><br> <a href="../Index/index.html">点击此处开启玩库之旅吧！</a> </p>';
        }else if($_COOKIE['identity'] == 'admin'){
            echo '<p class="success">恭喜你！管理员 : <em>'.$_COOKIE['admin_name'].'</em> , 你已登录成功！';
            echo '<br><br> <a href="/lyj/bookstore/web/index.php/Admin/Index/index.html">点击进入管理界面</a> </p>';
        }
        $this->display();
    }
    public function logout(){
        if(isset($_COOKIE['username'])){
            cookie('userid',null);
            cookie('identity',null);
            cookie('username',null);
            cookie('sex',null);
            cookie('account',null);
        }else if(isset($_COOKIE['admin_name'])){
            cookie('admin_name',null);
        }
        $this->display();
    }
    public function checklogin(){
    	$account = $_POST['account'];
        $passwd = $_POST['passwd'];
        if($_POST['identity'] == 'user'){
            header("Content-type:text/html;charset=utf-8");
            $user = D('user');
            $result = $user->where("account='$account'")->find();
            if($result){         //SHA1()应该是适用于在mysql中，所以在sql语句中再用这个函数即可
                $result2 = $user->where("account='$account' AND passwd=SHA1('$passwd')")->find();
                if($result2){
                    $userid = $user->where("account='$account'")->getField('userId');
                    cookie('userid',$userid);
                    cookie('identity','user');
                    cookie('username',$result['username']);
                    cookie('sex',$result['sex']);
                    cookie('account',$_POST['account']);
                    $this->redirect('Login/loggedin');
                }else{
                    echo '<script>alert("密码错误！")</script>';
                    $this->redirect('Login/index', 5, '页面跳转中');
                }                
            }else{
                echo '<script>alert("帐号不存在！")</script>';
                $this->redirect('Login/index', 5, '页面跳转中');
            }
        }else if($_POST['identity'] == 'admin'){
            $admin = D('admin');
            $result = $admin->where("account='$account'")->find();
            if($result){
                cookie('identity','admin');
                cookie('admin_name',$result['name']);
                cookie('account',$_POST['account']);
                $this->redirect('Login/loggedin');
            }
        }
    }
}