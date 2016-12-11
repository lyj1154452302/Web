$(function(){
	var year = $("#year").text();
	var month = $("#month").text();
	// alert(year);
	$("#pubyear > option[value='"+year+"']").attr('selected','selected');
	$("#pubmonth > option[value='"+month+"']").attr('selected','selected');

	$("#pubyear").bind('change',function(){
		var year1 = $(this).val();
		$("#year").text(year1);
	})
	$("#pubmonth").bind('change',function(){
		var month1 = $(this).val();
		$("#month").text(month1);
	})
})