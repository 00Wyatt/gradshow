<?php
get_header();
?>

<main id="primary" class="site-main">

  <div class="main-hero">
    <img class="hide hide-static top-left-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-tl-base.svg" alt="">
    <img class="hide hide-static top-right-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-tr-base.svg" alt="">
    <img class="hide hide-static bottom-left-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-bl-base.svg" alt="">
    <img class="hide hide-static bottom-right-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-br-base.svg" alt="">
    <img class="hide hide-static shape top-left-circles" data-speed="2" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-tl-circles.svg" alt="">
    <img class="hide hide-static shape top-left-lines" data-speed="-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-tl-lines.svg" alt="">
    <img class="hide hide-static shape top-right-lines" data-speed="-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-tr-lines.svg" alt="">
    <img class="hide hide-static shape bottom-left-lines" data-speed="1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-bl-lines.svg" alt="">
    <img class="hide hide-static shape bottom-right-circles" data-speed="2" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-br-circles.svg" alt="">
    <img class="hide hide-static shape bottom-right-lines" data-speed="-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/home-br-lines.svg" alt="">
    <div class="hero-text">
      <div class="title-wrapper">
        <img class="hide hide-right lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/title-lines-top.svg" alt="">
        <img class="hide hide-left lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/home/title-lines-bottom.svg" alt="">
        <p class="hide hide-bottom title-overline">Front End | Back End | Programming</p>
        <h1 class="hide hide-bottom">Grad Show</h1>
        <p class="hide hide-bottom title-year">2023</p>
      </div>
    </div>
    <div class="cta">
      <div class="hide hide-bottom">
        <a class="btn btn-outline-primary" href="<?php echo esc_url(home_url('/')); ?>#projects">Get Started</a>
        <a href="<?php echo esc_url(home_url('/')); ?>#projects"><img class="down-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/arrow-down.svg" alt="" width="32"></a>
      </div>
    </div>
  </div>

  <header id="masthead" class="site-header">
    <div class="container">
      <div class="site-branding">
        <?php
        the_custom_logo();
        ?>
        <p aria-hidden="false" class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/svgs/logo.svg" alt="Grad Show logo"></a>
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

  <div id="projects" class="entry-header projects-header">
    <img class="hide hide-static header-tr-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects/projects-tr-base.svg" alt="">
    <img class="hide hide-static header-tr-color shape" data-speed="1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects/projects-tr-color.svg" alt="">
    <img class="hide hide-static header-bl-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects/projects-bl-base.svg" alt="">
    <img class="hide hide-static header-bl-color shape" data-speed="-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects/projects-bl-color.svg" alt="">
    <div class="title-wrapper">
      <img class="hide hide-right lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects/projects-lines-top.svg" alt="">
      <img class="hide hide-left lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/projects/projects-lines-bottom.svg" alt="">
      <h2 class="hide hide-bottom">Projects</h2>
    </div>
  </div>

  <div class="projects-content">
    <div class="container">
      <div class="project-cards">
        <?php
        $args = array(
          'post_type' => 'project',
          'orderby' => 'title',
          'order'   => 'DESC',
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()) {
          $loop->the_post();
        ?>
          <article id="post-<?php the_ID(); ?>" class="hide hide-bottom project-card" style="--i: <?php echo $loop->current_post % 2 ?>;">
            <a href="<?php the_permalink(); ?>">
              <div class="project-overlay"></div>
            </a>
            <div class="project-name">
              <?php
              the_title('<h3><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
              ?>
            </div>
            <?php if (has_post_thumbnail()) {
              the_post_thumbnail();
            } else { ?>
              <img src="https://placehold.co/704x533?text=Placeholder" alt="Placeholder image">
            <?php
            } ?>
          </article><!-- #post-<?php the_ID(); ?> -->
        <?php
        }
        wp_reset_query(); ?>
      </div>
    </div>
  </div>

</main><!-- #main -->

<?php
get_footer();
