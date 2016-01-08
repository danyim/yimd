<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package SolidBootstrap
 */

get_header(); ?>

<div class="container">
  <div class="row aa_wrap">
    <div class="col-md-12">
		  <h1><?php esc_html_e( 'Page not found.', 'neat' ); ?></h1>

		  <p><?php esc_html_e( 'The page you were looking for couldn\'t be found.', 'neat' ); ?></p>
    </div>
  </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
