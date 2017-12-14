<?php get_header(); ?>
<div class="container">
	<div class="row">
		<main class="col-9">
				<?php get_template_part('partials/blog','intro'); ?>
			<div class="article-header-meta">
					<span class="comments_number">
						<?php comments_number( 'No comments yet', 'One comment', '% comments' ); ?>
					</span>
					<?php get_template_part('partials/article/social','share'); ?>
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
			<?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
				<div id="sidebar">
					<?php dynamic_sidebar( 'sidebar-blog' ); ?>
				</div>
			<?php endif; ?>
		</aside>
		
	</div>
</div>
<?php get_footer(); ?>