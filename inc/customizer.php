<?php
/**
 * untangled Theme Customizer
 *
 * @package untangled
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function untangled_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->add_setting( 'untangled_logo' );
	
	/* custom logo */
	$wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'untangled_logo',
	           array(
	               'label'      => __( 'Upload logo (replaces text)', 'untangled' ),
	               'section'    => 'title_tagline',
	               'settings'   => 'untangled_logo',
	           )
	       )
	   );

}
add_action( 'customize_register', 'untangled_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function untangled_customize_preview_js() {
	wp_enqueue_script( 'untangled_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'untangled_customize_preview_js' );
