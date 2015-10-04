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

<!-- <aside class="aa_sidebar"> -->
<div class="row aa_sidebar">
	<?php dynamic_sidebar( 'aa_sidebar_1' ); ?>
</div>
<!-- </aside> -->
<!-- /.aa_sidebar -->
