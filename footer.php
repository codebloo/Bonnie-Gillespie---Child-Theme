        <footer id="colophon" class="site-footer" role="contentinfo">


			<div class="logo_slider">
				<?php $images = get_field('logos', 'options'); if( $images ): ?>
		        <?php foreach( $images as $image ): ?>
		            <div class="single_logo">
		            	<img src="<?php echo $image['sizes']['logos']; ?>" alt="<?php echo $image['alt']; ?>" />
		            </div>
		        <?php endforeach; endif; ?>
			</div>	
			
			<?php
				if (is_active_sidebar('theblogger_sidebar_5'))
				{
					?>
						<div class="footer-subscribe">
							<div class="layout-medium clearfix">
								<div class="col-xs-12 col-sm-6">
									<?php
										dynamic_sidebar('Bon-Blast');
									?>
								</div>
								<div class="col-xs-12 col-sm-6">
									<?php
										dynamic_sidebar('theblogger_sidebar_5');
									?>
								</div>
								
							</div>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('theblogger_sidebar_6'))
				{
					?>
						<div class="footer-insta">
							<?php
								dynamic_sidebar('theblogger_sidebar_6');
							?>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('theblogger_sidebar_9') || is_active_sidebar('theblogger_sidebar_10') || is_active_sidebar('theblogger_sidebar_11') || is_active_sidebar('theblogger_sidebar_12'))
				{
					?>
						<div class="footer-widgets widget-area">
							<div class="layout-medium">
								<div class="row">
									<div class="col-sm-6 col-lg-3">
										<?php
											dynamic_sidebar('theblogger_sidebar_9');
										?>
									</div>
									<div class="col-sm-6 col-lg-3">
										<?php
											dynamic_sidebar('theblogger_sidebar_10');
										?>
									</div>
									<div class="col-sm-6 col-lg-3">
										<?php
											dynamic_sidebar('theblogger_sidebar_11');
										?>
									</div>
									<div class="col-sm-6 col-lg-3">
										<?php
											dynamic_sidebar('theblogger_sidebar_12');
										?>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('theblogger_sidebar_7'))
				{
					?>
						<div class="site-info">
							<?php
								dynamic_sidebar('theblogger_sidebar_7');
							?>
						</div>
					<?php
				}
			?>
		</footer>
	</div>
    
	<?php
		wp_footer();
	?>
	<script>

	</script>
	
</body>
</html>