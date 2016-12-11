$(function(){
	$("#cartBtn").click(function(){
		var userid = $.cookie('userid');
		var bookId = $("[name='bookId']:input").val();
		var bookName = $("#bookName").text();
		var bookPrice = $("#nowPrice").text();
		var bookNum = $("[name='number']:input").val();

		var countPrice = bookPrice * bookNum;
		// alert(bookid);
		// alert(bookName);
		// alert(bookPrice);
		// alert(bookNum);
		// alert(countPrice);
		$.ajax({
			url:'/lyj/BookStore/web/index.php/Home/Cart/submitCart',
			data:{"userid":userid,"bookId":bookId,"bookName":bookName,"bookPrice":bookPrice,"bookNum":bookNum,
					"countPrice":countPrice},
			type:"POST",
			success:function(response){
				if(response == 1){
					alert("添加成功！");
				}else{
					alert("添加失败，请检查系统！");
				}
			}		
		})
	})
})