<?php
/**
 * Basic Content block for Viridis theme
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
function viridis_basic_content_block( $block, $content = '', $is_preview = false ) {
	$context               = Timber::context(); // phpcs:ignore
	$context['block']      = $block;
	$context['fields']     = get_fields();
	$context['is_preview'] = $is_preview;

	if ( get_field( 'background_color' ) ) {
		if ( 'white' === get_field( 'background_color' ) ) {
			$context['background'] = 'bg-white';
		} elseif ( 'black' === get_field( 'background_color' ) ) {
			$context['background'] = 'bg-black';
		} else {
			$context['background'] = 'bg-green';
		}
	}

	Timber::render( 'blocks/basic-content.twig', $context ); // phpcs:ignore
}
