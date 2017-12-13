<?php
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function huni_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'huni_custom_excerpt_length', 999 );