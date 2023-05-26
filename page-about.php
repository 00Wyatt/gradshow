<?php
get_header();
?>

<main id="primary" class="site-main about">

  <?php
  while (have_posts()) :
    the_post();
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header about-header">
        <img class="hide hide-static header-tr-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/about-tr-base.svg" alt="">
        <img class="hide hide-static header-tr-color shape" data-speed="1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/about-tr-color.svg" alt="">
        <img class="hide hide-static header-bl-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/about-bl-base.svg" alt="">
        <img class="hide hide-static header-bl-color shape" data-speed="-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/about-bl-color.svg" alt="">
        <div class="title-wrapper">
          <img class="hide hide-right lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/about-lines-top.svg" alt="">
          <img class="hide hide-left lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/about/about-lines-bottom.svg" alt="">
          <?php the_title('<h1 class="hide hide-bottom entry-title">', '</h1>'); ?>
        </div>
      </header><!-- .entry-header -->
      <div class="about-content">
        <div class="container">
          <div class="text-column">
            <div class="hide hide-left text-box">
              <h2 class="" style="--i: 0;">The Grad Show</h2>
              <?php the_content(); ?>
            </div>
          </div><!-- .entry-content -->
          <div class="hide hide-bottom image-column">
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
              <div class="hide hide-bottom card" style="--i: <?php echo $loop->current_post; ?>;">
                <div class="text">
                  <h3><?php the_title() ?></h3>
                  <?php the_content() ?>
                </div>
                <a class="btn btn-outline-primary" href="<?php echo get_post_meta($post->ID, 'site-link', true); ?>" target="_blank" rel="noopener noreferrer">
                  Learn More
                </a>
              </div>
            <?php
            }
            wp_reset_query(); ?>
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
