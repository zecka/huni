
<?php 
	global $huni_options;
	$page=huni_get_current_layout();
?>
<?php if(($page=='single' || $page=='archive') && $huni_options['social-share-'.$page]==true){ ?>
	<div class="social-like flex">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="fb-like btn-social" onclick="window.open(this.href,'popup','width=600,height=450'); return false;">Share</a>
		<a href="https://twitter.com/home?status=<?php the_permalink(); ?>" class="tweet btn-social" onclick="window.open(this.href,'popup','width=600,height=450'); return false;">Tweet</a>
	</div>
<?php } ?>