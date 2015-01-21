<?php get_header(); ?>
	<article>
		<!-- the loop -->
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post(); ?>		
				<section id="post-<?php the_ID(); ?>" class="section-body auto rel">
					<?php if (has_post_format('video')) : ?>
					<a class="mark" href="<?php the_permalink(); ?>"><span class="mark-icon icon-film" title="视频"></span></a>
					<?php elseif (has_post_format('audio')) : ?>
					<a class="mark" href="<?php the_permalink(); ?>"><span class="mark-icon icon-headphones" title="音频"></span></a>
					<?php elseif (has_post_format('gallery')) : ?>
					<a class="mark" href="<?php the_permalink(); ?>"><span class="mark-icon icon-images" title="图片"></span></a>
					<?php elseif (has_post_format('aside')) : ?>
					<a class="mark" href="<?php the_permalink(); ?>"><span class="mark-icon icon-newspaper" title="日志"></span></a>
					<?php else : ?>
					<a class="mark" href="<?php the_permalink(); ?>"><span class="mark-icon icon-newspaper" title="日志"></span></a>
					<?php endif; ?>
					<section class="inner-section content-inner-section">
						<header class="inner-header">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="article-info"><span class="icon-clock"><?php the_time('Y/m/d') ?></span><span class="icon-user"><?php  the_author(); ?></span><span class="icon-folder-open"><?php the_category(', '); ?></span></p>
						</header>
						<div class="post-content">
							<?php if (has_post_thumbnail()) { ?>
								<div class="special-image">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php } ?>
							<p><?php the_content(); ?></p>
						</div>
					</section>
					<section class="article-info-box">
						<div class="a-info">
							作者：<a href="<?php echo $authordata->user_url; ?>" title="<?php echo $authordata->display_name;?>"><?php echo $authordata->display_name;?></a><br />
		 					原文链接：<a href="<?php echo get_permalink($post->ID);?>" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a><br />
		 					<a href="<?php bloginfo('siteurl'); ?>">© <?php bloginfo('name'); ?> </a> ，转载请留下原文链接！
		 				</div>
					</section>
					<div id="comments">
						<?php comments_template(); ?>
					</div>						
				</section>
			<?php endwhile; ?>				
		<?php else : ?>
			<!-- NOT FOUND -->
			<section class="have-not-post section-body auto rel">
				<header class="inner-header">
					<h3><?php _e( '没找到','brief' ); ?></h3>							
				</header>
				<div class="post-excerpt">
					<p><?php _e( '抱歉，没找到您搜索的东西？！','brief' ); ?></p>						
				</div>
			</section>
		<?php endif; ?>
		<!-- endloop -->		
	</article>	
	<?php get_footer(); ?>
	<a href="#" class="back-to-top"><span class="icon-arrow-up"></span></a>
</body>
</html>