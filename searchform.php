<?php
/**
* Template for displaying search forms 
*
* @package WordPress
*/
?>
<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'huni' ); ?>" />
		<button type="submit">
		    <i class="fa fa-search"></i>
		</button>
</form>
