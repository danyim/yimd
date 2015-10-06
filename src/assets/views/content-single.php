<?php
/**
 * @package NeatBootstrap
 */
?>


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<article class="aa_single">

			<h1 class="aa_single__title">
				<?php the_title(); ?>
				<div class="aa_single__meta">
					<?php aa_posted_on(); ?>
				</div>
			</h1>


			<!-- /.aa_single__meta -->

			<div class="aa_single__content">

				<?php the_content(); ?>

				<hr />
				<?php
					wp_link_pages( array(
						'before' => '<div class="aa_pagelinks">' . esc_html__( 'Pages:', 'AA_Theme' ),
						'after'  => '</div>',
					) );
				?>

			</div>
			<!-- /.aa_single__content -->

		</article>
		<!-- /.aa_single -->
	</div>
</div>
