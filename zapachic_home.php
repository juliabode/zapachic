<?php
    /**
     * Template Name: Home Page
     *
     * Home Page
     */
    ?>

<?php get_header(); ?>

<div id="slider_home">

<!-- <?php dynamic_sidebar( 'top_sidebar' ); ?> -->





</div>

<div id="centercol" class="grid_10">

<!-- MovingBoxes Slider -->
<ul id="slider">

<?php
    global $post;
    $args = array( 'numberposts' => 4  );
    $myposts = get_posts( $args );
    foreach( $myposts as $post ) :	setup_postdata($post); ?>

<li>
<a rel="bookmark" href="<?php the_permalink(); ?>">
<img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>"/>  
</a>
<p style="height:20px;text-align:center;"><a rel="bookmark" href="<?php the_permalink(); ?>" style="color:#555;font-size:0.8em;"><?php the_title(); ?></a></p>
</li>
<?php endforeach; ?>


</ul><!-- end Slider #1 -->

<?php
    include(TEMPLATEPATH . '/includes/version.php');
    
    $page = (get_query_var('page')) ? get_query_var('page') : 1;
    $args = array(
                  'post_type' => array( 'post', 'brands', 'shops'),
                  'cat' => $ex_vid . ',-' . $ex_aside,
                  'orderby' => 'post_date',
                  'order' => 'desc',
                  'paged' => $page
                  );
    $the_query = new WP_Query($args);
    $wp_query->in_the_loop = true; // Need this for tags to work
    while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
    ?>

<div class="box post-overview">
<div class="box-inner">

<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<div class="date-comments" style="padding-bottom:7px;">

</div>

<div>
<div class="img left">
<a href="<?php the_permalink() ?>">

<?php if ( has_post_thumbnail() ) {
    the_post_thumbnail();
} else { ?>

<?php
    
    $_thumb = sprintf('<img src="%s/thumb.php?src=%s&amp;w=300&amp;h=260&amp;zc=1" alt="%s" height="260" width="300">',
                      get_bloginfo('template_directory'),
                      getImageForThumb('1'),
                      get_the_title($_post_id)
                      );
    
    ?>
<?php print($_thumb); ?>
<?php } ?>
</a>

</div>

<div class="entry">
<?php if (function_exists('digg_this_button')) { ?><div style="float: left;"><?php digg_this_button(); ?></div><?php } ?>
<?php the_excerpt(); ?>
</div>
</div>

<span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Sigue leyendo…</a></span>

</div>

</div>
<?php endwhile; ?>

<div class="box2 navigation">
<div class="alignleft"><?php next_posts_link('← Older Entries',0) ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries →',0) ?></div>
</div>


</div><!--/centercol-->



<?php get_sidebar(); ?>

<?php get_footer(); ?>