<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package NeatBootstrap
 */

get_header(); ?>

	<div class="aa_wrap">
		<h1><?php esc_html_e( 'Page not found.', 'neat' ); ?></h1>

		<p><?php esc_html_e( 'The page you were looking for couldn''t be found.', 'neat' ); ?></p>

		<?php get_search_form(); ?>
	</div>

<?php get_footer(); ?>
