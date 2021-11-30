<?php get_header(); ?>
<main class="flex-1">
  <div class="container">

    <div class="row">
      <div class="col-md-8">

        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article <?php post_class('blog-post'); ?>>

        <?php get_template_part( 'template-parts/post/category' ); ?>

          <header class="p-2 mb-3">
            <h1 class="blog-post-title">
              <?php the_title(); ?>
            </h1>
          </header>

          <?php get_template_part( 'template-parts/post/meta' ); ?>

          <?php the_post_thumbnail( 'cd_post_img', array(
            'class' => 'img-fluid',
            'alt'   => get_the_title()
          ) );
          
          if(get_field('featured_image_credit')){ ?>
          <div class="mt-1">
            <small>
              <em>
                <?php the_field('featured_image_credit'); ?>
              </em>
            </small>
          </div>
          <?php } ?>

          <?php
          if(is_single()) { ?>
          <div class="d-xxl-none my-4">
            <?php get_template_part( 'template-parts/timeline/index' ); ?>
          </div>
          <?php } ?>

          <div class="p-2">
            <?php the_content(); ?>
          </div>

          <?php get_template_part( 'template-parts/post/chapter' ) ?>

          <?php wp_link_pages( 'pagelink=Page %' ); ?>


          <?php
          if (has_tag()){ ?>
            <div class="p-2">
              <?php the_tags(); ?>
            </div>
          <?php } ?>

          <?php get_template_part( 'template-parts/post/knowmore' ); ?>

          <?php comments_template(); ?>

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