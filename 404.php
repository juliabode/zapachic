<?php get_header(); ?>

    <div id="centercol" class="grid_10">

      <div class="box">
        <div class="box-inner">

          <h3><em><?php _e('Error 404', 'Zapachic'); ?> | </em><?php _e('Page Not Found!', 'Zapachic'); ?></h3>
          <div><?php _e("Sorry, but the page you were looking for is not here. But, we're glad you're here! Please try searching the site archives below.", 'Zapachic'); ?></div>
        </div>
      </div><!--/box-->


      <div class="box2">

          <h4 style="font-size: 20px; font-weight: bold; letter-spacing: -1px;"><?php _e('Search the Site:', 'Zapachic'); ?></h4>
          <form id="searchform" method="get" action="<?php bloginfo('template_directory'); ?>">
          <input type="text" name="s" id="s" size="" value=""/>
          <input type="submit" style="cursor: pointer;" value="Search" onmouseover="style.cursor='pointer'"/>
        </form>

      </div>

      <div class="arclist box">
        <div class="box-inner">

        <h2><?php _e('The Last 30 Posts', 'Zapachic'); ?></h2>

        <ul>
          <?php query_posts('showposts=30'); ?>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> - <?php echo $post->comment_count ?> <?php _e('comments', 'Zapachic'); ?></li>

                    <?php endwhile; endif; ?>
        </ul>

        </div>
      </div><!--/box-->

      <div class="grid_5 alpha">

              <div class="arclist box">
                <div class="box-inner">

                    <h2>Categories</h2>

                    <ul>
                        <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>
                    </ul>

                </div>

        </div>
      </div><!--/grid_5 alpha-->

      <div class="grid_5 omega">

              <div class="arclist box">
                <div class="box-inner">

                    <h2>Monthly Archives</h2>

                    <ul>
                        <?php wp_get_archives('type=monthly&show_post_count=1') ?>
                    </ul>

                </div>
              </div>

      </div><!--/grid_5 omega-->

      <div class="fix"></div>

    </div><!--/centercol grid_10-->


<?php get_sidebar(); ?>

<?php get_footer(); ?>
