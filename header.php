<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/960.css" media="screen" />

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('thrill_feedburner_url') <> "" ) { echo stripslashes(htmlspecialchars(get_option('thrill_feedburner_url'))); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 7]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
    <style type="text/css">#header .spacer{display:none !important;visibility:hidden !important;}</style>
    <![endif]-->

    <?php wp_enqueue_script('jquery'); ?>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>

    <?php if ( get_option('thrill_tinytitle') <> "" ) { ?><style type="text/css">#header h1{font-size:46px !important; letter-spacing:-4px !important; line-height:72px !important;}</style><?php } ?>

    <!-- Show custom logo -->
    <?php if ( get_option('thrill_logo') <> "" ) { ?><style type="text/css">#header h1{background: url(<?php echo stripslashes(htmlspecialchars(get_option('thrill_logo'))); ?>) no-repeat !important; } #header h1 a{ text-indent: -9999px !important; visibility: hidden !important;}</style><?php } ?>
    <?php if ( get_option('thrill_snapshot') <> "" ) { ?><style type="text/css">#header .spacer{background: url(<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo stripslashes(htmlspecialchars(get_option('thrill_snapshot'))); ?>&h=137&w=137&zc=1&q=95) no-repeat 0 0 !important; margin:-28px 0 0 !important; padding:28px 0 0 6px !important;}
  </style>
  <script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
  if (!document.getElementsByTagName) return false;
  var sfEls = document.getElementById("nav").getElementsByTagName("li");

  for (var i=0; i<sfEls.length; i++) {
    sfEls[i].onmouseover=function() {
      this.className+=" sfhover";
    }
    sfEls[i].onmouseout=function() {
      this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
    }
  }

}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script><?php } ?>

</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<?php
  $template_path = get_bloginfo('template_directory');
  $GLOBALS['defaultgravatar'] = $template_path . '/images/gravatar.jpg';
?>

<div id="background">

  <div id="top" class="container_16">
    <div class="grid_12">
      <?php zapachic_top_nav(); ?>
    </div>
  </div>

<div id="page" class="container_16">

  <div id="header">
        <?php if ( get_option('thrill_logo') <> "" ) { ?>
          <h1 class="grid_8" onclick="location.href='<?php echo get_option('home'); ?>'" onmouseover="style.cursor='pointer'"><img src="<?php echo get_option('thrill_logo') ?>" /></h1><
        <?php } else { ?>
          <h1 class="grid_8"><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('name'); ?>"><?php if ( get_option('thrill_title1') <> "" ) { ?><?php echo stripslashes(htmlspecialchars(get_option('thrill_title1'))); ?><span><?php echo stripslashes(htmlspecialchars(get_option('thrill_title2'))); ?></span><?php } else { echo bloginfo('name'); } ?></a></h1>
        <?php } ?>

    <div class="spacer grid_8">
      <?php if ( get_option('thrill_snapshot') <> "" ) { ?><img border="0" alt="" src="<?php bloginfo('template_directory'); ?>/images/snapshot-trans.png" style="margin: -38px 0pt 0pt -18px; float: left; left: 0px; position: relative; display: inline;"/><?php } ?>
      <span class="subscribe">Subscribe by:  <?php if ( get_option('thrill_feedburner_id') <> "" ) { ?><a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php $feedburner_id = get_option('thrill_feedburner_id'); echo $feedburner_id; ?>" target="_blank" title="Straight to Your Inbox">Email</a>  /  <?php } else {} ?><a href="<?php if ( get_option('thrill_feedburner_url') <> "" ) { echo stripslashes(htmlspecialchars(get_option('thrill_feedburner_url'))); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="Grab the Feed">RSS</a></span>

        <div id="tablecontainter">
          <div class="welcome">
          <span><?php if ( get_option('thrill_intromessage') <> "" ) { echo stripslashes(htmlspecialchars(get_option('thrill_intromessage'))); } ?></span>
          </div>
      </div>
    </div>
    <!--/spacer-->

  </div>
    <!--/header -->


<div class="separator"></div>

<div id="topmenu">

  <?php zapachich_bottom_nav(); ?>

  <ul><?php if (get_option('thrill_facebook') != "") { ?>
    <li class="fb">
      <a href="<?php echo stripslashes(htmlspecialchars(get_option('thrill_facebook'))); ?>">
        <img style="border: 0; padding: 0; margin: 0; vertical-align: middle;" src="http://www.google.com/s2/favicons?domain=www.facebook.com" alt="" /> Join the Community
      </a>
    </li><?php } ?>
  </ul>


</div>

<div class="separator margin-bottom-20"></div>
    <!--/topmenu-->

<?php if ( get_option('thrill_ie6') <> "" ) {} else { ?>
  <!--[if lt IE 7]>
  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative; margin: 0 10px 15px;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
        <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>
        <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>
      </div>
      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
    </div>
  </div>
  <![endif]-->
<?php } ?>