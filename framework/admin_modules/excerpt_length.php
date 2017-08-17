<?php
//Function to Trim Excerpt Length & more..
function nevler_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'nevler_excerpt_length', 999 );

function nevler_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'nevler_excerpt_more' );