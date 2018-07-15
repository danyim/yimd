<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package yimd
 */

if (!is_active_sidebar('aa_sidebar_1')) {
	return;
}
?>

<div class="sidebar-container sidebar-container-inverse">
  <aside class="sidebar">
    <?php dynamic_sidebar('aa_sidebar_1');?>
  </aside><!-- /.sidebar -->
</div>
