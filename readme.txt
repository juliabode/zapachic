ThrillingTheme is a WordPress theme based on FreshNews Theme by http://www.woothemes.com/
Copyright (C) 2009 WooThemes/Magnus Jepson modified by Cody McKibben

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

----


/// Installation ///

Please see full directions at http://www.thrillingheroics.com/thrillingtheme

   1. Upload the entire 'ThrillingTheme' directory via FTP to your server and place it in the '/wp-content/themes/' folder.
   2. Log into your WordPress admin panel and click on the Appearance > Themes tab. Now click on the Thrilling Theme  to activate it.
   3. Note: When first activating the theme, the preview pane may show that the theme contains "errors", but this is only because you haven't configured the theme options yet.
   4. Complete all of the required inputs on the Thrilling Theme Options page (in the WP admin panel) and click "Save Changes".





/// Change Log ////

    * Oct 28, 2009 1.0.0
          o Theme released
    * Oct 29, 2009 1.0.1
          o Updated header.php, functions.php & sidebar.php to fix updated FeedBurner email subscription handling.
    * Oct 30, 2009 1.0.2
          o Removed get_avatar() option from Theme Options page to eliminate conflict with WordPress core.
    * Nov 4, 2009 1.0.3
          o Removed legacy code for asides_category & video_category, which caused issues in archives listings.
          o Incorporated <a href="http://raamdev.com/" title="">Raam Dev's</a> rewrite of sidebar.php Twitter call using cURL. <strong>If you still have trouble with Twitter updates, try reversing this fix found here: http://pastie.org/677368</strong>
    * Nov 8, 2009 1.0.4
          o Fixed shortcode PHP line endings in header.php that cause parsing errors in some installations.
    * Nov 10, 2009 1.0.5
          o Fixed header so categories used in the nav bar don't wrap in to the main content area.
          o Updated styling on the welcome message in the header so it properly centers vertically no matter how much text you enter! :)
    * Nov 14, 2009 1.0.6
          o Added complete GNU General Public License information to properly attribute copyright of original FreshNews Theme files to <a href="http://www.woothemes.com/" title="">WooThemes/Magnus Jepson</a>. Thanks for an incredible GPL licensed theme framework guys.
          o Reformatted promo box & tags in the post meta of single post pages.
          o Changed default 300x250 ad slot to point to WooThemes.com
          o Properly escaped all database queries in header, sidebar & single page with stripslashes() call.
    * Nov 30, 2009 1.1
          o Categories in the navbar are now ordered by count (# of posts in each cat).
          o Min-width set to background for rare cases where background image doesn't extend the whole width of the window.
          o Attribution to FreelanceWP.com
          o Support for WP 2.7+ nested comments
    * Sep 11, 2010 1.1.1
          o Comment-count # and trackback count # fixed.
          o Suckerfish.js error in IE 7 & 8 resolved.
    * Oct 24, 2010 1.2
          o WP3.0 integration—theme will now display default WordPress "Featured Images" through the Dashboard panel OR through the traditional 2.7 method with Custom Fields.



