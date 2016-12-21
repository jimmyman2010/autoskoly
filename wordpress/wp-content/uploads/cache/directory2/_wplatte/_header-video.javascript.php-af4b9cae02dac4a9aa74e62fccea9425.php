<?php //netteCache[01]000593a:2:{s:4:"time";s:21:"0.95774400 1482289975";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:106:"D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\header-video\javascript.php";i:2;i:1482236819;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\header-video\javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'siqatdt139')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($el->option('type') == 'youtube') { ?>
<script id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-youtube-api" src="//www.youtube.com/iframe_api"></script>
<?php } ?>

<?php if ($el->option('type') == 'vimeo') { ?>
<script id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-vimeo-api" src="//f.vimeocdn.com/js/froogaloop2.min.js"></script>
<?php } ?>

<script id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-script">
jQuery(window).load(function(){
	jQuery('#<?php echo $htmlId ?>').find('iframe, video').css({'width': '100%'});
	resizePlayer( <?php echo NTemplateHelpers::escapeJs($el->option('type')) ?> );

<?php if ($el->option('type') == 'youtube') { ?>
		youtubePlayer();
<?php } elseif ($el->option('type') == 'vimeo') { ?>
		vimeoPlayer();
<?php } else { ?>
		// media player
<?php } ?>

	if(isUserAgent('mobile')){ // all mobile browsers
		jQuery('#<?php echo $htmlId ?>').find('video, iframe').hide();
	}

<?php if ($options->theme->general->progressivePageLoading) { ?>
		if(!isResponsive(1024)){
			jQuery("#<?php echo $htmlId ?>").waypoint(function(){
				jQuery("#<?php echo $htmlId ?>").addClass('load-finished');
			}, { triggerOnce: true, offset: "95%" });
		} else {
			jQuery("#<?php echo $htmlId ?>").addClass('load-finished');
		}
<?php } else { ?>
		jQuery("#<?php echo $htmlId ?>").addClass('load-finished');
<?php } ?>
});

jQuery(window).resize(function(){
	resizePlayer( <?php echo NTemplateHelpers::escapeJs($el->option('type')) ?> );

	if(isUserAgent('mobile')){ // all mobile browsers
		jQuery('#<?php echo $htmlId ?>').find('video, iframe').hide();
	} else {
		jQuery('#<?php echo $htmlId ?>').find('video, iframe').show();
	}
});


function resizePlayer(player){
	//var overflowHeight = parseInt(<?php echo NTemplateHelpers::escapeJs($el->option('height')) ?>);
	var overflowHeight = jQuery("#<?php echo $htmlId ?>").parent().height();
	if(player == 'youtube'){
<?php $ratio = explode(':', $el->option('youtubeVideoFormat')) ?>
		var ratio = [parseInt(<?php echo NTemplateHelpers::escapeJs($ratio[0]) ?>), parseInt(<?php echo NTemplateHelpers::escapeJs($ratio[1]) ?>)];
	} else if (player == 'vimeo') {
<?php $ratio = explode(':', $el->option('vimeoVideoFormat')) ?>
		var ratio = [parseInt(<?php echo NTemplateHelpers::escapeJs($ratio[0]) ?>), parseInt(<?php echo NTemplateHelpers::escapeJs($ratio[1]) ?>)];
	} else {
<?php $ratio = explode(':', $el->option('mediaVideoFormat')) ?>
		var ratio = [parseInt(<?php echo NTemplateHelpers::escapeJs($ratio[0]) ?>), parseInt(<?php echo NTemplateHelpers::escapeJs($ratio[1]) ?>)];
	}

	var parsedHeight = parseInt( ( jQuery('#<?php echo $htmlId ?>').width() / ratio[0] ) * ratio[1] );

	if(parsedHeight < overflowHeight){
		// compute new width and height becomes static
		var parsedWidth = parseInt((overflowHeight / 9) * 16);
		jQuery('#<?php echo $htmlId ?>').find('iframe, video').css({'height':  overflowHeight+"px", 'width': parsedWidth+'px'});
		// here a check if the container hasnt grown up
	} else {
		// use computed height
		jQuery('#<?php echo $htmlId ?>').find('iframe, video').css({'height': parsedHeight+"px", 'width': '100%'});
	}


}

function youtubePlayer(){
	var player = new YT.Player('<?php echo $htmlId ?>-youtube-player', {
		events: {
			'onReady': function(){
				if(parseInt(jQuery('#<?php echo $htmlId ?>-youtube-player').attr('data-sound')) == 0){
					player.mute();
				}				
				player.playVideo();
			}
		}
	});
}

function vimeoPlayer(){
	var iframe = jQuery('#<?php echo $htmlId ?>-vimeo-player')[0];
	var player = $f(iframe);
	/*player.addEvent('ready', function() {
		player.api('setVolume', 0);
	});*/
	if(parseInt(jQuery('#<?php echo $htmlId ?>-vimeo-player').attr('data-sound')) == 0){
		player.api('setVolume', 0);
	}	
}
</script>
