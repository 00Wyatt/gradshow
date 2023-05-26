<?php
get_header();
?>

<main id="primary" class="site-main">

  <section class="error-404 not-found">
    <div class="container">
      <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'gradshow'); ?></h1>
      </header><!-- .page-header -->

      <div class="page-content">
        <p>Go back to the <a href="<?php echo esc_url(home_url('/')); ?>">Home page.</a></p>
      </div><!-- .page-content -->
    </div>
  </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
