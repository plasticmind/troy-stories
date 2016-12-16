<?php
/**
 * The main template file.
 */

get_header(); ?>

	<div class="site-content" role="main">

		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();

				get_template_part( 'fragment-page' );
				
			endwhile;

		else :

			echo "Not a page to be found here. Sorry.";

		endif; ?>

	</div><!-- .site-content -->

<?php
get_footer();
