function displayBlogPreview() {
	var text = $('#content').val();

	$.ajax({
		type: "POST",
		url: window.location.href + "/preview",
		data: {
			content: text
		}
	}).done(function(msg) {
		$('#blog-edit-preview').html(msg);
	});
}


$(document).ready(function() {

	$('#content').keyup(function(e) {
		// keyCode 13 = enter key.
		if (e.keyCode == 13) {
			displayBlogPreview();	
		}
		
	});
});