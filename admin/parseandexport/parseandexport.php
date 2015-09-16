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
    	<th scope="row">URL to Parse</th>
		<td><input type="text" style="width:350px;" id="r2p_url2parse" name="r2p_url2parse" value="" />&nbsp;<i>e.g http://goo.gl/0tA2a5</i></td>
	</tr>
	<tr valign="top">    	
		<td colspan="2">
           	<input type="button" id="r2p_parse_now" class="button-primary" value="Parse Now" />
        </td>
	</tr>
</table>