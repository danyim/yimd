<?php
/**
 * The template part for displaying results in search pages.
 *
 * @package yimd
 */
?>
<article class="aa_search">

  <h1 class="content-title">Results</h1>

  <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
  <?php if ( 'post' == get_post_type() ) : ?>
    <div class="subtitle">
      <?php aa_posted_on(); ?>
    </div>
    <!-- /.aa_article__meta -->
  <?php endif; ?>

  <div class="content">
    <?php the_excerpt(); ?>
  </div>
  <!-- /.aa_article__excerpt -->

</article>
<!-- /.aa_search -->
