<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package NeatBootstrap
 */
?>
<section class="aa_no_results">

	<h1 class="content_title"> Got nothin' for ya </h1>

	<div class="content">
		<?php esc_html_e( 'Nothing Found', 'neat' ); ?>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'neat' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'neat' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'neat' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>

</section>
<!-- /.aa_no_results -->
