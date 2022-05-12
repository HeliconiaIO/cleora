<?php
/**
 * Block Patterns
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'cleora',
		array( 'label' => esc_html__( 'cleora', 'cleora' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	// Large Text.
	register_block_pattern(
		'cleora/large-text',
		array(
			'title'         => esc_html__( 'Large text', 'cleora' ),
			'categories'    => array( 'cleora' ),
			'viewportWidth' => 1440,
			'content'       => '<!-- wp:heading {"align":"none","fontSize":"gigantic","style":{"typography":{"lineHeight":"1.1"}}} --><h2 class="has-gigantic-font-size" style="line-height:1.1">' . esc_html__( 'A new blog theme for WordPress', 'cleora' ) . '</h2><!-- /wp:heading -->',
		)
	);
}