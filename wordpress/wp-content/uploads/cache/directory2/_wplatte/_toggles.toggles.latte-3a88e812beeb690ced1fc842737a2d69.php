<?php //netteCache[01]000587a:2:{s:4:"time";s:21:"0.92040600 1482290023";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:100:"D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\toggles\toggles.latte";i:2;i:1482236819;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\toggles\toggles.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'u2t7iomh25')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['u2t7iomh25'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>
 type-<?php echo NTemplateHelpers::escapeHtml($el->option('type'), ENT_COMPAT) ?>">

<?php $query = WpLatteMacros::prepareCustomWpQuery(array('type' => 'toggle',
		'tax' => 'toggles',
		'cat' => $element->option('category'),
		'limit' => -1,
		'orderby' => $element->option('orderby'),
		'order' => $element->option('order'),)) ?>

<?php if ($query->havePosts) { if ($el->option('type') == 'accordion' || $el->option('type') == 'toggle') { foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('toggle-options') ;$hasImage = isset($meta->image) && $meta->image != "" ? true : false ?>
				<div class="toggle-header">
					<h3 class="toggle-title">
						<?php if ($meta->icon) { ?><span class="icon"><i class="fa <?php echo NTemplateHelpers::escapeHtml($meta->icon, ENT_COMPAT) ?>
"></i></span><?php } ?>

						<?php echo $item->title ?>

					</h3>
				</div>
				<div class="toggle-content">
					<div class="toggle-container">
						<div<?php if ($_l->tmp = array_filter(array('toggle-wrap', $hasImage ? 'has-image':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
							<?php if ($meta->image) { ?><div class="entry-thumb"><img src="<?php echo aitResizeImage($meta->image, array('width' => 640, 'crop' => 1)) ?>
" alt="thumbnail" /></div><?php } ?>

							<div class="entry-content"><?php echo $item->content ?></div>
						</div>
					</div>
				</div>
<?php endforeach; wp_reset_postdata(); } elseif ($el->option('type') == 'htabs') { ?>
						<select class="default-disabled responsive-tabs-select" style="display: none">
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): ?>
				<option value="#<?php echo $htmlId ?>-<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>
"><?php echo $item->title ?></option>
<?php endforeach; wp_reset_postdata() ?>
			</select>
						<div class="tabs-wrapper">
				<div class="selected"></div>
				<ul><!--
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('toggle-options') ?>
					--><li><a href="#<?php echo $htmlId ?>-<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>
"><?php if ($meta->icon) { ?><span class="icon"><i class="fa <?php echo NTemplateHelpers::escapeHtml($meta->icon, ENT_COMPAT) ?>
"></i></span><?php } echo $item->title ?></a></li><!--
<?php endforeach; wp_reset_postdata() ?>
				--></ul>
			</div>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('toggle-options') ;$hasImage = isset($meta->image) && $meta->image != "" ? true : false ?>
				<div id="<?php echo $htmlId ?>-<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>" class="toggle-content">
					<div<?php if ($_l->tmp = array_filter(array('toggle-wrap', $hasImage ? 'has-image':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
						<?php if ($meta->image) { ?><div class="entry-thumb"><img src="<?php echo aitResizeImage($meta->image, array('width' => 640, 'crop' => 1)) ?>
" alt="thumbnail" /></div><?php } ?>

						<div class="entry-content"><?php echo $item->content ?></div>
					</div>
				</div>
<?php endforeach; wp_reset_postdata(); } else { ?>
						<select class="default-disabled responsive-tabs-select" style="display: none">
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): ?>
				<option value="#<?php echo $htmlId ?>-<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>
"><?php echo $item->title ?></option>
<?php endforeach; wp_reset_postdata() ?>
			</select>
						<div class="tabs-wrapper">
				<div class="selected"></div>
				<ul>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('toggle-options') ?>
					<li><a href="#<?php echo $htmlId ?>-<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>
"><?php if ($meta->icon) { ?><span class="icon"><i class="fa <?php echo NTemplateHelpers::escapeHtml($meta->icon, ENT_COMPAT) ?>
"></i></span><?php } echo $item->title ?></a></li>
<?php endforeach; wp_reset_postdata() ?>
				</ul>
			</div>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('toggle-options') ;$hasImage = isset($meta->image) && $meta->image != "" ? true : false ?>
				<div id="<?php echo $htmlId ?>-<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>" class="toggle-content">
					<div<?php if ($_l->tmp = array_filter(array('toggle-wrap', $hasImage ? 'has-image':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
						<?php if ($meta->image) { ?><div class="entry-thumb"><img src="<?php echo aitResizeImage($meta->image, array('width' => 640, 'crop' => 1)) ?>
" alt="thumbnail" /></div><?php } ?>

						<div class="entry-content"><?php echo $item->content ?></div>
					</div>
				</div>
<?php endforeach; wp_reset_postdata(); } } ?>
</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/toggles/javascript", ""), array() + get_defined_vars(), $_l->templates['u2t7iomh25'])->render() ;