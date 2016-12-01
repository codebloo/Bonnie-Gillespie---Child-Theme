<?php
	get_header();
?>

<?php
	global $theblogger_sidebar;
	theblogger_sidebar_yes_no();
?>

<div id="main" class="site-main">
	<div class="<?php if ($theblogger_sidebar != "") { echo 'layout-medium'; } else { echo 'layout-fixed'; } ?>">
		<div id="primary" class="content-area <?php echo esc_attr( $theblogger_sidebar ); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					while ( have_posts() ) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<?php
										the_title('<h1 class="entry-title">', '</h1>');
									?>
									
									<div class="entry-meta">
										<span class="posted-on">
											<span class="prefix">
												<?php
													esc_html_e('on', 'theblogger');
												?>
											</span>
											<time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>">
												<?php
													echo get_the_date();
												?>
											</time>
										</span>
										
										<?php
											if (get_comments_number())
											{
												?>
													<span class="comment-link">
														<span class="prefix">
															<?php
																esc_html_e('with', 'theblogger');
															?>
														</span>
														<?php
															comments_popup_link(esc_html__('0 Comments', 'theblogger'),
																				esc_html__('1 Comment', 'theblogger'),
																				esc_html__('% Comments', 'theblogger'),
																				"",
																				'Comments Off');
														?>
													</span>
												<?php
											}
										?>
										
										<span class="cat-links">
											<span class="prefix">
												<?php
													esc_html_e('in', 'theblogger');
												?>
											</span>
											<?php
												the_category(' ');
											?>
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
								
								<?php
									if (has_post_thumbnail())
									{
										?>
											<div class="featured-image">
												<?php
													the_post_thumbnail('theblogger_image_size_1');
												?>
											</div>
										<?php
									}
								?>
								
								<div class="entry-content">
									<?php theblogger_content(); ?>
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
								
								<?php
									theblogger_share_links();
								?>
								
								<?php
									theblogger_single_navigation();
								?>
								
								<?php
									theblogger_about_author();
								?>
								
								<?php
									theblogger_related_posts();
								?>
							</article>
							
							<?php
								comments_template("", true);
							?>
						<?php
					endwhile;
				?>
			</div>
		</div>
		
		<?php
			if ($theblogger_sidebar != "")
			{
				theblogger_sidebar();
			}
		?>
	</div>
</div>

<?php
	get_footer();
?>