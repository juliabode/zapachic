<?php
/*
Template Name: Image Gallery
*/
?>

<?php get_header(); ?>

    <div id="centercol" class="grid_10">

      <h3><?php the_title(); ?></h3>

      <div class="imagegallery arclist box">
        <div class="box-inner">

            <?php query_posts('showposts=16'); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                <a title="Click here to read the story" href="<?php the_permalink() ?>"><img alt="<?php the_title_attribute(); ?>" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&h=180&w=255&zc=1&q=95" style="margin:5px;"/></a>
              <?php } ?>

            <?php endwhile; endif; ?>
        </div>
      </div><!--/imagegallery-->

    </div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>