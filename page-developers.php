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
      <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
      </header><!-- .entry-header -->
      <div class="developers-content">
        <div class="container">
          <div class="developers-cards">
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
              <div class="developer-name">
                <a href="#">
                  <p>Your Name</p>
                </a>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            </div>
            <div class="card">
              <div class="card-overlay"></div>
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
get_sidebar();
get_footer();
