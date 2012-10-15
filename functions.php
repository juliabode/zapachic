<?php function thrillthemes_admin_head() { ?>
<style>

h2 { margin-bottom: 20px; }
.title { margin: 0px !important; background: #D4E9FA; padding: 10px; font-family: Georgia, serif; font-weight: normal !important; letter-spacing: 1px; font-size: 18px; }
.container { background: #EAF3FA; padding: 10px; }
.maintable { font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; background: #EAF3FA; margin-bottom: 20px; padding: 10px 0px; }
.mainrow { padding-bottom: 10px !important; border-bottom: 1px solid #D4E9FA !important; float: left; margin: 0px 10px 10px 10px !important; }
.titledesc { font-size: 14px; font-weight:bold; width: 220px !important; margin-right: 20px !important; }
.forminp { width: 700px !important; valign: middle !important; }
.forminp input, .forminp select, .forminp textarea { margin-bottom: 9px !important; background: #fff; border: 1px solid #D4E9FA; width: 500px; padding: 4px; font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; font-size: 12px; }
.forminp span { font-size: 10px !important; font-weight: normal !important; ine-height: 14px !important; }
.info { background: #FFFFCC; border: 1px dotted #D8D2A9; padding: 10px; color: #333; }
.forminp .checkbox { width:20px }
.info a { color: #333; text-decoration: none; border-bottom: 1px dotted #333 }
.info a:hover { color: #666; border-bottom: 1px dotted #666; }
.warning { background: #FFEBE8; border: 1px dotted #CC0000; padding: 10px; color: #333; font-weight: bold; }

</style>
<?php }

add_action('after_setup_theme', 'my_theme_setup');

function my_theme_setup(){
    load_theme_textdomain( 'Zapachic', get_template_directory() );
}

// VARIABLES

$themename = "Thrilling Theme";
$shortname = "thrill";
$manualurl = 'http://www.thrillingheroics.com/thrillingtheme';
$options = array();

$template_path = get_bloginfo('template_directory');

$layout_path = TEMPLATEPATH . '/layouts/';
$layouts = array();

$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

$ads_path = TEMPLATEPATH . '/images/ads/';
$ads = array();

$functions_path = TEMPLATEPATH . '/functions/';

$thrill_categories_obj = get_categories('hide_empty=0');
$thrill_categories = array();

$thrill_pages_obj = get_pages('sort_column=post_parent,menu_order');
$thrill_pages = array();

if ( is_dir($layout_path) ) {
  if ($layout_dir = opendir($layout_path) ) {
    while ( ($layout_file = readdir($layout_dir)) !== false ) {
      if(stristr($layout_file, ".php") !== false) {
        $layouts[] = $layout_file;
      }
    }
  }
}

if ( is_dir($alt_stylesheet_path) ) {
  if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) {
    while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
      if(stristr($alt_stylesheet_file, ".css") !== false) {
        $alt_stylesheets[] = $alt_stylesheet_file;
      }
    }
  }
}

if ( is_dir($ads_path) ) {
  if ($ads_dir = opendir($ads_path) ) {
    while ( ($ads_file = readdir($ads_dir)) !== false ) {
      if((stristr($ads_file, ".jpg") !== false) || (stristr($ads_file, ".png") !== false) || (stristr($ads_file, ".gif") !== false)) {
        $ads[] = $ads_file;
      }
    }
  }
}

foreach ($thrill_categories_obj as $thrill_cat) {
  $thrill_categories[$thrill_cat->cat_ID] = $thrill_cat->cat_name;
}

foreach ($thrill_pages_obj as $thrill_page) {
  $thrill_pages[$thrill_page->ID] = $thrill_page->post_title;
}

$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$categories_tmp = array_unshift($thrill_categories, "Select a category:");
$thrill_pages_tmp = array_unshift($thrill_pages, "Select a page:");

// THIS IS THE DIFFERENT FIELDS

$options = array (

        array(  "name" => "General Settings",
            "type" => "heading"),

        array(  "name" => "Theme Stylesheet",
            "desc" => "Please select your color scheme here.",
              "id" => $shortname."_alt_stylesheet",
              "std" => "",
              "type" => "select",
              "options" => $alt_stylesheets),

        array(  "name" => "Blog Title",
            "desc" => "Title part 1 (color A).",
            "id" => $shortname."_title1",
            "std" => "",
            "type" => "text"),
        array(  "desc" => "Title part 2 (color B).",
            "id" => $shortname."_title2",
            "std" => "",
            "type" => "text"),

        array(  "name" => "Long Blog Name?",
            "desc" => "If you've got a long blog title, check this to make your title text smaller.",
            "id" => $shortname."_tinytitle",
            "std" => "false",
            "type" => "checkbox"),

        array(  "name" => "Custom Header Logo",
            "desc" => "Paste the full URL of your custom logo image if you want to replace the title text above. You should upload a transparent PNG file no larger than 470x80 pixels and make sure to name it 'logo-trans.png' for best results.",
            "id" => $shortname."_logo",
            "std" => "",
            "type" => "text"),

        array(  "name" => "Snapshot Photo",
            "desc" => "Paste the image URL for your snapshot photo here, which will be resized to 137x137 pixels. Use JPG format for best results. Leave this field blank if you prefer NOT to have a polaroid photo in the header, OR copy and paste this URL if you want to use my built-in Thailand beach photo: ".$template_path."/images/krabi.jpg",
            "id" => $shortname."_snapshot",
            "std" => "",
            "type" => "text"),

        array(  "name" => "Welcome message",
            "desc" => "This is a short introductory message or bio that will appear at the top-right of your blog.",
              "id" => $shortname."_intromessage",
              "std" => "",
              "type" => "textarea"),

        array(  "name" => "Feedburner RSS URL",
            "desc" => "Enter your Feedburner URL here.",
              "id" => $shortname."_feedburner_url",
              "std" => "",
              "type" => "text"),

        array(  "name" => "Feedburner URI",
            "desc" => "Enter only your custom Feedburner extension (the part that comes after http://feeds2.feedburner.com/…)",
              "id" => $shortname."_feedburner_id",
              "std" => "",
              "type" => "text"),

        array(  "name" => "Google Analytics",
            "desc" => "Please paste your Google Analytics and any other tracking codes here. These scripts will be added in the page footer.",
              "id" => $shortname."_google_analytics",
              "std" => "",
              "type" => "textarea"),

        array(  "name" => "Featured Category",
              "desc" => "Select the category that you would like to have displayed in the featured tab in your Sidebar.",
            "id" => $shortname."_featured_category",
            "std" => "Select a category:",
            "type" => "select",
            "options" => $thrill_categories),

        array(  "name" => "Display author bio?",
            "desc" => "Display author info on single post pages. You add your bio under Users > Your Profile by adding text in 'Biographical Info'.",
            "id" => $shortname."_author",
            "std" => "false",
            "type" => "checkbox"),

        array(  "name" => "Disable IE Upgrade Message?",
            "desc" => "We support modern browsers and anyone who logs onto your site with IE6 or below will automatically see an integrated message box asking them to upgrade to the latest version of Firefox, Safari, Internet Explorer, or Chrome. Check this if you don't want to pester your visitors.",
            "id" => $shortname."_ie6",
            "std" => "false",
            "type" => "checkbox"),

        array(  "name" => "Disable ThrillingTheme Promo Message?",
            "desc" => "You'll earn good karma if you show your support by leaving the promo message activated in the post meta on your single post pages, but if you want to turn it off, just check this box.",
            "id" => $shortname."_promote",
            "std" => "false",
            "type" => "checkbox"),

        array(  "name" => "Social Network Integration",
            "type" => "heading"),

        array(  "name" => "Twitter Username",
            "desc" => "Add your Twitter username here if you would like to display your most recent status update.",
              "id" => $shortname."_twit_id",
              "std" => "",
              "type" => "text"),

        array(  "name" => "Twitter Avatar",
            "desc" => "Paste the full URL of your Twitter profile image here (right-click on it and copy image location). Use JPG format for best results.",
              "id" => $shortname."_twit_photo",
              "std" => "",
              "type" => "text"),

        array(  "name" => "Flickr ID",
            "desc" => "Use <a href='http://idgettr.com/'>idGettr to find it.",
              "id" => $shortname."_flickr_id",
              "std" => "",
              "type" => "text"),

        array(  "name" => "Number photos",
            "desc" => "Select the number of photos to display in Flickr sidebar box. (3 per row)",
              "id" => $shortname."_flickr_entries",
              "std" => "Select a Number:",
              "type" => "select",
              "options" => $other_entries),

        array(  "name" => "Facebook Group",
            "desc" => "Do you have a FB group or fan page? Add the hyperlink here to include a link in the header.",
              "id" => $shortname."_facebook",
              "std" => "",
              "type" => "text"),

        array(  "name" => "Banner Ad Management (300x250 MPU)",
            "type" => "heading"),

        array(  "name" => "Disable 300x250 MPU",
            "desc" => "Check this box if you wish to ignore the 300x250 MPU.",
            "id" => $shortname."_not_mpu",
            "std" => "false",
            "type" => "checkbox"),

        array(  "name" => "Display Only On Homepage?",
            "desc" => "Check this box if you wish to display this ad only on the homepage. ",
            "id" => $shortname."_home_only",
            "std" => "false",
            "type" => "checkbox"),

        array(  "name" => "300x250 Block Ad - Image Location",
            "desc" => "Enter the image URL for this block ad. Use JPG format for best results.",
            "id" => $shortname."_block_image",
            "std" => $template_path . "/images/300x250a.jpg",
            "type" => "text"),

        array(  "name" => "300x250 Block Ad - Destination",
            "desc" => "Enter the URL where this block ad points to.",
              "id" => $shortname."_block_url",
            "std" => "http://thrl.in/woo",
              "type" => "text"),

        array(  "name" => "Banner Ad Management (125x125 Top)",
            "type" => "heading"),

        array(  "name" => "Display two 125x125 ads at top of sidebar",
            "desc" => "Check this box if you would like to display top 2 banner ads in the sidebar.",
            "id" => $shortname."_show_ads_top",
            "std" => "false",
            "type" => "checkbox"),

        array(  "name" => "Banner Ad #1 - Image Location",
            "desc" => "Enter the image URL for this banner ad. Use JPG format for best results.",
            "id" => $shortname."_ad_image_1",
            "std" => $template_path . "/images/ad-125x125.gif",
            "type" => "text"),

        array(  "name" => "Banner Ad #1 - Destination",
            "desc" => "Enter the URL where this banner ad points to.",
              "id" => $shortname."_ad_url_1",
            "std" => "http://www.thrillingheroics.com",
              "type" => "text"),

        array(  "name" => "Banner Ad #2 - Image Location",
            "desc" => "Enter the image URL for this banner ad. Use JPG format for best results.",
            "id" => $shortname."_ad_image_2",
            "std" => $template_path . "/images/ad-125x125.gif",
            "type" => "text"),

        array(  "name" => "Banner Ad #2 - Destination",
            "desc" => "Enter the URL where this banner ad points to.",
              "id" => $shortname."_ad_url_2",
            "std" => "http://www.thrillingheroics.com",
              "type" => "text"),

        array(  "name" => "Banner Ad Management (125x125 Bottom)",
            "type" => "heading"),

        array(  "name" => "Display two 125x125 ads at bottom of sidebar",
            "desc" => "Check this box if you would like to display bottom 2 banner ads in the sidebar.",
            "id" => $shortname."_show_ads_bottom",
            "std" => "false",
            "type" => "checkbox"),

        array(  "name" => "Banner Ad #3 - Image Location",
            "desc" => "Enter the image URL for this banner ad. Use JPG format for best results.",
            "id" => $shortname."_ad_image_3",
            "std" => $template_path . "/images/ad-125x125.gif",
            "type" => "text"),

        array(  "name" => "Banner Ad #3 - Destination",
            "desc" => "Enter the URL where this banner ad points to.",
              "id" => $shortname."_ad_url_3",
            "std" => "http://www.thrillingheroics.com",
              "type" => "text"),

        array(  "name" => "Banner Ad #4 - Image Location",
            "desc" => "Enter the image URL for this banner ad. Use JPG format for best results.",
            "id" => $shortname."_ad_image_4",
            "std" => $template_path . "/images/ad-125x125.gif",
            "type" => "text"),

        array(  "name" => "Banner Ad #4 - Destination",
            "desc" => "Enter the URL where this banner ad points to.",
              "id" => $shortname."_ad_url_4",
            "std" => "http://www.thrillingheroics.com",
              "type" => "text"),

      );

// ADMIN PANEL

function thrillthemes_add_admin() {

   global $themename, $options;

  if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
          if($value['type'] != 'multicheck'){
                      update_option( $value['id'], $_REQUEST[ $value['id'] ] );
          }else{
            foreach($value['options'] as $mc_key => $mc_value){
              $up_opt = $value['id'].'_'.$mc_key;
              update_option($up_opt, $_REQUEST[$up_opt] );
            }
          }
        }

                foreach ($options as $value) {
          if($value['type'] != 'multicheck'){
                      if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); }
          }else{
            foreach($value['options'] as $mc_key => $mc_value){
              $up_opt = $value['id'].'_'.$mc_key;
              if( isset( $_REQUEST[ $up_opt ] ) ) { update_option( $up_opt, $_REQUEST[ $up_opt ]  ); } else { delete_option( $up_opt ); }
            }
          }
        }

        header("Location: admin.php?page=functions.php&saved=true");

      die;

    } else if ( 'reset' == $_REQUEST['action'] ) {
      delete_option('sandbox_logo');

      header("Location: admin.php?page=functions.php&reset=true");
      die;
    }

  }

add_menu_page($themename." Options", $themename." Options", 'edit_themes', basename(__FILE__), 'thrillthemes_page');

}

function thrillthemes_page (){

    global $options, $themename, $manualurl;

    ?>

<div class="wrap">

          <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

            <h2><?php echo $themename; ?> Options</h2>

            <?php if ( $_REQUEST['saved'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s Options has been updated!</div><?php } ?>
            <?php if ( $_REQUEST['reset'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?>'s Options has been reset!</div><?php } ?>

            <!--START: GENERAL SETTINGS-->

                <table class="maintable">

              <?php foreach ($options as $value) { ?>

                  <?php if ( $value['type'] <> "heading" ) { ?>

                    <tr class="mainrow">
                    <td class="titledesc"><?php echo $value['name']; ?></td>
                    <td class="forminp">

                  <?php } ?>

                  <?php

                    switch ( $value['type'] ) {
                    case 'text':

                  ?>

                          <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings($value['id']); } else { echo $value['std']; } ?>" />

                  <?php

                    break;
                    case 'select':

                  ?>

                          <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                            <?php foreach ($value['options'] as $option) { ?>
                              <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                            <?php } ?>
                          </select>

                  <?php

                    break;
                    case 'textarea':
                    $ta_options = $value['options'];

                  ?>

                    <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="8"><?php  if( get_settings($value['id']) != "") { echo stripslashes(get_settings($value['id'])); } else { echo $value['std']; } ?></textarea>

                  <?php

                    break;
                    case "radio":

                    foreach ($value['options'] as $key=>$option) {

                          $radio_setting = get_settings($value['id']);

                          if($radio_setting != '') {

                              if ($key == get_settings($value['id']) ) { $checked = "checked=\"checked\""; } else { $checked = ""; }

                          } else {

                            if($key == $value['std']) { $checked = "checked=\"checked\""; } else { $checked = ""; }
                  } ?>

                        <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />

                  <?php }

                    break;
                    case "checkbox":

                    if(get_settings($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; }

                  ?>

                        <input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />

                  <?php

                    break;
                    case "multicheck":

                    foreach ($value['options'] as $key=>$option) {

                        $thrill_key = $value['id'] . '_' . $key;
                        $checkbox_setting = get_settings($thrill_key);

                        if($checkbox_setting != '') {

                              if (get_settings($thrill_key) ) { $checked = "checked=\"checked\""; } else { $checked = ""; }

                        } else { if($key == $value['std']) { $checked = "checked=\"checked\""; } else { $checked = ""; }

                  } ?>

                        <input type="checkbox" class="checkbox" name="<?php echo $thrill_key; ?>" id="<?php echo $thrill_key; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $thrill_key; ?>"><?php echo $option; ?></label><br />

                  <?php }

                    break;
                    case "heading":

                  ?>

                    </table>

                          <h3 class="title"><?php echo $value['name']; ?></h3>

                    <table class="maintable">

                  <?php

                    break;
                    default:
                    break;

                  } ?>

                  <?php if ( $value['type'] <> "heading" ) { ?>

                    <?php if ( $value['type'] <> "checkbox" ) { ?><br/><?php } ?><span><?php echo $value['desc']; ?></span>
                    </td></tr>

                  <?php } ?>

              <?php } ?>

              </table>

              <p class="submit">
                <input name="save" type="submit" value="Save changes" />
                <input type="hidden" name="action" value="save" />
              </p>

              <div style="clear:both;"></div>

            <!--END: GENERAL SETTINGS-->

            </form>

</div><!--wrap-->

<div style="clear:both;height:20px;"></div>

 <?php

};

function thrillthemes_wp_head() {
     $style = $_REQUEST[style];
     if ($style != '') {
          ?> <link href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $style; ?>.css" rel="stylesheet" type="text/css" /><?php
     } else {
          $stylesheet = get_option('thrill_alt_stylesheet');
          if($stylesheet != ''){
               ?><link href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css" /><?php
          }
     }
}

add_action('wp_head', 'thrillthemes_wp_head');
add_action('admin_menu', 'thrillthemes_add_admin');
add_action('admin_head', 'thrillthemes_admin_head');

// OTHER FUNCTIONS

if ( function_exists('register_sidebar') )
    register_sidebars(3,array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div><!--/widget-->',
        'before_title' => '<h3 class="hl">',
        'after_title' => '</h3>',
    ));
                
register_sidebar(array(
            'name'=> 'Top Sidebar',
            'id' => 'top_sidebar',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            ));

// WP 3.0+ Featured Image support
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 250, 250, true ); // Normal post thumbnails
add_image_size( 'single-post-thumbnail', 150, 150 ); // Permalink thumbnail size



// Comment support in new & old WP
add_filter( 'comments_template', 'legacy_comments' );
function legacy_comments( $file ) {
  if ( !function_exists('wp_list_comments') )
    $file = TEMPLATEPATH . '/legacy.comments.php';
  return $file;
}

$bm_trackbacks = array();
$bm_comments = array();

function split_comments( $source ) {

    if ( $source ) foreach ( $source as $comment ) {

        global $bm_trackbacks;
        global $bm_comments;

        if ( $comment->comment_type == 'trackback' || $comment->comment_type == 'pingback' ) {
            $bm_trackbacks[] = $comment;
        } else {
            $bm_comments[] = $comment;
        }
    }
}


function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php }


add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
        if ( ! is_admin() ) {
                global $id;
                $comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
                return count($comments_by_type['comment']);
        } else {
                return $count;
        }
}



/** Get a TinyUrl
 * @author: René Ade
 * @link: http://www.rene-ade.de/inhalte/php-code-zum-erstellen-einer-tinyurl-ueber-tinyurl-com-api.html
 */
if ( !function_exists('fb_gettinyurl') ) {
  function fb_gettinyurl( $url ) {

    $fp = fopen( 'http://tinyurl.com/api-create.php?url=' . $url, 'r' );
    if ( $fp ) {
      $tinyurl = fgets( $fp );
      if( $tinyurl && !empty($tinyurl) )
        $url = $tinyurl;
      fclose( $fp );
    }

    return $url;
  }
}
                

add_filter('login_errors',create_function('$a', "return null;"));
remove_action('wp_head','wp_generator');

function brand_custom_init() {
    $args = array( 'public' => true, 'label' => 'Brands', 'rewrite' => array('slug' => 'marca'), 'supports' => array('title', 'editor', 'thumbnail', 'comments'), 'taxonomies' => array('category') );
    register_post_type( 'brands', $args );
}
add_action( 'init', 'brand_custom_init' );

function shop_custom_init() {
    $args = array( 'public' => true, 'label' => 'Shops', 'rewrite' => array('slug' => 'tienda'), 'supports' => array('title', 'editor', 'thumbnail', 'comments'), 'taxonomies' => array('category') );
    register_post_type( 'shops', $args );
}
add_action( 'init', 'shop_custom_init' );


function getImageForThumb($num) {
  global $more;
  $more = 1;
  $content = get_the_content();
  $count = substr_count($content, '<img');
  $start = 0;
  if ($count > 0) {
    for($i=1;$i<=$count;$i++) {
      $imgBeg = strpos($content, '<img', $start);
      $post = substr($content, $imgBeg);
      $imgEnd = strpos($post, '>');
      $postOutput = substr($post, 0, $imgEnd+1);
      $image[$i] = $postOutput;
      $start=$imgEnd+1;

      $cleanF = strpos($image[$num],'src="')+5;
      $cleanB = strpos($image[$num],'"',$cleanF)-$cleanF;
      $imgThumb = urlencode(substr($image[$num],$cleanF,$cleanB));
    }
  } else {
    $image[1] = '<img';
    $imgThumb = get_bloginfo('template_url') . '/images/default_thumb.jpg';
  }
  if(stristr($image[$num],'<img')) { return $imgThumb; }
  $more = 0;
}

/* Clean-up */

/* Display all post types on homepage */

add_filter( 'pre_get_posts', 'get_custom_posts' );

function get_custom_posts( $query ) {

  if ( (is_home() || is_archive()) && $query->is_main_query() ) {
    $query->set( 'post_type', array( 'post', 'brands', 'shops' ) );
  }

  return $query;
}

/* Custom Menu */

add_action( 'init', 'register_my_menus' );

function register_my_menus() {

  register_nav_menus( array(
      'top-menu'    => 'Top Nav Menu',
      'bottom-menu' => 'Bottom Nav Menu' )
  );

}

function zapachic_top_nav() {

  wp_nav_menu( array(
    menu           => 'top_menu',
    theme_location => 'top-menu',
    menu_class     => 'nav1',
    depth          => 1 )
  );

}

function zapachich_bottom_nav() {

  wp_nav_menu( array(
    menu           => 'bottom_menu',
    theme_location => 'bottom-menu',
    menu_id        => 'nav',
    menu_class     => 'grid_15' )
  );

}
                
                // Get URL of first image in a post
                function catch_that_image() {
                    global $post, $posts;
                    $first_img = '';
                    ob_start();
                    ob_end_clean();
                    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
                    $first_img = $matches [1] [0];
                    
                    // no image found display default image instead
                    if(empty($first_img)){ 
                        $first_img = get_template_directory_uri() . "/images/default.jpg";
                    }
                    return $first_img;
                }
                
            


?>