$(function(){
	$(window).bind('beforeunload',function(){   //用户
		return '您输入的内容未保存，确定要离开此页面？';
	});
	$("#button").click(function(){
		$(window).unbind('beforeunload');
	})
	var boaId =$("[name='boaid']:input").val();
	// var oldBookName = $("[name='bookName']:input").val();
	// var oldBookItd = $("textarea[name='bookItd']").text();
	// var oldBookAuthor = $("[name='bookAuthor']:input").val();
	// var oldBookPublisher = $("[name='bookPublisher']:input").val();
	// var oldBookYear = $("#year").text();
	// var oldBookMonth = $("#month").text();
	// var oldBookNowPrice = $("[name='nowPrice']:input").val();
	// var oldBookOldPrice = $("[name='oldPrice']:input").val();
	$("#saveBtn").click(function(){
		var newBookName = $("[name='bookName']:input").val();
		var newBookItd = $("textarea[name='bookItd']").val();
		var newBookAuthor = $("[name='bookAuthor']:input").val();
		var newBookPublisher = $("[name='bookPublisher']:input").val();
		// var newBookYear1 = $("#year").text();
		var newBookYear = $("#pubyear").val();
		// alert();
		var newBookMonth = $("#pubmonth").val();
		var newBookNowPrice = $("[name='nowPrice']:input").val();
		var newBookOldPrice = $("[name='oldPrice']:input").val();
		var newBookTotalPage = $("[name='bookPage']:input").val();
		var newBookTotalWord = $("[name='bookWord']:input").val();
		var newBookPubNum = $("[name='bookPubNum']:input").val();
		var newBookISBN = $("[name='bookISBN']:input").val();
		$.confirm({
			title:"保存",
			text:"确认保存除图片外的其他相关信息吗？<br />(图片在上传时已自动保存，如需修改请再次选择图片上传)",
			confirm:function(button){
				$.ajax({
					url:'/lyj/BookStore/web/index.php/Admin/BookInfo/saveNewInfo',
					// data:"boaId="+boaId+"&bookName="+newBookName+"&bookItd="+newBookItd+"&bookAuthor="+newBookAuthor+
					// "&bookPublisher="+newBookPublisher+"&bookYear="+newBookYear+"&bookMonth="+
					// newBookMonth+"&bookNowPrice="+newBookNowPrice+"&bookOldPrice="+newBookOldPrice,
					data:{"boaId":boaId,"bookName":newBookName,"bookItd":newBookItd,"bookAuthor":newBookAuthor,
					"bookPublisher":newBookPublisher,"bookYear":newBookYear,"bookMonth":newBookMonth,
					"bookOldPrice":newBookOldPrice,"bookNowPrice":newBookNowPrice,"bookPage":newBookTotalPage,
					"bookWord":newBookTotalWord,"bookPubNum":newBookPubNum,"bookISBN":newBookISBN},
					type:"POST",
					// dataType:"json",
					success:function(tip){
						if(tip == 1){
							alert("保存成功!");
							$(window).unbind('beforeunload');
							location.href="/lyj/BookStore/web/index.php/Admin/BookInfo/bookInfo/id/"+boaId+".html";
						}else{
							alert("保存失败!");
						}
					}
				});
			},
			// cancel:function(button){
			// 	alert("保存失败!");
			// },
			confirmButton: "确认",
	    	cancelButton: "暂不保存"
	    });
	})
	// $("#saveBtn").confirm();
	// $("#saveBtn").val();
	// alert($("#saveBtn").text());
	// alert("正常");
})