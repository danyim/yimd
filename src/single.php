<?php
/**
 * The template for displaying all single posts.
 *
 * @package NeatBootstrap
 */

get_header(); ?>

<div class="container">
	<div class="row aa_wrap">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'assets/views/content', 'single' ); ?>

			<?php //the_post_navigation(); ?>

		<?php endwhile; // end of the loop. ?>
	</div>
	<!-- /.aa_wrap -->

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		</div>
	</div>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
