<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>书本详情</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/lyj/bookstore/web/Public/css/main.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="/lyj/bookstore/web/Application/Admin/Common/Css//details.css"/>
<script src="/lyj/bookstore/web/Public/jquery2.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/jquery.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/jquery.cookie.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/usertip.js" type="text/javascript"></script>
</head>
    <body>
		<div id="header">
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

    	</div>
    	<div id="container">
    		<div id="jianjie">
                <div id="left_img">
                    <div id="img">
                        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$details_vo): $mod = ($i % 2 );++$i;?><img src="/lyj/bookstore/web/Public/images/books/<?php echo ($details_vo['img']); ?>" alt="" /><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div id="img_list">
                        <p>img_list</p>
                    </div>
                </div>
                <div id="right_content">
                    <div id="right_content_header">
                        <h3><?php echo ($details_vo["bookname"]); ?></h3>
                        <br />
                        <p><?php echo ($details_vo["bookinfo"]); ?></p>
                    </div>
                    <div id="right_content_center">
                        <div id="messbox_info">
                            <span id="author">
                                作者:&nbsp;<?php echo ($details_vo['author']); ?>
                            </span>
                            <span id="publisher">
                                &nbsp;&nbsp;&nbsp;&nbsp;出版社:&nbsp;<?php echo ($details_vo['publisher']); ?>
                            </span>
                            <span id="pubTime">
                                &nbsp;&nbsp;&nbsp;&nbsp;出版时间:&nbsp;<?php echo ($details_vo['pubyear']); ?>年<?php echo ($details_vo['pubmonth']); ?>月
                            </span>
                            <br />
                            <br />
                            <span>
                                页数:&nbsp;<?php echo ($details_vo['totalpage']); ?>
                            </span>
                            <span>
                                &nbsp;&nbsp;&nbsp;&nbsp;字数:&nbsp;<?php echo ($details_vo['totalword']); ?>
                            </span>
                            <span>
                                &nbsp;&nbsp;&nbsp;&nbsp;出版次数:&nbsp;<?php echo ($details_vo['pubnum']); ?>
                            </span>
                            <span>
                                &nbsp;&nbsp;&nbsp;&nbsp;ISBN:&nbsp;<?php echo ($details_vo['isbn']); ?>
                            </span>
                        </div>
                        <br />
                        <div id="comments">
                            当前评价数:0条
                        </div>
                        <br />
                        <div id="price">
                            <div class="priceNow">
                                <p>当当价</p>
                                <p class="nowprice">¥<?php echo ($details_vo['price1']); ?></p>
                            </div>
                            <div class="priceOri">
                                <span>¥<?php echo ($details_vo['price2']); ?></span>
                            </div>
                        </div>
                    </div>
                    <div id="alter">
                    	&nbsp;&nbsp;<a href="<?php echo U('BookInfo/alterInfo','id='.$details_vo['boaid']);?>"><input type="button" value="点此修改此书本信息" style="color:black;"/></a>
                    </div>
                </div>
            </div>
    	</div>
    </body>
</html>