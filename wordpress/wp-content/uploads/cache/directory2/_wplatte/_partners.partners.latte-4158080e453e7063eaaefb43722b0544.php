<?php //netteCache[01]000589a:2:{s:4:"time";s:21:"0.24187200 1482289977";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:102:"D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\partners\partners.latte";i:2;i:1482236819;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\partners\partners.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'qghss02tds')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['qghss02tds'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">

<?php $query = WpLatteMacros::prepareCustomWpQuery(array('type' => 'partner',
		'tax' => 'partners',
		'cat' => $element->option('category'),
		'limit' => -1,
		'orderby' => $element->option('orderby'),
		'order' => $element->option('order'),)) ?>

<?php if ($query->havePosts) { ?>
		<div class="elm-partners-container">
			<ul class="partners"><!--
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('partner-options') ?>
				--><li>
<?php if ($meta->link) { ?>
						<a href="<?php echo NTemplateHelpers::escapeHtml($meta->link, ENT_COMPAT) ?>
" title="<?php echo $item->title ?>" <?php if ($meta->linkTarget) { ?>target="_blank"<?php } ?>>
<?php } ?>
							<span class="thumb"><img src="<?php echo NTemplateHelpers::escapeHtml($item->imageUrl, ENT_COMPAT) ?>
" alt="<?php echo $item->title ?>" /></span>
<?php if ($meta->link) { ?>
						</a>
<?php } ?>
				</li><!--
<?php endforeach; wp_reset_postdata() ?>
			--></ul>
		</div>
<?php } else { ?>
		<div class="elm-partners-container">
			<div class="alert alert-info">
				<?php echo NTemplateHelpers::escapeHtml(_x('Partners', 'name of element', 'wplatte'), ENT_NOQUOTES) ?>
&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo NTemplateHelpers::escapeHtml(__('Info: There are no items created, add some please.', 'wplatte'), ENT_NOQUOTES) ?>

			</div>
		</div>
<?php } ?>
</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/partners/javascript", ""), array() + get_defined_vars(), $_l->templates['qghss02tds'])->render() ;