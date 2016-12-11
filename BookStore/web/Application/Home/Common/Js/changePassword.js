$(function(){
	var tmp = 1;
	var tmp1 = 1;
	var account = $("#account").text();
	// alert(account);
	$("[name='newPassword1']:input").blur(function(){
		var nP2 = $("[name='newPassword2']:input").val();
		var nP1 = $(this).val();
		// alert(nP1);
		// alert(nP2);
		if(nP1 == nP2){
			if(nP1.length < 4){
				$("[name='newPassword2']:input").next().text("密码长度请介于4与15之间");
				tmp = 0
			}else if(nP1.length > 15){
				$("[name='newPassword2']:input").next().text("密码长度请介于4与15之间");
				tmp = 0;
			}else{
				$("[name='newPassword2']:input").next().text("OK");
				tmp = 1;
			}
		}else{
			$("[name='newPassword2']:input").next().text("两次密码不相同，请确认！");
			tmp = 0;
		}
	})
	$("[name='newPassword2']:input").blur(function(){
		var nP1 = $("[name='newPassword1']:input").val();
		var nP2 = $(this).val();
		if(nP1 == nP2){
			if(nP1.length < 4){
				$("[name='newPassword2']:input").next().text("密码长度请介于4与15之间");
				tmp = 0;
			}else if(nP1.length > 15){
				$("[name='newPassword2']:input").next().text("密码长度请介于4与15之间");
				tmp = 0;
			}else{
				$("[name='newPassword2']:input").next().text("OK");
				tmp = 1;
			}
			// $(this).next().text("");
		}else{
			$(this).next().text("两次密码不相同，请确认！");
			tmp = 0;
		}
	})
	$("#submitBtn").click(function(){
		var oldPassword = $("[name='oldPassword']:input").val();
		var nP2 = $("[name='newPassword2']:input").val();
		var nP1 = $("[name='newPassword1']:input").val();
		if(nP1 == "" && nP2 == ""){
			$("[name='newPassword1']:input").next().text("请输入新密码");
			tmp = 0;
		}
		if(oldPassword == ""){
			$("[name='oldPassword']:input").next().text("请输入旧密码");
			tmp1 = 0;
		}
		if(tmp1 == 1){
			$.ajax({
				url:'/lyj/BookStore/web/index.php/Home/PersonalInfo/checkOldPassword',
				data:{"account":account,"oldPassword":oldPassword},
				type:"POST",
				success:function(tip){
					if(tip == 1){
						if(tmp == 1){
							var newPassword = $("[name='newPassword1']:input").val();
							$.ajax({
								url:'/lyj/BookStore/web/index.php/Home/PersonalInfo/submitNewPassword',
								data:{"account":account,"newPassword":newPassword},
								type:"POST",
								success:function(response){
									if(response == 1){
										alert("密码更改成功！");
										location.href="/lyj/BookStore/web/index.php/Home/Index/index.html";
									}else{
										alert("密码更改失败！请检查系统");
									}
								}
							})
						}else{
							return false;
						}
					}else{
						alert("当前密码错误，请重新输入！");
						return false;
						// alert(response);
					}
				}
			});
		}else{
			return false;
		}				
	})
})