<?php
  $cd_video_query_args = array(
    'post_type' => 'video',
    'posts_per_page' => 4,
  );
  $the_query = new WP_Query( $cd_video_query_args ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<section class="p-2 p-md-4 my-5 bg-black text-white rounded">
  <div class="row g-0">
    <div class="col-12">
      <h2 class="blog-post-title p-2 p-md-4 mb-0">
        <?php esc_html_e( 'Video', 'cd' ); ?>
      </h2>
    </div>
    <div class="w-100 divider__dotted-white"></div>

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div class="col-md-3">
      <article <?php post_class('p-2 p-md-4'); ?>>
        <div class="embed-container mb-2">
          
          <?php

          // Load value.
          $iframe = get_field('youtube_video');

          // Use preg_match to find iframe src.
          preg_match('/src="(.+?)"/', $iframe, $matches);
          $src = $matches[1];

          // Add extra parameters to src and replcae HTML.
          $params = array(
              'controls'  => 0,
              'hd'        => 1,
              'autohide'  => 1
          );
          $new_src = add_query_arg($params, $src);
          $iframe = str_replace($src, $new_src, $iframe);

          // Add extra attributes to iframe HTML.
          $attributes = 'frameborder="0"';
          $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

          // Display customized HTML.
          echo $iframe;
          ?>
        </div>
        <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
          echo '<p class="mb-1"><span class="text-secondary fw-bold">' . esc_html( $categories[0]->name ) . '</span></p>';
        } ?>
        <h5><?php the_title(); ?></h5>
      </article>
    </div>

    <?php endwhile; ?>
  </div>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>