<?php

/**
 * GradShow functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GradShow
 */

if (!defined('VERSION')) {
  // Replace the version number of the theme on each release.
  define('VERSION', wp_get_theme()->get('Version'));
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gradshow_setup()
{
  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
  add_theme_support('title-tag');

  /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
  add_theme_support('post-thumbnails');

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'gradshow'),
    )
  );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'menu-2' => esc_html__('Secondary', 'gradshow'),
    )
  );

  /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );

  // Set up the WordPress core custom background feature.
  add_theme_support(
    'custom-background',
    apply_filters(
      'gradshow_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    )
  );
}
add_action('after_setup_theme', 'gradshow_setup');

/**
 * Register custom post type for Projects.
 */
function custom_project_post_type()
{
  register_post_type(
    'project',
    array(
      'labels'      => array(
        'name'          => __('Projects', 'gradshow'),
        'singular_name' => __('Project', 'gradshow'),
      ),
      'public'       => true,
      'has_archive'  => true,
      'show_in_rest' => true,
      'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
    )
  );
}
add_action('init', 'custom_project_post_type');

/**
 * Register custom post type for Developers.
 */
function custom_developer_post_type()
{
  register_post_type(
    'developer',
    array(
      'labels'      => array(
        'name'          => __('Developers', 'gradshow'),
        'singular_name' => __('Developer', 'gradshow'),
      ),
      'public'       => true,
      'has_archive'  => true,
      'show_in_rest' => true,
      'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
      'taxonomies'  => array('category')
    )
  );
}
add_action('init', 'custom_developer_post_type');

/**
 * Register custom post type for Projects.
 */
function custom_diploma_post_type()
{
  register_post_type(
    'diploma',
    array(
      'labels'      => array(
        'name'          => __('Diplomas', 'gradshow'),
        'singular_name' => __('Diploma', 'gradshow'),
      ),
      'public'       => true,
      'has_archive'  => true,
      'show_in_rest' => true,
      'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
    )
  );
}
add_action('init', 'custom_diploma_post_type');

/**
 * Register custom taxonomy for Courses.
 */
function register_taxonomy_course()
{
  $labels = array(
    'name'              => _x('Courses', 'taxonomy general name'),
    'singular_name'     => _x('Course', 'taxonomy singular name'),
    'search_items'      => __('Search Courses'),
    'all_items'         => __('All Courses'),
    'parent_item'       => __('Parent Course'),
    'parent_item_colon' => __('Parent Course:'),
    'edit_item'         => __('Edit Course'),
    'update_item'       => __('Update Course'),
    'add_new_item'      => __('Add New Course'),
    'new_item_name'     => __('New Course Name'),
    'menu_name'         => __('Courses'),
  );
  $args   = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'course'],
    'show_in_rest' => true,
  );
  register_taxonomy('course', ['developer'], $args);
}
add_action('init', 'register_taxonomy_course');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gradshow_content_width()
{
  $GLOBALS['content_width'] = apply_filters('gradshow_content_width', 640);
}
add_action('after_setup_theme', 'gradshow_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gradshow_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Sidebar', 'gradshow'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'gradshow'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'gradshow_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function gradshow_scripts()
{
  wp_enqueue_style('gradshow-style', get_stylesheet_uri(), array(), VERSION);
  wp_enqueue_style('style', get_template_directory_uri() . '/dist/main.css', false, VERSION, 'all');

  wp_enqueue_script('gradshow-navigation', get_template_directory_uri() . '/js/navigation.js', array(), VERSION, true);
  wp_enqueue_script('gradshow-main', get_template_directory_uri() . '/js/main.js', array(), VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'gradshow_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Reverse the order of the posts on the home page.
 */
function reverse_post_order($query)
{
  $query->set('order', 'ASC');
}
add_action('pre_get_posts', 'reverse_post_order');
