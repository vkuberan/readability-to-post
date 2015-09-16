<?php

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
			}
		}
		
		public function addAdminInterfaceItems() {
			$icon_path = R2P_PLUGIN_URL . 'images/icons';
			add_menu_page('Readability2Post', 'Readability2Post', '', R2P_SLUG, null, $icon_path.'/readability-icon.png');
			add_submenu_page(R2P_SLUG, 'Settings', 'Settings', 'manage_options', 'r2p_page', 	array(&$this, 'R2PSettings'));
		}
		
		public function R2PSettings() {
			require_once( 'admin/settings/settings.php' );
		}
		
	}
}

?>