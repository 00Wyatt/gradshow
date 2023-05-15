<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GradShow
 */

?>

<footer id="colophon" class="site-footer">
  <img class="hide hide-static circle-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/footer/footer-circle-1.svg" alt="">
  <img class="hide hide-static circle-2" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/footer/footer-circle-2.svg" alt="">
  <img class="hide hide-static circle-3" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/footer/footer-circle-3.svg" alt="">
  <nav id="footer-navigation" class="hide hide-bottom footer-navigation">
    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'menu-2',
        'menu_id'        => 'secondary-menu',
      )
    );
    ?>
  </nav><!-- #footer-navigation -->

  <div class="hide hide-bottom">
    <?php if (dynamic_sidebar('sidebar-1')) : else : endif; ?>
  </div>

  <div class="hide hide-static site-info">
    <p>Grad Show 2023 © All Rights Reserved</p>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>