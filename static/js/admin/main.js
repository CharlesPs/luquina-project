
$(document).on("ready", function(){
	$("#admin-search").typeahead({
		name : "search",
		prefetch : "static/json/repos.json",
	    template: [
	      '<p class="search-language">{{language}}</p>',
	      '<p class="search-name">{{name}}</p>',
	      '<p class="search-description">{{description}}</p>'
	    ].join(''),
	    engine: Hogan
	});


	$("#admin-search").on("typeahead:selected", function(obj, datum){
		console.log(obj);
		console.log(datum);
	});

	// load js scripts
	load_async_scripts();

	$(".sidebar-toggle").on("click", function(e){
		e.preventDefault();

		var sidebar = $(".sidebar-fixed");

		var sidebar_left = parseInt(sidebar.css("left"));

		var new_left = (!sidebar_left) ? "-230": "0";

		sidebar.animate({
			left : new_left
		}, "fast");

	});

	setup_tabs();
});

function setup_tabs(){
	// 
	$('.nav-tabs a').click(function (e) {
	    e.preventDefault();
	    $(this).tab('show');
    })

	$('.nav-tabs a:first').tab('show');
}

function load_async_scripts(){

	// control login
	if($(".content-control").length){
		$.getScript("static/js/admin/control.js", function(){
			setup_control();
		});
	}

	var script = $(".web-content").attr("data-script");

	if(script){

		var file = "static/js/admin/" + script + ".js";

		$.getScript(file);
	}

	// control login
	if($(".content-control").length){
		$.getScript("static/js/admin/control.js", function(){
			setup_control();
		});
	}
}
