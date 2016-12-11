$(function(){
	$("[name=identity]:checkbox").click(function(){
		$(this).siblings().attr('checked',false);
	})
	$("#log_form").submit(function(){
		var temp = 0;
		var ac = $("[name=account]:input").val();
		var pw = $("[name=passwd]:input").val();
		if(ac == ""){
			$("#logtip_ac").text("请输入帐号");
			$("#logtip_ac").css("display","inline");
			temp = 1;
		}
		if(pw == ""){
			$("#logtip_pw").text("请输入密码");
			$("#logtip_pw").css("display","inline");
			temp = 1;
		}
		if(temp == 1){
			return false;
		}else{
			return true;
		}
	})
})