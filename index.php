<?php
global $wpdb;
/**
 * Plugin Name: CC Lightbox
 * Plugin URI: http://www.codedcontainer.com/cc-lightbox
 * Description: Select any parent DOM node and it's content is automatically generated into a lightbox.
 * Version: 0.1
 * Author: Jason Utt
 * Author URI: www.codedcontainer.com
 */


/* Adds index.js script to DOM */

function customScripts(){
    wp_enqueue_script('index', plugins_url('index.js', __FILE__), '', '1.0', false);
    }
    add_action('wp_enqueue_scripts', 'customScripts');

/* CREATES ADMIN TAB */ 
/** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_menu_page( 'My Plugin Options', 'CC Lighbtox', 'manage_options', 'cc-lightbox', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	include('pageform.php');
	
}
/*****************************************/
/* CREATE DATABASE TABLE */
function lightbox_install()
{
  global $wpdb;

  /*
   * We'll set the default character set and collation for this table.
   * If we don't do this, some characters could end up being converted 
   * to just ?'s when saved in our table.
   */
  $charset_collate = '';

  if ( ! empty( $wpdb->charset ) ) 
  {
    $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
  }

  if ( ! empty( $wpdb->collate ) ) 
  {
    $charset_collate .= " COLLATE {$wpdb->collate}";
  }

  if($wpdb->get_var("SHOW TABLES LIKE 'wp_lightbox'") != 'wp_lightbox') 
  {
      $sql = "CREATE TABLE wp_lightbox (
    PID INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(PID),
    Node1 CHAR(225),
    Node2 CHAR (225),
    Node3 CHAR (225),
    Node4 CHAR (225),
    Node5 CHAR (225)
  ) $charset_collate;";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

  }
}
function lightbox_install_data() 
{
  global $wpdb;
  
  $welcome_name = 'Mr. WordPres';
  $welcome_text = 'Congratulations, you just completed the installation!';
  
  $table_name = $wpdb->prefix . 'lightbox';
  
  $wpdb->insert( 
    $table_name, 
    array( 
      'PIE' => NULL, 
      'Nod1' => NULL 
    ) 
  );
}
register_activation_hook( __FILE__, 'lightbox_install' );
register_activation_hook( __FILE__, 'lightbox_install_data' );

/* Lightbox DOM addition can be found in index.js */

/* Get Data Submitted */


// if(isset($_POST[])){

if($_POST['submit'] == 'update')
{
  $parentNodes = $_POST;
  //print $parentNodes['parentNode1'];
  /* Creates first row */
  $numRows = $wpdb->get_var('SELECT COUNT(*) FROM wp_lightbox');
  //print $numRows;
  if($numRows == 0)
  {
    $wpdb->insert('wp_lightbox',
    array(
        'Node1' => NULL
      )
    );
}
if($_POST['submit'] = 'update')
{
   $wpdb->update('wp_lightbox', array(
       'Node1' => $parentNodes['parentNode1'],
       'Node2' => $parentNodes['parentNode2'],
      'Node3' => $parentNodes['parentNode3'],
       'Node4' => $parentNodes['parentNode4'],
      'Node5' => $parentNodes['parentNode5']
    ),
     array('PID' => 1)
   );
}
/* RETRIEVE DATA FROM DABASE FOR DEFAULT VALUES*/
$_POST['submit'] = ''; //keeps data in database after clicking to other menu items! 
}
  

/* Add submitted data to the database */

?>