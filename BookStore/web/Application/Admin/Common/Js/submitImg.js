$(function(){
	var button = $("#submitImg"),interval;
	new AjaxUpload(button,{
		action:'/lyj/BookStore/web/index.php/Admin/Book/upload',
		// data:{},
		name:'image',
		onSubmit:function(file,ext){
			if (!(ext && /^(jpg|JPG|png|PNG|gif|GIF)$/.test(ext))) { 
		        alert("您上传的图片格式不对，请重新选择！"); 
		        return false; 
	       }
		},
		onComplete:function(file,response){
			flag = response;

			if(response == 2){
				alert("请选择200*200尺寸的图片上传！");
			}else{
				alert("上传成功！");
				// flag.setContentType("text/html");
				// flag.setCharacterEncoding("UTF-8");
				// flag.Response.ContentType = "text/html";
				alert(flag);
				$("#imgPath").attr('src','/lyj/BookStore/web/Public/images/books/'+flag);
				$("#path").val(flag);
			}
		}
	});
})