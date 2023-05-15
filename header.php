<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GradShow
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site parallax">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'gradshow'); ?></a>
    <?php
    if (!is_front_page() && !is_home()) :
    ?>
      <header id="masthead" class="site-header">
        <div class="container">
          <div class="site-branding">
            <?php
            the_custom_logo();
            if (is_front_page() && is_home()) :
            ?>
              <h1 aria-hidden="false" class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
              <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/logo.svg" alt="Grad Show logo"></a>
            <?php
            else :
            ?>
              <p aria-hidden="false" class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
              <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/logo.svg" alt="Grad Show logo"></a>
            <?php
            endif;
            $gradshow_description = get_bloginfo('description', 'display');
            if ($gradshow_description || is_customize_preview()) :
            ?>
              <p class="site-description"><?php echo $gradshow_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                          ?></p>
            <?php endif; ?>
          </div><!-- .site-branding -->

          <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
              <span class="menu-toggle-line"></span>
              <span class="menu-toggle-line"></span>
              <span class="menu-toggle-line"></span>
            </button>
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
    <?php
    endif;
    ?>