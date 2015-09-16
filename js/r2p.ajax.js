//author: Vinothkumar Parthasarathy
jQuery(document).ready( function($){
	$("#r2p_parse_now").bind("click", function() {
		$('#r2p_parse_now').attr('disabled', 'disabled');
		alert(ajax_vars.ajaxurl)
	});
});