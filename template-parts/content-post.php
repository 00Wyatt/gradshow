<?php

use SilverStripe\Assets\Image;


/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GradShow
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php
    the_title('<h1 class="entry-title">', '</h1>');
    ?>
  </header><!-- .entry-header -->

  <div class="entry-content project-content">
    <div class="container">
      <div class="text-column">
        <div class="text-box">
          <h2>Overview</h2>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A illo eligendi nisi culpa totam quia perspiciatis sunt autem? Dicta placeat eaque in corporis nihil est accusamus consectetur eveniet minus consequatur. Nobis non, quos sint eos dicta placeat enim repellat, aliquam ullam facilis alias vitae harum soluta veritatis ut iusto atque provident quia ab culpa quod consectetur. Facere voluptas delectus inventore! Suscipit exercitationem atque nobis quo nostrum perferendis molestias at expedita!</p>
          <p>Aliquam, accusantium consequatur odit porro ipsum labore recusandae incidunt nam repudiandae, quas veniam fugiat esse officia ducimus. Eos, debitis. Minima. Magnam optio cumque commodi animi iure reprehenderit minus! Maxime quasi mollitia, inventore iusto repellat odio numquam quia fugiat quisquam et minus corporis molestias repudiandae fuga omnis obcaecati eos blanditiis eaque? Debitis nihil consectetur asperiores, officia alias explicabo ex vitae aliquid.</p>
          <button class="btn btn-outline-white">Visit Site</button>
        </div>
      </div><!-- .entry-content -->
      <div class="image-column">
        <div class="images">
          <div class="image-wrapper">
            <div class="image-overlay"></div>
            <img src="https://placehold.co/600x450?text=Placeholder" alt="Placeholder image">
          </div>
          <div class="image-wrapper">
            <div class="image-overlay"></div>
            <img src="https://placehold.co/600x450?text=Placeholder" alt="Placeholder image">
          </div>
          <div class="image-wrapper">
            <div class="image-overlay"></div>
            <img src="https://placehold.co/600x450?text=Placeholder" alt="Placeholder image">
          </div>
          <div class="image-wrapper">
            <div class="image-overlay"></div>
            <img src="https://placehold.co/600x450?text=Placeholder" alt="Placeholder image">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="team-content">
    <div class="container">
      <div class="heading">
        <h2>The Team</h2>
      </div>
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
      </div>
    </div>

    <?php
    the_content(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'gradshow'),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        wp_kses_post(get_the_title())
      )
    );

    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'gradshow'),
        'after'  => '</div>',
      )
    );
    ?>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->