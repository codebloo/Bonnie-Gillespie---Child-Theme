<?php
/*
Template Name: Magic 8 Bon
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
			  
				<?php 
	
				$images = get_field('magic_8_bon', 'option');
				$rand = array_rand($images, 1);
	
				if( $images ): ?>
				<div class="magic_wrap">
					<div class="share_the_magic">
						
						<div class="post-share">
							<ul><li><h3>Share this Magic</h3></li>
							<li>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $images[$rand]['url']; ?>" target="_blank" class="popup">
								<span class="share-box">
								<i class="fa fa-facebook-official" aria-hidden="true"></i>
								</span>
							</a>
						</li>
						<li>	
							<a href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo $images[$rand]['url']; ?>%20-%20<?php the_permalink();?>" target="_blank" class="popup">
								<span class="share-box">
								<i class="fa fa-twitter-square" aria-hidden="true"></i>
								</span>
							</a></li>
						</ul>
						</div>
						
			
			
					</div>
					
						<img src="<?php echo $images[$rand]['url']; ?>" alt="<?php echo $images[$rand]['alt']; ?>" class="magic_bon_image" />
					</div>
				
				<?php endif; ?>
						
						<button class="reload_bon btn">Get another</button>
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
jQuery('.reload_bon').click(function() {
    location.reload();
});

jQuery('.popup').click(function(event) {
   var width  = 575,
       height = 400,
       left   = ($(window).width()  - width)  / 2,
       top    = ($(window).height() - height) / 2,
       url    = this.href,
       opts   = 'status=1' +
                ',width='  + width  +
                ',height=' + height +
                ',top='    + top    +
                ',left='   + left;

   window.open(url, 'twitter', opts);

   return false;
 });

</script>
<?php get_footer();?>