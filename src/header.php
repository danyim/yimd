<?php
/**
 * The header for our theme.
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 
<?php wp_head();?>
</head>

<body <?php body_class();?>>
  <header class="aa_navigation">
    <nav class="navbar aa_nav">
<?php
wp_nav_menu(array(
	'theme_location' => 'primary',
	'menu_id' => 'primary-menu',
	'container_id' => 'navbar',
	'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
));
?>
    </nav>
  </header>
  <!-- /.aa_navigation -->
