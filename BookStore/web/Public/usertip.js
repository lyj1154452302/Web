$(function(){
    if($.cookie('username')){
        $("#user_tip").html('<h3>'+$.cookie('username')+'，你好！</h3>');
    }else if($.cookie('admin_name')){
    	$("#user_tip").html('<h3>'+$.cookie('admin_name')+'，你好！</h3>');
    }else{
    	$("#user_tip").html('<h3>游客，你好！</h3>');
    }
});
