<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package yimd
 */
?>
<article class="aa_page">
  <!-- <div class="row">
    <div class="col-md-12">
      <h1 class="title-card"> <?php the_title(); ?> </h1>
    </div>
  </div> -->
  <div class="row">
    <div class="col-md-10 col-md-offset-1 content-sans">
      <p>&nbsp;</p>
      <?php the_content(); ?>
      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'neat' ),
          'after'  => '</div>',
        ) );
      ?>
    </div>
    <!-- /.aa_content -->
  </div>

</article>
<!-- /.aa_page -->
