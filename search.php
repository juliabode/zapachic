<?php get_header(); ?>

    <div id="centercol" class="grid_10">

    <?php if (have_posts()) : ?>

        <div class="box2">
          <h4><em><?php _e('Search Results for', 'Zapachic'); ?></em> "<?php printf(__('\'%s\''), $s) ?>"</h4>
        </div>

      <?php while (have_posts()) : the_post(); ?>

      <div class="post box" id="post-<?php the_ID(); ?>">
        <div class="box-inner">

                <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <div class="date-comments">
                    <p class="fl"><?php the_time('j F Y'); ?></p>
                    <p class="fr"><span class="comments"></span><?php comments_popup_link( __('0 Comments', 'Zapachic'), __('1 Comment', 'Zapachic'), __('% Comments', 'Zapachic') ); ?></p>
                </div>

            <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array("class" => "post_thumbnail")); } elseif (get_post_meta($post->ID, 'image', true) ) {?>
<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=195&amp;w=540&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" class="fl" style="margin-top:5px;" /></a>

      <?php } else {} ?>

                <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>


                <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><?php _e('Continue reading...', 'Zapachic'); ?></a></span>

        </div>
      </div><!--/post-->

    <?php endwhile; ?>

    <div class="box2 navigation">
      <div class="alignleft"><?php next_posts_link( _e('&laquo; Previous Entries', 'Zapachic') ); ?></div>
      <div class="alignright"><?php previous_posts_link( _e('Next Entries &raquo;', 'Zapachic') ); ?></div>
    </div>

    <?php else : ?>

    <div class="box">
      <div class="box-inner">

              <h3><em><?php _e('Search Results', 'Zapachic'); ?> |</em> <?php _e('None Found!', 'Zapachic'); ?></h3>
              <div><?php _e('Sorry! Your search yielded no results. Please search again.', 'Zapachic'); ?></div>
      </box>
    </div><!--/box-->


      <div class="box2">

        <img border="0" src="<?php bloginfo('template_directory'); ?>/images/search-trans.png" alt="search" style="padding: 6px 10px 0pt 0pt; float: left; vertical-align: middle;"/>
          <h4 style="font-size: 20px; font-weight: bold; letter-spacing: -1px;"><?php _e('Search the Site:', 'Zapachic'); ?></h4>
          <form id="searchform" method="get" action="<?php bloginfo('url'); ?>">
          <input type="text" name="s" id="s" size="" value=""/>
          <input type="submit" style="cursor: pointer;" value="Search" onmouseover="style.cursor='pointer'"/>
        </form>

      </div>

  <?php endif; ?>

    </div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
