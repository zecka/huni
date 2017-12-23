<?php get_header(); ?>
<div class="container">
	<?php get_template_part('partials/blog','intro'); ?>
</div>
<main>
	<div class="container">
		<?php if ( have_posts() ) : ?>
		
		<!-- Add the pagination functions here. -->
		
		<!-- Start of the main loop. -->
		<div class="articles-list">
		<?php while ( have_posts() ) : the_post();  ?>
			<article class="clearfix">
				<figure><?php the_post_thumbnail('blog-thumb'); ?></figure>
				<div class="article-excerpt">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<?php the_excerpt(44); ?>
					<div class="article-footer clearfix">
						<div class="article-buttons">
							<a href="<?php the_permalink(); ?>" class="button">Explore more</a>
							<span class="comments_number">
								<?php comments_number( 'No comments yet', 'One comment', '% comments' ); ?>
							</span>
						</div>
						<?php get_template_part('partials/article/social','share'); ?>
					</div>
				</div>
			</article>
		
		<?php endwhile; ?>
		</div>
		<!-- End of the main loop -->
		
		<!-- Add the pagination functions here. -->
		
		<?php huni_paging_nav(); ?>
		
		<?php else : ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>