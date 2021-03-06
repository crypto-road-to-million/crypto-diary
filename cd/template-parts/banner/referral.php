<?php

$args = array(
  'post_type' => 'referral', 
  'posts_per_page' => 1,
  'orderby' => 'rand',
  'post__not_in' => array (get_the_ID()),
);

// the query
$the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<?php
if(get_field('background_color') && get_field('text_color')) { ?>
<div class="row g-0 position-relative mb-5 cd__br-8"
  style="background-color:<?php the_field('background_color'); ?>; color:<?php the_field('text_color'); ?>;">
  <div class="col-12">
    <div class="p-4">
      <h3 class="h5 mt-0"><?php the_title(); ?></h3>
      <?php the_field('referral_short_description'); ?>
      <a href="<?php the_permalink(); ?>"
        class="stretched-link btn btn-danger"><?php esc_html_e( 'Continue reading...', 'cd' ); ?></a>
    </div>
  </div>
</div>
<?php } ?>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>