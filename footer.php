		<div class="fix"></div>
   
</div> <!--/#page .container_16-->

<div id="footer">
	
	<div class="container_16">
        <div class="grid_16">
            <p class="fl">Copyright &copy; <?php echo date('Y');?> <?php bloginfo('name'); ?></p>
            <p class="fr" style="color:#444;"><a href="http://thrillingheroics.com/ThrillingTheme" title="free premium WordPress theme" style="color:#444;">Premium WordPress Theme</a> design by <a href="http://thrillingheroicsconsulting.com/" title="WordPress business website design" style="color:#444;">Thrilling Heroics</a></p>
        </div>
	</div> <!-- end .container_16-->
  
</div>

</div> <!-- end #background -->

<?php wp_footer(); ?>

<?php if ( get_option('thrill_google_analytics') <> "" ) { echo stripslashes(get_option('thrill_google_analytics')); } ?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/jquery-1.2.1.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/tabs.js"></script>	

</body>
</html>