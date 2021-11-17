<footer class="blog-footer bg-dark text-white">
  <div class="container">
    <p><?php esc_html_e( 'Copyright &copy; ', 'cd' ); ?><?php echo esc_url( home_url( ) ); ?> <?php echo date('o'); ?></p>
    <p><a class="text-decoration-none link-light fw-bold" href="<?php the_field('github_issue_url', 'option'); ?>"><?php esc_html_e( 'Submit Feature Request or Bug', 'cd' ); ?></a></p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>
