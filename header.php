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
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
		<header class="inverted primarybg">
			<div class="header-wrap">
				<div class="container clearfix">
					<a class="logo" href="<?php echo home_url(); ?>">
						Huni
					</a>
					<a class="hamburger-menu">
						<span></span>
						<span></span>
						<span></span>
					</a>
					<div class="navs-wrap">
						<nav class="primary">
							
							<?php wp_nav_menu( array( 'menu' =>'primary', 'container' => false) ); ?>
						</nav>
						<nav class="secondary_nav">
							<a href="#" class="button">Shop</a>
							<a href="#" class="button alt">Login</a>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<?php if(!is_front_page() && !is_404()){ ?>
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
				        }elseif(is_single()){
					        _e("Blog Details", HUNI_TEXT_DOMAIN);
				        }else{
					        the_title();
				        }
					?>
					</h1>
					<?php huni_breadcrumb(); ?>
				</div>
			</section>
		<?php } ?>