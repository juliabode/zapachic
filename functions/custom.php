<?php 

// Custom fields for WP write panel
// This code is protected under Creative Commons License: http://creativecommons.org/licenses/by-nc-nd/3.0/

$thrill_metaboxes = array(
		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Featured Image URL",
			"type" 		=> "text",
			"desc"      => "Upload your image with the 'Add Media' button above the post window, copy the Image URL and paste it here."
		),
	);
	
function thrillthemes_meta_box_content() {
	global $post, $thrill_metaboxes;
	echo '<table>'."\n";
	foreach ($thrill_metaboxes as $thrill_metabox) {
		$thrill_metaboxvalue = get_post_meta($post->ID,$thrill_metabox["name"],true);
		if ($thrill_metaboxvalue == "" || !isset($thrill_metaboxvalue)) {
			$thrill_metaboxvalue = $thrill_metabox['default'];
		}
		echo "\t".'<tr>';
		echo "\t\t".'<th style="text-align: right;"><label for="'.$thrill_metabox.'">'.$thrill_metabox['label'].':</label></th>'."\n";
		echo "\t\t".'<td><input size="70" type="'.$thrill_metabox['type'].'" value="'.$thrill_metaboxvalue.'" name="thrillthemes_'.$thrill_metabox["name"].'" id="'.$thrill_metabox.'"/></td>'."\n";
		echo "\t".'</tr>'."\n";
		echo "\t\t".'<tr><td colspan="2"><span style="font-size:11px">'.$thrill_metabox['desc'].'</span></td></tr>'."\n";				
	}
	echo '</table>'."\n\n";
}

function thrillthemes_metabox_insert($pID) {
	global $thrill_metaboxes;
	foreach ($thrill_metaboxes as $thrill_metabox) {
		$var = "thrillthemes_".$thrill_metabox["name"];
		if (isset($_POST[$var])) {
			add_post_meta($pID,$thrill_metabox["name"],$_POST[$var],true) or update_post_meta($pID,$thrill_metabox["name"],$_POST[$var]);
		}
	}
}

function thrillthemes_meta_box() {
	if ( function_exists('add_meta_box') ) {
		add_meta_box('thrillthemes-settings',$GLOBALS['themename'].' Custom Settings','thrillthemes_meta_box_content','post','normal');
		add_meta_box('thrillthemes-settings',$GLOBALS['themename'].' Custom Settings','thrillthemes_meta_box_content','page','normal');
	}
}

add_action('admin_menu', 'thrillthemes_meta_box');
add_action('wp_insert_post', 'thrillthemes_metabox_insert');
?>