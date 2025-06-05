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
function viridis_billboard_block( $block, $content = '', $is_preview = false ) {
	$context               = Timber::context(); // phpcs:ignore
	$context['block']      = $block;
	$context['fields']     = get_fields();
	$context['is_preview'] = $is_preview;

	Timber::render( 'blocks/billboard.twig', $context ); // phpcs:ignore
}
