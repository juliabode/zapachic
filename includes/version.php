<?php
		$version = get_bloginfo('version');

		if ($version > "2.3") { 
		
			$featuredcat = get_option('thrill_featured_category'); // ID of the Featured Category
			$ex_feat = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$featuredcat'");
	
			$showposts = get_option('thrill_other_entries'); // Number of other entries to be shown
		
		} else {
		
			$featuredcat = get_option('thrill_featured_category'); // ID of the Featured Category
			$ex_feat = $wpdb->get_var("SELECT cat_ID FROM $wpdb->categories WHERE cat_name='$featuredcat'");

			$showposts = get_option('thrill_other_entries'); // Number of other entries to be shown
		
		}

		$archives = get_option('thrill_archives'); // Name of the archives page
		$GLOBALS['archives_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$archives'");
		
?>