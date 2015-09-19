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
		<td colspan="2">
        	<input type="button" id="r2p_save_post" class="button-primary" value="Save Post" />&nbsp;
            <span id="show_progressbar_sp"><img src="<?php echo R2P_PLUGIN_IMAGE . 'progressbar.gif'; ?>" /></span>
            <span id="show_sp_error_msg"></span>        	
        </td>
	</tr>
	<tr valign="top">
    	<th scope="row"><span class="r2plabel">Post Status</span></th>
		<td>
        	<select id="post_status" name="post_status">
            	<option value="draft" selected="selected">draft</option>
                <option value="publish">publish</option>
				<option value="pending">pending</option>
				<option value="future">future</option>
				<option value="private">private</option>
            </select>
        </td>
	</tr>        	
	<tr valign="top">
    	<th scope="row"><span class="r2plabel">Post Date</span></th>
		<td>
        	<input type="checkbox" name="post_date" id="post_date" />&nbsp;&nbsp;<strong><span id="article_date"></span></strong><br /><strong><em>Check if you want to use Article's date as the Blog Post date or uncheck to use the current date. <br />If the article doesn't have a date, then the current date will be used instead.</em></strong>
        </td>
	</tr>        	
    <tr valign="top">
    	<th scope="row"><span class="r2plabel">Post Title</span></th>
		<td>
        	<div id="titlewrap">
		        <input class="r2ptextbox" type="text" name="post_title" size="30" value="" id="post_title" autocomplete="off">
            </div>
        </td>
	</tr>
	<tr valign="top">
    	<th scope="row"><span class="r2plabel">Post Content</span></th>
		<td>
        	
				<?php
					add_filter( 'wp_default_editor', create_function('', 'return "html";') ); 
					$settings = array(
					);	
					$content = '';			
                    wp_editor( $content, 'post_content', $settings ); 
                ?>
            
        </td>
	</tr>
    <tr valign="top">
    	<th scope="row"><span class="r2plabel">Post Excerpt</span></th>
		<td>
        	<div id="titlewrap">
		        <textarea rows="1" cols="40" name="post_excerpt" id="post_excerpt"></textarea>
            </div>
        </td>
	</tr>
    <tr valign="top">
    	<th scope="row"><span class="r2plabel">Post Author</span></th>
		<td>
        	<div id="titlewrap">
		        <?php
					$args = array(
						'selected' => 1,
						'name' => 'post_author',
						'id'   => 'post_author'
					);
					wp_dropdown_users($args);
				?>
            </div>
        </td>
	</tr>    
    <tr valign="top">
    	<th scope="row"><span class="r2plabel">Post Category</span></th>
		<td>
        	<div id="titlewrap">
		        <?php
					$args = array(
						'name' => 'post_category',
						'id'   => 'post_category',
						'hide_empty' => 0,
						'echo' => 0 
					);
					
					$post_cats = wp_dropdown_categories($args);
					$post_cats = str_replace('<select', '<select multiple="multiple"', $post_cats );
					echo $post_cats;
				?>
            </div>
        </td>
	</tr>
 	<tr valign="top">
    	<th scope="row"><span class="r2plabel">Post Tags</span></th>
		<td>
        	<div id="titlewrap">
		        <input class="r2ptextbox" type="text" name="post_tag" size="30" value="" id="post_tag" autocomplete="off"><br /><strong><em>Separate tags by comma ex: tag 1, tag2, etc.,</em></strong>
            </div>
        </td>
	</tr>    
</table>