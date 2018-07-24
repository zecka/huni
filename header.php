<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<?php global $huni_options; ?>
</head>
<?php 
	if($huni_options['header-type']=='left'){
		$logo_variant='dark';
	}else{
		$logo_variant='light';
	}
?>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<header <?php huni_header_class(); ?>>
			<div class="header-wrap">
				<div class="container clearfix">
					<a class="logo logo-mobile" href="<?php echo home_url(); ?>">
						<img src="<?php echo $huni_options['logo-'.$logo_variant]['url']; ?>" />
					</a>
					<div class="header-flex">
						<a class="logo" href="<?php echo home_url(); ?>">
							<img src="<?php echo $huni_options['logo-'.$logo_variant]['url']; ?>" />
						</a>
						
						<nav class="primary">
							<div class="primary-inner">
							<?php wp_nav_menu( array( 'menu' =>'primary', 'container' => false, 'walker' => new Huni_Nav_Walker()) ); ?>
							</div>
						</nav>
						<?php 
							
						
						?>
						<nav class="secondary">
							<?php if($huni_options['secondary-btn-1-txt']): ?>
								<a href="<?php echo $huni_options['secondary-btn-1-url']; ?>" class="button"><?php echo $huni_options['secondary-btn-1-txt']; ?></a>
							<?php endif; ?>
							<?php if($huni_options['secondary-btn-2-txt']): ?>
							<a href="<?php echo $huni_options['secondary-btn-2-url']; ?>" class="button alt"><?php echo $huni_options['secondary-btn-2-txt']; ?></a>
							<?php endif; ?>
							<?php echo huni_ajax_search(); ?>
						</nav>
					</div>
					<a class="hamburger-menu">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
			</div>
		</header>
		<?php $hide_title = rwmb_meta( 'huni-enable-page-title' ); ?>
		<?php if(!is_front_page() && !is_404() && $hide_title !== 'hide'){ ?>
			<section id="pageTitle">
				<div class="container">
					<h1><?php
						if (is_home()){
				            global $post;
				            $page_for_posts_id = get_option('page_for_posts');
				            if ( $page_for_posts_id ) { 
				                $post = get_page($page_for_posts_id);
				                setup_postdata($post);
				                the_title();
				                rewind_posts();
				            }
				        }elseif(is_category()){
							single_cat_title( '', true );
				        }elseif(is_post_type_archive()){
					        post_type_archive_title();
				        }else{
					        the_title();
				        }
					?>
					</h1>
					<?php huni_breadcrumb(); ?>
				</div>
			</section>
		<?php } ?>
