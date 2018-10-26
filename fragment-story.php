
    <article class="story">
      <div class="content">
        <?php if ( has_post_thumbnail() ) {
        echo '<div class="story-photo">';
          if(!is_single()) { echo '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">';}
          the_post_thumbnail();
          if(!is_single()) { echo '</a>'; }
        echo '</div>';
        }
        ?>
        <div class="story-content<?php if((strlen(get_the_content())<64)&&(is_single())) { echo ' large'; }?>">
          <?php the_content(); ?>
        </div>
      </div>
    </article>
