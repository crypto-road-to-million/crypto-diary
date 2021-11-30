<?php get_header(); ?>
<main class="flex-1">
  <div class="container my-5">
    <div class="row g-0">
      <div class="col-lg-8 mx-auto">
        <article>
          <div class="p-2 p-md-4 my-2 my-lg-4">
            
              <div class="text-center">
                <h1 class="mb-3"><?php esc_html_e( 'Page Not Found', 'cd' ); ?></h1>
                <h2 class="h4 fw-normal mb-5">
                  <?php esc_html_e( 'We’re sorry, we seem to have lost this page, but we don’t want to lose you.', 'cd' ); ?>
                </h2>
              </div>
              <div class="mb-5">
                <?php get_search_form(); ?>
                <small>
                  <div class="d-flex justify-content-center my-2">

                    <a class="mx-2"
                      href="<?php the_field('github_issue_url', 'option'); ?>"><?php esc_html_e( 'Report a broken link', 'cd' ); ?></a>

                    <a class="mx-2"
                      href="<?php echo esc_url_raw( home_url() ); ?>"><?php esc_html_e( 'Go to Home Page', 'cd' ); ?></a>
                  </div>
                </small>
              </div>

              <hr class="mt-5 mb-2">

              <section>
                <small>
                  <div class="d-flex justify-content-end mb-2">
                    <a
                      href="<?php echo esc_url_raw( home_url() ); ?>"><?php esc_html_e( 'Go to Home Page', 'cd' ); ?></a>
                  </div>

                  <div class="row">
                    <?php 
                // the query
                $the_query = new WP_Query( array(
                  'post_type' => 'post',
                  'posts_per_page' => 6,
                  'post__not_in' => get_option( 'sticky_posts' ),
                  'orderby' => 'rand',
                  ) ); ?>

                    <?php if ( $the_query->have_posts() ) : ?>

                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-md-6 mb-4">
                      <small>
                        <h2 class="mb-1 h4"><?php the_title(); ?></h2>
                        <p class="mb-0"><?php echo get_the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>"
                          class="link-primary"><?php esc_html_e( 'Continue reading...', 'cd' ); ?></a>
                      </small>
                    </div>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                  </div>

                </small>
              </section>

          </div>
        </article>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>