<?php get_header(); ?>

    <div id="centercol" class="grid_10">

    <?php if (have_posts()) : ?>

    <div class="box2">

            <?php if (is_category()) { ?>

              <h4><span class="fl">Archive | <?php echo single_cat_title(); ?></span> <span class="fr catrss"><?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; echo '<a href="'; get_category_rss_link(true, $cat, ''); echo '">RSS feed for this category</a>'; ?></span></h4>

        <?php } elseif (is_day()) { ?>
        <h4>Archive | <?php the_time('F jS, Y'); ?></h4>

        <?php } elseif (is_month()) { ?>
        <h4>Archive | <?php the_time('F, Y'); ?></h4>

        <?php } elseif (is_year()) { ?>
        <h4>Archive | <?php the_time('Y'); ?></h4>
        <?php } ?>
    </div>


      <?php while (have_posts()) : the_post(); ?>

      <div class="post box" id="post-<?php the_ID(); ?>">
        <div class="box-inner">

                <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

        <div class="date-comments">
                    <p class="fl"><?php the_time('j F Y'); ?></p>
                    <p class="fr"><span class="comments"></span><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></p>
              </div>

            <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array("class" => "post_thumbnail")); } elseif (get_post_meta($post->ID, 'image', true) ) {?>
<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=195&amp;w=540&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" /></a>

    <?php } else {} ?>

                <?php include(TEMPLATEPATH . '/includes/version.php'); ?>
                <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>

                <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Continue reading...</a></span>
        </div>
      </div><!--/post-->

    <?php endwhile; ?>

    <div class="box2 navigation">
      <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
    </div>

  <?php endif; ?>

    </div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>