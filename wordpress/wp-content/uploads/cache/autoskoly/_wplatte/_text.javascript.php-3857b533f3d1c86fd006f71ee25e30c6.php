<?php //netteCache[01]000585a:2:{s:4:"time";s:21:"0.06440000 1483783683";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:98:"D:\MANTRAN\autoskoly\wordpress\wp-content\themes\directory2\ait-theme\elements\text\javascript.php";i:2;i:1482236819;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:5:"1.0.1";}}}?><?php

// source file: D:\MANTRAN\autoskoly\wordpress\wp-content\themes\directory2\ait-theme\elements\text\javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '8b8hei30tx')
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
jQuery(window).load(function(){
<?php if ($options->theme->general->progressivePageLoading) { ?>
		if(!isResponsive(1024)){
			jQuery("#<?php echo $htmlId ?>-main").find('img').each(function(){
				if(jQuery(this).parent().closest('div').hasClass('wp-caption')){
					jQuery(this).waypoint(function(){
						jQuery(this).parent().closest('div').addClass('load-finished');
					}, { triggerOnce: true, offset: "95%" });
				} else {
					jQuery(this).waypoint(function(){
						jQuery(this).addClass('load-finished');
					}, { triggerOnce: true, offset: "95%" });
				}
			});
			jQuery("#<?php echo $htmlId ?>-main").waypoint(function(){
				jQuery(this).addClass('load-finished');
			}, { triggerOnce: true, offset: "95%" });
		} else {
			jQuery("#<?php echo $htmlId ?>-main").find('img').each(function(){
				if(jQuery(this).parent().closest('div').hasClass('wp-caption')){
					jQuery(this).parent().closest('div').addClass('load-finished');
				} else {
					jQuery(this).addClass('load-finished');
				}
			});
			jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
		}
<?php } else { ?>
		jQuery("#<?php echo $htmlId ?>-main").find('img').each(function(){
			if(jQuery(this).parent().hasClass('wp-caption')){
				jQuery(this).parent().addClass('load-finished');
			} else {
				jQuery(this).addClass('load-finished');
			}
		});
		jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
<?php } ?>
});
</script>