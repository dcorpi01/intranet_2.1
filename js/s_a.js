$(document).ready(function() {
	$("#search").keyup(function() {
		$.post("controller.php", {cache:false, name:$(this).val()}, function(response) {
			$("#result").html(response);
		});
	});
});