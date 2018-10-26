<?php
/**
 * Custom theme for TroyStories.com
 */

/* = Register stylesheets and scripts */

function pm_register_resources() {
	// Styles

    wp_enqueue_style( 'normalize', get_stylesheet_directory_uri().'/assets/css/normalize.css' );
    wp_enqueue_style( 'ts-styles', get_stylesheet_directory_uri().'/assets/css/style.css', null, pm_version_hash('/assets/css/style.css') );
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Crimson+Text:400,700|Raleway:500,600');
    
    // Scripts

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
// wp_register_script( 'jquery', 'http://masonry.desandro.com/v2/js/jquery-1.7.1.min.js', false, NULL, true );
    wp_enqueue_script( 'jquery' );
    //wp_enqueue_script( 'jquery-masonry' );
    wp_enqueue_script( 'ts-infinitescroll', get_stylesheet_directory_uri().'/assets/js/infinite-scroll.min.js', null, null, true);
    wp_enqueue_script( 'ts-imagesloaded', get_stylesheet_directory_uri().'/assets/js/imagesloaded.min.js', null, null, true);
    wp_enqueue_script( 'ts-cookies', get_stylesheet_directory_uri().'/assets/js/js.cookies.js', null, null, true);
    wp_enqueue_script( 'ts-tweenmax', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js', null, null, true);
// wp_enqueue_script( 'ts-masonry', get_stylesheet_directory_uri().'/assets/js/masonry.min.js', null, null, true);
    wp_enqueue_script( 'ts-scripts', get_stylesheet_directory_uri().'/assets/js/ts.js',null, pm_version_hash('/assets/js/ts.js'), true);
    
    // Fonts
}
add_action( 'wp_enqueue_scripts', 'pm_register_resources', 999 );

function pm_register_ga() {
	echo <<<EOT
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-70617067-1', 'auto');
	ga('send', 'pageview');
</script>
EOT;
}
add_action( 'wp_head', 'pm_register_ga');

/* = Images */

add_theme_support( 'post-thumbnails' );
add_image_size( 'next-thumb', 800, 400 );

/* = Add page slug to body class */

function pm_add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'pm_add_slug_body_class' );

/* = Remove header junk */

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_filter( 'emoji_svg_url', '__return_false' );

remove_action('wp_head', 'wp_generator');

/* = Create a simple hash based on a file checksum */

function pm_version_hash($file) {
	if(!$file) return false;
	$full_path = get_template_directory() . $file;
	return hash_file('CRC32',$full_path);
}


?>
