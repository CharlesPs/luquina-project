function setup_control(){
	$("#login-form").on("submit", control.ajax_submit);
}

var control = {};

control.ajax_submit = function(e){
	e.preventDefault();

	var data = {};

	data.email = $.trim($("#admin-mail").val());
	data.pass = $.trim($("#admin-pass").val());
	data.save = ($("#admin-save").is(':checked')) ? 1 : 0;

	$.ajax({
		url : '/admin/control/login',
		data : data,
		type : 'post',
		success : function(ret){
			if(ret == "1"){

				var backto = $("#login-form").attr("data-backto") || "admin/";
				$(location).attr("href", backto);
			}
		}
	});
}
