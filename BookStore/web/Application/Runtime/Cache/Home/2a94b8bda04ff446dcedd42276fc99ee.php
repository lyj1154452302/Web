<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>玩库</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/lyj/bookstore/web/Public/css/main.css" type="text/css" />
<link rel="stylesheet" href="/lyj/bookstore/web/Application/Home/Common/Css//index.css" type="text/css" />
<script src="/lyj/bookstore/web/Public/jquery2.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/jquery.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/jquery.cookie.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/usertip.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/adchange.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Application/Home/Common/Js//personalMenu.js" type="text/javascript"></script>
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
    	<div id="content">
    		<div id="index_nav">
	    		<ul>
	    			<li><a href="../Details/details.html">文艺</a></li>
					<li><a href="./economy.html">经管</a></li>
					<li><a href="./society.html">社科</a></li>
					<li><a href="./life.html">生活</a></li>
					<li><a href="./education.html">教育</a></li>
					<li><a href="./technology.html">科技</a></li>
					<li><a href="./children.html">童书</a></li>
					<li><a href="./import.html">进口书</a></li>
					<li><a href="./magazine.html">期刊杂志</a></li>
					<li><a href="./network.html">网文</a></li>
	    		</ul>
	    	</div>
	    	<div id="index_ad">
	    		<a href="" id="img_wrap">
					<img src="/lyj/bookstore/web/Public/images/ad1.jpg" alt="">
					<img src="/lyj/bookstore/web/Public/images/ad2.jpg" alt="">
					<img src="/lyj/bookstore/web/Public/images/ad3.jpg" alt="">
					<img src="/lyj/bookstore/web/Public/images/ad4.jpg" alt="">
					<img src="/lyj/bookstore/web/Public/images/ad5.jpg" alt="">
				</a>	
	    	</div>
	    	<div id="image_caption">
				<img src="/lyj/bookstore/web/Public/images/图片1.png" alt="">
				<img src="/lyj/bookstore/web/Public/images/图片1.png" alt="">
				<img src="/lyj/bookstore/web/Public/images/图片1.png" alt="">
				<img src="/lyj/bookstore/web/Public/images/图片1.png" alt="">
				<img src="/lyj/bookstore/web/Public/images/图片1.png" alt="">
			</div>
	    	<div id="index_ad_right">
				<div id="special">
					<img src="/lyj/bookstore/web/Public/images/special_price.jpeg.jpg" alt="">
				</div>
			</div>
    	</div>
    	<div id="shopping">
    		<!-- <?php if(is_array($arr)): foreach($arr as $key=>$prod): endforeach; endif; ?> -->
			<div id="new_menu">
				<!-- bookName获取不到 而bookname就可以 -->
				<div id="new_recommend">
					<h4 class="title">新书推荐</h4>
					<?php if(is_array($nb_recommend)): $i = 0; $__LIST__ = $nb_recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nbrecommend_vo): $mod = ($i % 2 );++$i;?><div class="recommend_list">
							<a href="<?php echo U('Details/details','id='.$nbrecommend_vo['bookid']);?>"><img src="/lyj/bookstore/web/Public/images/books/<?php echo ($nbrecommend_vo['img']); ?>"/></a><h4><a href="<?php echo U('Details/details','id='.$nbrecommend_vo['bookid']);?>"><?php echo ($nbrecommend_vo["bookname"]); ?></a></h4><span>价格: </span> <?php echo ($nbrecommend_vo["price"]); ?> 元
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div id="new_rank">
					<h4 class="title">新书排行</h4>
					<?php if(is_array($nb_rank)): $k = 0; $__LIST__ = $nb_rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nbrank_vo): $mod = ($k % 2 );++$k;?><div class="rank_list">
							<a href="<?php echo U('Details/details','id='.$nbrank_vo['bookid']);?>"><?php echo ($k); ?>.<?php echo ($nbrank_vo["bookname"]); ?></a>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div id="hot_menu">
				<div id="hot_recommend">
					<h4 class="title">热销书推荐</h4>
					<?php if(is_array($hb_recommend)): $i = 0; $__LIST__ = $hb_recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hbrecommend_vo): $mod = ($i % 2 );++$i;?><div class="recommend_list">
							<a href="<?php echo U('Details/details','id='.$hbrecommend_vo['bookid']);?>"><img src="/lyj/bookstore/web/Public/images/books/<?php echo ($hbrecommend_vo['img']); ?>"/></a><h4><a href="<?php echo U('Details/details','id='.$hbrecommend_vo['bookid']);?>"><?php echo ($hbrecommend_vo["bookname"]); ?></a></h4><span>价格: </span> <?php echo ($hbrecommend_vo["price"]); ?> 元
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div id="hot_rank">
					<h4 class="title">热销书排行</h4>
					<?php if(is_array($hb_rank)): $k = 0; $__LIST__ = $hb_rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hbrank_vo): $mod = ($k % 2 );++$k;?><div class="rank_list">
							<a href="<?php echo U('Details/details','id='.$hbrank_vo['bookid']);?>"><?php echo ($k); ?>.<?php echo ($hbrank_vo["bookname"]); ?></a>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="public_footermes_module">
				<div class="
				">
				<span>Copyright (C) 当当网 2004-2014, All Rights Reserved</span>
				</div>
				<div class="footer_copyright">
				<span>
				<a rel="nofollow" target="_blank" href="http://www.miibeian.gov.cn/">京ICP证041189号</a>
				</span>
				<span class="sep">&nbsp;|&nbsp;</span>
				<span>出版物经营许可证 新出发京批字第直0673号</span>
				</div>
				<div class="footer_copyright">
				<span>当当网收录的免费小说作品、频道内容、书友评论、用户上传文字、图片等其他一切内容及在当当网所做之广告均属用户个人行为，与当当网无关。</span>
				</div>
			</div>
		</div>
    </body>
</html>