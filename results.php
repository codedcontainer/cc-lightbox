<?php
$i = $_POST['i']; // get AJAX data i value
if($i == 1){ //makes sure that data does not display, keeps page white :)
global $wpdb;
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
// GET TABLE VALUES
$nodeData = $wpdb->get_results("SELECT * FROM wp_lightbox WHERE PID=1" );
$nodeEncode = json_encode($nodeData);
echo $nodeEncode;
}

?>