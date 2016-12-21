<?php //netteCache[01]000597a:2:{s:4:"time";s:21:"0.94474300 1482289975";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:110:"D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\header-video\header-video.latte";i:2;i:1482236819;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: D:\MANTRAN\autosloky\wordpress\wp-content\themes\directory2\ait-theme\elements\header-video\header-video.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 's33btxdeum')
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

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">

	<div class="video-overlay"></div>

<?php if ($el->option('type') == 'media') { if ($el->option('mediaLink')) { $clipControls = array() ;if ($el->option('mediaAutoplay')) { array_push($clipControls, 'autoplay') ;} if ($el->option('mediaLoop')) { array_push($clipControls, 'loop') ;} ?>

			<video width="750" height="420" <?php echo implode(' ', $clipControls) ?>>
				<source src="<?php echo NTemplateHelpers::escapeHtml($el->option('mediaLink'), ENT_COMPAT) ?>" type="video/mp4" />
				<?php echo NTemplateHelpers::escapeHtml(__('Your browser does not support the video tag.', 'wplatte'), ENT_NOQUOTES) ?>

			</video>
<?php } } elseif ($el->option('type') == 'vimeo') { if ($el->option('vimeoLink')) { $clipAutoplay = intval($el->option('vimeoAutoplay')) ;$clipLoop = intval($el->option('vimeoLoop')) ?>

			<iframe id="<?php echo $htmlId ?>-vimeo-player" src="<?php echo AitWpLatteMacros::makeVideoEmbedUrl($el->option('vimeoLink')) ?>
&amp;autoplay=<?php echo NTemplateHelpers::escapeHtml($clipAutoplay, ENT_COMPAT) ?>
&amp;loop=<?php echo NTemplateHelpers::escapeHtml($clipLoop, ENT_COMPAT) ?>" width="750" height="420" data-sound="<?php echo NTemplateHelpers::escapeHtml($el->option('vimeoVideoSound'), ENT_COMPAT) ?>"></iframe>
<?php } } else { if ($el->option('youtubeLink')) { $parse = parse_url($el->option('youtubeLink')) ?>
			<?php echo parse_str($parse['query'], $query) ?>

<?php $clipId = $query['v'] ;$clipAutoplay = intval($el->option('youtubeAutoplay')) ;$clipLoop = intval($el->option('youtubeLoop')) ?>
			<?php $clipPlaylist = $clipLoop == 1 ? '&amp;playlist='.$query['v'] : '' ?> 

			<!-- <iframe id="<?php echo $htmlId ?>-youtube-player" src="//www.youtube.com/embed/<?php echo NTemplateHelpers::escapeHtmlComment($clipId) ?>
?autoplay=<?php echo NTemplateHelpers::escapeHtmlComment($clipAutoplay) ?>&amp;controls=0&amp;loop=<?php echo NTemplateHelpers::escapeHtmlComment($clipLoop) ?>
&amp;rel=0<?php echo NTemplateHelpers::escapeHtmlComment($clipPlaylist) ?>" width="750" height="420"></iframe> -->
			<iframe id="<?php echo $htmlId ?>-youtube-player" src="<?php echo AitWpLatteMacros::makeVideoEmbedUrl($el->option('youtubeLink')) ?>
&amp;autoplay=<?php echo NTemplateHelpers::escapeHtml($clipAutoplay, ENT_COMPAT) ?>
&amp;controls=0&amp;loop=<?php echo NTemplateHelpers::escapeHtml($clipLoop, ENT_COMPAT) ?>
&amp;rel=0<?php echo NTemplateHelpers::escapeHtml($clipPlaylist, ENT_COMPAT) ?>" width="750" height="420" data-sound="<?php echo NTemplateHelpers::escapeHtml($el->option('youtubeVideoSound'), ENT_COMPAT) ?>"></iframe>
<?php } } ?>

	<div class="video-alternative" style="background-image: url('<?php echo $el->option('alternative') ?>');"></div>
</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/header-video/javascript", ""), array() + get_defined_vars(), $_l->templates['s33btxdeum'])->render() ;