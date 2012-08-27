<?php get_header(); ?>

    <div id="centercol" class="grid_10">

    <?php if (have_posts()) : ?>

    <div class="box2">

            <?php if (is_category()) { ?>

              <h4><span class="fl"><?php _e('Archive', 'Zapachic'); ?> | <?php echo single_cat_title(); ?></span> <span class="fr catrss"><?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; echo '<a href="'; get_category_rss_link(true, $cat, ''); echo '"> ' . _e('RSS feed for this category', 'Zapachic') . '</a>'; ?></span></h4>

        <?php } elseif (is_day()) { ?>
        <h4><?php _e('Archive', 'Zapachic'); ?> | <?php the_time('F jS, Y'); ?></h4>

        <?php } elseif (is_month()) { ?>
        <h4><?php _e('Archive', 'Zapachic'); ?> | <?php the_time('F, Y'); ?></h4>

        <?php } elseif (is_year()) { ?>
        <h4><?php _e('Archive', 'Zapachic'); ?> | <?php the_time('Y'); ?></h4>
        <?php } ?>
    </div>


      <?php while (have_posts()) : the_post(); ?>

      <div class="post-overview box" id="post-<?php the_ID(); ?>">
        <div class="box-inner">

                <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

        <div class="date-comments">
                    <p class="fl"><?php the_time('j F Y'); ?></p>
                    <p class="fr"><span class="comments"></span><?php comments_popup_link(__('0 Comments', 'Zapachic'), __('1 Comment', 'Zapachic'), __('% Comments', 'Zapachic')); ?></p>
              </div>


        <div>
          <div class="img left">
            <a href="<?php the_permalink() ?>">

              <?php if ( has_post_thumbnail() ) {
                      the_post_thumbnail();
                    } else { ?>

                      <?php

                           $_thumb = sprintf('<img src="%s/thumb.php?src=%s&amp;w=240&amp;h=240&amp;zc=1" alt="%s" height="240" width="240">',
                                  get_bloginfo('template_directory'),
                                  getImageForThumb('1'),
                                  get_the_title($_post_id)
                                );

                        ?>
                <?php print($_thumb); ?>
              <?php } ?>
            </a>

          </div>
        </div>

                <?php include(TEMPLATEPATH . '/includes/version.php'); ?>
                <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>

                <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><?php _e('Continue reading...', 'Zapachic'); ?></a></span>
        </div>
      </div><!--/post-->

    <?php endwhile; ?>

    <div class="box2 navigation">
      <div class="alignleft"><?php next_posts_link( _e('&laquo; Previous Entries', 'Zapachic') ); ?></div>
      <div class="alignright"><?php previous_posts_link( _e('Next Entries &raquo;', 'Zapachic') ); ?></div>
    </div>

  <?php endif; ?>

    </div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>