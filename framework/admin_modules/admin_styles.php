<?php
/**
 * Enqueue Scripts for Admin
 */
if ( is_customize_preview() ) {
    function nevler_custom_wp_admin_style() {
        wp_enqueue_style( 'nevler-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
    }
    add_action( 'admin_enqueue_scripts', 'nevler_custom_wp_admin_style' );
}
