<?php
/* Author: Velmurugan Kuberan
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */
 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

if( !class_exists('R2P' )) {
	class R2P {
		
		//we call the action hooks inside the constructor function becuase its very handy :)
		public function __construct() {
       		$this->addActions();
   		}
		
		private function addActions() {	
			if (is_admin()) {
				//admin dashboard area in which you can manage the readability to post's settings and other things 
				add_action('admin_menu', array( $this, 'addAdminInterfaceItems' ) );
				//add ajax to parse the url
				add_action( 'admin_enqueue_scripts', array( $this, 'addAjax2Page' ) );
				//real action takes place here	
				add_action( 'wp_ajax_trigger_readability', array( $this, 'callReadability' ) );			
			}
		}
		
		public function addAdminInterfaceItems() {
			$icon_path = R2P_PLUGIN_URL . 'images/icons';
			add_menu_page('Readability2Post', 'Readability2Post', '', R2P_SLUG, null, $icon_path.'/readability-icon.png');
			add_submenu_page(R2P_SLUG, 'Settings', 'Settings', 'manage_options', 'r2p_page', 	array(&$this, 'r2pSettings'));
			add_submenu_page(R2P_SLUG, 'Parse and Export', 'Parse and Export', 'manage_options', 'r2p_page_pe', 	array(&$this, 'r2pParseAndExport'));
		}
		
		public function r2pSettings() {
			require_once( 'admin/settings/settings.php' );
		}
		
		public function r2pParseAndExport() {
			require_once( 'admin/parseandexport/parseandexport.php' );
		}
		
		public function addAjax2Page() {
			//include custom css to your plugin
			wp_register_style('r2pCSS', R2P_PLUGIN_CSS . 'r2pstyle.css');
			wp_enqueue_style('r2pCSS');			
			//include custom js to your plugin
			wp_register_script( 'r2pAH', R2P_PLUGIN_JS . 'r2p.ajax.js' );
			wp_enqueue_script( 'r2pAH' );
  			wp_localize_script( 'r2pAH', 'ajax_vars', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		}
		
		public function callReadability() {
			require 'lib/restclient.php';			
			$base_url          = 'https://www.readability.com/';
			$url_to_parse  	   = isset($_REQUEST['posturl']) ? urlencode( $_REQUEST['posturl'] ) : '';
			$readability_token = get_option('r2p_setting_token', '');
			$endpoint_url      = $base_url . "api/content/v1/parser?url=$url_to_parse&token=$readability_token";
			$api = new RestClient(array(
				'base_url' => $base_url
			));
			$result = $api->get("api/content/v1/parser?url=$url_to_parse&token=$readability_token");	
			/*print '<pre>';
			print_r($result);
			print '</pre>';*/		
			if( $result->response == '' ) {
				echo '{ "error": "Something went wrong, Please check your \'Readability Parser Token\' settings."}';
			}
			else { 
				echo $result->response;
			}
			die;
		}
	}
}

?>