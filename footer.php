<?php global $huni_options; ?>

<?php if($huni_options['footer_partners']){  ?>
	<section id="partners">
		<div class="container-6  text-center">
			<p><?php echo $huni_options['intro_partners']; ?></p>
		</div>
		<div class="container logos text-center">
			
			<?php $loop = new WP_Query( array( 'post_type' => 'partner', 'posts_per_page' => '10' ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<figure>
					<a href="<?php echo get_post_meta(get_the_id(), 'partner_external_url', true); ?>">
					<?php the_post_thumbnail('medium'); ?>
					</a>
				</figure>
			<?php endwhile; wp_reset_query(); ?>
			
		</div>
	</section>
<?php } ?>
<?php 
	if($huni_options['footer_cta']){
?>
<section id="footer-cta" class="inverted text-center">
	<div class="container-6">
		<h2><?php echo $huni_options['footer_cta_title']; ?></h2>
		<p><?php echo $huni_options['footer_cta_txt'];  ?></p>
		<a class="button" href="<?php echo $huni_options['footer_cta_url']; ?>">
			<?php echo $huni_options['footer_cta_btn_txt']; ?>
		</a>
	</div>	
</section>
<?php } //if footer_cta ?>

	<footer>
		<?php if($huni_options['footer_mailchimp']){ ?>
			<div class="container-8 newsletter clearfix">
				<?php echo do_shortcode($huni_options['footer_mailchimp_shortcode']); ?>
			</div>
		<?php } ?>
		<?php if($huni_options['prefooter']){ ?>
			<div id="prefooter" class="container">
				<div class="row">
					<div class="col-4">
						<?php 
						if ( is_active_sidebar( 'footer-one' ) ){
							dynamic_sidebar( 'footer-one' );
						} 
						?>
					</div>
					<div class="col-4">
						<nav>
							<ul>
								<li><a href="#">+8801912704287</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Support Resources</a></li>
								<li><a href="#">About Us</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-4">
						<nav class="right">
							<ul>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Documentation</a></li>
								<li><a href="#">Community</a></li>
								<li><a href="#">Privacy</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="copyright text-center inverted">
			<?php
				 echo $huni_options['footer_copyright']; ?>
		</div>
	</footer>
	</div><!-- #wrapper -->
	<?php wp_footer(); ?>
	
	  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8T0HTVcIlle6RGgypN8-c-Q6jIr1Q1GA&callback=initMap">
    </script> 
</body>
</html>