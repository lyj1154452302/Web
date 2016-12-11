<?php
namespace Admin\Controller;
use Think\Controller;
class BookController extends BaseController {
    public function index(){
    	$book = M('books');
    	$count = $book->count();
    	$this->assign('book',$count);

    	$book_all = M('book_all');
    	$list = $book_all->select();
    	$this->assign('booklist',$list);

    	$this->display();
    }
    public function add(){
    	$book_all = M('book_all');
        $books = M('books');
        
        $data1['bookName'] = $_POST['bookName'];
        $bookName = $_POST['bookName'];
        $data1['bookInfo'] = $_POST['bookItd'];
        $data1['price1'] = $_POST['nowPrice'];
        $data1['price2'] = $_POST['oldPrice'];
        $data1['img'] = $_POST['imgPath'];
        $data1['author'] = $_POST['bookAuthor'];
        $data1['publisher'] = $_POST['bookPublisher'];
        $data1['pubYear'] = $_POST['bookYear'];
        $data1['pubMonth'] = $_POST['bookMonth'];
        $data1['totalPage'] = $_POST['bookPage'];
        $data1['totalWord'] = $_POST['bookWord'];
        $data1['pubNum'] = $_POST['bookPubNum'];
        $data1['ISBN'] = $_POST['bookISBN'];
        $result1 = $book_all->add($data1);
        if($result1){
            $boaid = $book_all->where("bookName='$bookName'")->getField('boaId');
            $data2['boaId'] = $boaid;
            $data2['price'] = $_POST['nowPrice'];
            $data2['ifNbrecommend'] = $_POST['ifNbrecommend'];
            $data2['ifNbrank'] = $_POST['ifNbrank'];
            $data2['ifHbrecommend'] = $_POST['ifHbrecommend'];
            $data2['ifHbrank'] = $_POST['ifHbrank'];
            date_default_timezone_set();  
            $time=date("Y-m-d H:i:s");
            $data2['addTime'] = $time;
            $result2 = $books->add($data2);
            if($result2){
                $tip = 1;
                $this->ajaxReturn($tip);
            }else{
                $tip = 3;
                $this->ajaxReturn($tip);
            }
        }else{
            $tip = 2;
            $this->ajaxReturn($tip);
        }
        
    }
    public function delete(){
        $book_all = M('book_all');
        $books = M('books');
        $arr = $_POST['deleteBooks'];
        $tmp = 1;
        foreach ($arr as $value) {
            $result1 = $book_all->where("boaId=".$value)->delete();
            if($result1){
                $result2 = $books->where("boaId=".$value)->delete();
                if($result2 == false){
                    $tmp = 0;
                }
            }else{
                $tmp = 0;
            }
        }
        if($tmp == 1){
            $response = 1;
            $this->ajaxReturn($response);
        }else{
            $response = 0;
            $this->ajaxReturn($response);
        }
    }
    public function checkBookName(){
        $book_all = M('book_all');
        $bookName = $_POST['bookName'];
        $result = $book_all->where("bookName='$bookName'")->find();
        if($result){
            $response = 0;
            $this->ajaxReturn($response);
        }else{
            $response = 1;
            $this->ajaxReturn($response);
        }
    }
    public function upload(){
        // response.setContentType("text/html;charset=UTF-8");
        if(!empty($_FILES)){
            // $oldpath = $_POST['oldpath'];
            $this->_upload();
            return false; 
            // $response = 1;
            // $this->ajaxReturn($response);
        }else{
            echo "<script>alert('请选择想要上传的照片！')</script>";
        }
    }
    public function _upload(){
        // response.setContentType("text/html;charset=UTF-8");
        import("ORG.Net.UploadFile");
        $upload = new \Think\Upload();        //实例化上传类
        $upload->maxSize = 1*200*200;       //设置上传图片大小
        $upload->allowExts = array('jpg','png','gif');
        $upload->uploadReplace = true;        //同名则替换
        $upload->saveRule='uniqid';           //设置上传文件规则 uniqid函数生成一个唯一的字符串序列
        // $upload->thumbRemoveOrigin = true; //生成缩略图后是否删除原图
        $upload->rootPath = THINK_PATH;
        $upload->savePath = '../Public/images/books/';
        $info = $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            // $save = $info['savepath'];
            $id = $_POST['boaid'];
            // $save = explode('/', $save);
            // $real_path = $save;
            foreach ($info as $file) { //通过foreach获得已上传图片的路径
                $path = str_replace('../Public/images/books/', '', $file['savepath']);//将存取路径前面部分剔除，留下books下的文件夹名称:日期。
                // echo '<script>alert("'.$path.$file['savename'].'")</script>';
                $newpath = $path.$file['savename'];//用于存入数据库的路径,除了(__PUBLIC__/images/books/)之外的路径
                $checkpath = $file['savepath'].$file['savename'];//用户检测尺寸的路径
                // $checkpath1 = str_replace('../Public/', '/lyj/BookStore/web/Public/', $checkpath);
                // echo '<script>alert("'.$file['savepath'].$file['savename'].'")</script>';
                $img_size = getimagesize($checkpath);  //获得要上传图片的尺寸并检测
                // echo '<script>alert("'.$img_size[0].'+'.$img_size[1].'")</script>';
                if($img_size[0] > 200 || $img_size[1] > 200){ //0表示宽 1表示高
                    // echo '<script>alert("请选择200*200尺寸的图片上传！")</script>';
                    // $this->error("请选择200*200尺寸的图片上传！");
                    $response = 2;
                    $this->ajaxReturn($response);
                }
                // $this->success("上传成功！");
                // $this->assign('newpath',$newpath);
                // echo '<script>alert("照片上传成功！且已保存至数据库，想要修改请再次上传")</script>';
                // return false;
            }
            $response = $newpath;
            // $response = $img_size[0];
            // $response = $checkpath1;
            // $response = imagesx($img_size);
            
            // context.Response.ContentType = "text/html";
            $this->ajaxReturn($response);


            // echo '<script>location.href="/lyj/BookStore/web/index.php/Admin/BookInfo/alterInfo/id/'.$id.'.html";</script>';
            //对数据库进行操作
            // $book_all = M('book_all');
            // $result = $book_all->where("boaId=".$id)->setField('img', $newpath);
            // if($result){
            //     echo '<script>alert("照片上传成功！且已保存至数据库，想要修改请再次上传")</script>'; 
            //     echo '<script>location.href="/lyj/BookStore/web/index.php/Admin/BookInfo/alterInfo/id/'.$id.'.html";</script>';
            //     // $this->success('页面跳转中...',U('Admin/BookInfo/alterInfo/id/'.$id));
            //     // $this->redirect('Admin/BookInfo/alterInfo/'.$id);
            // }else{
            //     $this->getError();
            // }
        }        
    }
}