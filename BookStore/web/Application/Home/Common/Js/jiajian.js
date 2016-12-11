$(function(){
	$("#jia").click(function(){
		var num = $("[name=number]:input").val();
		var number = parseInt(num);
		number += 1;
		$("[name=number]:input").attr("value",number);
	})
	$("#jian").click(function(){
		var num = $("[name=number]:input").val();
		if(num == 1){
			$("[name=number]:input").attr("value",num);
		}else if(num > 1){
			num-=1;
			$("[name=number]:input").attr("value",num);
		}
	})
	$("[name=number]:input").blur(function(){
		var num = $("[name=number]:input").val();
		if(num == ""){
			$("[name=number]:input").attr("value","1");
		}
	})
})