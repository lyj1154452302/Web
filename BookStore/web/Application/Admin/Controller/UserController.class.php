<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
        $user = D('user');
        $result = $user->count();
        $this->assign('user',$result);

        $list = $user->select();
        $this->assign('userlist',$list);
    	$this->display();
    }
    public function delete(){
        $user = D('user');
        $tmp = 1;
        $arr = $_POST['deleteUsers'];
        foreach ($arr as $value) {
            $result1 = $user->where("account='$value'")->delete();
            if($result1 == false){
                $tmp = 0;
            }
        }
        // for(i=0;i<deleteUsers.length;i++){
        //     $result1 = $user->where("account=".deleteUsers[i])->delete();
        //     if(!$result1){
        //         $tmp = 0;
        //     }
        // }
        if($tmp == 1){
            $response = 1;
            $this->ajaxReturn($response);
        }else{
            $response = 0;
            $this->ajaxReturn($response);
        }
    }
    public function add(){
        header("Content-type:text/html;charset=utf-8");
        $user = D('user');
        if($user->create()){
            $result = $user->add();
            $account = $_POST['account'];
            date_default_timezone_set();
            $time=date("Y-m-d H:i:s");
            if($result){
                $user->where("account='$account'")->setField("registeration_date", $time);
                $this->success('添加用户成功','/lyj/BookStore/web/index.php/Admin/User/index');
            }else{
                $this->error();   //帐号重负导致的注册失败还无法完成提示，可用JS在用户输入时就检测是否重复
            }
        }else{
            exit($user->getError());
        }
    }
}