<?php get_header(); ?>
<div class="container">
	<div class="row">
		<main class="col-9">
			<div class="article-header-meta">
					<span class="comments_number">
						<?php comments_number( 'No comments yet', 'One comment', '% comments' ); ?>
					</span>
					<div class="social-like flex">
							<a href="#" class="fb-like btn-social">Like 120</a>
							<a href="#" class="tweet btn-social">Tweet</a>
					</div>
			</div>
		
			<h2 class="article-title"><?php the_title(); ?></h2>
			<div class="article-content">
				<?php  while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			<?php get_template_part('partials/single/author'); ?>
			
			<?php comments_template( '', true ); ?>
			
		</main>
		<aside class="col-3">
		</aside>
		
	</div>
</div>
<?php get_footer(); ?>