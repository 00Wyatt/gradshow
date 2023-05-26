<?php
get_header();
?>

<main id="primary" class="site-main project-info">
  <?php
  while (have_posts()) :
    the_post();

    get_template_part('template-parts/content', get_post_type());

  ?>
    <div class="hide hide-static container">
      <?php
      the_post_navigation(
        array(
          'prev_text' => '<img class="left-arrow" src="' . get_template_directory_uri() . '/assets/svgs/arrow-left-circle.svg" alt="" width=32><div class="left"><span class="nav-subtitle">' . esc_html__('Previous:', 'gradshow') . '</span> <span class="nav-title">%title</span></div>',
          'next_text' => '<div class="right"><span class="nav-subtitle">' . esc_html__('Next:', 'gradshow') . '</span> <span class="nav-title">%title</span></div><img class="right-arrow" src="' . get_template_directory_uri() . '/assets/svgs/arrow-right-circle.svg" alt="" width=32>',
        )
      );
      ?>
    </div>
  <?php

  endwhile; // End of the loop.
  ?>

</main><!-- #main -->

<?php

get_footer();
