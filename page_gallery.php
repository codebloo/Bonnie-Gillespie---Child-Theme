<?php
/*
Template Name: Gallery
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
			  
						  <?php $images = get_field('red_carpet_gallery'); if( $images ): ?>
						  <div class="red_carpet clearfix">
							  	<ul class="red_carpet_gallery clearfix">
							        <?php foreach( $images as $image ): ?>
										  	<li class="grid-item">
										  		<div class="single_picture">
										  			<div class="mask">
										  				<a class="popme" href="<?php echo $image['url']; ?>">
												 			<span class="overlay">
																<i class="fa fa-expand"></i>
															</span>
										  				</a>
										  			</div>
										  			<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="scale-with-grid"/>
										  		</div>
										  	</li>
							        <?php endforeach; ?>
							    </ul>
						  </div>
						  <?php endif; ?>
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
<script>
jQuery(document).ready(function($){

	// init Masonry
	var $grid = $('.red_carpet_gallery').masonry({
	  columnWidth: 'li',
		itemSelector: '.grid-item'	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
	  $grid.masonry('layout');
	});
	
});

</script>
<?php
	get_footer();
?>