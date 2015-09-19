//author: Vinothkumar Parthasarathy
var jsonValue = '';
jQuery(document).ready( function($){	
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
});