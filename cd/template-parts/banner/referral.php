<?php

$args = array(
  'post_type' => 'referral', 
  'posts_per_page' => 1,
  'orderby' => 'rand'
);

// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

<!-- pagination here -->

<!-- the loop -->
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<div class="mt-4">
  <div class="row g-0 position-relative mb-5"
    style="background-color:<?php the_field('background_color'); ?>; color:<?php the_field('text_color'); ?>;">
    <div class="col-12">
      <div class="p-4 p-md-5">
        <h5 class="mt-0"><?php the_title(); ?></h5>
        <?php the_field('referral_short_description'); ?>
        <a href="<?php the_permalink(); ?>"
          class="stretched-link btn btn-danger"><?php esc_html_e( 'Continue reading...', 'cd' ); ?></a>
      </div>
    </div>
  </div>
</div>
<?php endwhile; ?>
<!-- end of the loop -->

<!-- pagination here -->

<?php wp_reset_postdata(); ?>

<?php endif; ?>