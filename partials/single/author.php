<?php 
/*
	DISPLAY THE AUTHOR INFOMARMATION
	
admin_color
aim
comment_shortcuts
description
display_name
first_name
ID
jabber
last_name
nickname
plugins_last_view
plugins_per_page
rich_editing
syntax_highlighting
user_activation_key
user_description
user_email
user_firstname
user_lastname
user_level
user_login
user_nicename
user_pass
user_registered
user_status
user_url
yim
	
*/
?>
<div class="author author-block clearfix">
	<h4>Author</h4>
	<?php
	
	$ID= get_the_author_meta("ID");
	$author_url=get_author_posts_url( $ID );

	$user_bio=get_the_author_meta("user_description", $ID);
	?>

		
	<figure>
		<?php echo zk_get_author_avatar(false, 100); ?>
		<figcaption>
			<a href="<?php echo $author_url; ?>">
				<?php echo get_the_author_meta( 'first_name' ); ?>
				<?php echo get_the_author_meta( 'last_name' ); ?>

			</a>
		</figcaption>
	</figure>
	<div class="author-info">		
		<p><?php echo $user_bio; ?></p>
		
	</div>
</div>



