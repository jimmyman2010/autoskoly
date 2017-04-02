{block content}
{? global $wp_query}
{var $query = $wp_query}


{*includePart portal/parts/taxonomy-category-list, taxonomy => "ait-items"*}

{var $noFeatured = $options->theme->item->noFeatured}

<div n:class="items-container, !$wp->willPaginate($query) ? 'pagination-disabled'">
	<div class="content">

		{if $query->have_posts()}

		{includePart portal/parts/search-filters, taxonomy => "ait-items", current => $query->post_count, max => $query->found_posts}

		{if defined("AIT_ADVANCED_FILTERS_ENABLED")}
			{includePart portal/parts/advanced-filters, query => $query}
		{/if}

		<div class="ajax-container">
			<div class="content">
				

				{customLoop from $query as $post}
					{var $categories = get_the_terms($post->id, 'ait-items')}

					{var $meta = $post->meta('item-data')}

					{var $dbFeatured = get_post_meta($post->id, '_ait-item_item-featured', true)}
					{var $isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false }


					<div n:class='item-container, $isFeatured ? "item-featured", defined("AIT_REVIEWS_ENABLED") ? reviews-enabled'>
							<div class="content">

								<div class="item-image">
									<a class="main-link" href="{$post->permalink}">
										<span>{__ 'Otvoriť'}</span>
										{if $post->image}
										<img src="{imageUrl $post->imageUrl, width => 200, height => 240, crop => 1}" alt="Featured">
										{else}
										<img src="{imageUrl $noFeatured, width => 200, height => 240, crop => 1}" alt="Featured">
										{/if}
									</a>
									{if defined('AIT_REVIEWS_ENABLED')}
										{includePart "portal/parts/carousel-reviews-stars", item => $post, showCount => false}
									{/if}
								</div>
								<div class="item-data">
									<div class="item-header">
										<div class="item-title-wrap">
											<div class="item-title">
												<a href="{$post->permalink}">
													<h3>{!$post->title}</h3>
												</a>
											</div>
											<span class="subtitle">{AitLangs::getCurrentLocaleText($meta->subtitle)}</span>
										</div>

										{*var $target = $meta->socialIconsOpenInNewWindow ? 'target="_blank"' : ""}
										{if $meta->displaySocialIcons}

												<div class="social-icons-container">
													<div class="content">
														{if count($meta->socialIcons) > 0}
															<ul><!--
															{foreach $meta->socialIcons as $icon}
															--><li>
																	<a href="{!$icon['link']}" {!$target}>
																		<i class="fa {$icon['icon']}"></i>
																	</a>
																</li><!--
															{/foreach}
															--></ul>
														{/if}
													</div>
												</div>

										{/if*}

										{if count($categories) > 0}
										<div class="item-categories-wrap">
											<div class="img-mobile">
												{if $post->image}
												<img src="{imageUrl $post->imageUrl, width => 200, height => 240, crop => 1}" alt="Featured">
												{else}
												<img src="{imageUrl $noFeatured, width => 200, height => 240, crop => 1}" alt="Featured">
												{/if}
											</div>
											<div class="item-categories">
												{foreach $categories as $category}
													{var $catLink = get_term_link($category)}
													<a href="{$catLink}"><span class="item-category">{!$category->name}</span></a>
												{/foreach}
												{var $terms = get_the_terms($post->id, 'ait-locations')}
												{foreach $terms as $index => $category}
													{var $catLink = get_term_link($category)}
													<a href="{$catLink}"><span class="item-category">{!$category->name}</span></a>
												{/foreach}
											</div>
										</div>
										{/if}
									</div>
									{if $post->hasExcerpt}
									<div class="item-body">
										<div class="entry-content">
											<p>
												{!$post->excerpt|striptags|trim|truncate: 250}
											</p>
										</div>
									</div>
									{/if}
									<div class="item-footer">

										{if $meta->languagesOffered}
										<div class="item-web">
											<span class="label">{__ 'Výuka v jazykoch'}:</span>
											<span class="value">{$meta->languagesOffered}</span>
										</div>
										{/if}

										{var $licences = array()}

										{if defined('AIT_ADVANCED_FILTERS_ENABLED')}
											{var $item_meta_filters = $post->meta('filters-options')}
											{if is_array($item_meta_filters->filters) && count($item_meta_filters->filters) > 0}
												{var $custom_features = array()}
												{foreach $item_meta_filters->filters as $filter_id}
													{var $filter_data = get_term($filter_id, 'ait-items_filters', "OBJECT")}
													{if $filter_data}
														{var $filter_meta = get_option( "ait-items_filters_category_".$filter_data->term_id )}
														{var $filter_icon = isset($filter_meta['icon']) ? $filter_meta['icon'] : ""}
														{? array_push($licences, $filter_data->name)}
													{/if}
												{/foreach}
											{/if}
										{/if}


										{if is_array($licences) && count($licences) > 0}
										<div class="item-features">
											<div class="label">{__ 'Typy vodičákov'}:</div>
											<div class="value">
												<ul class="item-filters">
													{foreach $licences as $filter}

													<li class="item-filter">
													<span class="filter-hover">
														{!$filter}
													</span>

													</li>
													{/foreach}
												</ul>
											</div>
										</div>
										{/if}


									</div>
								</div>
							</div>

					</div>


				{/customLoop}

				{includePart parts/pagination, location => pagination-below, max => $query->max_num_pages}
			</div>
		</div>

		{else}
			{includePart parts/none, message => empty-site}
		{/if}
	</div>
</div>