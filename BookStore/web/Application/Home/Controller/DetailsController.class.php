<?php
namespace Home\Controller;
use Think\Controller;
class DetailsController extends BaseController {
	public function details(){
		// $products = M('products');
  //       $arr = $products -> where("jd_products.prodId = ".$id)
  //                        -> join("left join jd_prods ON jd_products.prodId = jd_prods.prodId")
  //                        -> join("left join jd_comments ON jd_products.prodId = jd_comments.cId")
  //                        -> join("left join jd_colors ON jd_products.colorId = jd_colors.colorId")
  //                        -> field("prodInfo,prodName,img,simimg,price1,price2,productId,jd_comments.*,count(cId),jd_products.prodId,colorName")
                     
  //                     -> select();

		$id = $_GET['id']?$_GET['id']:1;
		$books = M('books');
		$arr = $books -> where("bookId=".$id)
					  -> join("bookstore_book_all on bookstore_books.boaId = bookstore_book_all.boaId")
					  // -> join("bookstore_paper on bookstore_books.paperId = bookstore_paper.paperId")
				   // 	  -> join("bookstore_packing on bookstore_books.packingId = bookstore_packing.packingId")
					  // -> field("bookInfo,bookName,img,price1,price2,author,publisher,pubTime,totalPage,totalWord,pubNum,ISBN")
					  -> select();

		$this->assign('arr',$arr);
		$this->display();
	}
}