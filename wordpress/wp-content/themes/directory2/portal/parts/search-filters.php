{* VARIABLES *}
{var $postType = isset($postType) ? $postType : 'items'}
{if $postType == 'ait-event-pro'}
	{var $settings = (object)get_option('ait_events_pro_options', array())}
{else}
	{var $settings = $options->theme->items}
{/if}


{var $filterCounts = array(5, 10, 20)}

{capture $dateLabel}{__ 'Dátumu pridania'}{/capture}
{capture $titleLabel}{__ 'Názvu'}{/capture}

{var $filterOrderBy = array(
	"title" => $titleLabel
)}

{if defined('AIT_REVIEWS_ENABLED') and $postType != 'ait-event-pro'}
	{capture $ratingLabel}{__ 'Hodnotenia'}{/capture}
	{? $filterOrderBy["rating"] = $ratingLabel}
{/if}

{? $filterOrderBy["date"] = $dateLabel}

{var $filterOrderBy = apply_filters('ait_search_filter_orderby', $filterOrderBy, $postType)}

{var $filterCountsSelected = isset($_REQUEST['count']) && $_REQUEST['count'] != "" ? $_REQUEST['count'] : $settings->sortingDefaultCount}
{var $filterOrderBySelected = isset($_REQUEST['orderby']) && $_REQUEST['orderby'] != "" ? $_REQUEST['orderby'] : $settings->sortingDefaultOrderBy}
{var $filterOrderSelected = isset($_REQUEST['order']) && $_REQUEST['order'] != "" ? $_REQUEST['order'] : $settings->sortingDefaultOrder}
{* VARIABLES *}

<div class="filters-wrap">
	{*if $postType == "ait-event-pro"}
		<h2>{!_x 'Showing %1$s from %2$s Upcoming Events', 'event pro taxonomy'|printf: $current, $max}</h2>
	{else}
		<h2>{!_x 'Showing %1$s from %2$s Items', 'item taxonomy'|printf: $current, $max}</h2>
	{/if*}
	<div class="filters-container">
		<div class="content">
			{if $postType != 'ait-event-pro'}
			<div class="filter-container filter-count" data-filterid="count">
				<div class="content">
					<div class="selected">{__ 'Počet výsledkov'}:</div>
					<select class="filter-data">
						{foreach $filterCounts as $filter}
							{if $filter == $filterCountsSelected}
								<option value="{$filter}" selected>{$filter}</option>
							{else}
								<option value="{$filter}">{$filter}</option>
							{/if}
						{/foreach}
					</select>
				</div>
			</div>
			{/if}
			<div class="filter-container filter-orderby" data-filterid="orderby">
				<div class="content">
					<div class="selected">{__ 'Triediť podľa'}:</div>
					<select class="filter-data">
						{foreach $filterOrderBy as $key => $filter}
							{if $key == $filterOrderBySelected}
								<option value="{$key}" selected>{$filter}</option>
							{else}
								<option value="{$key}">{$filter}</option>
							{/if}
						{/foreach}

					</select>
				</div>
			</div>
			<div class="filter-container filter-order" data-filterid="order">
				<div class="content">
					<div class="selected title">{__ 'Zoradiť'}:</div>
					<a n:class='$filterOrderSelected == "ASC" ? selected' title="ASC" href="#" data-value="ASC"><i class="fa fa-angle-down"></i></a>
					<a n:class='$filterOrderSelected == "DESC" ? selected' title="DESC" href="#" data-value="DESC"><i class="fa fa-angle-up"></i></a>
				</div>
			</div>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('.filters-container .filter-container').each(function(){
					$select = jQuery(this).find('select');
					$select.change(function(){
						{if !isset($disableRedirect)}
						getItems();
						{/if}
					});
					$order = jQuery(this).find('a');
					$order.click(function(e){
						e.preventDefault();
						$order.parent().find('.selected').removeClass('selected');
						jQuery(this).addClass('selected');
						{if !isset($disableRedirect)}
						getItems();
						{/if}
					})
				});
			});

			function getItems(){
				// defaults
				var data = {
					count: {$filterCountsSelected},
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