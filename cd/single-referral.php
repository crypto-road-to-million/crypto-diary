<?php get_header(); ?>
<main class="flex-1">
  <div class="container">

    <div class="row">
      <div class="col-md-8">

        <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article <?php post_class('blog-post'); ?>>

          <header>
            <h1 class="blog-post-title mb-3">
              <?php the_title(); ?>
            </h1>
          </header>
          <?php get_template_part( 'template-parts/post/meta' ); ?>

          <?php
          the_post_thumbnail( 'cd_post_img', array(
            'class' => 'img-fluid mb-3',
            'alt'   => get_the_title()
          ) ) ?>

          <?php if(get_field('referral_code') || get_field('referral_link')){ ?>
          <div class="p-4 p-md-5 bg-light mb-3">
            <?php if(get_field('referral_code')){ ?>
            <div class="my-3">
              <div class="row g-1">
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?php esc_attr( the_field('referral_code') ); ?>"
                    id="refCode" aria-label="Referral code. Disabled input" disabled readonly>
                </div>
                <div class="col-sm-6">
                  <div class="tooltip-referral">
                    <button class="btn btn-secondary w-100" onclick="myFunction()" onmouseout="outFunc()">
                      <span class="tooltiptext bg-dark text-white"
                        id="refCodeTooltip"><?php esc_html_e( 'Copy to clipboard', 'cd' ); ?></span>
                      <?php esc_html_e( 'Copy code', 'cd' ); ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <?php if(get_field('referral_link')) { ?>
            <div class="my-3">
              <div class="row g-1">
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?php esc_attr( the_field('referral_link') ); ?>"
                    id="refLink" aria-label="Referral link. Disabled input" disabled readonly>
                </div>
                <div class="col-sm-6">
                  <div class="tooltip-referral">
                    <a class="btn btn-secondary w-100" href="<?php the_field('referral_link'); ?>">
                      <?php esc_html_e( 'Referral link', 'cd' ); ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <?php } ?>

          <?php the_content(); ?>

          <?php get_template_part( 'template-parts/post/chapter' ) ?>

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