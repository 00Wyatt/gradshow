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
        <img class="header-top-right" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers-top-right.svg" alt="">
        <img class="header-bottom-left" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers-bottom-left.svg" alt="">
        <div class="title-wrapper">
          <img class="lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers-lines-top.svg" alt="">
          <img class="lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers-lines-bottom.svg" alt="">
          <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </div>
      </header><!-- .entry-header -->
      <div class="developers-content">
        <div class="container">
          <div class="developer-cards">
            <?php
            $args = array(
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
            <div class="developer-card">
              <div class="developer-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="developer-card">
              <div class="developer-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="developer-card">
              <div class="developer-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="developer-card">
              <div class="developer-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
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
      </div>
    </article><!-- #post-<?php the_ID(); ?> -->
  <?php
  endwhile; // End of the loop.
  ?>

</main><!-- #main -->

<?php
get_footer();
