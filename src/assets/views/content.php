<?php
/**
 * @package NeatBootstrap
 */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<article class="aa_index">

			<h1 class="aa_content__title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
				<small class="aa_content__subtitle"><?php aa_posted_on(); ?></small>
			</h1>

			<div class="aa_content__content">
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="aa_pagelinks">' . esc_html__( 'Pages:', 'AA_Theme' ),
						'after'  => '</div>',
					) );
				?>
			</div>
			<!-- /.aa_content__content -->

		</article>
		<!-- /.aa_content -->
	</div>
</div>