<?php //netteCache[01]000578a:2:{s:4:"time";s:21:"0.69183900 1483839758";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:91:"E:\autoskoly\wordpress\wp-content\themes\directory2\ait-theme\elements\@common\header.latte";i:2;i:1483717654;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:5:"1.0.1";}}}?><?php

// source file: E:\autoskoly\wordpress\wp-content\themes\directory2\ait-theme\elements\@common\header.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'e52uogolh9')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if (($el->hasOption('title') and $el->option->title) or ($el->hasOption('description') and $el->option->description)) { ?>

	<div<?php if ($_l->tmp = array_filter(array('elm-mainheader', $el->hasOption('headAlign') ? $el->option->headAlign:null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php if ($el->option->title) { ?>
			<h2 class="elm-maintitle"><?php echo $el->option->title ?></h2>
<?php } if ($el->option->description) { ?>
			<p class="elm-maindesc"><?php echo $el->option->description ?></p>
<?php } ?>
	</div>

<?php } 