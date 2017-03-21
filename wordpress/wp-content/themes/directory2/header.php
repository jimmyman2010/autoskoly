<!doctype html>
<!--[if IE 8]>
<html {languageAttributes}  class="lang-{$currentLang->locale} {$options->layout->custom->pageHtmlClass} ie ie8">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)]><!-->
<html {languageAttributes} class="lang-{$currentLang->locale} {$options->layout->custom->pageHtmlClass}">
<!--<![endif]-->
<head>
	<meta charset="{$wp->charset}">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="{$wp->pingbackUrl}">

	{if $options->theme->general->favicon != ""}
		<link href="{$options->theme->general->favicon}" rel="icon" type="image/x-icon" />
	{/if}

	{includePart parts/seo}

	{googleAnalytics $options->theme->google->analyticsTrackingId, $options->theme->google->anonymizeIp}

	{wpHead}

	{!$options->theme->header->customJsCode}

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="/wp-content/themes/directory2/assets/css/autoskoly.min.css?ver=1.0.0" />
	<script defer type="text/javascript" src="/wp-content/themes/directory2/assets/js/autoskoly.min.js?ver=1.0.0"></script>
</head>

{var $searchFormClass = ""}
{if $elements->unsortable[search-form]->display}
	{var $searchFormClass = $elements->unsortable[search-form]->option('type') != "" ? "search-form-type-".$elements->unsortable[search-form]->option('type') : "search-form-type-1"}
{/if}

<body n:class="$wp->bodyHtmlClass(false), defined('AIT_REVIEWS_ENABLED') ? reviews-enabled, $searchFormClass, $options->layout->general->showBreadcrumbs ? breadcrumbs-enabled">
	{* usefull for inline scripts like facebook social plugins scripts, etc... *}
	{doAction ait-html-body-begin}

	{if $wp->isPage}
	<div id="page" class="page-container header-one">
	{else}
	<div id="page" class="hfeed page-container header-one">
	{/if}


		<header id="masthead" class="site-header" role="banner">

			<div class="top-bar">
				<div class="grid-main">

					<div class="top-bar-tools">
					{includePart parts/social-icons}
					{includePart parts/languages-switcher}
					{includePart "parts/woocommerce-cart"}
					{includePart portal/parts/header-resources}
					</div>
					<p class="site-description">{!html_entity_decode($wp->description)}</p>

				</div>
			</div>
				<div class="header-container grid-main">

					<div class="site-logo">
						{if $options->theme->header->logo}
						<a href="{$homeUrl}" title="{$wp->name}" rel="home"><img src="{$options->theme->header->logo}" alt="logo"></a>
						{else}
						<div class="site-title"><a href="{$homeUrl}" title="{$wp->name}" rel="home">{$wp->name}</a></div>
						{/if}

					</div>

					<div class="menu-container">
						<nav class="main-nav menu-hidden" role="navigation" data-menucollapse={$options->theme->header->menucollapse}>

							<div class="main-nav-wrap">
								<h3 class="menu-toggle">{__ 'MENU'}</h3>

								<a class="button--header" href="/pre-majitelov-autoskol/">
									<span>Pre majiteľov autoškôl</span>
									<span>Pridať autoškolu do našej databázy</span>
								</a>

								{menu main}
							</div>
						</nav>
					</div>

				</div>


			</header><!-- #masthead -->

		<div class="sticky-menu menu-container" >
			<div class="grid-main">
				<div class="site-logo">
					{if $options->theme->header->logo}
					<a href="{$homeUrl}" title="{$wp->name}" rel="home"><img src="{$options->theme->header->logo}" alt="logo"></a>
					{else}
					<div class="site-title"><a href="{$homeUrl}" title="{$wp->name}" rel="home">{$wp->name}</a></div>
					{/if}
				</div>
				<nav class="main-nav menu-hidden" data-menucollapse={$options->theme->header->menucollapse}>
					<!-- wp menu here -->
				</nav>
			</div>
		</div>
