<?php
	$theblogger_post_style   = get_theme_mod('theblogger_setting_post_style', 'is-single-post-title-default');
	$theblogger_font_title_ratio = get_theme_mod('theblogger_setting_font_title_ratio', '0.5');
	
	$theblogger_header_layout = get_theme_mod('theblogger_setting_header_layout', 'is-menu-top is-menu-bar');
	
	if (isset($_GET['header_layout']))
	{
		if ($_GET['header_layout'] == 'small')
		{
			$theblogger_header_layout = 'is-header-small';
		}
		elseif ($_GET['header_layout'] == 'one_row')
		{
			$theblogger_header_layout = 'is-header-row';
		}
		elseif ($_GET['header_layout'] == 'menu_bottom')
		{
			$theblogger_header_layout = 'is-menu-bottom is-menu-bar';
		}
		else
		{
			$theblogger_header_layout = 'is-menu-top is-menu-bar';
		}
	}
	
	$theblogger_header_text_color          = get_theme_mod('theblogger_setting_header_text_color', 'is-header-light');
	$theblogger_header_width          	   = get_theme_mod('theblogger_setting_header_width', 'is-header-full-width');
	$theblogger_menu_behaviour   		   = get_theme_mod('theblogger_setting_menu_behaviour', 'is-menu-fixed is-always-fixed');
	$theblogger_menu_width   			   = get_theme_mod('theblogger_setting_menu_width', 'is-menu-fixed-width');
	$theblogger_header_menu_align          = get_theme_mod('theblogger_setting_header_menu_align', 'is-menu-align-center');
	$theblogger_header_menu_style          = get_theme_mod('theblogger_setting_header_menu_style', 'is-menu-light');
	$theblogger_header_sub_menu_style      = get_theme_mod('theblogger_setting_header_sub_menu_style', 'is-submenu-light');
	$theblogger_header_menu_text_transform = get_theme_mod('theblogger_setting_header_menu_text_transform', 'is-menu-uppercase');
	
	$theblogger_feat_area_width             = get_theme_mod('theblogger_setting_feat_area_width', 'is-featured-area-fixed');
	$theblogger_main_slider_nav_position    = get_theme_mod('theblogger_setting_main_slider_nav_position', 'is-slider-buttons-stick-to-edges');
	$theblogger_main_slider_nav_shape       = get_theme_mod('theblogger_setting_main_slider_nav_shape', 'is-slider-buttons-sharp-edges');
	$theblogger_main_slider_nav_style       = get_theme_mod('theblogger_setting_main_slider_nav_style', 'is-slider-buttons-dark');
	$theblogger_main_slider_title_style     = get_theme_mod('theblogger_setting_main_slider_title_style', 'is-slider-title-default');
	$theblogger_main_slider_title_transform = get_theme_mod('theblogger_setting_main_slider_title_text_transform', 'is-slider-title-none-uppercase');
	
	$theblogger_author_info_box_style = get_theme_mod('theblogger_setting_author_info_box_style', 'is-about-author-minimal');
	$theblogger_share_links_style     = get_theme_mod('theblogger_setting_share_links_style', 'is-share-links-minimal');
	$theblogger_tag_cloud_style       = get_theme_mod('theblogger_setting_tag_cloud_style', 'is-tagcloud-minimal');
	$theblogger_post_nav_image        = get_theme_mod('theblogger_setting_post_nav_image', 'is-nav-single-rounded');
	$theblogger_post_nav_animated     = get_theme_mod('theblogger_setting_post_nav_animated', 'is-nav-single-no-animated');
	$theblogger_comments_style        = get_theme_mod('theblogger_setting_comments_style', 'is-comments-minimal');
	$theblogger_comment_image_shape   = get_theme_mod('theblogger_setting_comment_image_shape', 'is-comments-image-rounded');
	$theblogger_comment_form_style    = get_theme_mod('theblogger_setting_comment_form_style', 'is-comment-form-minimal');
	
	$theblogger_sidebar_widget_text_align  = get_theme_mod('theblogger_setting_sidebar_widget_text_align', 'is-sidebar-align-left');
	$theblogger_sidebar_widget_title_align = get_theme_mod('theblogger_setting_sidebar_widget_title_align', 'is-widget-title-align-left');
	$theblogger_sidebar_widget_title_style = get_theme_mod('theblogger_setting_sidebar_widget_title_style', 'is-widget-minimal');
	
	$theblogger_footer_subscribe_style   = get_theme_mod('theblogger_setting_footer_subscribe_style', 'is-footer-subscribe-light');
	$theblogger_footer_widget_text_align = get_theme_mod('theblogger_setting_footer_widget_text_align', 'is-footer-widgets-align-left');
