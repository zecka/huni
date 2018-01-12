<?php 
	global $huni_options;
	if($huni_options['enable-blog-intro']==true){
?>
		<div class="blog-intro">
			<?php if(!is_single()){ ?>
				<div class="row flex">
					<div class="col-8">
						<h2><?php echo $huni_options['blog-intro-title']; ?></h2>
						<p><?php echo $huni_options['blog-intro']; ?></p>
					</div>
					<div class="col-4 relative">
						<?php get_search_form(1); ?>
					</div>
				</div>
			<?php }else{ ?>
					<div class="row">
						<div class="col-12">
						<h2><?php echo $huni_options['blog-intro-title']; ?></h2>
						<p><?php echo $huni_options['blog-intro']; ?></p>
						</div>
					</div>
				
			<?php } ?>
		</div>
	<?php } ?>