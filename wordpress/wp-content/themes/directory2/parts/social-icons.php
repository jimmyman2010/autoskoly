{if $options->theme->social->enableSocialIcons}
<div class="social-icons">
	<ul>
		<li class="contact">
			<a href="mailto:kontakt@autoskoly.sk"><i class="fa fa-envelope"></i> kontakt@autoskoly.sk</a>
		</li>
		<li class="contact">
			<a href="tel:+412949846100"><i class="fa fa-mobile"></i> +412 949 846 100</a>
		</li>
		<!--
		{foreach array_filter((array) $options->theme->social->socIcons) as $icon}
			--><li>
				<a href="{$icon->url}" {if $options->theme->social->socIconsNewWindow}target="_blank"{/if} class="icon-{$iterator->getCounter()}">
					{*
					{if $icon->icon}<img src="{$icon->icon}" class="s-icon s-icon-light" alt="icon">{/if}
					{if $icon->iconDark}<img src="{$icon->iconDark}" class="s-icon s-icon-dark" alt="icon">{/if}
					*}
					{if $icon->icon}<i class="fa {$icon->icon}"></i>{/if}
					<span class="s-title">{$icon->title}</span>
				</a>
			</li><!--
		{/foreach}
	--></ul>
	<style type="text/css" scoped="scoped">
	{foreach array_filter((array) $options->theme->social->socIcons) as $icon}
	.social-icons .icon-{$iterator->getCounter()}:hover { background: {!$icon->iconColor}; }
	{/foreach}
	</style>
</div>
{/if}
