<?php //netteCache[01]000571a:2:{s:4:"time";s:21:"0.92053200 1487389175";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:85:"E:\autoskoly\wordpress\wp-content\themes\directory2\portal\parts\advanced-filters.php";i:2;i:1487389100;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.1";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.72";}}}?><?php

// source file: E:\autoskoly\wordpress\wp-content\themes\directory2\portal\parts\advanced-filters.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '40vumq0f8o')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//

// &filters=id;id;id;id
$themeOptions = aitOptions()->getOptionsByType('theme');
$advancedFiltersOptions = (object)$themeOptions['itemAdvancedFilters'];

if($advancedFiltersOptions->enabled){
	$filters_avalaible = get_terms('ait-items_filters', array('hide_empty' => false));
	$filters_enabled = array();
	if(isset($_REQUEST['filters']) && !empty($_REQUEST['filters'])){
		$filters_enabled = explode(";",$_REQUEST['filters']);
	}

	if($query->max_num_pages != 1){
		// check if there will be pagination
		$item_query_args = $query->query_vars;	// populate new variable ... dont modify original query
		$item_query_args['nopaging'] = true;
		$item_query = new WP_Query($item_query_args);
	} else {
		$item_query = $query;
	}

	$item_filters = array();
	foreach($item_query->posts as $post){
		$post_meta = get_post_meta( $post->ID, '_ait-item_filters-options');
		if(!empty($post_meta)){
			$post_filters = $post_meta[0]['filters'];
			foreach ($post_filters as $id) {
				$filter = get_term($id, 'ait-items_filters', "OBJECT");
				if(!empty($filter)){
					array_push($item_filters, $filter);
				}
			}
		}
	}
	$unique_filters = array_map("unserialize", array_unique(array_map("serialize", $item_filters)));
	$filters_avalaible = $unique_filters;
	
	usort($filters_avalaible, function($a, $b){
		return strcmp($a->slug, $b->slug);
	})
?>
	<?php
		if(is_array($filters_avalaible) && count($filters_avalaible) > 0){
?>
		<div class="advanced-filters-wrap">

			<h2>Typy vodičákov (skupiny)</h2>
			<div class="filter-description">Vyberte si skupinu podľa vašej potreby a kliknite na tlačitko "Zobraziť"</div>
			
			<div class="advanced-filters-container">
				<div class="content">

							<ul class="advanced-filters columns-<?php echo $advancedFiltersOptions->filterColumns ?>">
								<?php foreach($filters_avalaible as $filter){
									if(!empty($filter)){
										$filter_options = get_option( "ait-items_filters_category_".$filter->term_id );
										$filter_type = isset($filter_options['type']) ? $filter_options['type'] : 'checkbox';
										$is_enabled = in_array($filter->term_id, $filters_enabled);
										$li_class = "";
										$in_checked = "";
										if($is_enabled){
											$li_class = "filter-enabled";
											$in_checked = "checked";
										}

										switch($filter_type){
											case 'checkbox':
												/*$imageClass = !empty($filter_options['icon']) ? 'has-image' : '';*/
												$imageClass = 'has-image';
												$image = !empty($filter_options['icon']) ? '<i class="fa '.$filter_options['icon'].'"></i>' : '<i class="fa fa-dot-circle-o"></i>';
												echo '<li class="filter-container filter-checkbox '.$li_class.' '.$imageClass.' "><input type="checkbox" name="'.$filter->slug.'" value="'.$filter->term_id.'" '.$in_checked.'>'.$image.'<span class="filter-name">'.$filter->name.'</span></li>';
											break;
											default:
												echo '<li class="filter-container filter-unsupported">'.__('Unsupported filter', 'ait-advanced-filters').'</li>';
											break;
										}
									}
								}
?>
							</ul>

				</div>
			</div>
			<div class="advanced-filters-actions">
				<a href="#" class="filter-action-filterme ait-sc-button"><?php _e('Zobraziť', 'ait-advanced-filters') ?></a>
			</div>

			<script type="text/javascript">
			jQuery(document).ready(function(){
				// filter type actions

				// checkbox
				jQuery('.advanced-filters-wrap ul li.filter-checkbox').on('click', function(e){
					jQuery(this).toggleClass('filter-enabled');
					var $input = jQuery(this).find('input');
					if($input.is(':checked')){
						$input.removeAttr('checked');
					} else {
						$input.attr('checked', true);
					}
				});

				// filter submit actions
				jQuery('.advanced-filters-wrap .filter-action-filterme').on('click', function(e){
					e.preventDefault();
					// build new query
					var filterString = "";
					var filterCheck = 0;
					// &filters=id;id;id
					jQuery('.advanced-filters-wrap ul li').each(function(){
						var $input = jQuery(this).find('input');
						if($input.is(':checked')){
							filterString = filterString + $input.val() + " ";
							filterCheck += 1;
						}
					});
					filterString = filterString.trim().replace(new RegExp(' ', 'g'), ";");

					var pathName = window.location.pathname;
					/* remove page parameter from url */
					pathName = pathName.replace(new RegExp("page\/[0-9]*\/", 'g'), "");
					/* remove page parameter from url */
					
					var baseUrl = window.location.protocol+"//"+window.location.host+pathName;
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
							nParams[val[0]] = decodeURIComponent(val[1]);
						}
					});
					var query = jQuery.extend({
						's': '',
						'category': '',
						'location': '',
						'a': true
					}, nParams, { filters: filterString });
					if(filterCheck == 0){
						delete query.filters;
					}
					delete query.paged;
					delete query.count;

					// remove empty keys
					jQuery.each(query, function(k, v){
						if(!k){
							delete query[k];
						}
					});

					var queryString = jQuery.param(query);
					window.location.href = baseUrl + "?" + queryString;
				});
			});
			</script>
		</div>
<?php
		}
	}



