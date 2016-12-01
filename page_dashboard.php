<?php
/*
Template Name: Dashboard
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
				<?php while (have_posts()) : the_post();?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<?php
										the_title('<h1 class="entry-title">', '</h1>');
									?>
								</header>
								
								<div class="entry-content">
									<?php the_content();?>
									
									<div class="available_classes">	
										<h2>All Classes</h2>
									<?php if( have_rows('class_link') ): ?>
									<ul class="class_list">
									<?php while( have_rows('class_link') ): the_row();?>
									<li class="col-xs-12 col-md-4">
										<h3><?php the_sub_field('class_name'); ?></h3>
										<div class="class_image">
											<?php $image = wp_get_attachment_image_src(get_sub_field('class_image'), 'full'); ?>
											<img src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('class_name'); ?>" class="scale-with-grid"/>
										
										</div>
										<div class="class_price">
											<?php the_sub_field('class_price'); ?>
										</div>
										<div class="class_short_description">
											<?php the_sub_field('class_short_description'); ?>
										</div>
										<div class="class_url">
											<a href="<?php the_sub_field('class_url'); ?>" class="button">Let's Go!</a>
										</div>
									</li>
								<?php endwhile; ?>
								</ul>
							<?php endif; //if( get_sub_field('items') ): ?>
						</div>	
					</article>
							
						
						<?php endwhile;	?>
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