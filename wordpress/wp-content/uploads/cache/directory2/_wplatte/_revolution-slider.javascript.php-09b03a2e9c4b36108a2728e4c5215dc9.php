<?php //netteCache[01]000598a:2:{s:4:"time";s:21:"0.85104800 1482292963";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:111:"D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\revolution-slider\javascript.php";i:2;i:1482236819;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\revolution-slider\javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '6bq4ysshl2')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<script id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-script">
jQuery(document).ready(function(){
	if(isResponsive(parseInt(<?php echo NTemplateHelpers::escapeJs($el->option('responsive')) ?>))){
		jQuery('#<?php echo $htmlId ?> .slider').addClass('reloadMe');
	}
});

jQuery(window).load(function(){
	if(isResponsive(parseInt(<?php echo NTemplateHelpers::escapeJs($el->option('responsive')) ?>))){
		if(jQuery('#<?php echo $htmlId ?> .slider-alternative').children('img').attr('src') != ""){
			jQuery('#<?php echo $htmlId ?> .slider').hide();
			jQuery('#<?php echo $htmlId ?> .slider-alternative').show();
		} else {
			jQuery('#<?php echo $htmlId ?> .slider').show();
			jQuery('#<?php echo $htmlId ?> .slider-alternative').hide();
		}
	} else {
		jQuery('#<?php echo $htmlId ?> .slider').show();
		jQuery('#<?php echo $htmlId ?> .slider-alternative').hide();
		if(jQuery('#<?php echo $htmlId ?> .slider').hasClass('reloadMe')){
			jQuery('#<?php echo $htmlId ?> .slider').removeClass('reloadMe');
			location.reload();
		}
	}
});

jQuery(window).resize(function(){
	if(isResponsive(parseInt(<?php echo NTemplateHelpers::escapeJs($el->option('responsive')) ?>))){
		if(jQuery('#<?php echo $htmlId ?> .slider-alternative').children('img').attr('src') != ""){
			jQuery('#<?php echo $htmlId ?> .slider').hide();
			jQuery('#<?php echo $htmlId ?> .slider-alternative').show();
		} else {
			jQuery('#<?php echo $htmlId ?> .slider').show();
			jQuery('#<?php echo $htmlId ?> .slider-alternative').hide();
		}
	} else {
		jQuery('#<?php echo $htmlId ?> .slider').show();
		jQuery('#<?php echo $htmlId ?> .slider-alternative').hide();
		if(jQuery('#<?php echo $htmlId ?> .slider').hasClass('reloadMe')){
			jQuery('#<?php echo $htmlId ?> .slider').removeClass('reloadMe');
			location.reload();
		}
	}
});
</script>