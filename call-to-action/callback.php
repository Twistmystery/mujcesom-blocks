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
function viridis_call_to_action_block( $block, $content = '', $is_preview = false ) {
	$context               = Timber::context(); // phpcs:ignore
	$context['block']      = $block;
	$context['fields']     = get_fields();
	$context['is_preview'] = $is_preview;

	if ( 'white' === get_field( 'background_color' ) ) {
		$context['background_color'] = 'bg-white';
		$context['text_color']       = 'text-green';
		$context['link_color']       = 'text-green hover:text-green-dark';
	} elseif ( 'black' === get_field( 'background_color' ) ) {
		$context['background_color'] = 'bg-gray-900';
		$context['text_color']       = 'text-white';
		$context['link_color']       = 'text-white hover:text-white';
	} else {
		$context['background_color'] = 'bg-green';
		$context['text_color']       = 'text-white';
		$context['link_color']       = 'text-white hover:text-white';
	}

	Timber::render( 'blocks/call-to-action.twig', $context ); // phpcs:ignore
}
