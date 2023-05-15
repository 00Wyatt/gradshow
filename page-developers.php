<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GradShow
 */

get_header();
?>

<main id="primary" class="site-main developers">

  <?php
  while (have_posts()) :
    the_post();
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header developers-header">
        <img class="hide hide-static header-tr-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-tr-base.svg" alt="">
        <img class="hide hide-static header-tr-color shape" data-speed="1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-tr-color.svg" alt="">
        <img class="hide hide-static header-bl-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-bl-base.svg" alt="">
        <img class="hide hide-static header-bl-color shape" data-speed="-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-bl-color.svg" alt="">
        <div class="title-wrapper">
          <img class="hide hide-right lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-lines-top.svg" alt="">
          <img class="hide hide-left lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-lines-bottom.svg" alt="">
          <?php the_title('<h1 class="hide hide-bottom entry-title">', '</h1>'); ?>
        </div>
      </header><!-- .entry-header -->
      <div class="developers-content">
        <div class="container">
          <div class="developer-cards">
            <?php
            $args = array(
              'post_type' => 'developer',
              'posts_per_page' => -1, // Show all posts
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) {
              $loop->the_post();
            ?>
              <!-- <div class="hide hide-bottom developer-card" style="--i: <?php echo $loop->current_post  ?>;"> -->
              <div class="hide hide-bottom developer-card" style="--i: <?php if ($loop->current_post > 11) {
                                                                          echo $loop->current_post - 10;
                                                                        } else {
                                                                          echo $loop->current_post;
                                                                        } ?>;">
                <a href="<?php echo get_post_meta($post->ID, 'site-link', true); ?>" target="_blank" rel="noopener noreferrer">
                  <div class="developer-overlay"></div>
                </a>
                <div class="developer-name">
                  <p>
                    <a href="<?php echo get_post_meta($post->ID, 'site-link', true); ?>" target="_blank" rel="noopener noreferrer">
                      <?php the_title() ?>
                    </a>
                  </p>
                </div>
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail();
                } else { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
                <?php
                } ?>
              </div>
            <?php
            }
            wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </article><!-- #post-<?php the_ID(); ?> -->
  <?php
  endwhile; // End of the loop.
  ?>

</main><!-- #main -->

<?php
get_footer();
