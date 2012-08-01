<?php get_header(); ?>

    <div id="centercol" class="grid_10">

      <div class="box">
        <div class="box-inner">

          <h3><em>Error 404 |</em> Page Not Found!</h3>
          <div>Sorry, but the page you were looking for is not here. But, we're glad you're here! Please try searching the site archives below.</div>
        </div>
      </div><!--/box-->


      <div class="box2">

        <img border="0" src="<?php bloginfo('template_directory'); ?>/images/search-trans.png" alt="search" style="padding: 6px 10px 0pt 0pt; float: left; vertical-align: middle;"/>
          <h4 style="font-size: 20px; font-weight: bold; letter-spacing: -1px;">Search the Site:</h4>
          <form id="searchform" method="get" action="<?php bloginfo('template_directory'); ?>">
          <input type="text" name="s" id="s" size="" value=""/>
          <input type="submit" style="cursor: pointer;" value="Search" onmouseover="style.cursor='pointer'"/>
        </form>

      </div>

      <div class="arclist box">
        <div class="box-inner">

        <h2>The Last 30 Posts</h2>

        <ul>
          <?php query_posts('showposts=30'); ?>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php the_time('j F Y') ?> - <?php echo $post->comment_count ?> comments</li>

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
