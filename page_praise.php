<?php
/*
Template Name: Praise
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
							<?php	the_title('<h1 class="entry-title">', '</h1>');?>
						</header>
						<div class="entry-content">
							<div class="praise_list">
							<?php if( have_rows('praise') ): while( have_rows('praise') ): the_row(); ?>
								<div class="single_praise clearfix">  							
								  <?php if(get_sub_field('video_id')):?>
								  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php the_sub_field('video_id');?>?rel=0" frameborder="0" allowfullscreen></iframe>  
								  <?php endif;?>
											  
								<?php if(!get_sub_field('video_id')):?>
								<div class="quote_pic">
								<?php $image = wp_get_attachment_image_src(get_sub_field('photo'), 'logos'); ?>
								<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_sub_field('photo')) ?>" class="scale-with-grid" />
								</div>
								<?php endif;?>
								
								  
<div class="<?php if(get_sub_field('video_id')):?>quote_details_full<?php else:?>quote_details<?php endif;?>">

 <?php if(get_sub_field('quote')):?>								
	<div class="quote_text">	
	  <?php the_sub_field('quote');?>
	</div>
<?php endif;?>
												
<p class="testimonial_name">
  <?php the_sub_field('name');?>
  <?php if(get_sub_field('location')):?>
  <span>, <?php the_sub_field('location');?></span>
	<?php endif;?>
</p>
</div>
</div>
<?php endwhile; endif; ?>	
</div>
	</div>
			</article>
		<?php endwhile; ?>
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