<section class="bg-danger text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col-8 mx-auto fw-bold text-center">
        <header>
          <h2 class="text-uppercase"><?php esc_html_e( 'disclaimer', 'cd' ); ?></h2>
        </header>
        <p class="mb-0">
          <?php esc_html_e( 'Any information found on this page is not to be considered as financial advice. You should do your own research before making any decisions.', 'cd' ); ?>
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