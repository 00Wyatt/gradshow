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
  <nav id="site-navigation" class="footer-navigation">
    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
      )
    );
    ?>
  </nav><!-- #site-navigation -->
  <div class="site-info">
    <p>Grad Show 2023 © All Rights Reserved</p>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>