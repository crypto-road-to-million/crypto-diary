<?php get_header(); ?>
<main class="flex-1">
  <div class="container">

    <div class="row">
      <div class="col-md-8">

        <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/banner/referral' ); ?>

        <article <?php post_class('blog-post'); ?>>

          <header>
            <h1 class="blog-post-title mb-3">
              <?php the_title(); ?>
            </h1>
          </header>

          <?php get_template_part( 'template-parts/post/meta' ); ?>

          <?php if (get_field('youtube_video', $post->ID)) { ?>
          <div class="embed-container mb-2">
            <?php the_field('youtube_video'); ?>
          </div>
          <?php } ?>

          <?php the_content(); ?>

        </article>

        <?php
      get_template_part( 'template-parts/banner/referral' );
      endwhile;
      endif; ?>

      </div>

      <div class="col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>

    <?php get_template_part( 'template-parts/video/section' ); ?>
  </div>
</main>

<?php get_footer(); ?>