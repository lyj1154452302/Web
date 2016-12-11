$(function(){
	$(window).bind('beforeunload',function(){   //用户
		return '您输入的内容未保存，确定要离开此页面？';
	});
	
	$("#submitBtn").click(function(){
		var bookName = $("[name='bookName']:input").val();
		var bookItd = $("textarea[name='bookItd']").val();
		// alert(bookItd);
		var bookAuthor = $("[name='bookAuthor']:input").val();
		var bookPublisher = $("[name='bookPublisher']:input").val();
		var bookYear = $("#pubyear").val();
		// alert(bookYear);
		var bookMonth = $("#pubmonth").val();
		// alert(bookMonth);
		var bookPage = $("[name='bookPage']:input").val();
		// alert(bookPage);
		var bookWord = $("[name='bookWord']:input").val();
		// alert(bookWord);
		var bookPubNum = $("[name='bookPubNum']:input").val();
		// alert(bookPubNum);
		var bookISBN = $("[name='bookISBN']:input").val();
		var nowPrice = $("[name='nowPrice']:input").val();
		var oldPrice = $("[name='oldPrice']:input").val();
		var path = $("#path").val();
		// var $bookColumn = $("[name='bookColumn'][checked='checked']:checkbox");
		var ifNbrecommend = 0;
		var ifNbrank = 0; 
		var ifHbrecommend = 0;
		var ifHbrank = 0;

		var errors = new Array();
		var temp = 1;

		$("[name=bookColumn]:checked:checkbox").each(function(){
			if($(this).val() == '新书推荐'){
				ifNbrecommend = 1;
			}else if($(this).val() == '新书排行'){
				ifNbrank = 1;
			}else if($(this).val() == '热销书推荐'){
				ifHbrecommend = 1;
			}else if($(this).val() == '热销书排行'){
				ifHbrank = 1;
			}
			// alert($(this).val());
		});
		if(bookName == ""){
			$("[name='bookName']:input").next().text("请填写书名");
			errors.push(0);
		}else{
			$.ajax({
				url:'/lyj/BookStore/web/index.php/Admin/Book/checkBookName',
				data:{"bookName":bookName},
				type:"POST",
				success:function(response){
					if(response == 1){
						$("[name='bookName']:input").next().text("");
						errors.push(1);
					}else{
						$("[name='bookName']:input").next().text("该书已存在，请更换");
						errors.push(0);
					}
				}
			});
		}

		if(bookItd == ""){
			$("textarea[name='bookItd']").next().text("请填写书本简介");
			errors.push(0);
		}else{
			$("textarea[name='bookItd']").next().text("");
			errors.push(1);
		}

		if(bookAuthor == ""){
			$("[name='bookAuthor']:input").next().text("请填写作者");
			errors.push(0);
		}else{
			$("[name='bookAuthor']:input").next().text("");
			errors.push(1);
		}

		if(bookPublisher == ""){
			$("[name='bookPublisher']:input").next().text("请填写出版社");
			errors.push(0);
		}else{
			$("[name='bookPublisher']:input").next().text("");
			errors.push(1);
		}

		if(bookPage == ""){
			$("[name='bookPage']:input").next().text("请填写书本页数");
			errors.push(0);
		}else if(bookPage == 0){
			$("[name='bookPage']:input").next().text("请输入大于0的数字");
			errors.push(1);
		}else if(bookPage > 0){
			p = /^\d{1,11}$/;
			if(!p.test(bookPage)){
				$("[name='bookPage']:input").next().text("请输入1-11位的数字");
				errors.push(0);
			}
		}else{
			$("[name='bookPage']:input").next().text("");
			errors.push(1);
		}

		if(bookWord == ""){
			$("[name='bookWord']:input").next().text("请填写书本字数");
			errors.push(0);
		}else if(bookWord == 0){
			$("[name='bookWord']:input").next().text("请输入大于0的数字");
			errors.push(0);
		}else if(bookWord > 0){
			p = /^\d{1,11}$/;
			if(!p.test(bookWord)){
				$("[name='bookWord']:input").next().text("请输入1-11位的数字");
				errors.push(0);
			}
		}else{
			$("[name='bookWord']:input").next().text("");
			errors.push(1);
		}

		if(bookPubNum == ""){
			$("[name='bookPubNum']:input").next().text("请填写出版次数");
			errors.push(0);
		}else if(bookPubNum == 0){
			$("[name='bookPubNum']:input").next().text("请输入大于0的数字");
			errors.push(0);
		}else if(bookPubNum > 0){
			p = /^\d{1,5}$/;
			if(!p.test(bookPubNum)){
				$("[name='bookPubNum']:input").next().text("请输入1-5位的数字");
				errors.push(0);
			}
		}else{
			$("[name='bookPubNum']:input").next().text("");
			errors.push(1);
		}

		if(bookISBN == ""){
			$("[name='bookISBN']:input").next().text("请填写书本的ISBN");
			errors.push(0);
		}
		else{
			$("[name='bookISBN']:input").next().text("");
			errors.push(1);
		}

		if(nowPrice == ""){
			$("[name='nowPrice']:input").next().text("请填写现价");
			errors.push(0);
		}else{
			k = /([0-9]+\.[0-9]{2})[0-9]*/;
			if(!k.test(nowPrice)){
				$("[name='nowPrice']:input").next().text("请按xx.xx格式填写");
				errors.push(0);
			}else{
				$("[name='nowPrice']:input").next().text("");
				errors.push(1);
			}
		}

		if(oldPrice == ""){
			$("[name='oldPrice']:input").next().text("请填写原价");
			errors.push(0);
		}else{
			if(!k.test(oldPrice)){
				$("[name='oldPrice']:input").next().text("请按xx.xx格式填写");
				errors.push(0);
			}else{
				$("[name='oldPrice']:input").next().text("");
				errors.push(1);
			}
		}

		if(path == ""){
			$("#imgTip").text("请上传图片");
			errors.push(0);
		}else{
			$("#imgTip").text("");
			errors.push(1);
		}
		$.each(errors,function(n,value){
			if(value == 0){
				temp = 0;
				// alert("0");
			}
			// alert(value);
		})
		
		if(temp == 0){
			// alert(temp);
			return false;
		}else{	
			$.confirm({
				title:"确认提交",
				text:"确认保存吗？",
				confirm:function(button){
					$.ajax({
						url:'/lyj/BookStore/web/index.php/Admin/Book/add',
						data:{"bookName":bookName,"bookItd":bookItd,"bookAuthor":bookAuthor,
							"bookPublisher":bookPublisher,"bookYear":bookYear,"bookMonth":bookMonth,
							"oldPrice":oldPrice,"nowPrice":nowPrice,"bookPage":bookPage,
							"bookWord":bookWord,"bookPubNum":bookPubNum,"bookISBN":bookISBN,
							"imgPath":path,"ifNbrecommend":ifNbrecommend,"ifNbrank":ifNbrank,
							"ifHbrecommend":ifHbrecommend,"ifHbrank":ifHbrank},
						type:"post",
						success:function(tip){
							if(tip == 1){
								alert("上架成功！");
								$(window).unbind('beforeunload');
								location.href="/lyj/BookStore/web/index.php/Admin/Book/index.html";
							}else if(tip == 2){
								alert("上架失败，请检查book_all!");
							}else{
								alert("上架失败，请检查books!");
							}
						}
					});
				},
				confirmButton: "确认",
	    		cancelButton: "暂不保存"
			})
		}
	})
})