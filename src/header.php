<?php
/**
 * The header for our theme.
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#navspy">
	<header class="aa_navigation">
		<nav class="navbar aa_nav">
      <div class="container">
  			<?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_id' => 'primary-menu',
            'container_id' => 'navbar',
            'items_wrap' => '<ul id="%1$s" class="%2$s nav">%3$s</ul>',
          ) );
        ?>
      </div>
		</nav>
    <!--
    Floating nav with navspy
    <nav class="navbar navbar-fixed-top aa_nav">
      <div class="container">
        <div id="navspy">
          <ul class="nav">
            <li>
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="#about">About</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
            <li>
              <a href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    -->
		<!-- /.aa_nav -->
	</header>
	<!-- /.aa_navigation -->