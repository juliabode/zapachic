<?php $show = get_option('thrill_show_ads_top'); ?>

<?php if ( $show ) { ?>

<div class="box2">
       
    <div class="ads"> 
                
        <a <?php do_action('thrill_external_ad_link'); ?> href="<?php echo "$dest_url[1]"; ?>"><img src="<?php echo "$img_url[1]"; ?>" alt="" /></a>

        <a <?php do_action('thrill_external_ad_link'); ?> href="<?php echo "$dest_url[2]"; ?>"><img src="<?php echo "$img_url[2]"; ?>" alt="" class="last" /></a>

    </div>

	<?php $show = get_option('thrill_show_ads_bottom'); ?>
	
		<?php if ( $show ) { ?>
			<div class="ads">    
				<a <?php do_action('thrill_external_ad_link'); ?> href="<?php echo "$dest_url[3]"; ?>"><img src="<?php echo "$img_url[3]"; ?>" alt="" /></a>
				<a <?php do_action('thrill_external_ad_link'); ?> href="<?php echo "$dest_url[4]"; ?>"><img src="<?php echo "$img_url[4]"; ?>" alt="" class="last" /></a>
			</div>
		<?php } ?>
			                
</div>
<!--/box2 -->

<?php } ?>