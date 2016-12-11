$(function(){
	var $imgrolls = $("#image_caption img");
	$imgrolls.css("opacity","0.7");
	var len = $imgrolls.length;
	var index = 0;
	var adTimer = null;
	$imgrolls.mouseover(function(){
		index = $imgrolls.index(this);
		showImg(index);
		$("#image_caption").find("img").eq(index).attr("src","/lyj/BookStore/web/Public/images/图片2.png")
				 .siblings().attr("src","/lyj/BookStore/web/Public/images/图片1.png");
	}).eq(0).mouseover();

	$("#index_ad").hover(function(){
		if(adTimer){
			clearInterval(adTimer);
		}
	},function(){  //这个setInterval作用：当鼠标不去触发任何变换图像的行为时，图像区域将按照一定周期自动切换
		adTimer = setInterval(function(){  //setInterval()按照设定的时间，周期性的调用函数或计算表达式
			showImg(index);							
			index++;
			if(index == len){
				index = 0;
			}
		},5000);
	}).trigger("mouseleave");
});
	
function showImg(index){
	var $rollobj = $("#index_ad");
	var $rolllist = $rollobj.find("#image_caption img");
	$("#img_wrap").find("img").eq(index).stop(true,true).fadeIn()
				  .siblings().fadeOut();
}
