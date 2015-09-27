<?php
/**
 * theme colors
 *
 * listed color outputs that are inline
 *
 * @package BlogSixteen
 */

function blogsixteen_register_theme_customizer( $wp_customize ) {

    $wp_customize->add_setting(
        'blogsixteen_link_color',
        array(
            'default'     => '#000000',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Link Color', 'blogsixteen' ),
                'section'    => 'colors',
                'settings'   => 'blogsixteen_link_color',
                'sanitize_callback' => 'esc_url_raw'
            )
        )
    );

    $wp_customize->add_setting(
        'blogsixteen_headline_color',
        array(
            'default'     => '#000000',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'headline_color',
            array(
                'label'      => __( 'Headline Color', 'blogsixteen' ),
                'section'    => 'colors',
                'settings'   => 'blogsixteen_headline_color',
                'sanitize_callback' => 'esc_url_raw'
            )
        )
    );


    $wp_customize->add_setting(
        'blogsixteen_text_color',
        array(
            'default'     => '#000000',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'text_color',
            array(
                'label'      => __( 'Text Color', 'blogsixteen' ),
                'section'    => 'colors',
                'settings'   => 'blogsixteen_text_color',
                'sanitize_callback' => 'esc_url_raw'
            )
        )
    );


    $wp_customize->add_setting(
        'blogsixteen_main_color',
        array(
            'default'     => '#000000',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'main_color',
            array(
                'label'      => __( 'Main Component Color', 'blogsixteen' ),
                'section'    => 'colors',
                'settings'   => 'blogsixteen_main_color',
                'sanitize_callback' => 'esc_url_raw'
            )
        )
    );

}

add_action( 'customize_register', 'blogsixteen_register_theme_customizer' );


function blogsixteen_customizer_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo get_theme_mod( 'blogsixteen_link_color' ); ?>; }
        body { color: <?php echo get_theme_mod ( 'blogsixteen_text_color' ); ?>; }
        h1,h2,h3,h4,h5 { color: <?php echo get_theme_mod ( 'blogsixteen_headline_color' ); ?>; }
        #site-navigation a, #site-navigation a:visited { color: <?php echo get_theme_mod ( 'blogsixteen_main_color' ); ?>; }
        .reply a, button, input[type="button"], input[type="reset"], input[type="submit"] { border-color: <?php echo get_theme_mod ( 'blogsixteen_main_color' ); ?>; background-color: <?php echo get_theme_mod ( 'blogsixteen_main_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'blogsixteen_customizer_css' );


?>
