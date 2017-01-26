{if $post->hasCommentsOpen}
	<div class="comments-link">
		<a href="{$post->commentsUrl}" title="{__ 'Komentuje %s'|printf: $post->title}">
			{if $post->commentsNumber > 1}
				<span class="comments-count" title="{_n '%s Komentár', '%s Komentáre'|printf: $post->commentsNumber}">
					<span class="comments-number">{$post->commentsNumber}</span> {__ 'Komentáre'}
				</span>
			{elseif $post->commentsNumber == 0}
				<span class="comments-count" title="{__ 'Zanechať komentár'}">
					<span class="comments-number">0</span> {__ 'Komentáre'}
				</span>
			{else}
				<span class="comments-count" title="{__ '1 Komentár'}">
					<span class="comments-number">1</span> {__ 'Komentár'}
				</span>
			{/if}
		</a>
	</div><!-- .comments-link -->
{/if}