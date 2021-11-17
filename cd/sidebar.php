<div class="position-sticky" style="top: 2rem;">

  <div class="p-4">
    <?php get_search_form(); ?>
  </div>

  <div class="p-4 mb-3 bg-light rounded">
    <h4 class="fst-italic"><?php the_field('about_title', 'option'); ?></h4>
    <p class="mb-0"><?php the_field('about_small_description', 'option'); ?></p>
  </div>

  <?php
  $categories = get_categories( array(
    'parent'  => 0
  ) );
  if (!empty($categories)) { ?>
  <div class="p-4">
    <h4 class="fst-italic"><?php esc_html_e( 'Categories', 'cd' ); ?></h4>
    <ol class="list-unstyled mb-0">
      <?php
      foreach ( $categories as $category ) {
        printf( '<li><a href="%1$s">%2$s</a></li>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
        );
      } ?>
    </ol>
  </div>
  <?php } ?>

  <div class="p-4">
    <h4 class="fst-italic"><?php esc_html_e( 'Archives', 'cd' ); ?></h4>
    <ol class="list-unstyled mb-0">
      <?php wp_get_archives('type=monthly'); ?>
    </ol>
  </div>

  <div class="p-4">
    <h4 class="fst-italic"><?php esc_html_e( 'Elsewhere', 'cd' ); ?></h4>
    <ol class="list-unstyled">
      <?php if( get_field('about_github', 'option') ) { ?>
      <li><a href="<?php the_field('about_github', 'option') ?>"><?php esc_html_e( 'GitHub', 'cd' ); ?></a></li>
      <?php } ?>
      <?php if( get_field('about_twitter', 'option') ) { ?>
      <li><a href="<?php the_field('about_twitter', 'option') ?>"><?php esc_html_e( 'Twitter', 'cd' ); ?></a></li>
      <?php } ?>
      <?php if( get_field('about_facebook', 'option') ) { ?>
      <li><a href="<?php the_field('about_facebook', 'option') ?>"><?php esc_html_e( 'Facebook', 'cd' ); ?></a>
      </li>
      <?php } ?>
    </ol>
  </div>
</div>