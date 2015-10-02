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

<div class="row">
  <div class="col-md-3">
  <aside class="aa_sidebar">

  	<?php dynamic_sidebar( 'aa_sidebar_1' ); ?>

  </aside>
  </div>
</div>
<!-- /.aa_sidebar -->
