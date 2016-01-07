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

<div class="container-fluid sidebar-container sidebar-container-inverse">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <aside class="sidebar">
            <?php dynamic_sidebar( 'aa_sidebar_1' ); ?>
          </aside><!-- /.sidebar -->
        </div>
      </div>
    </div>
  </div>
</div>
