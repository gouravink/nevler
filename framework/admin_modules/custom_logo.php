<?php
/*
** Function for Backwards Compatibility of Custom Logo. Remove on WP 4.7
*/
//Backwards Compatibility FUnction
function nevler_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}

function nevler_has_logo() {
    if (function_exists( 'has_custom_logo')) {
        if ( has_custom_logo() ) {
            return true;
        }
    } else {
        return false;
    }
}