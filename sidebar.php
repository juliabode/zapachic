<div id="sidebar" class="grid_6">

  <?php include('ads/ads-management.php'); ?>


<div class="widget" id="subform">

      <h4 style="font-size: 22px; font-weight: bold; letter-spacing: -1px;"><?php _e('Subscribe to', 'Zapachic'); ?> <?php bloginfo('name'); ?>:</h4>
    <a href="<?php if ( get_option('thrill_feedburner_url') <> "" ) { echo stripslashes(htmlspecialchars(get_option('thrill_feedburner_url'))); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="Subscribe to the RSS feed"><img border="0" style="float: left; vertical-align: middle; padding-right: 10px;" src="<?php bloginfo('template_directory'); ?>/images/ico-rss-trans.png" alt="RSS"/></a>
    <p style="padding: 5px 0pt;"><a href="<?php if ( get_option('thrill_feedburner_url') <> "" ) { echo stripslashes(htmlspecialchars(get_option('thrill_feedburner_url'))); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="Subscribe to updates via RSS"><?php _e('Grab the RSS feed for Free Updates!', 'Zapachic'); ?></a><br />(<?php _e("What's this?", 'Zapachic'); ?> — <a href="http://www.youtube.com/watch?v=0klgLsSxGsU" title="RSS in Plain English" target="_blank"><?php _e('Learn more about RSS', 'Zapachic'); ?></a>)</p>
    <?php if ( get_option('thrill_feedburner_id') <> "" ) { ?><br style="clear: both;" />

    <a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php $feedburner_id = get_option('thrill_feedburner_id'); echo $feedburner_id; ?>" title="Get email updates delivered to your email inbox!"><img border="0" style="float: left; vertical-align: middle; padding-right: 10px;" src="<?php bloginfo('template_directory'); ?>/images/mail-forward-trans.png" alt="subscribe"/></a>
    <p style="padding: 5px 0pt;"><?php _e('OR Get blog updates sent directly to your inbox by entering your email address below:', 'Zapachic'); ?></p>
    <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php $feedburner_id = get_option('thrill_feedburner_id'); echo $feedburner_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" style="text-align: center;">
      <input type="text" name="email" style="width: 140px;"/>
      <input type="hidden" value="<?php $feedburner_id = get_option('thrill_feedburner_id'); echo $feedburner_id; ?>" name="uri"/>
      <input type="hidden" name="loc" value="en_US"/>
      <input type="submit" value="Subscribe" onmouseover="style.cursor='pointer'" style="margin: 5px; cursor: pointer;"/>
    </form><?php } else {} ?>
  </div><!--/widget-->


    <div class="box2">

        <ul class="idTabs">
          <li><a href="#feat"><?php _e('Featured', 'Zapachic'); ?></a></li>
      <li><a href="#pop"><?php _e('Popular', 'Zapachic'); ?></a></li>
            <li><a href="#comm"><?php _e('Comments', 'Zapachic'); ?></a></li>
            <li><a href="#tagcloud"><?php _e('Topics', 'Zapachic'); ?></a></li>
        </ul>

        <div class="spacer white">

      <ul class="list1" id="feat">
        <?php
          include(TEMPLATEPATH . '/includes/version.php');
          $the_query = new WP_Query('cat=' . $ex_feat  . '&showposts=10&orderby=post_date&order=desc');
          while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
        ?>

          <li><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>

        <?php endwhile; ?>
      </ul>

            <ul class="list1" id="pop">
                <?php include(TEMPLATEPATH . '/includes/popular.php' ); ?>
            </ul>

      <ul class="list1" id="comm">
                <?php include(TEMPLATEPATH . '/includes/comments.php' ); ?>
      </ul>

            <div class="list1" id="tagcloud">
                <?php wp_tag_cloud('smallest=10&largest=22'); ?>
            </div>

        </div>
        <!--/spacer -->

    </div>
    <!--/box2 -->


<div id="adsection">
  <?php include('ads/ads-top.php'); ?>
</div>

   <?php if (get_option('thrill_twit_id') != "") { ?>

  <div class="widget">
    <div class="spacer">

            <h2><img src="<?php bloginfo('template_directory'); ?>/images/twitter-trans.png" style="margin: -5px 5px -5px -5px;" alt="" /><?php _e('Twitter Updates', 'Zapachic'); ?></h2>

        <span class="author_photo" style="float: right; margin: 0 0 0 8px;"><a href="http://twitter.com/<?php echo stripslashes(htmlspecialchars(get_option('thrill_twit_id'))); ?>"><img src="<?php echo stripslashes(htmlspecialchars(get_option('thrill_twit_photo'))); ?>" width="48" height="48" alt="" /></a></span>

        <?php
      // Your twitter username.
      $username = get_option('thrill_twit_id');
      // (HTML is OK, but be sure to escape quotes with backslashes: for example href=\"link.html\")
      $prefix = "";
      // Suffix - some text you want display after your latest tweet. (Same rules as the prefix.)
      $suffix = "";
      $feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=3";
      function parse_feed($feed) {
        $stepOne = explode("<content type=\"html\">", $feed);
        $stepTwo = explode("</content>", $stepOne[1]);
        $tweet = $stepTwo[0];
        $tweet = str_replace("&lt;", "<", $tweet);
        $tweet = str_replace("&gt;", ">", $tweet);
        $tweet = str_replace("&amp;", "&", $tweet);
        $tweet = str_replace('&quot;', '"', $tweet);
      return $tweet;
      }
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $feed);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $twitterFeed = curl_exec($ch);
      curl_close($ch);
      echo stripslashes($prefix) . parse_feed($twitterFeed) . stripslashes($suffix);
      ?>
        <br style="clear: both;" />

        <h3 style="margin-top: 10px;"><a href="http://twitter.com/<?php echo stripslashes(htmlspecialchars(get_option('thrill_twit_id'))); ?>" style="color: #363636;"><?php _e('Follow', 'Zapachic'); ?> @<?php echo stripslashes(htmlspecialchars(get_option('thrill_twit_id'))); ?> <?php _e('on Twitter', 'Zapachic'); ?>→</a></h3>

    </div>
  </div>

  <?php } ?>


  <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

  <?php endif; ?>


   <?php if (get_option('thrill_flickr_id') != "") { ?>

    <div class="box2">
        <div class="top"></div>
        <div class="spacer flickr">
            <h3><a href="http://www.flickr.com/photos/<?php echo stripslashes(htmlspecialchars(get_option('thrill_flickr_id'))); ?>/" title=""><span style="color:#363636"><?php _e('My Latest', 'Zapachic'); ?> </span><span style="color:#0063DC">Flicker</span><span style="color:#FF0084">r</span><span style="color:#363636"> <?php _e('photos', 'Zapachic'); ?></span></a></h3>
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo stripslashes(htmlspecialchars(get_option('thrill_flickr_entries'))); ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo stripslashes(htmlspecialchars(get_option('thrill_flickr_id'))); ?>"></script>
    </div><!--/spacer -->
        <div class="fix"></div>
        <div class="bot"></div>
    </div>
    <!--/box2 -->

    <?php } ?>


  <?php include('ads/ads-300x250.php'); ?>


  <div class="grid_3 alpha">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>

    <?php endif; ?>

  </div><!--/grid_3 alpha-->

  <div class="grid_3 omega">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>

    <?php endif; ?>

  </div><!--/grid_3 omega-->

</div><!--/sidebar-->

<div class="fix"></div>
