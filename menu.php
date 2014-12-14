<?php
/** Step 2 (from text above). */
add_action( 'admin_menu', 'cc_lightbox_menu' );

/** Step 1. */
function cc_lightbox_menu() {
	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
?>