<?php //netteCache[01]000569a:2:{s:4:"time";s:21:"0.65676900 1487389175";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:83:"E:\autoskoly\wordpress\wp-content\themes\directory2\portal\parts\search-filters.php";i:2;i:1487389096;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: E:\autoskoly\wordpress\wp-content\themes\directory2\portal\parts\search-filters.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'akq0ywlo2l')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$postType = isset($postType) ? $postType : 'items' ;if ($postType == 'ait-event-pro') { $settings = (object)get_option('ait_events_pro_options', array()) ;} else { $settings = $options->theme->items ;} ?>


<?php $filterCounts = array(5, 10, 20) ?>

<?php ob_start() ;echo NTemplateHelpers::escapeHtml(__('Dátumu pridania', 'wplatte'), ENT_NOQUOTES) ;$dateLabel = ob_get_clean() ?>

<?php ob_start() ;echo NTemplateHelpers::escapeHtml(__('Názvu', 'wplatte'), ENT_NOQUOTES) ;$titleLabel = ob_get_clean() ?>


<?php $filterOrderBy = array(
	"title" => $titleLabel
) ?>

<?php if (defined('AIT_REVIEWS_ENABLED') and $postType != 'ait-event-pro') { ?>
	<?php ob_start() ;echo NTemplateHelpers::escapeHtml(__('Hodnotenia', 'wplatte'), ENT_NOQUOTES) ;$ratingLabel = ob_get_clean() ?>

<?php $filterOrderBy["rating"] = $ratingLabel ;} ?>

<?php $filterOrderBy["date"] = $dateLabel ?>

<?php $filterOrderBy = apply_filters('ait_search_filter_orderby', $filterOrderBy, $postType) ?>

<?php $filterCountsSelected = isset($_REQUEST['count']) && $_REQUEST['count'] != "" ? $_REQUEST['count'] : $settings->sortingDefaultCount ;$filterOrderBySelected = isset($_REQUEST['orderby']) && $_REQUEST['orderby'] != "" ? $_REQUEST['orderby'] : $settings->sortingDefaultOrderBy ;$filterOrderSelected = isset($_REQUEST['order']) && $_REQUEST['order'] != "" ? $_REQUEST['order'] : $settings->sortingDefaultOrder ?>
<div class="filters-wrap">
		<div class="filters-container">
		<div class="content">
<?php if ($postType != 'ait-event-pro') { ?>
			<div class="filter-container filter-count" data-filterid="count">
				<div class="content">
					<div class="selected"><?php echo NTemplateHelpers::escapeHtml(__('Počet výsledkov', 'wplatte'), ENT_NOQUOTES) ?>:</div>
					<select class="filter-data">
<?php $iterations = 0; foreach ($filterCounts as $filter) { if ($filter == $filterCountsSelected) { ?>
								<option value="<?php echo NTemplateHelpers::escapeHtml($filter, ENT_COMPAT) ?>
" selected><?php echo NTemplateHelpers::escapeHtml($filter, ENT_NOQUOTES) ?></option>
<?php } else { ?>
								<option value="<?php echo NTemplateHelpers::escapeHtml($filter, ENT_COMPAT) ?>
"><?php echo NTemplateHelpers::escapeHtml($filter, ENT_NOQUOTES) ?></option>
<?php } $iterations++; } ?>
					</select>
				</div>
			</div>
<?php } ?>
			<div class="filter-container filter-orderby" data-filterid="orderby">
				<div class="content">
					<div class="selected"><?php echo NTemplateHelpers::escapeHtml(__('Triediť podľa', 'wplatte'), ENT_NOQUOTES) ?>:</div>
					<select class="filter-data">
<?php $iterations = 0; foreach ($filterOrderBy as $key => $filter) { if ($key == $filterOrderBySelected) { ?>
								<option value="<?php echo NTemplateHelpers::escapeHtml($key, ENT_COMPAT) ?>
" selected><?php echo NTemplateHelpers::escapeHtml($filter, ENT_NOQUOTES) ?></option>
<?php } else { ?>
								<option value="<?php echo NTemplateHelpers::escapeHtml($key, ENT_COMPAT) ?>
"><?php echo NTemplateHelpers::escapeHtml($filter, ENT_NOQUOTES) ?></option>
<?php } $iterations++; } ?>

					</select>
				</div>
			</div>
			<div class="filter-container filter-order" data-filterid="order">
				<div class="content">
					<div class="selected title"><?php echo NTemplateHelpers::escapeHtml(__('Zoradiť', 'wplatte'), ENT_NOQUOTES) ?>:</div>
					<a title="ASC" href="#" data-value="ASC"<?php if ($_l->tmp = array_filter(array($filterOrderSelected == "ASC" ? 'selected':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>><i class="fa fa-angle-down"></i></a>
					<a title="DESC" href="#" data-value="DESC"<?php if ($_l->tmp = array_filter(array($filterOrderSelected == "DESC" ? 'selected':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>><i class="fa fa-angle-up"></i></a>
				</div>
			</div>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('.filters-container .filter-container').each(function(){
					$select = jQuery(this).find('select');
					$select.change(function(){
<?php if (!isset($disableRedirect)) { ?>
						getItems();
<?php } ?>
					});
					$order = jQuery(this).find('a');
					$order.click(function(e){
						e.preventDefault();
						$order.parent().find('.selected').removeClass('selected');
						jQuery(this).addClass('selected');
<?php if (!isset($disableRedirect)) { ?>
						getItems();
<?php } ?>
					})
				});
			});

			function getItems(){
				// defaults
				var data = {
					count: <?php echo NTemplateHelpers::escapeJs($filterCountsSelected) ?>,
					orderby: 'date',
					order: 'ASC'
				};
				jQuery('.filters-container .filter-container').each(function(){
					var key = jQuery(this).data('filterid');
					var val;
					if(key == "order"){
						val = jQuery(this).find('a.selected').data('value');
					} else {
						val = jQuery(this).find('select option:selected').attr('value');
					}
					data[key] = val;
				});

				// build url
				var baseUrl = window.location.protocol+"//"+window.location.host+window.location.pathname;
				var eParams = window.location.search.replace("?", "").split('&');
				var nParams = {};
				var flag = true;
				jQuery.each(eParams, function(index, value){
					var val = value.split("=");
					if(val[0] === 's' || val[0] === 'category' || val[0] === 'location'){
						flag = false;
					}
					if(typeof val[1] == "undefined"){
						nParams[val[0]] = "";
					} else {
						nParams[val[0]] = decodeURI(val[1]);
					}
				});
				var query = jQuery.extend({
					's': '',
					'category': '',
					'location': '',
					'a': true
				}, nParams, data);
				var queryString = jQuery.param(query);
				window.location.href = baseUrl + "?" + queryString;
			}
			</script>
		</div>
	</div>
</div>