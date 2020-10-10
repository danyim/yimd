<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package yimd
 */
?>
<section class="aa_no_results">

  <h1 class="content-title">Nothing to see here.</h1>

  <div class="content">
    <?php if ( is_search() ) : ?>
      <p><?php esc_html_e( 'Nothing found. Try again:', 'neat' ); ?></p>
      <?php get_search_form(); ?>
    <?php else : ?>
      <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'neat' ); ?></p>
      <?php get_search_form(); ?>
    <?php endif; ?>
  </div>

</section>
<!-- /.aa_no_results -->
