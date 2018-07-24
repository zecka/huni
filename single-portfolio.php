<?php get_header(); ?>
<?php global $huni_options; ?>

<div class="container">
	<div class="row">
		<?php huni_sidebar('single-left'); ?>
		<main class="<?php huni_main_class(); ?>">
				<?php // get_template_part('partials/blog','intro'); ?>

	
			<div class="article-content">
				<?php  while ( have_posts() ) : the_post(); ?>
					
					<?php the_content(); ?>
					<?php echo do_shortcode('[portfolio-gallery]'); ?>

				<?php endwhile; ?>
			</div>
			
			<?php get_template_part('partials/article/social','share'); ?>

			<?php 
			if($huni_options['author-info']==true){
				 get_template_part('partials/single/author');
			}
			 ?>
			
			<?php comments_template( '', true ); ?>
			
		</main>
		<?php huni_sidebar('single-right'); ?>
		
		
	</div>
</div>
<?php get_footer(); ?>