<?php
get_header();
?>

<main id="primary" class="site-main developers">

  <?php
  while (have_posts()) :
    the_post();
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header developers-header">
        <img class="hide hide-static header-tr-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-tr-base.svg" alt="">
        <img class="hide hide-static header-tr-color shape" data-speed="1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-tr-color.svg" alt="">
        <img class="hide hide-static header-bl-base" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-bl-base.svg" alt="">
        <img class="hide hide-static header-bl-color shape" data-speed="-1" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-bl-color.svg" alt="">
        <div class="title-wrapper">
          <img class="hide hide-right lines-top" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-lines-top.svg" alt="">
          <img class="hide hide-left lines-bottom" src="<?php echo get_template_directory_uri(); ?>/assets/svgs/developers/developers-lines-bottom.svg" alt="">
          <?php the_title('<h1 class="hide hide-bottom entry-title">', '</h1>'); ?>
        </div>
      </header><!-- .entry-header -->
      <div class="developers-content">
        <div class="container">
          <form method="GET" class="hide hide-bottom developers-filter">
            <!-- <h2>Filter:</h2> -->
            <?php
            $terms = get_terms([
              'taxonomy' => 'course',
              'hide_empty' => false,
              'orderby' => 'id'
            ]);
            foreach ($terms as $term) : ?>
              <label>
                <input type="checkbox" name="course[]" value="<?php echo $term->slug; ?>" <?php checked((isset($_GET['course']) && in_array($term->slug, $_GET['course']))) ?> />
                <?php echo $term->name; ?>
              </label>
            <?php endforeach; ?>
            <button class="btn btn-outline-white" type="submit">Filter</button>
          </form>
        </div>
        <div class="container">
          <div class="developer-cards">
            <?php
            $args = array(
              'post_type' => 'developer',
              'posts_per_page' => -1, // Show all posts
            );
            if (isset($_GET['course']))
              $course_filter = $_GET['course'];
            if (!empty($course_filter)) {
              foreach ($course_filter as &$the_course)
                $the_course = htmlspecialchars($the_course);
              unset($the_course);
              $tax_query[] = array(
                'taxonomy' => 'course',
                'field' => 'slug',
                'terms' => $course_filter,
              );
              $args['tax_query'] = $tax_query;
            }
            $loop = new WP_Query($args);
            while ($loop->have_posts()) {
              $loop->the_post();
            ?>
              <!-- <div class="hide hide-bottom developer-card" style="--i: <?php echo $loop->current_post  ?>;"> -->
              <div class="hide hide-bottom developer-card" style="--i: 1;">
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
      </div>
    </article><!-- #post-<?php the_ID(); ?> -->
  <?php
  endwhile; // End of the loop.
  ?>

</main><!-- #main -->

<?php
get_footer();
