<?php
/*
Template Name: Hot Sheets
*/
?>

<?php
	get_header();
?>

<?php
	$theblogger_select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
?>

<div id="main" class="site-main">
	<div class="<?php if ($theblogger_select_page_sidebar != 'No Sidebar') { echo 'layout-medium'; } else { echo 'layout-fixed'; } ?>">
		<div id="primary" class="content-area <?php if ($theblogger_select_page_sidebar != 'No Sidebar') { echo 'with-sidebar'; } ?>">
			<div id="content" class="site-content" role="main">
				<header class="entry-header">
					<h1 class="entry-title">Hot Sheets</h1>
				</header>
				<div class="entry-content">
					<?php $custom_args = array(
					      'post_type' => 'hotsheets',
					      'posts_per_page' => 20
					    ); $the_query = new WP_Query( $custom_args ); ?>

					  <?php if ( $the_query->have_posts() ) : ?>
<ul>
					    <!-- the loop -->
					    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li>
								<a href="<?php the_field('hot_sheet_file');?>">
									<?php the_title(); ?>
								 </a>
		 						<div class="entry-meta">
		 							<span class="posted-on">
										<time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>">
											<?php	echo get_the_date();?>
		 								</time>
		 							</span>
		 							<span class="entry-like">
										<?php	if(function_exists('dot_irecommendthis')){dot_irecommendthis();}	?>
									</span>
								  <?php if ( get_field( 'mark_as_popular' ) ): ?>
									  <div class="popular_hotsheet">
										  <i class="fa fa-heart"></i> <span>Popular!</span>
										</div>
									<?php endif;?>
								</div>
							</li>
					    <?php endwhile; ?>
					    <!-- end of the loop -->

					 </ul>

					  <?php wp_reset_postdata(); ?>

					  <?php else:  ?>
					    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					  <?php endif; ?>
				  </div>
			  </div>
		  </div>
		
		<?php
			if ($theblogger_select_page_sidebar != 'No Sidebar')
			{
				theblogger_sidebar();
			}
		?>
	</div>
</div>

<?php
	get_footer();
?>