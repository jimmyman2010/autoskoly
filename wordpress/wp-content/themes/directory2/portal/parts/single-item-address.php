<div n:class="'address-container', $meta->displaySocialIcons && count($meta->socialIcons) > 0 ? social-icons-displayed">
	<h2>{__ 'Informácie'}</h2>

	{includePart portal/parts/single-item-social-icons}

	<div class="content">

		{if !$meta->web && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-web">
			<div class="address-name"><h5>{__ 'Webová stránka'}:</h5></div>
			<div class="address-data"><p>{if $meta->web}<a href="{$meta->web}" target="_blank" itemprop="url" {if $settings->addressWebNofollow}rel="nofollow"{/if}>{if $meta->webLinkLabel}{$meta->webLinkLabel}{else}{$meta->web}{/if}</a>{else}-{/if}</p></div>
		</div>
		{/if}

		{if !$meta->telephone && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-telephone">
			<div class="address-name"><h5>{__ 'Telefónne číslo'}:</h5></div>
			<div class="address-data">
				{if $meta->telephone}
				<p>
					<span itemprop="telephone"><a href="tel:{$meta->telephone}" class="phone">{$meta->telephone}</a></span>
				</p>
				{else}
				<p>-</p>
				{/if}
			</div>

		</div>
		{/if}

		{if !$meta->fax && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-telephone">
			<div class="address-name"><h5>{__ 'Fax'}:</h5></div>
			<div class="address-data">
				{if $meta->fax}
				<p>
					<span itemprop="fax"><a href="tel:{$meta->fax}" class="phone">{$meta->fax}</a></span>
				</p>
				{else}
				<p>-</p>
				{/if}
			</div>

		</div>
		{/if}

		{if !$meta->mobilePhone && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-telephone">
			<div class="address-name"><h5>{__ 'Mobil'}:</h5></div>
			<div class="address-data">
				{if $meta->mobilePhone}
				<p>
					<span itemprop="mobilePhone"><a href="tel:{$meta->mobilePhone}" class="phone">{$meta->mobilePhone}</a></span>
				</p>
				{else}
				<p>-</p>
				{/if}
			</div>

		</div>
		{/if}

		{if !$meta->map['address'] && $settings->addressHideEmptyFields}{else}
		{var address = $meta->map['address']}
		{if $meta->address}
			{var address = $meta->address}
		{/if}
		<div class="address-row row-postal-address" itemscope itemtype="http://schema.org/PostalAddress">
			<div class="address-name"><h5>{__ 'Adresa'}:</h5></div>
			<div class="address-data" itemprop="streetAddress"><p>{if $address}{$address}{else}-{/if}</p></div>
		</div>
		{/if}

		{if !$settings->addressHideGpsField}
		{if ($meta->map['latitude'] === "1" && $meta->map['longitude'] === "1") != true}

		<div class="address-row row-gps" itemscope itemtype="http://schema.org/Place">
			<div class="address-name"><h5>{__ 'GPS'}:</h5></div>
			<div class="address-data" itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
				<p>
					{if $meta->map['latitude'] && $meta->map['longitude']}
						{$meta->map['latitude']}, {$meta->map['longitude']}
						<meta itemprop="latitude" content="{$meta->map['latitude']}">
						<meta itemprop="longitude" content="{$meta->map['longitude']}">
					{else}-{/if}
				</p>
			</div>
		</div>
		{/if}
		{/if}

		{if !$meta->email && $settings->addressHideEmptyFields}{else}
			<div class="address-row row-email">
				<div class="address-name"><h5>{__ 'Email'}:</h5></div>
				<div class="address-data">
					{if $meta->email != ""}
						<p><a href="mailto:{$meta->email}" target="_top" itemprop="email">{$meta->email}</a></p>
					{else}
						<p>-</p>
					{/if}
				</div>
			</div>
		{/if}

		<!--
		{var $taxonomies = $post->taxonomies}
		{foreach $taxonomies as $taxonomy}
			{$taxonomy}<br>
		{/foreach}
		-->
		{var $terms = get_the_terms($post->id, 'ait-items')}
		{if $terms}
		<div class="address-row row-city">
			<div class="address-name"><h5>{__ 'Mesto'}:</h5></div>
			<div class="address-data">

				{foreach $terms as $index => $term}
					{if $index > 0}, {/if}<span>{$term->name}</span>
				{/foreach}

			</div>

		</div>
		{/if}

		{var $terms = get_the_terms($post->id, 'ait-locations')}
		{if $terms}
		<div class="address-row row-region">
			<div class="address-name"><h5>{__ 'Kraj'}:</h5></div>
			<div class="address-data">

				{foreach $terms as $index => $term}
					{if $index > 0}, {/if}<span>{$term->name}</span>
				{/foreach}

			</div>

		</div>
		{/if}

		{if !$meta->languagesOffered && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-languages-offered">
			<div class="address-name"><h5>{__ 'Výuka v jazykoch'}:</h5></div>
			<div class="address-data">
				{if $meta->languagesOffered != ""}
					<p><span itemprop="languageOffered">{$meta->languagesOffered}</span></p>
				{else}
					<p>-</p>
				{/if}
			</div>
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
		<div class="address-row row-licence">
			<div class="address-name"><h5>{__ 'Typy vodičákov'}:</h5></div>
			<div class="address-data">
				{foreach $licences as $index => $filter}
				{if $index > 0}, {/if}<span>{!$filter}</span>
				{/foreach}
			</div>
		</div>
		{/if}

		{if !$meta->lengthOfCourse && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-length-of-course">
			<div class="address-name"><h5>{__ 'Dĺžka kurzu'}:</h5></div>
			<div class="address-data">
				{if $meta->lengthOfCourse != ""}
				<p><span itemprop="lengthOfCourse">{$meta->lengthOfCourse}</span></p>
				{else}
				<p>-</p>
				{/if}
			</div>
		</div>
		{/if}

		{if !$meta->vozidla && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-vozidla">
			<div class="address-name"><h5>{__ 'Vozidlá'}:</h5></div>
			<div class="address-data">
				{if $meta->vozidla != ""}
				<p><span itemprop="vozidla">{$meta->vozidla}</span></p>
				{else}
				<p>-</p>
				{/if}
			</div>
		</div>
		{/if}

		{if !$meta->trenazer && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-trenazer">
			<div class="address-name"><h5>{__ 'Trenažer'}:</h5></div>
			<div class="address-data">
				{if $meta->trenazer != ""}
				<p><span itemprop="trenazer">{$meta->trenazer}</span></p>
				{else}
				<p>-</p>
				{/if}
			</div>
		</div>
		{/if}

		{if !$meta->kurzPrvejPomoci && $settings->addressHideEmptyFields}{else}
		<div class="address-row row-kurzPrvejPomoci">
			<div class="address-name"><h5>{__ 'Kurz prvej pomoci'}:</h5></div>
			<div class="address-data">
				{if $meta->kurzPrvejPomoci != ""}
				<p><span itemprop="kurzPrvejPomoci">{$meta->kurzPrvejPomoci}</span></p>
				{else}
				<p>-</p>
				{/if}
			</div>
		</div>
		{/if}
	</div>
</div>