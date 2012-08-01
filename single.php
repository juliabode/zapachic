<?php get_header(); ?>

    <div id="centercol" class="grid_10">

    <div class="box2 navigation">
      <div class="alignright"><?php next_post_link('%link→') ?></div>
      <div class="alignleft"><?php previous_post_link('←%link') ?></div>
    </div>

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <div class="post box" id="post-<?php the_ID(); ?>">
          <div class="box-inner">

          <?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->

                  <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=195&amp;w=540&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>

          <?php } ?>

          <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <div class="date-comments">
                        <p class="fl">Written by <?php the_author_link(); ?><?php edit_post_link('Edit This Post!', ' | ', ''); ?></p>
                        <p class="fr">Topics: <?php the_category(', ') ?></p>
                    </div><div class="clear"></div>

          <div class="entry">
            <?php if (function_exists('digg_this_button')) { ?><div style="float: left;"><?php digg_this_button(); ?></div><?php } ?>
            <?php the_content('<span class="continue">Continue Reading</span>'); ?>
            <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
        </div>

  <div class="post_meta">
    <div>
      <?php if (get_option('thrill_promote') != "") { } else { ?>
        <div class="right">
          <h3 class="nomargin">Like My Sexy Blog Design?</h3>
          <p><strong><a href="http://thrillingheroics.com/ThrillingTheme" title="free social media optimized WordPress theme">Get your own premium, social media optimized WordPress theme</a> developed by <a href="http://thrl.in/woo" title="">WooThemes</a> and <a href="http://www.thrillingheroics.com" title="lifestyle business online">Cody McKibben</a> / <a href="http://thrillingheroicsconsulting.com/" title="build a cash flow business online">Thrilling Heroics</a>.</strong></p>
        </div>
      <?php } ?>
      <h3 class="nomargin">Bookmark and Share</h3>
      <p>
      <span class="links"><div class="fb-like" data-send="false" data-layout="box_count" data-width="50" data-show-faces="false"></div></span><span class="links" style="margin-right:7px"><a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="<?php echo stripslashes(htmlspecialchars(get_option('thrill_twit_id'))); ?>">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></span><span class="links"><g:plusone size="tall"></g:plusone></span><span class="links"><script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-counter="top"></script></span>
      </p>
    </div>

    <p><em>Posted on <?php the_time('j F Y'); ?></em></p>
    <p><?php the_tags('Tags: <span>', ', ', '</span>'); ?></p>


    <?php if (function_exists('wp_related_posts')) { ?>
      <h3 class="nomargin">Related Articles</h3>
      <div class="entry">
        <ul>
          <?php wp_related_posts(); ?>
        </ul>
      </div>
    <?php } ?>


      <?php if (get_option('thrill_author') != "") { ?>
      <h3 class="nomargin">About the Author</h3>
          <div>
                        <p><em><?php the_author_description(); ?></em></p>
                    </div>
    <?php } ?>

  </div>

  <div class="clear"></div>
          </div>
        </div><!--/post-->

        <a name="comments"></a>
        <div id="comments" class="box2">
          <?php comments_template('', true); ?>
        </div>

    <?php endwhile; ?>

  <?php endif; ?>

    </div><!--/centercol-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>