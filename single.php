<?php get_header(); ?>


    <div id="centercol" class="grid_10">

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <div class="post box" id="post-<?php the_ID(); ?>">
          <div class="box-inner">

          <h2 style="border-bottom:1px solid #CACACA;padding-bottom:10px;"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>         

            <script type="text/javascript"><!--
                google_ad_client = "ca-pub-0072791302442657";
                /* Submenu post */
                google_ad_slot = "6773534762";
                google_ad_width = 728;
                google_ad_height = 15;
                //-->
            </script>

<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<div style="padding:5px;">&#160;</div>

<script type="text/javascript"><!--
google_ad_client = "ca-pub-0072791302442657";
/* Banner superior */
google_ad_slot = "2165266440";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>

<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<div style="padding:5px;">&#160;</div>
          <div class="entry">
            <?php if (function_exists('digg_this_button')) { ?><div style="float: left;"><?php digg_this_button(); ?></div><?php } ?>
            <?php the_content('<span class="continue">Seguir leyendo</span>'); ?>
            <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
        </div>


<div>
<p><?php the_tags('Etiquetas: <span>', ', ', '</span>'); ?></p>


<?php if (function_exists('wp_related_posts')) { ?>
<h3 class="nomargin"><?php _e('Related Articles', 'Zapachic'); ?></h3>
<div class="entry">
<ul>
<?php wp_related_posts(); ?>
</ul>
</div>
<?php } ?>


<?php if (get_option('thrill_author') != "") { ?>
<h3 class="nomargin"><?php _e('About the Author', 'Zapachic'); ?></h3>
<div>
<p><em><?php the_author_description(); ?></em></p>
</div>
<?php } ?>

</div>

<div class="post_meta">

<table class="links">
<tr>
<td><div class="fb-like" data-send="false" data-layout="box_count" data-width="15" data-show-faces="false"></div></td>
<td><a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="<?php echo stripslashes(htmlspecialchars(get_option('thrill_twit_id'))); ?>">Tweet
</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>
</td>
<td><g:plusone size="tall"></g:plusone></td>
</tr>
</table>
</div>

<div class="date-comments">
<p class="fl">Escrito por <?php the_author_link(); ?><?php edit_post_link('Edit This Post!', ' | ', ''); ?></p>
<p class="fr">Temas: <?php the_category(', ') ?></p>
</div><div class="clear"></div>

<div class="box2 navigation">
<?php dynamic_sidebar( 'bottom_sidebar' ); ?> 
<!--<div class="alignright"><?php next_post_link('%link→') ?></div>
<div class="alignleft"><?php previous_post_link('←%link') ?></div>-->
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