function setup_blog(){

	$("#form-save").on("submit", function(e){
		e.preventDefault();
	});

	$(".btn-submit").on("click", function(e){
		e.preventDefault();

		save();
	});

	$(".btn-cancel").on("click", function(e){
		e.preventDefault();

		if(confirm("Se perderán los cambios no guardados")){
			$(location).attr("href","admin/blog");
		}
	});

	$(".btn-delete").on("click", function(e){
		e.preventDefault();

		if(confirm("Seguro que deseas eliminar el item?")){

			var entry = $("#entry").val();

			$.ajax({
				url : "admin/blog/delete/" + entry,
				error : function(){},
				success : function(ret){
					if(ret == "1"){
						$(location).attr("href","admin/blog");
					}
				}
			});
		}
	});

    $('#content_es').wysihtml5();
    $('#content_en').wysihtml5();
}

setup_blog();


function save(){
	var data = {};

	data.entry = $("#entry").val();

	data.activo = $("#active").is(":checked");
	data.idPhoto = $("#idPhoto").val();
	data.tags = $.trim($("#tags").val());

	data.caption_es = $.trim($("#caption_es").val());
	data.title_es = $.trim($("#title_es").val());
	data.intro_es = $.trim($("#intro_es").val());
	data.content_es = $.trim($("#content_es").val());

	data.caption_en = $.trim($("#caption_en").val());
	data.title_en = $.trim($("#title_en").val());
	data.intro_en = $.trim($("#intro_en").val());
	data.content_en = $.trim($("#content_en").val());

	// todo: verificar datos

	$.ajax({
		url : "admin/blog/save",
		type : "post",
		data : data,
		dataType : "json",
		error : function(){},
		success : function(ret){

		}
	});

}