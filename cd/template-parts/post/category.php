<?php     
$categories = get_the_category();
if ( ! empty( $categories ) ) {
  echo '<p class="p-2 mb-0"><a class="link-secondary text-decoration-none fw-bold" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></p>';
} ?>