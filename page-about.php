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

<main id="primary" class="site-main about">

  <?php
  while (have_posts()) :
    the_post();
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header about-header">
        <img class="header-top-right" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about-top-right.svg" alt="">
        <img class="header-bottom-left" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about-bottom-left.svg" alt="">
        <div class="title-wrapper">
          <img class="lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about-lines-top.svg" alt="">
          <img class="lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about-lines-bottom.svg" alt="">
          <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </div>
      </header><!-- .entry-header -->
      <div class="about-content">
        <div class="container">
          <div class="text-column">
            <div class="text-box">
              <h2>The Grad Show</h2>
              <?php the_content(); ?>
            </div>
          </div><!-- .entry-content -->
          <div class="image-column">
            <?php if (has_post_thumbnail()) {
              the_post_thumbnail();
            } else { ?>
              <img src="https://placehold.co/704x533?text=Placeholder" alt="Placeholder image">
            <?php
            } ?>
          </div>
        </div>
      </div>

      <div class="diplomas-content">
        <div class="container">
          <div class="heading">
            <h2>NMT Diplomas</h2>
          </div>
          <div class="diplomas-cards">
            <?php
            $args = array(
              'post_type' => 'diploma',
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) {
              $loop->the_post();
            ?>
              <div class="card">
                <div class="text">
                  <h3><?php the_title() ?></h3>
                  <?php the_content() ?>
                </div>
              </div>
            <?php
            }
            wp_reset_query(); ?>
            <div class="card">
              <div class="text">
                <h3>Front End Development</h3>
                <p>This course covers the whole life cycle for commercially ready websites and gives you the opportunity to work on live projects.
                  At this level you develop skills that mean you are industry ready, from conception, liaising with clients, documentation, graphics, coding, testing to training of users.</p>
              </div>
              <button class="btn btn-outline-primary">Learn More</button>
            </div>
            <div class="card">
              <div class="text">
                <h3>Back End Development</h3>
                <p>In this course you learn the whole life cycle for commercially ready websites, from conception, liaising with clients, database design, cloud application development, information architecture, big data, machine learning and web app development.</p>
              </div>
              <button class="btn btn-outline-primary">Learn More</button>
            </div>
            <div class="card">
              <div class="text">
                <h3>Programming</h3>
                <p>At our Perth campus you'll gain the knowledge and skills to develop advanced Apps, Internet of Things, Big Data, database design, Cloud Applications Development, and cyber awareness.</p>
              </div>
              <button class="btn btn-outline-primary">Learn More</button>
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
