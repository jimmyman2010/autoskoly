<?php //netteCache[01]000576a:2:{s:4:"time";s:21:"0.18551000 1488081501";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:90:"E:\autoskoly\wordpress\wp-content\themes\directory2\ait-theme\elements\text\javascript.php";i:2;i:1483717659;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: E:\autoskoly\wordpress\wp-content\themes\directory2\ait-theme\elements\text\javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'pqhkgftnax')
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