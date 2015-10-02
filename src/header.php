<?php
/**
 * The header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="container">
	<header class="aa_navigation">

		<nav class="navbar navbar-default aa_nav">
			<?php wp_nav_menu( array(
        'items_wrap' => '<ul><li id="item-id">Menu: </li>%3$s</ul>',
        'theme_location' => 'primary',
        'menu_id' => 'primary-menu' ) ); ?>
		</nav>
		<!-- /.aa_nav -->

	</header>
	<!-- /.aa_navigation -->
