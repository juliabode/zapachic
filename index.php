<?php get_header(); ?>

    <div id="centercol" class="grid_10">

  <?php
  include(TEMPLATEPATH . '/includes/version.php');

  $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
          'post_type' => array( 'post', 'brands', 'shops'),
          'cat'       => $ex_vid . ',-' . $ex_aside,
          'orderby'   => 'post_date',
          'order'     => 'desc',
          'paged'     => $page
  );
  $the_query = new WP_Query($args);
  $wp_query->in_the_loop = true; // Need this for tags to work
  while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
?>

      <div class="box post-overview">
        <div class="box-inner">

        <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

        <div class="date-comments">
            <p class="fl"><span class="comments"><?php comments_popup_link('Comenta', '1 Comentario', '% Comentarios'); ?></span><?php edit_post_link('Editar!', ' | ', ''); ?></p>
            <p class="fr"><?php the_category(', ') ?></p>
        </div>

        <div>
          <div class="img left">
            <a href="<?php the_permalink() ?>">

              <?php if ( has_post_thumbnail() ) {
                      the_post_thumbnail();
                    } else { ?>

                      <?php

                           $_thumb = sprintf('<img src="%s/thumb.php?src=%s&amp;w=240&amp;h=240&amp;zc=1" alt="%s" height="240" width="240">',
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

        <span class="continue"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>">Seguir leyendo…</a></span>

        </div>

      </div>
  <?php endwhile; ?>

    <div class="box2 navigation">
      <div class="alignleft"><?php next_posts_link('← Older Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Newer Entries →') ?></div>
    </div>

    </div><!--/centercol-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>