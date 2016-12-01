<?php
	get_header();
?>

<?php
	global $theblogger_sidebar;
	theblogger_sidebar_yes_no();
?>

<div id="main" class="site-main">
	<div class="layout-fixed">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<?php
					while ( have_posts() ) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<h1>Hotsheets</h1>
									<?php
										the_title('<h2 class="entry-title">', '</h2>');
									?>
									
									<div class="entry-meta">
										<span class="posted-on">
											<span class="prefix">
												<?php
													esc_html_e('Updated', 'theblogger');
												?>
											</span>
											<time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>">
												<?php
													echo get_the_date();
												?>
											</time>
										</span>
										
										<span class="entry-like">
											<?php
												if (function_exists('dot_irecommendthis'))
												{
													dot_irecommendthis();
												}
											?>
										</span>
										<?php
											edit_post_link(esc_html__('Edit', 'theblogger'),
															'<span class="edit-link">',
															'</span>');
										?>
									</div>
								</header>
								
								
								
								<div class="entry-content">
									
									<a href="<?php the_field('hot_sheet_file'); ?>">
										<i class="fa fa-file-pdf-o"></i>Download <?php the_title(); ?></a>
									<?php echo do_shortcode('[pdf-embedder url="' . get_field('hot_sheet_file') . '"]');?>
									
								</div>
								
								<?php
									if (get_the_tags() != "")
									{
										?>
											<div class="post-tags tagcloud">
												<?php
													the_tags("", ' ', "");
												?>
											</div>
										<?php
									}
								?>
								
							
							</article>
							
						<?php
					endwhile;
				?>
			</div>
		</div>
		

</div>

<?php
	get_footer();
?>