<?php get_header(); ?>
<main class="flex-1">
  <div class="container">

    <div class="row">
      <div class="col-md-8">
        <h1 class="px-2 py-4 mb-4 fst-italic border-bottom">
          <?php esc_html_e( 'Results for: ', 'cd' ); ?><?php echo $s; ?>
        </h1>
        <?php

      $count = 0;
      if ( have_posts() ) : while ( have_posts() ) : the_post();
      $count++; ?>

        <article <?php post_class('blog-post'); ?>>
        <?php get_template_part( 'template-parts/post/category' ); ?>
        <?php get_template_part( 'template-parts/post/title' ); ?>
          <?php get_template_part( 'template-parts/post/meta' ); ?>

          <?php if (has_post_thumbnail( $post->ID ) ){ ?>
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'cd_post_img', array(
          'class' => 'img-fluid',
          'alt'   => get_the_title()
        ) ) ?>
          </a>
          <?php } ?>
          <?php
      if(get_field('featured_image_credit')){ ?>
      <div class="mt-1">
        <small>
          <em>
            <?php the_field('featured_image_credit'); ?>
          </em>
        </small>
      </div>
      <?php } ?>

          <?php if (get_field('youtube_video', $post->ID)) { ?>
          <div class="embed-container mb-2">
            <?php the_field('youtube_video'); ?>
          </div>
          <?php } ?>

          <div class="p-2">
            <?php the_excerpt(); ?>
          </div>
        </article>

        <?php
      endwhile;
      endif;
      get_template_part( 'template-parts/navigation/paginate' ); ?>

      </div>

      <div class="col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>

    <?php get_template_part( 'template-parts/video/section' ); ?>

  </div>
</main>

<?php get_footer(); ?>