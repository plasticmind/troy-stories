
    <article class="story">
      <?php if ( has_post_thumbnail() ) {
      echo '<div class="story-photo">';
      $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(),$size, true);
      $thumbnail_url = $thumbnail_url[0];
        if(!is_single()) { echo '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">';}
        echo '<img src="'.$thumbnail_url.'" alt="'.get_the_title().'">';
        if(!is_single()) { echo '</a>'; }
      echo '</div>';
      }
      ?>
      <div class="story-content<?php if((strlen(get_the_content())<64)&&(is_single())) { echo ' large'; }?>">
        <?php the_content(); ?>
      </div>
    </article>
