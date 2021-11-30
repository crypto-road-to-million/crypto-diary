<footer class="blog-footer bg-dark text-white">
  <div class="container">
    <p><?php esc_html_e( 'Copyright &copy; ', 'cd' ); ?><?php echo esc_url( home_url( ) ); ?> <?php echo date('o'); ?>
    </p>
    <?php if(get_field('github_issue_url', 'option')) { ?>
    <p>
      <a class="text-decoration-none link-light fw-bold"
        href="<?php the_field('github_issue_url', 'option'); ?>" target="_blank"><?php esc_html_e( 'Submit Feature Request or Bug', 'cd' ); ?></a>
    </p>
    <?php } ?>

  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>