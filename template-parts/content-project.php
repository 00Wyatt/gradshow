<?php

use SilverStripe\Assets\Image;


/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GradShow
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header project-header">
    <img class="header-top-right" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info-top-right.svg" alt="">
    <img class="header-bottom-left" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info-bottom-left.svg" alt="">
    <div class="title-wrapper">
      <img class="lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info-lines-top.svg" alt="">
      <img class="lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info-lines-bottom.svg" alt="">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </div>
  </header><!-- .entry-header -->

  <div class="entry-content project-content">
    <div class="container">
      <div class="text-column">
        <div class="text-box">
          <h2>Overview</h2>
          <?php
          the_content(
            sprintf(
              wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'gradshow'),
                array(
                  'span' => array(
                    'class' => array(),
                  ),
                )
              ),
              wp_kses_post(get_the_title())
            )
          ); ?>
          <!-- <button class="btn btn-outline-white">Visit Site</button> -->
        </div>
      </div><!-- .entry-content -->
      <div class="image-column">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail();
        } else { ?>
          <img class="placeholder-image" src="https://placehold.co/704x533?text=Placeholder" alt="Placeholder image">
        <?php
        } ?>
      </div>
    </div>
  </div>
  <div class="team-content">
    <div class="container">
      <div class="heading">
        <h2>The Team</h2>
      </div>
      <div class="developer-cards">
        <?php
        $args = array(
          'category_name' => get_the_title(),
          'post_type' => 'developer',
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()) {
          $loop->the_post();
        ?>
          <div class="developer-card">
            <div class="developer-overlay"></div>
            <div class="developer-name">
              <?php the_content() ?>
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
        <div class="developer-card">
          <div class="developer-overlay"></div>
          <div class="developer-name">
            <a href="#">
              <p>Your Name</p>
            </a>
          </div>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
        </div>
      </div>
    </div>

    <?php
    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'gradshow'),
        'after'  => '</div>',
      )
    );
    ?>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->