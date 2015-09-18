<?php
/* Author: Vinothkumar Parthasarathy
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */
 
 // Exit if accessed directly
 if ( ! defined( 'ABSPATH' ) ) exit;

?>
<div class="wrap">
	<h2>Parse And Export</h2>
</div>

<table class="form-table">
	<tr valign="top">
    	<th scope="row"><span class="r2plabel">URL to Parse</span></th>
		<td><input class="r2ptextbox" type="text" style="width:50%;" id="r2p_url2parse" name="r2p_url2parse" value="http://goo.gl/OyEcHf" />&nbsp;<i>e.g http://goo.gl/0tA2a5</i></td>
	</tr>
	<tr valign="top">    	
		<td colspan="2">
        	<input type="button" id="r2p_parse_now" class="button-primary" value="Parse Now" />&nbsp;
            <span id="show_progressbar_button"><img src="<?php echo R2P_PLUGIN_IMAGE . 'progressbar.gif'; ?>" /></span>
            <span id="show_error_msg"></span>        	
        </td>
	</tr>
</table>


<table class="form-table">
	<tr valign="top">
    	<th scope="row"><span class="r2plabel">Page Title</span></th>
		<td>
        	<div id="titlewrap">
		        <input class="r2ptextbox" type="text" name="post_title" size="30" value="" id="post_title" autocomplete="off">
            </div>
        </td>
	</tr>
	<tr valign="top">
    	<th scope="row"><span class="r2plabel">Page Content</span></th>
		<td>
			<?php 
				$settings = array(
					'tinymce' => array(
						'editor_class' => 'post-content'
					)
				);
				wp_editor( '', 'post_content', $settings ); 
			?>
        </td>
	</tr>
</table>

