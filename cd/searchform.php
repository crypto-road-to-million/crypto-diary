<form class="d-flex" action="<?php echo esc_url_raw( home_url() ); ?>" method="get">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s">
  <button class="btn btn-outline-secondary" type="submit"><?php esc_html_e( 'Search', 'cd' ); ?></button>
</form>