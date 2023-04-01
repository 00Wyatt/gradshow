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
    <div class="hero-text">
      <h1>Grad Show</h1>
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

  <div id="projects" class="entry-header">
    <h2>Projects</h2>
  </div>

  <section class="projects">
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
          <img src="https://placehold.co/680x509?text=Placeholder" alt="Placeholder image">
        </article><!-- #post-<?php the_ID(); ?> -->
    <?php
      endwhile; // End of the loop.
    endif;
    ?>
  </section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
