<section class="elm-main elm-easy-slider-main gallery-single-image">
	<div class="elm-easy-slider-wrapper">
		<div class="elm-easy-slider easy-pager-thumbnails pager-pos-outside detail-thumbnail-wrap detail-thumbnail-slider">

			{if defined('AIT_REVIEWS_ENABLED')}
				{includePart portal/parts/single-item-reviews-stars, showCount => true, class => "gallery-visible"}
			{/if}

			{if $post->hasImage}
			{var $title = $post->title}
			{var $image = $post->imageUrl}
			<div>
				<a href="{imageUrl $image, width => 1600, crop => 1}" title="{$title}" target="_blank" rel="item-image">
					<span class="easy-thumbnail">
						<img src="{imageUrl $image, width => 728, crop => 1}" alt="{$title}" />
					</span>
				</a>
			</div>
			{/if}
		</div>
	</div>
</section>
