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
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<?php
										the_title('<h1 class="entry-title">', '</h1>');
									?>
								</header>
								
<div class="entry-content">
									<?php if( have_rows('hot_sheets') ): ?>
 										<ul>
 										  <?php while( have_rows('hot_sheets') ): the_row(); ?>
											  <li>
												  <a href="<?php the_sub_field('hot_sheet_file');?>">
													  <?php the_sub_field('hot_sheet_name');?>
												  </a>
												 
													  <div class="popular_hotsheet">
<?php	if(function_exists('dot_irecommendthis')){dot_irecommendthis();}	?>
<?php if ( get_sub_field( 'mark_as_most_popular' ) ): ?>
	<span>Most Popular!</span>
<?php endif;?>
														</div>
												</li>
										  <?php endwhile; ?>
 										    </ul>
										<?php endif; ?>
										
								</div>
							</article>
						<?php	endwhile; ?>
					</div>
				</div>
		
		<?php if ($theblogger_select_page_sidebar != 'No Sidebar'){theblogger_sidebar();}?>
	</div>
</div>

<?php
	get_footer();
?>