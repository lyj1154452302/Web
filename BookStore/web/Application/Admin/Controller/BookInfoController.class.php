<?php
namespace Admin\Controller;
use Think\Controller;
class BookInfoController extends BaseController {
    public function bookInfo(){
    	$id = $_GET['id']?$_GET['id']:1;
    	$books = M('books');
		$arr = $books -> where("bookId=".$id)
					  -> join("bookstore_book_all on bookstore_books.boaId = bookstore_book_all.boaId")
					  -> select();
		$this->assign('arr',$arr);

    	$this->display();
    }
    public function alterInfo(){
    	$id = $_GET['id']?$_GET['id']:1;
    	$books = M('books');
    	$arr = $books->where("bookId=".$id)
    				 ->join("bookstore_book_all on bookstore_books.boaId = bookstore_book_all.boaId")
    				 ->select();
    	$this->assign('arr',$arr);
    	$this->display();
    }
    public function saveNewInfo(){
        $boaId = $_POST['boaId'];
        $bookName = $_POST['bookName'];
        $bookItd = $_POST['bookItd'];
        $bookAuthor = $_POST['bookAuthor'];
        $bookPublisher = $_POST['bookPublisher'];
        $bookYear = $_POST['bookYear'];
        $bookMonth = $_POST['bookMonth'];
        $bookNowPrice = $_POST['bookNowPrice'];
        $bookOldPrice = $_POST['bookOldPrice'];
        $bookPage = $_POST['bookPage'];
        $bookWord = $_POST['bookWord'];
        $bookPubNum = $_POST['bookPubNum'];
        $bookISBN = $_POST['bookISBN'];

        $book_all = M('book_all');
        $books = M('books');
        $arr = array(); //创建数组存储更新操作所返回的值
        $tmp = 1;       
        $result1 = $book_all->where("boaId=".$boaId)->setField('bookName',$bookName);
        $result2 = $book_all->where("boaId=".$boaId)->setField('bookInfo',$bookItd);
        $result3 = $book_all->where("boaId=".$boaId)->setField('price1',$bookOldPrice);       
        $result4 = $book_all->where("boaId=".$boaId)->setField('price2',$bookNowPrice);
        $result5 = $book_all->where("boaId=".$boaId)->setField('author',$bookAuthor);
        $result6 = $book_all->where("boaId=".$boaId)->setField('publisher',$bookPublisher);
        $result7 = $book_all->where("boaId=".$boaId)->setField('pubYear',$bookYear);
        $result8 = $book_all->where("boaId=".$boaId)->setField('pubMonth',$bookMonth);
        $result9 = $book_all->where("boaId=".$boaId)->setField('totalPage',$bookPage);
        $result10 = $book_all->where("boaId=".$boaId)->setField('totalWord',$bookWord);
        $result11 = $book_all->where("boaId=".$boaId)->setField('pubNum',$bookPubNum);
        $result12 = $book_all->where("boaId=".$boaId)->setField('ISBN',$bookISBN);
        $result13 = $books->where("boaId=".$boaId)->setField('price',$bookNowPrice);//books表中的price也要跟着变
        array_push($arr, $result1,$result2,$result3,$result4,$result5,$result6,$result7,$result8,$result9,$result10,$result11,$result12,$result13);
        foreach ($arr as $value) { //遍历数组 检查是否有更新出错
            if($value == false){
                $tmp = 0;
            }
        }
        if($tmp == 0){
            $tip = 1;
            $this->ajaxReturn($tip);
        }else{
            $tip = 2;
            $this->ajaxReturn($tip);
        }
    }
    public function upload(){
        if(!empty($_FILES)){
            // $oldpath = $_POST['oldpath'];
            $this->_upload();
            // $response = 1;
            // $this->ajaxReturn($response);
        }else{
            echo "<script>alert('请选择想要上传的照片！')</script>";
        }
    }
    public function _upload(){
        import("ORG.Net.UploadFile");
        $upload = new \Think\Upload();        //实例化上传类
        $upload->maxSize = 1*600*600;       //设置上传图片大小
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
                // echo '<script>alert("'.$file['savepath'].$file['savename'].'")</script>';
                $img_size = getimagesize($checkpath);  //获得要上传图片的尺寸并检测
                if($img_size[0] > 200 || $img_size[1] > 200){ //0表示宽 1表示高
                    // echo '<script>alert("请选择200*200尺寸的图片上传！")</script>';
                    $this->error("请选择200*200尺寸的图片上传！");
                }
                $this->assign('newpath',$newpath);
            }
            //对数据库进行操作
            $book_all = M('book_all');
            $result = $book_all->where("boaId=".$id)->setField('img', $newpath);
            if($result){
                echo '<script>alert("照片上传成功！且已保存至数据库，想要修改请再次上传")</script>'; 
                echo '<script>location.href="/lyj/BookStore/web/index.php/Admin/BookInfo/alterInfo/id/'.$id.'.html";</script>';
                // $this->success('页面跳转中...',U('Admin/BookInfo/alterInfo/id/'.$id));
                // $this->redirect('Admin/BookInfo/alterInfo/'.$id);
            }else{
                $this->getError();
            }
        }        
    }
}