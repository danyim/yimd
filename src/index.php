<?php
/**
 * The blog page.
 *
 * @package NeatBootstrap
 */

get_header(); ?>

<div class="jumbotron cover">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="accent-block">
					<h1>Daniel Yim</h1>
					<h3>DEVELOPER &middot; DESIGNER &middot; THINKER</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row aa_wrap">

		<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'assets/views/content' ) ?>
				<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'assets/views/content', 'none' ); ?>

		<?php endif; ?>

	</div>
	<!-- /.aa_wrap -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
