<?php
/**
 * @package NeatBootstrap
 */
?>
<article class="aa_index">

	<h1 class="post_title">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
		<small class="subtitle"><?php aa_posted_on(); ?></small>
	</h1>

	<div class="content">
		<?php the_excerpt(); ?>
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