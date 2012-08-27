<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

    <div id="centercol" class="grid_10">

      <div class="arclist box">
        <div class="box-inner">

        <h2>Pages</h2>

        <ul>
          <?php wp_list_pages('depth=1&sort_column=menu_order&title_li='); ?>
        </ul>

        </div>
      </div><!--/arclist-->

      <div class="fix"></div>

      <div class="arclist box">
        <div class="box-inner">

        <h2>Categories</h2>

        <ul>
          <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>
        </ul>

        </div>
      </div><!--/arclist-->

      <div class="fix"></div>

      <div class="arclist box">
        <div class="box-inner">

      <?php

        $cats = get_categories();
        foreach ($cats as $cat) {

        query_posts('cat='.$cat->cat_ID);

      ?>

        <h2 style="margin-top:10px !important; padding:0px;"><?php echo $cat->cat_name; ?></h2>

        <ul>
            <?php while (have_posts()) : the_post(); ?>
            <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php _e('Comments', 'Zapachic'); ?> (<?php echo $post->comment_count ?>)</li>
            <?php endwhile;  ?>
        </ul>

    <?php } ?>

        </div>
      </div><!--/arclist-->

    </div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>