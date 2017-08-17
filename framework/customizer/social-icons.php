<?php
// Social Icons
function nevler_customize_register_social( $wp_customize ) {
$wp_customize->add_section('nevler_social_section', array(
    'title' => __('Social Icons','nevler'),
    'priority' => 44 ,
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','nevler'),
    'facebook' => __('Facebook','nevler'),
    'twitter' => __('Twitter','nevler'),
    'google-plus' => __('Google Plus','nevler'),
    'instagram' => __('Instagram','nevler'),
    'rss' => __('RSS Feeds','nevler'),
    'vine' => __('Vine','nevler'),
    'vimeo-square' => __('Vimeo','nevler'),
    'youtube' => __('Youtube','nevler'),
    'flickr' => __('Flickr','nevler'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'nevler_social_'.$x, array(
        'sanitize_callback' => 'nevler_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'nevler_social_'.$x, array(
        'settings' => 'nevler_social_'.$x,
        'label' => __('Icon ','nevler').$x,
        'section' => 'nevler_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'nevler_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'nevler_social_url'.$x, array(
        'settings' => 'nevler_social_url'.$x,
        'description' => __('Icon ','nevler').$x.__(' Url','nevler'),
        'section' => 'nevler_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function nevler_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'nevler_customize_register_social' );