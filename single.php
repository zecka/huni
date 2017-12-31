<?php get_header(); ?>
<?php global $huni_options; ?>

<div class="container">
	<div class="row">
		<?php huni_sidebar('single-left'); ?>
		<main class="col-9">
				<?php // get_template_part('partials/blog','intro'); ?>
			<div class="article-header-meta">
					<span class="comments_number">
						<?php comments_number( 'No comments yet', 'One comment', '% comments' ); ?>
					</span>
					<?php get_template_part('partials/article/social','share'); ?>
			</div>
		
			<div class="article-content">
				<?php  while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			<?php get_template_part('partials/single/author'); ?>
			
			<?php comments_template( '', true ); ?>
			
		</main>
		<?php huni_sidebar('single-right'); ?>
		
		
	</div>
</div>
<?php get_footer(); ?>