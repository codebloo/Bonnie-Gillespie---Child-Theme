<?php
/*
Template Name: FAQS
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
									<?php 

												// check for rows (parent repeater)
												if( have_rows('category') ): ?>
													<div id="allFAQs">
													<?php 

													// loop through rows (parent repeater)
													while( have_rows('category') ): the_row(); ?>
														<div class="faq_category">
															<h3><?php the_sub_field('category_name'); ?></h3>
															<?php 

															// check for rows (sub repeater)
															if( have_rows('faq_item') ): ?>
																<ul class="faq">
																<?php 

																// loop through rows (sub repeater)
																while( have_rows('faq_item') ): the_row();

																	// display each item as a list - with a class of completed ( if completed )
																	?>
																	<li>
																		<h4 class="question">
																			<i class="fa fa-plus"></i>
																			<i class="fa fa-minus"></i>
																			<?php the_sub_field('question'); ?>
																		</h4>
																		<div class="answer">
																			<?php the_sub_field('answer'); ?>
																		</div>
																	</li>
																<?php endwhile; ?>
																</ul>
															<?php endif; //if( get_sub_field('items') ): ?>
														</div>	

													<?php endwhile; // while( has_sub_field('to-do_lists') ): ?>
													</div>
												<?php endif; // if( get_field('to-do_lists') ): ?>
								</div>
							</article>
							
						
						<?php
					endwhile;
				?>
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

<script>// <![CDATA[
jQuery( ".answer" ).hide();
jQuery( ".question" ).click(function() {
	jQuery(this).toggleClass('active');
  jQuery(this).next('.answer').slideToggle( "slow", function() {
    // Animation complete.
  });
});
// ]]></script>

<?php
	get_footer();
?>