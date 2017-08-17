<?php
//Logo Settings
function nevler_customize_register_skins( $wp_customize ) {
$wp_customize->add_section( 'title_tagline' , array(
    'title'      => __( 'Title, Tagline & Logo', 'nevler' ),
    'priority'   => 30,
) );

//Replace Header Text Color with, separate colors for Title and Description
//Override nevler_site_titlecolor
$wp_customize->remove_control('display_header_text');
$wp_customize->remove_setting('header_textcolor');
$wp_customize->add_setting('nevler_site_titlecolor', array(
    'default'     => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'nevler_site_titlecolor', array(
        'label' => __('Site Title Color','nevler'),
        'section' => 'colors',
        'settings' => 'nevler_site_titlecolor',
        'type' => 'color'
    ) )
);

$wp_customize->add_setting('nevler_header_desccolor', array(
    'default'     => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'nevler_header_desccolor', array(
        'label' => __('Site Tagline Color','nevler'),
        'section' => 'colors',
        'settings' => 'nevler_header_desccolor',
        'type' => 'color'
    ) )
);


//Settings For Logo Area

$wp_customize->add_setting(
    'nevler_hide_title_tagline',
    array( 'sanitize_callback' => 'nevler_sanitize_checkbox' )
);

$wp_customize->add_control(
    'nevler_hide_title_tagline', array(
        'settings' => 'nevler_hide_title_tagline',
        'label'    => __( 'Hide Title and Tagline.', 'nevler' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'nevler_branding_below_logo',
    array( 'sanitize_callback' => 'nevler_sanitize_checkbox' )
);

$wp_customize->add_control(
    'nevler_branding_below_logo', array(
        'settings' => 'nevler_branding_below_logo',
        'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'nevler' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
        'active_callback' => 'nevler_title_visible'
    )
);

function nevler_title_visible( $control ) {
    $option = $control->manager->get_setting('nevler_hide_title_tagline');
    return $option->value() == false ;
}

$wp_customize->add_setting(
    'nevler_center_logo',
    array(
        'sanitize_callback' => 'nevler_sanitize_checkbox',
        'default' => true )
);

$wp_customize->add_control(
    'nevler_center_logo', array(
        'settings' => 'nevler_center_logo',
        'label'    => __( 'Center Align.', 'nevler' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
    )
);
}
add_action( 'customize_register', 'nevler_customize_register_skins' );