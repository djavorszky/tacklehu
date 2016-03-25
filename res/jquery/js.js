function displayBlogPreview() {
	var text = $('#content').val();

	$.ajax({
		type: "POST",
		url: window.location.href + "-preview",
		data: {
			content: text
		}
	}).done(function(msg) {
		$('#blog-edit-preview').html(msg);
	});
}
