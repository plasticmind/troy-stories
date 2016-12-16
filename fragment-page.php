
    <article class="page">
      <?php if ( has_post_thumbnail() ) {
      echo '<div class="page-photo">';
      $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(),$size, true);
      $thumbnail_url = $thumbnail_url[0];
        if(!is_single()) { echo '<a href="'.get_permalink().'">';}
        echo '<img src="'.$thumbnail_url.'" alt="'.get_the_title().'">';
        if(!is_single()) { echo '</a>'; }
      echo '</div>';
      }
      ?>
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    </article>
