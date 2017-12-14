<?php

add_filter('comment_reply_link', 'zk_replace_reply_link_class');
function zk_replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link button square gray", $class);
    return $class;
}

function zk_comment_form_fields( $fields ) {
    // Your code here
$fields =  array(

  'author' =>
    '<p class="comment-form-author">' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="author" name="author" type="text" placeholder="' .__('Name', HUNI_TEXT_DOMAIN) .
    '" size="30"' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="email" name="email" type="text" placeholder="' . __('Email', HUNI_TEXT_DOMAIN) .
    '" size="30"' . $aria_req . ' /></p>',
/*
  'url' =>
    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>',  */
);

    // Return something
    return $fields;
}
add_filter( 'comment_form_default_fields', 'zk_comment_form_fields' );
 
/* Add Placehoder in comment Form Field (Comment) */
add_filter( 'comment_form_defaults', 'help4cms_textarea_placeholder' );
 
function help4cms_textarea_placeholder( $fields )
{
  
        $fields['comment_field'] = str_replace(
            '<textarea',
            '<textarea placeholder="'.__('Your Comment', HUNI_TEXT_DOMAIN).'"',
            $fields['comment_field']
        );
   
 
    return $fields;
}
