<?php
/*
 * Plugin Name: Readbility to Wordpress Post
 * Plugin URI: 
 * Description: This plugin use the Readbility API to parse a web page and allows you to export that parsed content into your Wordpress Post.
 * Version: 1.0
 * Author: Velmurugan Kuberan and Vinothkumar Parthasarathy
 * Author URI: https://github.com/vkuberan
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */
 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

if ( ! defined( 'WP_PATH_DIR' ) )
	define( 'WP_PATH_DIR', ABSOLUTE_PATH );	  
if ( ! defined( 'WP_CONTENT_DIR' ) )
	define( 'WP_CONTENT_DIR', ABSOLUTE_PATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
	define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

define("R2P_FILENAME",		basename(__FILE__) );
define("R2P_FOLDER",		"readability-to-post" );
define("R2P_SLUG",			"readability-to-post" );
define("R2P_PLUGIN_NAME", 	"Readbility to Wordpress Post" );
define("R2P_PLUGIN_FILE", 	WP_PLUGIN_URL . "/" . R2P_FOLDER . "/" . R2P_FILENAME );
define("R2P_PLUGIN_URL", 	WP_PLUGIN_URL . "/" . R2P_FOLDER . "/" );
define("R2P_PLUGIN_CSS", 	WP_PLUGIN_URL . "/" . R2P_FOLDER . "/css/" );
define("R2P_PLUGIN_JS", 	WP_PLUGIN_URL . "/" . R2P_FOLDER . "/js/" );
define("R2P_PLUGIN_IMAGE",  WP_PLUGIN_URL . "/" . R2P_FOLDER . "/images/" );

$path 		 = $_SERVER['REQUEST_URI'];
$path_length = strpos($path, R2P_FILENAME) + strlen(R2P_FILENAME);
$path 		 = substr($path, 0, strpos($path, '?')) . '?page=' . R2P_FOLDER;


define("R2P_ADMIN_PLUGIN_URL", $path);
	
if($IS_WINDOWS) {	
	$temp = str_replace(R2P_FILENAME, "", __FILE__);	
	$temp = str_replace("\\", "/", $temp);	//switch direction of slashes	
	define("R2P_PLUGIN_PATH", $temp);	
} else {
	define("R2P_PLUGIN_PATH", str_replace(R2P_FILENAME,"", __FILE__));
} 
include(R2P_PLUGIN_PATH . 'functions.php');
$initR2P = new R2P();
