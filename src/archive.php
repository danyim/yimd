<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SolidBootstrap
 */

get_header(); ?>
<div class="container">
	<div class="row aa_wrap">
		<div class="col-md-10 col-md-offset-1">
			<?php if ( have_posts() ) : ?>
				<header class="aa_headerblock well m-b">
					<h1 class="content-header-small">
						<?php the_archive_title();?>
					</h1>
					<div> <?php the_archive_description(); ?> </div>
				</header>
				<!-- /.aa_headerblock -->
			<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'assets/views/content', get_post_format() ); ?>
					<?php endwhile; ?>
				<?php the_posts_navigation(); ?>
			<?php else : ?>
				<?php get_template_part( 'assets/views/content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</div>
	<!-- /.aa_wrap -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
