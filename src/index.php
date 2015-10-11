<?php
/**
 * The blog page.
 *
 * @package NeatBootstrap
 */

get_header(); ?>


<div id="home" class="row aa_wrap">

	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'assets/views/content' ) ?>
			<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

	<?php else : ?>

		<?php get_template_part( 'assets/views/content', 'none' ); ?>

	<?php endif; ?>

</div>
<!-- /.aa_wrap -->

<div class="aa_wrap hidden">
	<div id="about" class="row aa_index">
		<div class="col-md-12 aa_content__content">
			<p>Bacon ipsum dolor amet velit swine turducken shankle, ut sunt et voluptate pork adipisicing biltong. Prosciutto beef excepteur, duis ham ut pig consectetur. Irure brisket porchetta, aliquip nisi shoulder ball tip flank tempor duis. Non in velit aute pig. Aliqua pig esse, fatback prosciutto dolor in tempor ball tip do. Jerky flank eu, cillum cupidatat picanha pork belly t-bone drumstick pork loin qui.</p>
			<p>Ipsum tongue tail short ribs, leberkas bresaola irure labore tri-tip ut swine pariatur tenderloin alcatra. Nostrud quis esse beef ribs, ullamco nisi fatback chuck. Salami short ribs pariatur, voluptate filet mignon mollit ribeye turducken nulla. Pastrami t-bone shankle, in meatball fugiat et.</p>
			<p>Cupidatat consectetur nostrud pork chop. Eu short ribs sunt frankfurter dolor bacon ullamco, esse incididunt tongue tenderloin tail fugiat beef ribs pig. Kevin alcatra filet mignon in pork chop ut. Pariatur kielbasa tenderloin irure cupim est sausage ullamco drumstick ut fatback.</p>
		</div>
	</div>

	<div id="contact"  class="row aa_index">
		<div class="col-md-12 aa_content__content">
			<p>Eiusmod adipisicing shank, id chuck quis alcatra laboris tri-tip. Ut alcatra pork ribeye aliquip voluptate jowl nulla pork chop sed salami do boudin. Turducken cupidatat nostrud doner exercitation beef ribs duis. Veniam qui duis consequat nisi adipisicing prosciutto ham hock tongue turducken chuck boudin incididunt. Sint ut shoulder swine, exercitation biltong jowl picanha salami kevin andouille. Leberkas pastrami chuck laboris velit t-bone, sunt esse mollit commodo rump in brisket sirloin.</p>
			<p>Ut tri-tip ea labore chicken incididunt. Duis bacon tri-tip ball tip. Rump venison sirloin shank incididunt doner corned beef boudin fugiat spare ribs ut ut. Pork loin ad pork belly in brisket consectetur short ribs, beef duis hamburger in.</p>
			<p>Ullamco landjaeger ham hock duis. Laborum chuck chicken, tongue minim pork belly pastrami ground round. Spare ribs pancetta ball tip eu exercitation, laborum aliqua salami irure. Magna ribeye meatball, landjaeger ullamco eiusmod filet mignon. Pariatur tenderloin occaecat frankfurter pig. Picanha meatball deserunt, ribeye ipsum sirloin doner. Filet mignon deserunt ad ut, veniam pork alcatra irure est ham hock ipsum tenderloin bacon mollit.</p>
			<p>Id ad dolore cillum ex pig eiusmod mollit jerky biltong capicola fugiat cupim brisket rump. Esse spare ribs jowl reprehenderit. Irure est velit occaecat pork belly pastrami bresaola cillum pariatur ut tail in in. Dolore in t-bone do dolor cillum bacon boudin pork duis meatball ipsum cow proident.</p>
		</div>
	</div>

	<div id="portfolio"  class="row aa_index">
		<div class="col-md-12 aa_content__content">
			<p>Tenderloin nisi voluptate, pariatur flank occaecat beef biltong duis. Aliquip spare ribs pariatur turducken, ut ex prosciutto tail ham minim anim in jerky. Chuck elit jowl pork belly cillum sint. Cillum meatloaf voluptate magna drumstick et.</p>
			<p>Biltong cillum t-bone, brisket sint qui short loin fugiat meatloaf magna shankle rump capicola proident picanha. In aliqua nostrud jerky meatball ut ham hock jowl sint tri-tip officia spare ribs et consectetur. Esse proident bacon, shankle leberkas jowl laboris shank occaecat brisket nostrud. Cillum tenderloin biltong andouille sirloin corned beef aliqua spare ribs ground round dolore cupim tri-tip. Pastrami eu reprehenderit drumstick duis meatball. Short ribs anim picanha tail fatback cupidatat kevin ball tip. Laboris leberkas strip steak ad sausage non incididunt ball tip fatback boudin salami in labore.</p>
			<p>Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!</p>
		</div>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
