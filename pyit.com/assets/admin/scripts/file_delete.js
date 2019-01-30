myPath = window.location.protocol+'//'+window.location.hostname+'/pyit.com'+'/admin';

function triggerModal(fileID){
	$("#delete_confirm__modal").modal();
	console.log(fileID);
	$("#modal_file_delete_confirm_btn").attr('href', myPath+'/Files/deactivate_file/'+fileID);
}

function triggerNewsModal(newsID){
	$("#delete_news_confirm_modal").modal();
	console.log(newsID);
	$("#modal_news_delete_confirm_btn").attr('href', myPath+'/News/deactivate_news/'+newsID);
	
}

function triggerNewsEditModal(newsID){
	$.ajax({
		url: myPath+'/News/edit_news/'+newsID,
		method: 'POST',
		dataType: 'JSON',
		success:function(data){
			console.log(data);
			$("#news_upd_id").val(data.news_id);
			$("#news_upd_headline").val(data.news_headline);
			$('.wysihtml5-sandbox').contents().find('.wysihtml5-editor').html(data.news_description);
			
		}
	});
	$("#news_edit_modal").modal();

}