$(function(){
	if($("form").attr("id") == "reg_form"){
		var a = parseInt(Math.random()*10);
		var b = parseInt(Math.random()*10);
		var c = a + b;
		$(".verify").text(a+"+"+b+"=?");
		$("[name=verify]:input").focus(function(){
			var $par = $(this).parent("p");
			if($(this).val() ==""){
				$par.next().text("请输入右侧运算式的结果");
			}else{
				if($(this).val() == c){
					$par.next().text("OK");
				}else{
					$par.next().text("验证码输入错误");
				}
			}
		})
		$("[name=verify]:input").blur(function(){
			var $par = $(this).parent("p");
			if($(this).val() == ""){
				$par.next().text("");
			}else{
				if($(this).val() == c){
					$par.next().text("OK");
				}else{
					$par.next().text("验证码输入错误");
				}
			}
		})
		$(":input").each(function(){
			var $obj = $(this);
			if($obj.attr("name") == "account"){
				var $par = $obj.parent("p");
				var text = $obj.val();
				$obj.focus(function(){
					if(text == ""){
						$par.next().text("长度为4-20,只可由英文、数字组成");
					}	
				})
				$obj.blur(function(){
					var newtext = $obj.val();
					if(newtext == ""){
						$par.next().text("");
					}else{
						if(newtext.length < 4){
							$par.next().text("帐号长度不能小于4");
						}else if(newtext.length > 20){
							$par.next().text("帐号长度不能大于20");
						}else{
							var p = /[0-9a-zA-Z]/;
							if(!p.test(newtext)){
								$par.next().text("帐号长度为4-20,只可由英文、数字组成");
							}else{
								$.ajax({
									url:'/lyj/BookStore/web/index.php/Home/Register/checkAccount',
									data: {"account":newtext},
									dataType:"json",
									type:"POST",
									// traditional:true,
									success:function(response){
										if(response == 1){
											$par.next().text("OK");
										}else{
											$par.next().text("该账号已存在，请更换！");
										}
									}
								});
								$par.next().text("OK");
							}
						}
					}
				})
			}else if($obj.attr("name") == "passwd"){
				var $par = $obj.parent("p");
				var text = $obj.val();
				$obj.focus(function(){
					if(text == ""){
						$par.next().text("密码长度为4-15");
					}
				})
				$obj.blur(function(){
					var newtext = $obj.val();
					if(newtext == ""){
						$par.next().text("");
					}else{
						if(newtext.length < 4){
							$par.next().text("密码长度不能小于4");
						}else if(newtext.length > 15){
							$par.next().text("密码长度不能大于15");
						}else{
							$par.next().text("OK");
						}
					}
				})
			}else if($obj.attr("name") == "passwd_2"){
				var $par = $obj.parent("p");
				$obj.focus(function(){
					var newtext = $obj.val();
					if(newtext == ""){
						$par.next().text("请确认密码");
					}else{
						if(newtext == $("[name=passwd]:input").val()){
							$par.next().text("OK");
						}else{
							$par.next().text("两次密码不同，请检查");
						}
					}
				})
				$obj.blur(function(){
					var newtext = $obj.val();
					if(newtext == ""){
						$par.next().text("");
					}else{
						if(newtext == $("[name=passwd]:input").val()){
							$par.next().text("OK");
						}else{
							$par.next().text("两次密码不同，请检查");
						}
					}
				})
			}else if($obj.attr("name") == "username"){
				var $par = $obj.parent("p");
				$obj.focus(function(){
					var newtext = $obj.val();
					if(newtext == ""){
						$par.next().text("请输入昵称");
					}else{
						$par.next().text("OK");
					}
				})
				$obj.blur(function(){
					var newtext = $obj.val();
					if(newtext == ""){
						$par.next().text("");
					}else{
						$par.next().text("OK");
					}
				})
			}
		})
		function mySubmit(flag){
			return flag;
		}
		$("#reg_form").submit(function(){
			// alert("!");
			var $account = $("[name=account]:input");
			var $passwd = $("[name=passwd]:input");
			var $passwd_2 = $("[name=passwd_2]:input");
			var $username = $("[name=username]:input");
			var $sex = $("[name=sex]:input");
			var $verify = $("[name=verify]:input");

			$(".reg_error").html("");

			var errors = new Array();

			if($account.parent("p").next().text() == ""){
				errors.push("请输入帐号");
			}else if($account.parent("p").next().text() == "OK"){
				errors.push("OK");
			}else{
				errors.push($account.parent("p").next().text());
			}

			if($passwd.parent("p").next().text() == ""){
				errors.push("请输入密码");
				// alert(errors[1]);
			}else if($passwd.parent("p").next().text() == "OK"){
				errors.push("OK");
			}else{
				errors.push($passwd.parent("p").next().text());
			}

			if($passwd_2.parent("p").next().text() == ""){
				errors.push("请确认密码");
			}else if($passwd_2.parent("p").next().text() == "OK"){
				errors.push("OK");
			}else{
				errors.push($passwd_2.parent("p").next().text());
			}

			if($username.parent("p").next().text() == ""){
				errors.push("请输入昵称");
			}else if($username.parent("p").next().text() == "OK"){
				errors.push("OK");
			}else{
				errors.push($username.parent("p").next().text());
			}
			// if($sex.attr("checked") == "checked"){select in($sex)==""
			// 	errors.push("OK");
			// 	alert("!!!");
			// }else{
			// 	errors.push("请选择性别");
			// }
			// alert("2");

			if($verify.parent("p").next().text() == ""){
				errors.push("请输入验证码");
			}else if($verify.parent("p").next().text() == "OK"){
				errors.push("OK");
			}else{
				errors.push($verify.parent("p").next().text());
			}
			// alert("!!");
			var temp = new Array();
			$.each(errors,function(n,value){
				// alert("2");
				// alert(n);
				// alert(value);
				if(value != "OK"){
					// alert(value);
					temp.push(value);
				}
			})
			var tip = 1;
			$.each(temp,function(n,value){
				if(value != "OK"){
					tip = 0;
					return false;
				}
			})

			if(tip == 0){
				$.each(temp,function(n,value){
					// alert(value);
					$(".reg_error").append("<em>"+value+"</em><br />");
				})
				return mySubmit(false);
			}else{
				return mySubmit(true);
			}
			
			// for(i=0;i<3;i++){
			// 	alert(i);
			// }
			// $.each(errors,function(n,value){
			// 	alert(value);
			// })
			// $(errors).each(function(){
			// 	alert("!");
			// 	if($(this).val() == "OK"){
			// 		return mySubmit(true);
			// 		// alert($(this).val());
			// 	}else{
			// 		$(".reg_error").html("<strong>"+$(this).val()+"</strong>");
			// 		return mySubmit(false);
			// 	}
				// })
			})
	}
	
})
