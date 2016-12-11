<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        // $products = M('products');
        // $arr = $products -> where("jd_products.prodId = ".$id)
        //                  -> join("left join jd_prods ON jd_products.prodId = jd_prods.prodId")
        //                  -> join("left join jd_comments ON jd_products.prodId = jd_comments.cId")
        //                  -> join("left join jd_colors ON jd_products.colorId = jd_colors.colorId")
        //                  -> field("prodInfo,prodName,img,simimg,price1,price2,productId,jd_comments.*,count(cId),jd_products.prodId,colorName")
                     
        //               -> select();
        // $proList_f1[$k] = $products->where('proTypeId='.$v)
        //                                 ->join('jd_prods on jd_products.prodId = jd_prods.prodId')
        //                                 ->limit(10)
        //                                 ->select();

    	$books = M('books');
        //新书推荐区
    	$list_1 = $books ->where('ifNbrecommend=1')
                         ->join('bookstore_book_all on bookstore_books.boaId = bookstore_book_all.boaId')
                         ->limit(4)
                         // ->field('bookId,img,bookName,price')
                         ->select();
       	$this->assign('nb_recommend',$list_1);
        //新书排行区
        $list_2 = $books ->where('ifNbrank=1')
                         ->join('bookstore_book_all on bookstore_books.boaId = bookstore_book_all.boaId')
                         ->limit(4)
                         ->select();
        $this->assign('nb_rank',$list_2);
        //热销书推荐区
        $list_3 = $books ->where('ifHbrecommend=1')
                         ->join('bookstore_book_all on bookstore_books.boaId = bookstore_book_all.boaId')
                         ->limit(4)
                         ->select();
        $this->assign('hb_recommend',$list_3);         
        //热销书排行区
        $list_4 = $books ->where('ifHbrank=1')
                         ->join('bookstore_book_all on bookstore_books.boaId = bookstore_book_all.boaId')
                         ->limit(4)
                         ->select();
        $this->assign('hb_rank',$list_4);        
    	// $nb_rank = M('newbook_rank');
    	// $list_nbrank = $nb_rank->limit(8)->select();
    	// $this->assign('nb_rank',$list_nbrank);

    	// $hb_recommend = M('hotbook_recommend');
    	// $list_hbrecommend = $hb_recommend->limit(4)->select();
    	// $this->assign('hb_recommend',$list_hbrecommend);

    	// $hb_rank = M('hotbook_rank');
    	// $list_hbrank = $hb_rank->limit(8)->select();
    	// $this->assign('hb_rank',$list_hbrank);

    	$this->display();
    }
}