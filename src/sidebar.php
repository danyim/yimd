<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package NeatBootstrap
 */

if ( ! is_active_sidebar( 'aa_sidebar_1' ) ) {
	return;
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <aside class="aa_sidebar">
        <?php dynamic_sidebar( 'aa_sidebar_1' ); ?>
      </aside><!-- /.aa_sidebar -->
    </div>
  </div>
</div>
