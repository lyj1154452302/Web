<?php
namespace Admin\Controller;
use Think\Controller;
class PersonalInfoController extends BaseController {
    public function personalInfo(){
    	$id = $_GET['id']?$_GET['id']:1;
    	$user = M('user');
    	$result = $user->where("userId=".$id)->select();
    	$this->assign('person',$result);
    	$this->display();
    }
    public function save(){
    	$id = $_POST['userid'];
    	$username = $_POST['username'];
    	$sex = $_POST['sex'];
    	$user = M('user');
        $arr = array();
        $tmp = 1;
    	$result1 = $user->where("userId=".$id)->setField('username', $username);
    	$result2 = $user->where("userId=".$id)->setField('sex', $sex);
        array_push($arr,$result1,$result2);
        foreach ($variable as $value) {
            if($value == false){
                $tmp = 0;
            }
        }
    	if($tmp == 1){
    		echo '<script>alert("修改成功！")</script>';
            $this->success('修改成功',U('User/index'));
    	}else{
            // echo '<script>alert("'.$id.'")</script>';
    		echo '<script>alert("修改失败！")</script>';
            $this->error('修改失败，请检查系统',U('Admin/PersonalInfo/personalInfo/id/'.$id));
    	}
    }
}