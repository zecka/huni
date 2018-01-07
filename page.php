<?php get_header(); ?>
<?php if ( !huni_is_beaver() ) { 
	echo '<div class="container">';
} ?>
	<?php  while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
<?php if (  !huni_is_beaver() ) { 
	echo '</div>';
} ?>

<?php
	// huni_gmap_example();
	
?>


<?php get_footer(); ?>