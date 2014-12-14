<?php
global $wpdb;
// GET TABLE VALUES
$nodeData = $wpdb->get_results("SELECT * FROM wp_lightbox WHERE PID=1" );
?>
<html>

<div style="border-radius: 25px; background-color: #0E4897; width: 550px; margin: 25px auto 0 auto; color: white; padding:15px">
<p> <h1>CC Lightbox - v 0.1 </h1>CC Lighbox allows you to make anything into a lightbox by selecting the desired nodes in the HTML DOM tree. You just need to have an understanding of CSS elements and you are well on your way. In most scenarios WordPress creates custom body attributes depending on the page you are on. This is representative of a page id number or page id identifier such as home, single, etc. This way you can create a light box on each independent page or post, however you can create global light boxs by using broad tags such as p or h1 for example. This plugin only supports five different node types because the plugin is still in development. </p>



	<form method="post" style="text-align: center;">
	<fieldset></fieldset>1.)&nbsp;<input type="text" name='parentNode1' value="<?php print $nodeData[0]->Node1 ?>"></input></fieldset>
	<fieldset>2.)&nbsp;<input type="text" name='parentNode2' value="<?php print $nodeData[0]->Node2 ?>"></input></fieldset>
	<fieldset>3.)&nbsp;<input type="text" name='parentNode3' value="<?php print $nodeData[0]->Node3 ?>"></input></fieldset>
	<fieldset>4.)&nbsp;<input type="text" name='parentNode4' value="<?php print $nodeData[0]->Node4 ?>"></input></fieldset>
	<fieldset>5.)&nbsp;<input type="text" name='parentNode5' value="<?php print $nodeData[0]->Node5 ?>"></input></fieldset>
	<input type = "submit" name="submit" value="update"></input>
	</form>

<p> If you like this plugin and want to see it grow please be sure to donate! <br/> 

	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="text-align: center; ">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<p> Also be sure to share on social and check out my <a href="www.codedcontainer.com">website</a></p>
<a href="https://twitter.com/codedcontainer" target="_blank">
						<img src="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/twitter.png" width="32" height="32" alt="Twitter" id="exifviewer-img-1" exifid="-1359660469" oldsrc="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/twitter.png">
					</a>
					<a href="http://www.linkedin.com/pub/jason-utt/33/499/105/" target="_blank">
						<img src="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/linkedin.png" width="32" height="32" alt="Linkedin">
					</a>
						<a href="http://www.pinterest.com/codedcontainer" target="_blank">
							<img src="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/pinterest.png" width="32" height="32" alt="pinterest">
						</a>
						<a href="https://www.facebook.com/codedcontainer" target="_blank">
							<img src="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/facebook.png" width="32" height="32" alt="Facebook">
						</a>
							<a href="https://plus.google.com/+Codedcontainer/posts" target="_blank">
							<img src="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/google.png" width="32" height="32" alt="Facebook">
						</a>
							<a href="http://www.reddit.com/user/jdudesign/" target="_blank">
							<img src="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/reddit.png" width="32" height="32" alt="Facebook">
						</a>
						<a href="https://foursquare.com/codedcontainer" target="_blank">
							<img src="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/foursquare.png" width="32" height="32" alt="Facebook" style="display: none;">
						</a>
						<a href="http://instagram.com/codedcontainer" target="_blank">
							<img src="http://www.codedcontainer.com/wp-content/plugins/simple-share-buttons-adder/buttons/somacro/instagram.png" width="32" height="32" alt="Facebook" style="display: none;">
						</a>

</div>
</html>

