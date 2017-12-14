<?php

/* Custom callback function for Trackbacks/Pings, see comments.php */
function zk_comment_display($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="clearfix">
			
		<figure>
			<?php echo zk_get_author_avatar($comment, 100); ?>
			<figcaption>
				<cite>
					<a class="comment-author-link" href="<?php comment_author_url(); ?>">
						<?php comment_author(); ?>
					</a>
				</cite>
			</figcaption>
		</figure>

	

		<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
		<?php endif; ?>
		
		<div class="comment-content">
		
			<?php comment_text() ?>
			
			<div class="comment-meta commentmetadata">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" class="button square">
					<?php // printf(__('%1$s at %2$s'), get_comment_date('d M, Y'),  get_comment_time()) ?>
					<?php printf(__('%1$s'), get_comment_date('d M, Y')); ?>
				</a>
				<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	
						<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</div>
		</div>


		
		
	
	</div>
<?php
}
