<?php

function thirty_scripts()
{
    wp_enqueue_script('main', get_template_directory_uri() . '/script.js', array(), 2.0, true);
    wp_enqueue_style('blog', get_template_directory_uri() . '/main.css', array(), '2.0.0', false);
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
}

add_action('wp_enqueue_scripts', 'thirty_scripts');


add_action( 'set_comment_cookies', function( $comment, $user ) {
    setcookie( 'ta_comment_wait_approval', '1' );
}, 10, 2 );

add_action( 'init', function() {
    if( $_COOKIE['ta_comment_wait_approval'] === '1' ) {
        setcookie( 'ta_comment_wait_approval', null, time() - 3600, '/' );
        add_action( 'comment_form_before', function() {
            echo "<p id='wait_approval' style='margin: 40px;'><strong>Thank you for your message <br><br> Your lantern has been sent successfully and will be published once it has been approved.</strong></p>";
        });
    }
});

add_filter( 'comment_post_redirect', function( $location, $comment ) {
    $location = get_permalink( $comment->comment_post_ID ) . '#wait_approval';
    return $location;
}, 10, 2 );


?>
