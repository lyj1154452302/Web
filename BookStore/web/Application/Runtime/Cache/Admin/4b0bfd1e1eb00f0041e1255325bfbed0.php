<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>修改书本信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/lyj/bookstore/web/Application/Admin/Common//jquery-confirm/website/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/lyj/bookstore/web/Public/css/main.css" type="text/css" />
<link rel="stylesheet" href="/lyj/bookstore/web/Application/Admin/Common/Css//alterInfo.css" type="text/css" />
<!-- <link rel="stylesheet" type="text/css" href="/lyj/bookstore/web/Application/Admin/Common/Css//jquery.datetimepicker.css"/> -->
<script src="/lyj/bookstore/web/Public/jquery2.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/jquery.js" type="text/javascript"></script>
<!-- <script src="/lyj/bookstore/web/Public/https://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script> -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<script src="/lyj/bookstore/web/Public/jquery.cookie.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Public/usertip.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Application/Admin/Common/Js//pubtime.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Application/Admin/Common//jquery-confirm/jquery.confirm.js" type="text/javascript"></script>
<!-- <script src="/lyj/bookstore/web/Application/Admin/Common/Js//jquery.confirm.min.js" type="text/javascript"></script> -->
<script src="/lyj/bookstore/web/Application/Admin/Common/Js//alterInfoCheck.js" type="text/javascript"></script>
<!-- <script src="/lyj/bookstore/web/Application/Admin/Common/Js//uploadImg.js" type="text/javascript"></script> -->
<!-- <script src="/lyj/bookstore/web/Application/Admin/Common/Js//jquery.js" type="text/javascript"></script>
<script src="/lyj/bookstore/web/Application/Admin/Common/Js//jquery.datetimepicker.js" type="text/javascript"></script> -->
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
			<a href="my_shopping.php">我的购物车</a>
			<a href="" id="person">个人信息管理</a>
			<div id="person_second_menu">
				<a href="change_passwd.php">修改密码</a>
				<a href="personal_message.php">个人资料设置</a>
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
                    <form action="/lyj/bookstore/web/index.php/Admin/BookInfo/upload" method="post" enctype="multipart/form-data" id="imgform">
                        <input type="file" name="image" style="font-size:15px;"/>
                        <input type="submit" value="上传" id="button" style="color:black;font-size:15px;"/>
                        <input type="hidden" name="boaid" value="<?php echo ($details_vo['boaid']); ?>" />
                        <input type="hidden" name="oldPicPath" value="<?php echo ($details_vo['img']); ?>" />
                        <input type="hidden" name="newPicPath" value="<?php echo ($newpath); ?>" />
                    </form>
                    <div id="img_list">
                         <p>img_list</p>
                    </div>
                </div>
                <div id="right_content">
                    <div id="right_content_header">
                        <span class="rtitle">书名：</span>
                    	<input type="text" name="bookName" value="<?php echo ($details_vo["bookname"]); ?>" style="color:black; height:30px;line-height:30px;font-size:17px;" />
                        <br />
                        <br />
                        <p>
                            <span class="rtitle">书本简介：</span>
                            <textarea name="bookItd" rows="2" cols="30" style="color:black"><?php echo ($details_vo["bookinfo"]); ?></textarea>
                        </p>
                        <br />
                    </div>
                    <div id="right_content_center">
                        <div id="messbox_info">
                            <span class="rtitle">
                                作者：
                            </span>
                            <input type="text" name="bookAuthor" value="<?php echo ($details_vo['author']); ?>" size="10" style="color:black; height:30px;line-height:30px;font-size:17px;" />  
                            <br />
                            <br />
                            <span class="rtitle">
                                出版社：
                            </span>
                            <input type="text" name="bookPublisher" value="<?php echo ($details_vo['publisher']); ?>" size="10" style="color:black; height:30px;line-height:30px;font-size:17px;" />
                            <br />
                            <br />
                            <span class="rtitle">
                                出版时间：
                                <!-- <input type="text" id="datetimepicker" /> -->
                            </span>
                            <span id="year" style="font-size:17px;"><?php echo ($details_vo['pubyear']); ?></span>&nbsp;年&nbsp;<span id="month" style="font-size:17px;"><?php echo ($details_vo['pubmonth']); ?></span>&nbsp;月&nbsp;&nbsp;&nbsp;
                                <select name="year" id="pubyear" style="color:black;">
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                </select>
                                &nbsp;年&nbsp;
                                <select name="month" id="pubmonth" style="color:black;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                &nbsp;月
                            <br />
                            <br />
                            <span class="rtitle">
                                页数：
                            </span>
                            <input type="text" name="bookPage" value="<?php echo ($details_vo['totalpage']); ?>" size="10" style="color:black; height:30px;line-height:30px;font-size:17px;" />  
                            <br />
                            <br />
                            <span class="rtitle">
                                字数：
                            </span>
                            <input type="text" name="bookWord" value="<?php echo ($details_vo['totalword']); ?>" size="10" style="color:black; height:30px;line-height:30px;font-size:17px;" />  
                            <br />
                            <br />
                            <span class="rtitle">
                                出版次数：
                            </span>
                            <input type="text" name="bookPubNum" value="<?php echo ($details_vo['pubnum']); ?>" size="10" style="color:black; height:30px;line-height:30px;font-size:17px;" /> 
                            <br />
                            <br /> 
                            <span class="rtitle">
                                ISBN：
                            </span>
                            <input type="text" name="bookISBN" value="<?php echo ($details_vo['isbn']); ?>" size="10" style="color:black; height:30px;line-height:30px;font-size:17px;" />  
                        </div>
                        <br />
                        <div id="comments">
                            <span class="rtitle">当前评价数：</span>0条
                        </div>
                        <br />
                        <div id="price">
                                <p>
                                    <span class="rtitle">现价：</span>¥&nbsp;<input type="text"name="nowPrice" value="<?php echo ($details_vo['price1']); ?>" size="5" style="color:black; height:25px;line-height:25px;font-size:17px;" />
                                </p>
                                <p>
                                    <span class="rtitle">原价：</span>¥&nbsp;<input type="text"name="oldPrice" value="<?php echo ($details_vo['price2']); ?>" size="5" style="color:black; height:25px;line-height:25px;font-size:17px;" />
                                </p>
                        </div>
                        <br />
                        <div id="check">
                            <button type="button" name="save" id="saveBtn" style="color:black;width:50px;height:30px;font-size:17px;line-height:20px;">保存</button>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
    	</div>
    </body>
</html>