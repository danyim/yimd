<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package yimd
 */

get_header(); ?>

<div class="container">
  <div class="row aa_wrap">
    <div class="col-md-12">
      <h1 class="content-title"><?php esc_html_e( 'Page not found', 'neat' ); ?></h1>
      <div class="content" style="text-align: center;">
        <p><?php esc_html_e( 'The page you were looking for doesn\'t exist.', 'neat' ); ?></p>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
