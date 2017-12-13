<?php get_header(); ?>
<?php get_template_part('partials/blog','intro'); ?>
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
					<h4><?php the_title(); ?></h4>
					<?php the_excerpt(44); ?>
					<div class="article-footer clearfix">
						<div class="article-buttons">
							<a href="<?php the_permalink(); ?>" class="button">Explore more</a>
							<span class="comments_number">
								<?php comments_number( 'No comments yet', 'One comment', '% comments' ); ?>
							</span>
						</div>
						<div class="social-like flex">
							<a href="#" class="fb-like btn-social">Like 120</a>
							<a href="#" class="tweet btn-social">Tweet</a>
						</div>
					</div>
				</div>
			</article>
		
		<?php endwhile; ?>
		</div>
		<!-- End of the main loop -->
		
		<!-- Add the pagination functions here. -->
		
		<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
		
		<?php else : ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>