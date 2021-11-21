<?php get_header(); ?>

<main class="container">

  <div class="row">
    <div class="col-md-8">

      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/banner/referral' ); ?>

      <article <?php post_class('blog-post'); ?>>

        <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
          echo '<p><span class="text-secondary fw-bold">' . esc_html( $categories[0]->name ) . '</span></p>';
        } ?>
        <header>
          <h1 class="blog-post-title mb-3">
            <?php the_title(); ?>
          </h1>
        </header>

        <?php get_template_part( 'template-parts/post/meta' ); ?>

        <?php the_post_thumbnail( 'cd_post_img', array(
          'class' => 'img-fluid mb-3',
          'alt'   => get_the_title()
        ) ) ?>

        <?php the_content(); ?>

        <?php get_template_part( 'template-parts/post/chapter' ) ?>

        <?php get_template_part( 'template-parts/post/knowmore' ); ?>

        <hr>

        <?php comments_template(); ?>

      </article>

      <?php
      get_template_part( 'template-parts/banner/referral' );
      endwhile;
      endif;
      get_template_part( 'template-parts/navigation/paginate' ); ?>

    </div>

    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>

</main>

<?php get_footer(); ?>