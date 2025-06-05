<?php
/**
 * Hero block for Viridis theme
 *
 * @package viridis
 */

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function viridis_hero_block( $block, $content = '', $is_preview = false ) {
	$context               = Timber::context(); // phpcs:ignore
	$context['block']      = $block;
	$context['fields']     = get_fields();
	$context['is_preview'] = $is_preview;

	$block_id = 'hero-block-bg';

	if ( 'static' === get_field( 'hero_type' ) || 'static' === get_field( 'mobile_hero_type' ) ) {
		$hero_image = get_field( 'hero_image' );

		$bg_image = $hero_image['image']['url'];

		$bg_image_alt = $hero_image['image']['alt'];

		$bg_image_scset = wp_get_attachment_image_srcset( $hero_image['image']['ID'], 'full' );

		if ( isset( $hero_image['mobile_image_position'] ) ) {
			$bg_mobile_position = $hero_image['mobile_image_position'];
		} else {
			$bg_mobile_position = '0% 0%';
		}

		if ( isset( $hero_image['desktop_image_position'] ) ) {
			$bg_desktop_position = $hero_image['desktop_image_position'];
		} else {
			$bg_desktop_position = '0% 0%';
		}

		if ( get_field( 'hero_image' )['image_position'] ) {
			$bg_position = get_field( 'hero_image' )['image_position'];
		} else {
			$bg_position = 'object-center';
		}
	} elseif ( 'random' === get_field( 'hero_type' ) || 'random' === get_field( 'mobile_hero_type' ) ) {
		$hero_images = get_field( 'hero_images' );

		$random_hero   = array_rand( $hero_images );
		$selected_hero = $hero_images[ $random_hero ];

		$bg_image = $selected_hero['image']['url'];

		$bg_image_alt = $selected_hero['image']['alt'];

		$bg_image_scset = wp_get_attachment_image_srcset( $selected_hero['image']['ID'], 'full' );

		if ( $selected_hero['image_position'] ) {
			$bg_position = $selected_hero['image_position'];
		} else {
			$bg_position = 'object-center';
		}
	}

	if ( 'none' !== get_field( 'hero_type' ) ) {
		$context['bg_image']       = esc_url( $bg_image );
		$context['bg_image_alt']   = esc_attr( $bg_image_alt );
		$context['bg_image_scset'] = esc_attr( $bg_image_scset );
		$context['bg_position']    = esc_attr( $bg_position );
	}

	if ( isset( get_field( 'buttons' )['secondary_button']['url'] ) ) {
		$context['show_secondary_button'] = true;
	} else {
		$context['show_secondary_button'] = false;
	}

	Timber::render( 'blocks/hero.twig', $context ); // phpcs:ignore
}
