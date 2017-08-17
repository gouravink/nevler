<?php
// CREATE THE FCA PANEL
function nevler_customize_register_fp( $wp_customize ) {
$wp_customize->add_panel( 'nevler_fca_panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Featured Content Areas','nevler'),
    'description'    => '',
) );


//FEATURED AREA 1
$wp_customize->add_section(
    'nevler_fc_boxes',
    array(
        'title'     => __('Featured Area 1','nevler'),
        'priority'  => 10,
        'panel'     => 'nevler_fca_panel'
    )
);

$wp_customize->add_setting(
    'nevler_box_enable',
    array( 'sanitize_callback' => 'nevler_sanitize_checkbox' )
);

$wp_customize->add_control(
    'nevler_box_enable', array(
        'settings' => 'nevler_box_enable',
        'label'    => __( 'Enable Featured Area 1.', 'nevler' ),
        'section'  => 'nevler_fc_boxes',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'nevler_box_title',
    array( 'sanitize_callback' => 'sanitize_text_field' )
);

$wp_customize->add_control(
    'nevler_box_title', array(
        'settings' => 'nevler_box_title',
        'label'    => __( 'Title for the Boxes','nevler' ),
        'section'  => 'nevler_fc_boxes',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'nevler_box_cat',
    array( 'sanitize_callback' => 'nevler_sanitize_category' )
);

$wp_customize->add_control(
    new Nevler_WP_Customize_Category_Control(
        $wp_customize,
        'nevler_box_cat',
        array(
            'label'    => __('Category For Square Boxes.','nevler'),
            'settings' => 'nevler_box_cat',
            'section'  => 'nevler_fc_boxes'
        )
    )
);
}
add_action( 'customize_register', 'nevler_customize_register_fp' );