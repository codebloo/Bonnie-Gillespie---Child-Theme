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
									<?php
										the_title('<h1 class="entry-title">', '</h1>');
									?>
									
									<div class="entry-meta">
									
										
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
											<span>VERONA: TAXONOMY name here</span>
										</span>
										
										<?php
											edit_post_link(esc_html__('Edit', 'theblogger'),
															'<span class="edit-link">',
															'</span>');
										?>
									</div>
								</header>
								
							
								
								<div class="entry-content">
									<?php theblogger_content(); ?>
									
									
									<!-- Flexible Content -->
								<?php	?>
									
									
									<?php
								// check if the flexible content field has rows of data
									if( have_rows('course_content') ):
								// loop through the rows of data
									while ( have_rows('course_content')): the_row();
										 if( get_row_layout() == 'video_embed' ): ?>
										
<div class="col-xs-12">
	<div class="embed_video">

<?php $embed_video = get_sub_field('video_shortcode_content'); ?>
<?php echo do_shortcode('[video mp4="'. $embed_video .'" preload="yes" autoplay="no"]');?>			
	</div>
</div>
										
<?php elseif( get_row_layout() == 'audio_embed' ): ?>
									
<div class="col-xs-12">
	<div class="embed_audio">								
<?php $embed_audio = get_sub_field('audio_shortcode_content');?>
<?php echo do_shortcode('[sc_embed_player_template1 fileurl="'. $embed_audio .'"]');?>		
	</div>
</div>
								<?php elseif( get_row_layout() == 'columns_for_text' ):
													 if(get_sub_field('columns') == "1") : ?>

										        <div class="col-xs-12">
										          <?php the_sub_field('first_text');?>
										        </div>

										      <?php elseif(get_sub_field('columns') == "2"): ?>
												<div class="row">
										        <div class="col-xs-12 col-sm-6">
										          <?php the_sub_field('first_text'); ?>
										        </div>
												  <div class="col-xs-12 col-sm-6">
												    <?php the_sub_field('second_texty'); ?>
										        </div>
											  </div>

										      <?php endif;?>

										 <?php endif; //get_row_layout

									    endwhile;

									else :

									    // no layouts found

									endif;

									?>
									
									<!-- /Flexible Content -->
									
								</div>
								
							<?php theblogger_single_navigation();?>
					
							</article>
							
							<?php
								comments_template("", true);
							?>
						<?php
					endwhile;
				?>
			</div>
		</div>
		
		
	</div>
</div>

<?php
	get_footer();
?>