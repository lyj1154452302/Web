$(function(){
	var sex = $("#sex1").text();
	$("input[name='sex'][value='"+sex+"']").attr('checked','checked');
	// if($("input[name='sex']").val() != sex){
	// 	$("input[name='sex']").val(sex);
	// }
	$("[name='sex']:radio").bind('click',function(){
		$(this).attr('checked','checked');
		$(this).siblings().attr('checked',false);
		// var sex = $("#sex1").text();
		// alert($("input[name='sex'][checked='checked']").val());
		// if($("input[name='sex'][checked='checked']").val() != sex){
		// 	var temp = $("input[name='sex'][checked='checked']").val();
		// 	$("#sex1").text(temp);
		// }
	})
})