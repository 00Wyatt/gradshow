<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GradShow
 */
get_header();
?>

<main id="primary" class="site-main">
  <div class="main-hero">
    <img class="top-left" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/hero-top-left.svg" alt="">
    <img class="top-right" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/hero-top-right.svg" alt="">
    <img class="bottom-left" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/hero-bottom-left.svg" alt="">
    <img class="bottom-right" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/hero-bottom-right.svg" alt="">
    <div class="hero-text">
      <div class="title-wrapper">
        <img class="lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/hero-lines-top.svg" alt="">
        <img class="lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/hero-lines-bottom.svg" alt="">
        <p class="title-overline">Front End | Back End | Programming</p>
        <h1>Grad Show</h1>
        <p class="title-year">2023</p>
      </div>
    </div>
  </div>

  <header id="masthead" class="site-header">
    <div class="container">
      <div class="site-branding">
        <?php
        the_custom_logo();
        ?>
        <p aria-hidden="visible" class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/logo.svg" alt="Grad Show logo"></a>
      </div><!-- .site-branding -->

      <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'gradshow'); ?></button>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
          )
        );
        ?>
      </nav><!-- #site-navigation -->
    </div><!-- .container -->
  </header><!-- #masthead -->

  <div id="projects" class="entry-header projects-header">
    <img class="header-top-right" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects-top-right.svg" alt="">
    <img class="header-bottom-left" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects-bottom-left.svg" alt="">
    <div class="title-wrapper">
      <img class="lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects-lines-top.svg" alt="">
      <img class="lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects-lines-bottom.svg" alt="">
      <h2>Projects</h2>
    </div>
  </div>

  <section class="projects-content">
    <div class="container">
      <div class="project-cards">
        <?php
        if (have_posts()) :
          while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" class="project-card">
              <div class="project-overlay"></div>
              <div class="project-name">
                <?php
                the_title('<h3><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                ?>
              </div>
              <img src="https://placehold.co/704x533?text=Placeholder" alt="Placeholder image">
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php
          endwhile; // End of the loop.
        endif;
        ?>
      </div>
    </div>
  </section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
