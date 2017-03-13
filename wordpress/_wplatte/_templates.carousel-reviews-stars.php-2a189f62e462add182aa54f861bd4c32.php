<?php //netteCache[01]000581a:2:{s:4:"time";s:21:"0.89242500 1487389176";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:95:"E:\autoskoly\wordpress\wp-content\plugins\ait-item-reviews\templates\carousel-reviews-stars.php";i:2;i:1484970449;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: E:\autoskoly\wordpress\wp-content\plugins\ait-item-reviews\templates\carousel-reviews-stars.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'aemwn4rfcd')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if (isset($item)) { $rating_count = AitItemReviews::getRatingCount($item->id) ;$rating_mean = get_post_meta($item->id, 'rating_mean', true) ?>

<?php $showCount = isset($showCount) ? $showCount : false ?>
	<div class="review-stars-container">
		<div class="content">
<?php if ($rating_count > 0) { ?>
				<span class="review-stars" data-score="<?php echo NTemplateHelpers::escapeHtml($rating_mean, ENT_COMPAT) ?>"></span>
				<?php if ($showCount) { ?><span class="review-count">(<?php echo NTemplateHelpers::escapeHtml($rating_count, ENT_NOQUOTES) ?>
)</span><?php } ?>

<?php } else { ?>
				<a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>
#review"><?php _e('Ohodnoť autoškolu','ait-item-reviews') ?></a>
<?php } ?>
		</div>
	</div>
<?php } 