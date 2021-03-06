<?php // Do not delete these lines
  if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
      ?>

      <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'Zapachic'); ?></p>

      <?php
      return;
    }
  }

  /* This variable is for alternating comment background */
  $oddcomment = 'alt';
?>

<?php
  global $bm_comments;
  global $bm_trackbacks;

  split_comments( $comments );
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>


  <?php
    $trackbackcounter = count( $bm_trackbacks );
    $commentcounter = count( $bm_comments );
  ?>

  <h3 class="commh2"><?php echo $commentcounter; ?> <?php _e("Comments For This Post <span class=\"calltoaction\">I'd Love to Hear Yours!", 'Zapachic'); ?></span></h3>

  <ol class="commentlist">

  <?php foreach ($bm_comments as $comment) : ?>

    <li class="<?php echo $oddcomment; ?> <?php if(function_exists("author_highlight")) author_highlight(); ?>" id="comment-<?php comment_ID() ?>">

      <?php if (function_exists('get_avatar')) { ?>
        <span class='gravatar'>
        <?php echo get_avatar($comment, $size = '48', $default = $GLOBALS['defaultgravatar'] ); ?>
        </span>
      <?php } ?>

      <cite><?php comment_author_link() ?></cite> Says:
      <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.', 'Zapachic'); ?></em>
      <?php endif; ?>
      <br />

      <span class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j F Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','',''); ?></span>

      <?php comment_text() ?>

    </li>

  <?php /* Changes every other comment to a different class */
    if ('alt' == $oddcomment) $oddcomment = '';
    else $oddcomment = 'alt';
  ?>

  <?php endforeach; /* end for each comment */ ?>

  </ol>

  <?php if ( count( $bm_trackbacks ) > 0 ) { ?>

  <h3 class="commh2"><?php echo $trackbackcounter; ?> <?php _e('Trackbacks For This Post', 'Zapachic'); ?></h3>

  <ol class="commentlist">

  <?php foreach ($bm_trackbacks as $comment) : ?>

    <li class="<?php echo $oddcomment; ?> <?php if(function_exists("author_highlight")) author_highlight(); ?>" id="comment-<?php comment_ID() ?>">

      <cite><?php comment_author_link() ?></cite> Says:
      <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.', 'Zapachic'); ?></em>
      <?php endif; ?>
      <br />

      <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></small>

      <?php comment_text() ?>

    </li>

  <?php /* Changes every other comment to a different class */
    if ('alt' == $oddcomment) $oddcomment = '';
    else $oddcomment = 'alt';
  ?>

  <?php endforeach; /* end for each comment */ ?>

  </ol>

  <?php } ?>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?>
    <!-- If comments are open, but there are no comments. -->

   <?php else : // comments are closed ?>
    <!-- If comments are closed. -->
    <p class="nocomments"><?php _e('Comments are closed.', 'Zapachic'); ?></p>

  <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 class="commh2"><?php _e("Leave a Comment <span class=\"calltoaction\">Here's Your Chance to Be Heard!", 'Zapachic'); ?></span></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p class="alert">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p style="padding:5px 0px 10px 0px;"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p style="padding:5px 0px 10px 0px;"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Email (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

<p style="padding:5px 0px 10px 0px;"><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p style="padding:5px 0px 10px 0px;"><textarea name="comment" id="comment" style="width:97%;" rows="10" tabindex="4"></textarea></p>

<?php if (function_exists('show_subscription_checkbox')) { ?>
<p style="padding:5px 0px 10px 0px;"><?php show_subscription_checkbox(); ?></p>
<?php } ?>

<p style="padding:10px 0px 10px 0px;"><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" onmouseover="style.cursor='pointer'" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
