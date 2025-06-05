<?php
/**
 * Facts and Stats block for Viridis theme
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
function viridis_facts_and_stats_block( $block, $content = '', $is_preview = false ) {
	$context               = Timber::context(); // phpcs:ignore
	$context['block']      = $block;
	$context['fields']     = get_fields();
	$context['is_preview'] = $is_preview;

	$info_length = count( get_field( 'info' ) );

	if ( $info_length <= 1 ) {
		$context['grid_columns'] = 'grid-cols-1';
	} elseif ( 2 === $info_length ) {
		$context['grid_columns'] = 'grid-cols-2';
	} elseif ( 3 === $info_length ) {
		$context['grid_columns'] = 'grid-cols-3';
	} else {
		$context['grid_columns'] = 'grid-cols-4';
	}

	$background = get_field( 'background_color' );

	if ( get_field( 'background_color' ) ) {
		if ( 'white' === get_field( 'background_color' ) ) {
			$context['background'] = 'bg-white';
		} elseif ( 'black' === get_field( 'background_color' ) ) {
			$context['background'] = 'bg-black';
		} else {
			$context['background'] = 'bg-green';
		}
	}

	Timber::render( 'blocks/facts-and-stats.twig', $context ); // phpcs:ignore
}
