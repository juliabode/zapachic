<?php get_header(); ?>

    <div id="centercol" class="grid_10">

    <?php if (have_posts()) : ?>

        <div class="box">
          <div class="box-inner">

                    <?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->

                <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=195&amp;w=540&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" /></a>

          <?php } ?>

                <h2><?php the_title(); ?></h2><?php edit_post_link('Edit This Page!', '', '<br style="margin-bottom: 10px;" />'); ?>

                <?php while (have_posts()) : the_post(); ?>

                    <div class="post" id="post-<?php the_ID(); ?>">

                        <div class="entry">
                            <?php the_content(); ?>
                        </div>

                    </div><!--/post-->

                <?php endwhile; ?>
              </div>
            </div>

    <?php endif; ?>

    </div><!--/grid_10-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>