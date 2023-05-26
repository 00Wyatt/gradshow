<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header project-header">
    <img class="hide hide-static header-tr-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info/project-info-tr-base.svg" alt="">
    <img class="hide hide-static header-tr-color shape" data-speed="1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info/project-info-tr-color.svg" alt="">
    <img class="hide hide-static header-bl-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info/project-info-bl-base.svg" alt="">
    <img class="hide hide-static header-bl-color shape" data-speed="-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info/project-info-bl-color.svg" alt="">
    <div class="title-wrapper">
      <img class="hide hide-right lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info/project-info-lines-top.svg" alt="">
      <img class="hide hide-left lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/project-info/project-info-lines-bottom.svg" alt="">
      <?php the_title('<h1 class="hide hide-bottom entry-title">', '</h1>'); ?>
    </div>
  </header><!-- .entry-header -->

  <div class="entry-content project-content">
    <div class="container">
      <div class="text-column">
        <div class="hide hide-left text-box">
          <h2 class="">Overview</h2>
          <?php the_content(); ?>
          <div class="site-links">
            <?php $site_link = get_post_meta($post->ID, 'site-link', true);
            if (!empty($site_link))
              echo '<a class="btn btn-outline-white" href="' . $site_link . '" target="_blank" rel="noopener noreferrer">Visit Site</a>';
            $repo_link = get_post_meta($post->ID, 'repo-link', true);
            if (!empty($repo_link))
              echo '<a class="btn btn-outline-white" href="' . $repo_link . '" target="_blank" rel="noopener noreferrer">View Code</a>';
            ?>
            <a class="btn btn-filled" href="<?php echo esc_url(home_url('/')); ?>#projects">All Projects</a>
          </div>
        </div>
      </div>
      <div class="hide hide-bottom image-column">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail();
        } else { ?>
          <img class="placeholder-image" src="https://placehold.co/704x533?text=Placeholder" alt="Placeholder image">
        <?php
        } ?>
      </div>
    </div>
  </div>
  <div class="team-content">
    <div class="container">
      <div class="heading">
        <h2 class="hide hide-bottom">The Team</h2>
      </div>
      <div class="developer-cards">
        <?php
        $args = array(
          'category_name' => get_the_title(),
          'post_type' => 'developer',
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()) {
          $loop->the_post();
        ?>
          <div class="hide hide-bottom developer-card" style="--i: <?php echo $loop->current_post; ?>;">
            <a href="<?php echo get_post_meta($post->ID, 'site-link', true); ?>" target="_blank" rel="noopener noreferrer">
              <div class="developer-overlay"></div>
            </a>
            <div class="developer-name">
              <p>
                <a href="<?php echo get_post_meta($post->ID, 'site-link', true); ?>" target="_blank" rel="noopener noreferrer">
                  <?php the_title() ?>
                </a>
              </p>
            </div>
            <?php if (has_post_thumbnail()) {
              the_post_thumbnail();
            } else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dev-placeholder.png" alt="Placeholder image for developer headshot">
            <?php
            } ?>
          </div>
        <?php
        }
        wp_reset_query(); ?>
      </div>
    </div>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->