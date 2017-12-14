
	<div class="blog-intro">
		<?php if(!is_single()){ ?>
			<div class="row flex">
				<div class="col-8">
					<h2>A BLOG ABOUT ANALYTICS, Social media  AND TESTING</h2>
					<p>With the first month behind us and feet firmly planted in February, we are now well into 2017 now and have many exciting things happening at introzap.
						
					</p>
				</div>
				<div class="col-4 relative">
					<?php get_search_form(1); ?>
				</div>
			</div>
		<?php }else{ ?>
				<div class="row">
					<div class="col-12">
						<h2>A BLOG ABOUT ANALYTICS, Social media  AND TESTING</h2>
						<p>With the first month behind us and feet firmly planted in February, we are now well into 2017 now and have many exciting things happening at introzap.</p>
					</div>
				</div>
			
		<?php } ?>
	</div>