?>
<!doctype html>
<html <?php language_attributes(); ?> class="<?php if ((! is_active_sidebar('theblogger_sidebar_13')) || (is_singular('post'))) { echo 'no-featured-area '; } ?><?php echo esc_attr($theblogger_post_style); ?> <?php echo esc_attr($theblogger_menu_width); ?> <?php echo esc_attr($theblogger_menu_behaviour); ?> <?php echo esc_attr($theblogger_sidebar_widget_text_align); ?> <?php echo esc_attr($theblogger_sidebar_widget_title_align); ?> <?php echo esc_attr($theblogger_sidebar_widget_title_style); ?> <?php echo esc_attr($theblogger_footer_subscribe_style); ?> <?php echo esc_attr($theblogger_footer_widget_text_align); ?> <?php echo esc_attr($theblogger_header_layout); ?> <?php echo esc_attr($theblogger_header_text_color); ?> <?php echo esc_attr($theblogger_header_width); ?> <?php echo esc_attr($theblogger_header_menu_align); ?> <?php echo esc_attr($theblogger_header_menu_style); ?> <?php echo esc_attr($theblogger_header_sub_menu_style); ?> <?php echo esc_attr($theblogger_header_menu_text_transform); ?> <?php echo esc_attr($theblogger_feat_area_width); ?> <?php echo esc_attr($theblogger_main_slider_nav_position); ?> <?php echo esc_attr($theblogger_main_slider_nav_shape); ?> <?php echo esc_attr($theblogger_main_slider_nav_style); ?> <?php echo esc_attr($theblogger_main_slider_title_style); ?> <?php echo esc_attr($theblogger_main_slider_title_transform); ?> <?php echo esc_attr($theblogger_author_info_box_style); ?> <?php echo esc_attr($theblogger_share_links_style); ?> <?php echo esc_attr($theblogger_tag_cloud_style); ?> <?php echo esc_attr($theblogger_post_nav_image); ?> <?php echo esc_attr($theblogger_post_nav_animated); ?> <?php echo esc_attr($theblogger_comments_style); ?> <?php echo esc_attr($theblogger_comment_image_shape); ?> <?php echo esc_attr($theblogger_comment_form_style); ?>" data-title-ratio="<?php echo esc_attr($theblogger_font_title_ratio); ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php
		$theblogger_mobile_zoom = get_theme_mod('theblogger_setting_mobile_zoom', 'Yes');
		
		if ($theblogger_mobile_zoom == 'No')
		{
			?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<?php
		}
		else
		{
			?>
<meta name="viewport" content="width=device-width, initial-scale=1">
			<?php
		}
	?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <header id="masthead" class="site-header" role="banner">
			<div class="header-wrap">
				<div class="header-wrap-inner">
					<?php
						function theblogger_site_navigation()
						{
							?>
								<nav id="site-navigation" class="main-navigation site-navigation" role="navigation">
									<div class="menu-wrap">
										<div class="layout-medium">
											<a class="menu-toggle">
												<span class="lines"></span>
											</a>
											
											<div class="nav-menu">
												<?php
													wp_nav_menu(array('theme_location' => 'theblogger_theme_menu_location',
																	  'menu'           => 'theblogger_theme_menu_location',
																	  'menu_class'     => 'menu-custom',
																	  'container'      => false));
												?>
											</div>
											
											<?php
												$theblogger_header_search = get_theme_mod('theblogger_setting_header_search', 'Yes');
												
												if ($theblogger_header_search != 'No')
												{
													?>
														<a class="search-toggle toggle-link"></a>
														
														<div class="search-container">
															<div class="search-box" role="search">
																<form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
																	<label>
																		<span>
																			<?php
																				esc_html_e('Search for', 'theblogger');
																			?>
																		</span>
																		<input type="search" id="search-field" name="s" placeholder="<?php esc_html_e('type and hit enter', 'theblogger'); ?>">
																	</label>
																	<input type="submit" class="search-submit" value="<?php esc_html_e('Search', 'theblogger'); ?>">
																</form>
															</div>
														</div>
													<?php
												}
											?>
												<div class="social-container">
													<?php if( have_rows('social_media_link', 'option') ): 
														 while( have_rows('social_media_link', 'option') ): the_row(); ?>
														 <a href="<?php the_sub_field('link'); ?>" target="_blank" class="social-link">
															  <i class="fa fa-<?php the_sub_field('icon'); ?>"></i>
														  </a>
													  	<?php endwhile; endif; ?>
												</div>
											
										</div>
									</div>
								</nav>
							<?php
						}
						
						function theblogger_site_branding()
						{
							?>
								<div class="site-branding">
									<?php
										$theblogger_site_logo = get_theme_mod('theblogger_setting_logo_site', "");
										
										if ($theblogger_site_logo != "")
										{
											?>
												<h1 class="site-title">
													<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
														<span class="screen-reader-text">
															<?php
																bloginfo('name');
															?>
														</span>
														<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($theblogger_site_logo); ?>">
													</a>
												</h1>
											<?php
										}
										else
										{
											$site_title = get_bloginfo('name');
											
											if ($site_title != "")
											{
												?>
													<h1 class="site-title">
														<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
															<span class="screen-reader-text">
																<?php
																	echo esc_html($site_title);
																?>
															</span>
															<span class="site-title-text">
																<?php
																	echo esc_html($site_title);
																?>
															</span>
														</a>
													</h1>
												<?php
											}
										}
									?>
									
									<?php
										$theblogger_tagline = get_bloginfo('description');
										
										if ($theblogger_tagline != "")
										{
											?>
												<p class="site-description">
													<?php
														echo esc_html($theblogger_tagline);
													?>
												</p>
											<?php
										}
									?>
								</div>
							<?php
						}
						
						if ($theblogger_header_layout == 'is-menu-bottom is-menu-bar')
						{
							theblogger_site_branding();
							theblogger_site_navigation();
						}
						else
						{
							theblogger_site_navigation();
							theblogger_site_branding();
						}
					?>
				</div>
			</div>
        </header>