<?php
/* Setting Page which utilizes the Wordpress Settings API.
 * Author: Vinothkumar Parthasarathy
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */
 
 // Exit if accessed directly
 if ( ! defined( 'ABSPATH' ) ) exit; 
 
 $errMsg    = '';
 $updateCnt = 0;
  
 if (isset( $_REQUEST['_wpnonce'] ) ) {
	 $r2p_setting_token 	 = isset( $_REQUEST['r2p_setting_token'] ) ? trim($_REQUEST['r2p_setting_token']) : '';
	 $r2p_setting_ssl_verify = isset( $_REQUEST['r2p_setting_ssl_verify'] ) ? trim($_REQUEST['r2p_setting_ssl_verify']) : '';
	 
	 if ($r2p_setting_token == '') {
		 $errMsg .= 'Readability Parser Token should not be Empty<br />';
		 update_option( 'r2p_setting_token',  $r2p_setting_token );
	 } else {
		update_option( 'r2p_setting_token',  $r2p_setting_token ); 
		$updateCnt++;
	 }
	 
	 if ( $r2p_setting_ssl_verify == '' ) 
	 	update_option( 'r2p_setting_ssl_verify',  'off' );
	else
	 	update_option( 'r2p_setting_ssl_verify',  'on' );
 }
 $r2p_setting_token 		= get_option('r2p_setting_token', '');	
 $r2p_setting_ssl_verifyc	= get_option('r2p_setting_ssl_verify', 'on');	
?>
<div class="wrap">
	<h2>Readability Settings</h2>
    <?php if ($updateCnt == 1 ) { ?>
	    <div id="message" class="updated">			
            <p style="margin-top:10px; margin-bottom:10px"><strong>Readability Settings Updated.</strong></p>
		</div>
    <?php } ?>
    <?php if ($errMsg != '' ) { ?>
  	    <div id="message" class="updated">
		    <p style="margin-top:10px; margin-bottom:10px"><span style="color: #ff0000;"><strong><?php echo $errMsg; ?></strong></span></p>
        </div>
    <?php } ?>    
    
    <form method="post">
		<?php settings_fields('Readability2Post_Options'); ?>
		<table class="form-table">
        	<tr valign="top"><th scope="row">Readability Parser Token</th>
            	<td><input type="text" style="width:225px;" name="r2p_setting_token" value="<?php echo $r2p_setting_token; ?>" /></td>
			</tr>
			<tr valign="top"><th scope="row">Enable SSL Verify Peer:</th>
            	<td><input type="checkbox" name="r2p_setting_ssl_verify" <?php if ($r2p_setting_ssl_verifyc == 'on') { echo 'checked="checked"'; } ?> />&nbsp;&nbsp;<i>* By default this option have been disabled. Enable this option only if your server supports CURL SSL_VERIFYPEER </i></td>
			</tr>            
		</table>
        <p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>