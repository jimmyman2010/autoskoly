{var $gallery = array()}

{if $meta->displayGallery && is_array($meta->gallery)}
	{* if the $meta->gallery is not an array ... its empty *}
	{var $gallery = array_merge($gallery, $meta->gallery)}
{/if}

{if count($gallery) > 0}
	<section class="elm-main elm-easy-slider-main gallery-multiple-image">
		<div class="elm-easy-slider-wrapper">
			<div class="elm-easy-slider easy-pager-thumbnails pager-pos-outside detail-thumbnail-wrap detail-thumbnail-slider">
				<div class="loading"><span class="ait-preloader">{!__ 'Loading&hellip;'}</span></div>

				<div class="tablet">
					<ol class="gallery-slider">
					{foreach $gallery as $item}
					{var $title = AitLangs::getCurrentLocaleText($item['title'])}
					<li>
						<a href="{imageUrl $item['image'], width => 1600, crop => 1}" title="{$title}" target="_blank" rel="item-gallery">
							<span class="easy-thumbnail">
								<img src="{imageUrl $item['image'], width => 300, height => 200, crop => 1}" alt="{$title}" />
							</span>
						</a>
					</li>
					{/foreach}
					</ol>
				</div>

				<div class="mobile">
					<ul class="easy-slider">
					{foreach $gallery as $item}
					{var $title = AitLangs::getCurrentLocaleText($item['title'])}
					<li>
							<a href="{imageUrl $item['image'], width => 1600, crop => 1}" title="{$title}" target="_blank" rel="item-gallery-mobile">
								<span class="easy-thumbnail">
									{if $title != ""}<span class="easy-title">{$title}</span>{/if}
									<img src="{imageUrl $item['image'], width => 600, height => 400, crop => 1}" alt="{$title}" />
								</span>
							</a>
						</li>
					{/foreach}
					</ul>

					<script type="text/javascript">
						jQuery(window).load(function(){
							{if $options->theme->general->progressivePageLoading}
								if(!isResponsive(1024)){
									jQuery(".detail-thumbnail-slider").waypoint(function(){
										portfolioSingleEasySlider("4:3");
										jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
									}, { triggerOnce: true, offset: "95%" });
								} else {
									portfolioSingleEasySlider("4:3");
									jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
								}
								{else}
								portfolioSingleEasySlider("4:3");
								jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
								{/if}
								});
					</script>
				</div>
			</div>
		</div>
	</section>
{/if}