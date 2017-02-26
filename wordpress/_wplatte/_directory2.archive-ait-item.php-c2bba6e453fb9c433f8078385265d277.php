<?php //netteCache[01]000558a:2:{s:4:"time";s:21:"0.72799800 1487389162";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:72:"E:\autoskoly\wordpress\wp-content\themes\directory2\archive-ait-item.php";i:2;i:1487340426;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: E:\autoskoly\wordpress\wp-content\themes\directory2\archive-ait-item.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '3ziz91fw0s')
;
// prolog NUIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb8513614372_content')) { function _lb8513614372_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;global $wp_query ;$query = $wp_query ?>


<?php $noFeatured = $options->theme->item->noFeatured ?>

<div<?php if ($_l->tmp = array_filter(array('items-container', !$wp->willPaginate($query) ? 'pagination-disabled':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
	<div class="content">

<?php if ($query->have_posts()) { ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/search-filters", ""), array('taxonomy' => "ait-items", 'current' => $query->post_count, 'max' => $query->found_posts) + get_defined_vars(), $_l->templates['3ziz91fw0s'])->render() ?>

<?php if (defined("AIT_ADVANCED_FILTERS_ENABLED")) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/advanced-filters", ""), array('query' => $query) + get_defined_vars(), $_l->templates['3ziz91fw0s'])->render() ;} ?>

		<div class="ajax-container">
			<div class="content">
				

<?php foreach ($iterator = new WpLatteLoopIterator($query) as $post): $categories = get_the_terms($post->id, 'ait-items') ?>

<?php $meta = $post->meta('item-data') ?>

<?php $dbFeatured = get_post_meta($post->id, '_ait-item_item-featured', true) ;$isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false ?>


					<div<?php if ($_l->tmp = array_filter(array('item-container', $isFeatured ? "item-featured":null, defined("AIT_REVIEWS_ENABLED") ? 'reviews-enabled':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
							<div class="content">

								<div class="item-image">
									<a class="main-link" href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>">
										<span><?php echo NTemplateHelpers::escapeHtml(__('Otvoriť', 'wplatte'), ENT_NOQUOTES) ?></span>
<?php if ($post->image) { ?>
										<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 200, 'height' => 240, 'crop' => 1)) ?>" alt="Featured" />
<?php } else { ?>
										<img src="<?php echo aitResizeImage($noFeatured, array('width' => 200, 'height' => 240, 'crop' => 1)) ?>" alt="Featured" />
<?php } ?>
									</a>
<?php if (defined('AIT_REVIEWS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/carousel-reviews-stars", ""), array('item' => $post, 'showCount' => false) + get_defined_vars(), $_l->templates['3ziz91fw0s'])->render() ;} ?>
								</div>
								<div class="item-data">
									<div class="item-header">
										<div class="item-title-wrap">
											<div class="item-title">
												<a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>">
													<h3><?php echo $post->title ?></h3>
												</a>
											</div>
											<span class="subtitle"><?php echo NTemplateHelpers::escapeHtml(AitLangs::getCurrentLocaleText($meta->subtitle), ENT_NOQUOTES) ?></span>
										</div>

<?php if (count($categories) > 0) { ?>
										<div class="item-categories">
<?php $iterations = 0; foreach ($categories as $category) { $catLink = get_term_link($category) ?>
												<a href="<?php echo NTemplateHelpers::escapeHtml($catLink, ENT_COMPAT) ?>
"><span class="item-category"><?php echo $category->name ?></span></a>
<?php $iterations++; } $terms = get_the_terms($post->id, 'ait-locations') ;$iterations = 0; foreach ($terms as $index => $category) { $catLink = get_term_link($category) ?>
												<a href="<?php echo NTemplateHelpers::escapeHtml($catLink, ENT_COMPAT) ?>
"><span class="item-category"><?php echo $category->name ?></span></a>
<?php $iterations++; } ?>
										</div>
<?php } ?>
									</div>
									<div class="item-body">
										<div class="entry-content">
											<p>
<?php if ($post->hasExcerpt) { ?>
												<?php echo $template->truncate($template->trim($template->striptags($post->excerpt)), 250) ?>

<?php } else { ?>
												<?php echo $template->truncate($template->trim($template->striptags($post->content)), 250) ?>

<?php } ?>
											</p>
										</div>
									</div>
									<div class="item-footer">

<?php if ($meta->languagesOffered) { ?>
										<div class="item-web">
											<span class="label"><?php echo NTemplateHelpers::escapeHtml(__('Výuka v jazykoch', 'wplatte'), ENT_NOQUOTES) ?>:</span>
											<span class="value"><?php echo NTemplateHelpers::escapeHtml($meta->languagesOffered, ENT_NOQUOTES) ?></span>
										</div>
<?php } ?>

<?php $licences = array() ?>

<?php if (defined('AIT_ADVANCED_FILTERS_ENABLED')) { $item_meta_filters = $post->meta('filters-options') ;if (is_array($item_meta_filters->filters) && count($item_meta_filters->filters) > 0) { $custom_features = array() ;$iterations = 0; foreach ($item_meta_filters->filters as $filter_id) { $filter_data = get_term($filter_id, 'ait-items_filters', "OBJECT") ;if ($filter_data) { $filter_meta = get_option( "ait-items_filters_category_".$filter_data->term_id ) ;$filter_icon = isset($filter_meta['icon']) ? $filter_meta['icon'] : "" ;array_push($licences, $filter_data->name) ;} $iterations++; } } } ?>


<?php if (is_array($licences) && count($licences) > 0) { ?>
										<div class="item-features">
											<div class="label"><?php echo NTemplateHelpers::escapeHtml(__('Typy vodičákov', 'wplatte'), ENT_NOQUOTES) ?>:</div>
											<div class="value">
												<ul class="item-filters">
<?php $iterations = 0; foreach ($licences as $filter) { ?>

													<li class="item-filter">
													<span class="filter-hover">
														<?php echo $filter ?>

													</span>

													</li>
<?php $iterations++; } ?>
												</ul>
											</div>
										</div>
<?php } ?>


									</div>
								</div>
							</div>

					</div>


<?php endforeach; wp_reset_postdata() ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/pagination", ""), array('location' => 'pagination-below', 'max' => $query->max_num_pages) + get_defined_vars(), $_l->templates['3ziz91fw0s'])->render() ?>
			</div>
		</div>

<?php } else { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/none", ""), array('message' => 'empty-site') + get_defined_vars(), $_l->templates['3ziz91fw0s'])->render() ;} ?>
	</div>
</div><?php
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
if ($_l->extends) { ob_end_clean(); return NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 