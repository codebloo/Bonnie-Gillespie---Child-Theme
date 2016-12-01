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
					<h1 class="entry-title">All Dojo Clases</h1>
				</header>
				<div class="entry-content">
				

					    <section class="all_classes clearfix">

		 
					 <?php
					 global $post;
					 $args = array( 'numberposts' => -1,  'post_type' => 'classes' );
					 $myposts = get_posts( $args );?>
 
					 <?php $i = 0;?>
					<?php foreach( $myposts as $post ) :  setup_postdata($post); ?>
		 
		 
						<article id="post-<?php the_ID(); ?>" class="portfolio-post clearfix item-<?php echo (($i++) % 4) + 1 ?>">	
									<a href="<?php the_permalink();?>">
										<h4><?php the_title();?></h4>
										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail('insta', array('class' => 'scale-with-grid'));
										}?>
									</a>
								</article>
					 <?php endforeach;?>	
							 <?php $i++;?>
		
						<?php wp_reset_postdata(); ?>
					</section>
					
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