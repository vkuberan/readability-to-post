//author: Vinothkumar Parthasarathy
var jsonValue = '';
jQuery(document).ready( function($){
	/*this section of code is used to call parse functionality */	
	$("#r2p_parse_now").bind("click", function() {
		$('#r2p_parse_now').attr('disabled', 'disabled');
		$('#show_progressbar_button').css('display', 'block');
		$('#show_error_msg').css('display', 'none');
		var purl = $('#r2p_url2parse').val();
		$.ajax({
          type:'POST',
          data:{action:'trigger_readability', posturl: purl},
          url: ajax_vars.ajaxurl,
          success: function(value) {
			jsonValue = JSON.parse(value);			
			if( jsonValue.hasOwnProperty('error') ) {
				$('#show_error_msg').html('<div id="inner_error_msg" class="update-nag"><b>' + jsonValue.error + '</b></div>');
				$('#show_error_msg').css('display', 'block');
			} else {
				$('#post_title').val(jsonValue.title);				
				if( tinymce.editors.length >= 1 ) {
					tinyMCE.activeEditor.setContent(jsonValue.content);
				} else {
					$('#post_content').val(jsonValue.content);
				}
			}			
			$('#r2p_parse_now').removeAttr('disabled');
			$('#show_progressbar_button').css('display', 'none');
          }
        });
		
	});
	
	/*this section of code is used to call post functionality */	
	$("#r2p_save_post").bind("click", function() {

		$('#r2p_save_post').attr('disabled', 'disabled');
		$('#show_progressbar_sp').css('display', 'block');
		$('#show_sp_error_msg').css('display', 'none');
		var sp_title   = $('#post_title').val();
		var sp_content = '';

		if( tinymce.editors.length >= 1 ) {
			sp_content = tinyMCE.activeEditor.getContent();
		} else {
			sp_content = $('#post_content').val();
		}
				
		$.ajax({
          type:'POST',
          data:{action:'trigger_savepost', post_title: sp_title, post_content: sp_content},
          url: ajax_vars.ajaxurl,
          success: function(value) {
			alert(value)
			$('#r2p_save_post').removeAttr('disabled');
			$('#show_progressbar_sp').css('display', 'none');
          }
        });		

	});
});