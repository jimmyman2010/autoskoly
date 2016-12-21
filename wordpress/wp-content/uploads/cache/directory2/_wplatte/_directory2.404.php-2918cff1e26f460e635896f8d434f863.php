<?php //netteCache[01]000553a:2:{s:4:"time";s:21:"0.73802200 1482289978";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:67:"D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\404.php";i:2;i:1482236818;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\404.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '7jovmz3z9v')
;
// prolog NUIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf883551fc6_content')) { function _lbf883551fc6_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>		<article id="post-0" class="post error404 no-results not-found">
		<div class="entry-content">
			<p><?php echo NTemplateHelpers::escapeHtml(__("It seems we can't find what you're looking for.", 'wplatte'), ENT_NOQUOTES) ?></p>
		</div><!-- .entry-content -->
	</article><!-- #post-0 --><?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof NPresenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 