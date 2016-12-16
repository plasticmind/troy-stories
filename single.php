<?php
/**
 * The main template file.
 */

get_header(); ?>

	<div class="site-content" role="main">

		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();

				get_template_part( 'fragment-story' );
				
?>

    <footer class="story-footer">

        <aside class="share">
            <h4>Share this story...</h4>
            <a class="icon-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/icon-facebook.png" alt="Share this story on Facebook" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/icon-facebook.svg" /></a>
            <a class="icon-twitter" href="https://twitter.com/share?text=<?php echo esc_attr(get_the_title()); ?>&amp;url=<?php the_permalink(); ?>"
                onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/icon-twitter.png" alt="Share this story on Twitter" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/icon-twitter.svg" /></a>
        </aside>




<?php
//To get next post and it's title attribute use this
$next_post = get_adjacent_post(false, '', true);
if(!empty($next_post)) { ?>


        <aside class="read-next">
            <h4>...then read the next.</h4>
            <a class="read-next-story" href="<?php echo get_permalink($next_post->ID); ?>" title="<?php echo esc_attr($next_post->post_title); ?>">

            <?php if ( has_post_thumbnail($next_post->ID)) { 
            	$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID),$size, true);
      			$thumbnail_url = $thumbnail_url[0]; ?>
      			<div class="story-photo">
        				<img src="<?php echo $thumbnail_url; ?>" alt="<?php echo get_the_title($next_post->ID);?>">
      			</div>
            </a>
   			<?php } ?>         
        </aside>

<?php } ?>


    </footer>

<?php
			endwhile;

		else :

			echo "Not a story to be found here. Sorry.";

		endif; ?>

	</div><!-- .site-content -->

<?php
get_footer();
