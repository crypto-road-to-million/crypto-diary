<?php if( have_rows('timeline') ): ?>
<div class="p-4 bg-light rounded">
  <!-- Timeline -->
  <div class="timeline">
    <?php
    $cd_timeline_counter = 1;
    while( have_rows('timeline') ): the_row(); ?>
    <!-- Timeline Item -->
    <div class="timeline-item <?php if($cd_timeline_counter == 1) { echo 'live-investment'; } ?>">
      <?php if($cd_timeline_counter == 1) { ?>
      <p class="text-danger mb-1"><strong><small><?php esc_html_e( 'Investment in progress', 'cd' ); ?></strong></small>
      </p>
      <?php } ?>
      <p class="mb-1"><small><?php the_sub_field('timeline_date'); ?></small></p>
      <p class="mb-1"><strong><?php the_sub_field('timeline_value'); ?></strong></p>

      <?php
      $cd_timeline_image = get_sub_field('timeline_image');
      if( !empty( $cd_timeline_image ) ): ?>
      <a href="<?php echo esc_url($cd_timeline_image['url']); ?>" class="link-secondary"
        target="_blank"><small><?php esc_html_e( 'Open image', 'cd' ); ?></small></a>
      <?php endif; ?>

    </div>
    <!-- End of Timeline Item -->
    <?php
    $cd_timeline_counter++;
    endwhile; ?>
  </div>
  <!--End of Timeline-->
</div>
<?php endif; ?>