$(function(){
	$(window).bind('beforeunload',function(){   //用户
		return '您输入的内容未保存，确定要离开此页面？';
	});
	var sex = $("#oriSex").text();
	$("input[name='sex'][value='"+sex+"']").attr('checked','checked');
	$("#goToChange").click(function(){
		var account = $("#account").text();
		var username = $("[name='username']:input").val();
		var sex = $("[name='sex']:checked").val();

		$.ajax({
			url:'/lyj/BookStore/web/index.php/Home/PersonalInfo/submitPersonalInfo',
			data:{"account":account,"username":username,"sex":sex},
			type:"POST",
			success:function(response){
				if(response == 1){
					alert("修改成功！");
					$(window).unbind('beforeunload');
					location.href="/lyj/BookStore/web/index.php/Home/PersonalInfo/personalInfo.html";
				}else{
					alert("修改失败！请检查系统");
				}
			}
		});
		// $.confirm({
		// 	title:"确认保存",
		// 	text:"确认保存吗?",
		// 	confirm:function(button){
				
		// 	},
		// 	confirmButton:"确认保存",
		// 	cancelButton:"暂不保存"
		// })
	})
})