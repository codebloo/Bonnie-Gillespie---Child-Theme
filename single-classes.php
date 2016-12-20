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
						
						<?php if(has_tag('overview')):?>
							This is an overview page
						<?php else: ?>
						
													<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
														<header class="entry-header">
															<?php
																the_title('<h1 class="entry-title">', '</h1>');
															?>
									
										
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
																	$terms = get_the_terms( $post->ID, 'courses' );
																	if ($terms) {
																	    foreach($terms as $term) {
																	      echo $term->name;
																	    } 
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


						<?php elseif( get_row_layout() == 'youtube' ): ?>
									
						<div class="col-xs-12">
							<div class="youtube">								
								<div class="video-container">
									<iframe width="853" height="480" src="https://www.youtube.com/embed/<?php the_sub_field('video_id');?>?rel=0" frameborder="0" allowfullscreen></iframe>
								</div>
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
								
							
													<!-- custom nav between lessons -->
							
						<nav class="nav-single">
							<?php $post_object = get_field('previous_lesson');
									if( $post_object ): 
										// override $post
										$post = $post_object;
										setup_postdata( $post ); ?>
	   
								<div class="nav-previous">
							 		<a class="nav-image-link" href="<?php the_permalink();?>">
							 			<img alt="<?php the_title();?>" src="http://www.placehold.it/300x300.jpg">
							 		</a>
							 		<div class="nav-desc">
							 			<h4>Previous Lesson</h4>
							 			<a href="<?php the_permalink();?>" rel="prev">
							 			<span class="meta-nav">←</span> 
							 				<?php the_title();?>
							 			</a>
							 		</div>							
							 		<a class="nav-overlay-link" href="<?php the_permalink();?>" rel="prev">
							 			<?php the_title();?>
							 		</a>
							 	</div>
		 
							    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
	
	
							<?php $post_object2 = get_field('next_lesson');
									if( $post_object2 ): 
										// override $post
										$post = $post_object2;
										setup_postdata( $post ); ?>
	   
							<div class="nav-next">
								<a class="nav-image-link" href="<?php the_permalink();?>">
									<img alt="	<?php the_title();?>" src="http://www.placehold.it/300x300.jpg" >
								</a>
								<div class="nav-desc">
									<h4>Next Lesson</h4>
									<a href="<?php the_permalink();?>" rel="next">
									<?php the_title();?> 
									<span class="meta-nav">→</span>
									</a>
								</div>							
								<a class="nav-overlay-link" href="<?php the_permalink();?>" rel="next"><?php the_title();?></a>
							</div>
		 
							    <?php wp_reset_postdata(); 
								 // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
	
	
	
						</nav>
							
													<!-- /end custom nav betwen lessons -->
					
													</article>
						
						<?php endif;?>
						
					
							<div class="commentsarea">
								<?php comments_template( '', true ); ?>
							</div>
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