<?php

get_header();
global $huni_options;
?>

<div id="content" class="container">
	<div class="row">
		<div id="main" class="col-12" role="main">

			<div id="portfolio-wrapper">
			<?php 
				$terms = get_terms("portfolio_cat"); 
				$count = count($terms); 
				echo '<ul id="portfolio-filter" class="filter">'; 
				echo '<li><a href="#all" class="button alt" data-filter="*" title="'.__('All', HUNI_TEXT_DOMAIN).'">'.__('All', HUNI_TEXT_DOMAIN).'</a></li>'; 
				if ( $count > 0 ) { 
					foreach ( $terms as $term ) { 
						$termname = ($term->slug); 
						echo ' <li><a href="#'.$termname.'" class="button" title="" data-filter=".'.$termname.'" rel="'.$termname.'">'.$term->name.'</a></li>'; 
					} 
				} 
				echo "</ul>"; 
			?>

			
				<ul id="portfolio-list" class="thumbnails isotope">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('item-portfolio'); ?> role="article">
						<?php
							$image_id = get_post_thumbnail_id();
							$image_url = wp_get_attachment_image_src($image_id, 'large');
							$image_url = $image_url[0];
						?>

						<a class="fancybox thumbnail" id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<figure>
								<?php the_post_thumbnail('medium', array('class' => 'aligncenter photo')); ?>
								<figcaption>
									<span class="title"><?php echo the_title(); ?></span>
								</figcaption>
							</figure>
						</a>
						
					</article>

				<?php endwhile; ?> 

				<?php else : ?>

					<article id="post-not-found">
						<header>
							<h1><?php _e("No portfolio yet", "ntp_framework"); ?></h1>
						</header>

						<section class="post_content">
							<p><?php _e("Sorry, What you were looking for is not here.", "ntp_framework"); ?></p>
						</section>
					</article>

				<?php endif; ?>

				</ul>
			</div>
		</div> 
	</div> 
</div>
<?php get_footer(); ?>
