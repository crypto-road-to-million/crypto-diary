<section class="bg-danger text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <header>
          <h5 class="text-uppercase"><?php esc_html_e( 'disclaimer', 'cd' ); ?></h5>
        </header>
        <p class="mb-0">
          <?php the_field('disclaimer_text', 'option'); ?>
        </p>
      </div>
    </div>
  </div>
</section>

<footer class="blog-footer bg-dark text-white">
  <div class="container">
    <p><?php esc_html_e( 'Copyright &copy; ', 'cd' ); ?><?php echo esc_url( home_url( ) ); ?> <?php echo date('o'); ?>
    </p>
    <?php if(get_field('github_issue_url')) { ?>
    <p>
      <a class="text-decoration-none link-light fw-bold"
        href="<?php the_field('github_issue_url', 'option'); ?>"><?php esc_html_e( 'Submit Feature Request or Bug', 'cd' ); ?></a>
    </p>
    <?php } ?>

  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>