<?php
/**
 * The main template file.
 */

get_header(); ?>

	<div class="site-content" role="main">

    <div class="story-list">
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					get_template_part( 'fragment-story' );
					
				endwhile;

			else :

				echo "Not a story to be found here. Sorry.";

			endif; ?>
		</div><!-- .story-list -->

		<?php if ( get_next_posts_link() ) : ?>
		<div class="site-pagination">

			<div class="nav-previous"><?php next_posts_link( 'Load More Stories...' ); ?></div>

		</div>
		<?php endif; ?>

	</div><!-- .site-content -->

<?php
get_footer();
