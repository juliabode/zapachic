<?php $no_show = get_option('thrill_not_mpu'); ?>

<?php if ( !$no_show ) { ?>

<?php $show_home_only = get_option('thrill_home_only'); ?>

<?php 

	if ( $show_home_only ) { 
	
		if ( is_home() ) {

?>

<div class="box2">

    <div id="mpu_banner">
  
		<?php
                    
            // Get block code //
            $block_img = get_option('thrill_block_image');
            $block_url = get_option('thrill_block_url');
                
        ?>
                
        <a <?php do_action('thrill_external_ad_link'); ?> href="<?php echo "$block_url"; ?>"><img src="<?php echo "$block_img"; ?>" alt="" /></a>

    </div>
    
</div>

<?php } } else { ?>

<div class="box2">

    <div id="mpu_banner">
      
        <?php
                    
            // Get block code //
            $block_img = get_option('thrill_block_image');
            $block_url = get_option('thrill_block_url');
                
        ?>
                
        <a <?php do_action('thrill_external_ad_link'); ?> href="<?php echo "$block_url"; ?>"><img src="<?php echo "$block_img"; ?>" alt="" /></a>
    
    </div>
    
</div>

<?php } } ?>