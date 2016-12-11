$(function(){
	var array = new Array();
	$("[name=del_btn]:button").click(function(){
		$("[name='delete']:checked").each(function(){
			var text = $(this).siblings(".account").text();
			array.push(text);
		})
		if(array.length == 0){
			alert("请选择要删除的用户!");
			return false;
		}
		// for (var i = 0; i < array.length; i++) {
		// 	alert(array[i]);
		// };
		$.ajax({
			url:'/lyj/BookStore/web/index.php/Admin/User/delete',
			data: {"deleteUsers":array},
			dataType:"json",
			type:"POST",
			// traditional:true,
			success:function(response){
				if(response == 1){
					array = [];
					alert("删除成功！");
					location.reload();
					$("[name='delete']:checkbox").each(function(){
						$(this).attr("checked",false);
					})
				}else{
					alert("删除失败，请检查系统！");
				}
			}
		});
	})
})