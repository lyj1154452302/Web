<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>注册</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/lyj/bookstore/web/Public/css/main.css" type="text/css"/>
<script src="/lyj/bookstore/web/Public/jquery2.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/jquery.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Application/Home/Common/Js//register.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/usertip.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/jquery.cookie.js" type="text/javascript"></script>

</head>
    <body>
    	<div id="Header">
	<div id="header_content">
		<div id="logo">
            <img src="/lyj/bookstore/web/Public/images/logo.png" alt="" />
        </div>
        <div id="Menu"> <!-- 到时候可通过jquery来设置，判断COOKIE用户或者管理员是否存在，来选择菜单栏中的内容，可用html()方法 -->
	<!-- <a href="<?php echo U('Index/index');?>" title="Home Page">主页</a>
	<a href="<?php echo U('Login/index');?>" title="Login Page">登录</a> 
	<a href="<?php echo U('Register/index');?>" title="Register Page">注册</a> -->
	<?php  if(isset($_COOKIE['username'])){ echo '
			<a href="/lyj/bookstore/web/index.php/Home/Index/index.html" title="Home Page">主页</a>
			<a href="/lyj/bookstore/web/index.php/Home/Cart/cart.html">我的购物车</a>
			<a href="" id="person">个人信息管理</a>
			<div id="personalSecondMenu">
				<a href="/lyj/bookstore/web/index.php/Home/PersonalInfo/changePassword.html">修改密码</a>
				<a href="/lyj/bookstore/web/index.php/Home/PersonalInfo/personalInfo.html">个人资料设置</a>
			</div>
			 <a href="../Login/logout.html">退出当前帐号</a>'; }else if(isset($_COOKIE['admin_name'])){ echo '<a href="/lyj/bookstore/web/index.php/Admin/Index/index.html" title="Home Page">管理界面</a>
			 	   <a href="/lyj/bookstore/web/index.php/Admin/User/index.html" title="User Page">用户管理</a>
				   <a href="/lyj/bookstore/web/index.php/Admin/Order/index.html">订单管理</a>
				   <a href="/lyj/bookstore/web/index.php/Admin/Book/index.html">商品管理</a>
				   <a href="/lyj/bookstore/web/index.php/Home/Login/logout.html">退出当前帐号</a>
			 '; }else{ echo '<a href="/lyj/bookstore/web/index.php/Home/Index/index.html" title="Home Page">主页</a>
			<a href="/lyj/bookstore/web/index.php/Home/Login/index.html" title="Login Page">登录</a> 
			<a href="/lyj/bookstore/web/index.php/Home/Register/index.html" title="Register Page">注册</a>'; } ?>
</div>

        <div id="user_tip">
            
        </div>
		<!-- <form action="search.php" id="search_form" method="post">
			搜索 : <input type="text" id="search_text" name="toyname" size=40 maxlength=40 />
			<input type="submit" value="查找" id="search_submit"/>
		</form> -->
	</div>
</div>

    <!-- // 	$(function(){
    // 		$("#search_sub").click(function(){
    // 			var text = $("#search_text").val(); //因为用户输入的内容在text里面 所以用val()方法获取
    // 			$.ajax({
    // 				type: "POST",
    // 				url: "search.php",
    // 				datatype:"json",
    // 				data: {content_1:text},
    // 				success: function(content){
    // 					if(content == 2){
    // 						alert("系统故障！");
    // 					}else{
    // 						$("#wanku_image").remove();
	   //  					$("#wanku_ad").remove();
	   //  					$("#shopping").remove();

	   //  					var obj = $.parseJSON(content);
	   //  					var html ='';
	   //  					$.each(obj,function(contentIndex,msg){
	   //  						html += '<div class="search_result"><a href="'+msg['toy_id']+'.php"><img src="'+msg['toy_src']+'" alt=""></a><h4><a href="'+msg['toy_id']+'.php">'+msg['toy_name']+'</a></h4><span>价格: '+msg['toy_pro_price']+'元</span></div>';
	   //  					});
	   //  					$("#content").html(html);
	   //  					// alert(html);
    // 					}
    // 				}
    // 			})
    // 		})
    // 	}) -->

    	<div id="register">
			<form action="/lyj/bookstore/web/index.php/Home/Register/insert" method="post" id="reg_form">
				<p>
					<span>帐号: </span><input type="text" name="account" size="25" maxlength="25" placeholder="请输入帐号" >	
				</p>
				<em class="re_tips"></em>
				<p>
					<span>密码: </span><input type="password" name="passwd" size="25" maxlength="25"  placeholder="请输入密码" >	
				</p>
				<em class="re_tips"></em>
				<p>
					<span>确认密码: </span><input type="password" name="passwd_2" size="25" maxlength="25"  placeholder="请确认密码">	
				</p>
				<em class="re_tips"></em>
				<p>
					<span>昵称: </span><input type="text" name="username" size="25" maxlength="25"  placeholder="请输入昵称">	
				</p>
				<em class="re_tips"></em>
				<p>
					<span>性别: </span><input type="radio" name="sex" value="男" checked="checked" >男 
					<input type="radio" name="sex" value="女" <?php if(isset($_POST['sex'])) {if($_POST['sex'] == '女') echo 'checked="checked"';} ?> >女
				</p>
				<p>
					<span>验证码: </span> <input type="text" name="verify" size="20" maxlength="20" placeholder="请输入右侧运算式的结果">
				</p>
				<em class="re_tips"></em>
				<em class="verify"></em>
				<p>
					<input type="submit" name="submit" value="提交">
				</p>
				<div class="reg_error">
					
				</div>
			</form>
		</div>
    </body>
</html>