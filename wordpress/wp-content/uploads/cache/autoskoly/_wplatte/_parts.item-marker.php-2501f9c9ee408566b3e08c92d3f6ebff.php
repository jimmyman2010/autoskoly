<?php //netteCache[01]000560a:2:{s:4:"time";s:21:"0.51394900 1483839757";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:73:"E:\autoskoly\wordpress\wp-content\themes\directory2\parts\item-marker.php";i:2;i:1483717664;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:5:"1.0.1";}}}?><?php

// source file: E:\autoskoly\wordpress\wp-content\themes\directory2\parts\item-marker.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'iv5tfp3er9')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$imageUrl = $item->hasImage ? $item->imageUrl : $options->theme->item->noFeatured ?>
<div class="item-data">
	<h3><?php echo $item->title ?></h3>
	<span class="item-address"><?php echo $meta->map['address'] ?></span>
	<a href="<?php echo $item->permalink ?>">
		<span class="item-button"><?php echo NTemplateHelpers::escapeHtml(__('Show More', 'wplatte'), ENT_NOQUOTES) ?></span>
	</a>
</div>
<div class="item-picture">
	<img src="<?php echo aitResizeImage($imageUrl, array('width' => 145, 'height' => 180, 'crop' => 1)) ?>" alt="image" />
<?php if ($elements->unsortable['header-map']->option('infoboxEnableTelephoneNumbers') && $meta->telephone) { ?>
	<a href="tel:<?php echo $meta->telephone ?>" class="phone"><?php echo $meta->telephone ?></a>
<?php } ?>
</div>


