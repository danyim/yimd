<?php
/**
 * The template for displaying search results pages.
 *
 * @package NeatBootstrap
 */

get_header(); ?>
<div class="container">
	<div class="row aa_wrap">
		<div class="col-md-8 col-md-offset-2">
			<?php if ( have_posts() ) : ?>
				<div class="aa_header">
					<h4 class="aa_h1">
						<?php printf( 'Displaying search results for: <strong>%s</strong>', '<span>' . get_search_query() . '</span>' ); ?>
					</h4>
					<!-- /.aa_h1 -->
				</div>
				<!-- /.aa_header -->

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'assets/views/content', get_post_format() ); ?>
				<?php endwhile; ?>
				<?php the_posts_navigation(); ?>
			<?php else : ?>
				<?php get_template_part( 'assets/views/content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</div>
	<!-- /.aa_search -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
