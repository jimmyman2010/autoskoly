<?php //netteCache[01]000583a:2:{s:4:"time";s:21:"0.88972100 1483840103";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:96:"E:\autoskoly\wordpress\wp-content\themes\directory2\ait-theme\elements\promotion\promotion.latte";i:2;i:1483717658;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:5:"1.0.1";}}}?><?php

// source file: E:\autoskoly\wordpress\wp-content\themes\directory2\ait-theme\elements\promotion\promotion.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'lau7jgmvl8')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['lau7jgmvl8'])->render() ?>

<?php $textWidth		= $el->option->textContainerWidth ;$textPosition 	= $el->option->textContainerPosition ;$promoImage 	= $el->option->image ?>

<?php $buttonTitle 	= $el->option->buttonTitle ;$buttonDesc 	= $el->option->buttonDesc ;$buttonLink 	= $el->option->buttonLink ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>
 position-<?php echo NTemplateHelpers::escapeHtml($textPosition, ENT_COMPAT) ?>">

	<div<?php if ($_l->tmp = array_filter(array('text-container', "column-{$textWidth}"))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
		<div class="promotion-image">
			<img src="<?php echo aitResizeImage($promoImage, array('width' => 640, 'crop' => 1)) ?>" alt="" class="promo-img" />
		</div>
		<div class="promotion-text">
			<div class="entry-content">
				<?php echo $el->option('text') ?>

			</div>
			
<?php if ($buttonLink) { ?>
			<div class="promotion-footer">
			     <a href="<?php echo $buttonLink ?>" class="ait-sc-button <?php if (!$buttonDesc) { ?>
simple<?php } ?>">
					<span class="promo-button">
						<span class="title"><?php if ($buttonTitle) { echo $buttonTitle ;} else { echo __('Read more', 'wplatte') ;} ?></span>
						<?php if ($buttonDesc) { ?><span class="description"><?php echo $buttonDesc ?>
</span><?php } ?>

					</span>
				</a>
			</div>
<?php } ?>
		</div>
	</div>

</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/promotion/javascript", ""), array() + get_defined_vars(), $_l->templates['lau7jgmvl8'])->render() ;