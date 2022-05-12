<?php
/**
 * Block Styles
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 */
	function cleora_register_block_styles() {
		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'cleora-border',
				'label' => esc_html__( 'Borders', 'cleora' ),
			)
		);
	}
	add_action( 'init', 'cleora_register_block_styles' );
}
