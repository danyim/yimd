<?php
/**
 * @package SolidBootstrap
 */
?>


<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
	$url = $thumb['0'];
?>

<article class="aa_single">
	<div class="jumbotron background-cover" style="background-image: url('<?=$url?>');">
		<div class="container">
			<div></div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="post-title">
					<?php the_title(); ?>
					<div class="post-subtitle">
						<?php aa_posted_on(); ?>
					</div>
					<!-- /.aa_single__meta -->
				</h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail( array(700, 500) );
				}
				?>
				<br /><br />
			</div>
		</div>
	</div>

	<div class="content container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<?php the_content(); ?>

				<hr />
				<?php
					wp_link_pages( array(
						'before' => '<div class="aa_pagelinks">' . esc_html__( 'Pages:', 'neat' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div>
	</div>
	<!-- /.aa_single__content -->

</article>
<!-- /.aa_single -->
