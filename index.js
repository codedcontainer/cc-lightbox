// Jason Utt's Custom cc_lightbox settings
jQuery(window).load(function(){
	var cc_lightboxCSS = {
		'height': '200px',
		'height': 'auto',
		'width': '50%',
		'background-color': '#fff',
		'position': 'fixed',
		'left': '0',
		'right': '0',
		'margin-left': 'auto',
		'margin-right': 'auto',
		'top': '25%',
		'z-index': '9999',
		'text-align': 'center',
		'border-radius': '10px',
		'padding' : '15px 0 15px 0'
	}
	//black box
	var cc_blackboxCSS = {
		//'height': '100%',
		'width': '100%',
		'position': 'absolute',
		'background-color': 'rgba(0,0,0,.8)',
		'z-index': '999'
	}	
	var ximageCSS = {
		'position': 'absolute',
		'right': '-33px',
		'top' : '-33px',
		'cursor': 'pointer'
	}

	var cc_blackboxDiv = "<div id='cc_blackbox'></div>";
	var cc_lightboxDiv = "<div id='cc_lightbox'></div>";
	var ximage = "/wp-content/plugins/cc-lightbox/images/x.png";
	var xhtml = "<img src='"+ximage+"' id='ximage'/>";
	var windowHeight = jQuery(document).height();


	//change cursor inside of social containers 
	jQuery('.dc-feed .inner').css('cursor','pointer');

	jQuery('html').prepend(cc_blackboxDiv).prepend(cc_lightboxDiv); // add both the black box and cc_lightbox html
	jQuery('#cc_lightbox').append(xhtml); // add x image inside of black cc_lightbox
	jQuery('#ximage').css(ximageCSS); //style x image inside of cc_lightbox
	
	jQuery('#cc_lightbox, #cc_blackbox').hide(); //automatically hide boxes untill a click happens
	jQuery('#cc_lightbox').css(cc_lightboxCSS); // add the css to the cc_lightbox
	jQuery('#cc_blackbox').css(cc_blackboxCSS); // add the css to the cc_blackbox 

	jQuery('#cc_blackbox').height(windowHeight);
	window.addEventListener('resize', function(event)
	{ //change the above values on new resize
	 	windowHeight = jQuery(document).height();
	 	jQuery('#cc_blackbox').height(windowHeight);
	});

// clicking on the x hide both the cc_blackbox and cc_lightbox
jQuery('#ximage, #cc_blackbox').click(function(){
		jQuery('#cc_lightbox, #cc_blackbox').hide();
			});
//GET DATABASE VALUES FROM pageform.php */
	var nodeArray;
	jQuery.ajax({
		url: '/wp-content/plugins/cc-lightbox/results.php',
		type: 'POST',
		async: true,
		dataType: "JSON",
		data: 'i=1',
		success: function(data){

			var nodeArray = [];
			var objectLength = Object.keys(data[0]).length;
			objectLength = objectLength - 1; //get then number of fields except PID
			for (var i = 1; i <= objectLength; i++){
				nodeArray.push(data[0]['Node'+[i]]);
			}
			
			function cc_lightboxClick(tag)
			{
				jQuery(tag).click(function()
				{
					jQuery('#cc_lightbox').children().not('#ximage').remove();
					var tagHtml = jQuery(this).html();
					var openSpan = "<span>";
					var closedSpan = "</span>";
					jQuery('#cc_lightbox').append(openSpan + tagHtml + closedSpan);
					jQuery('#cc_lightbox, #cc_blackbox').show();

				});
			}
			for(var i = 0; i <= nodeArray.length; i++)
			{
				cc_lightboxClick(nodeArray[i]);
				jQuery(nodeArray[i]).css('cursor','pointer');
			}
		}
	});
//Add logic for cc_lightbox functionality with new database data

// remove all of the data that is present inside of the cc_lightbox

});	
	