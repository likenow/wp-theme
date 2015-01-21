<?php get_header(); ?>	
	<article>
		<!-- the loop -->
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post(); ?>		
				<section id="post-<?php the_ID(); ?>" class="section-body rel">
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
					<section class="inner-section expert-inner-section">
						<header class="inner-header">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="article-info"><span class="icon-clock"><?php the_time('Y/m/d') ?></span><span class="icon-user"><?php  the_author(); ?></span><span class="icon-folder-open"><?php the_category(', '); ?></span></p>
						</header>
						<div class="post-excerpt">
							<?php if (has_post_thumbnail()) { ?>
								<div class="special-image">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php } ?>
							<p><?php the_excerpt(); ?></p>
							<a class="read-more" href="<?php the_permalink(); ?>">阅读详细>></a>
						</div>
					</section>					
				</section>
			<?php endwhile; ?>				
		<?php else : ?>
			<!-- NOT FOUND -->
			<section class="have-not-post section-body rel">
				<header class="inner-header">
					<h3><?php _e( '没找到','brief' ); ?></h3>							
				</header>
				<div class="post-excerpt">
					<p><?php _e( '抱歉，没找到您搜索的东西？！','brief' ); ?></p>						
				</div>
			</section>
		<?php endif; ?>
		<!-- endloop -->
		<nav class="pagelink">				
			<?php previous_posts_link(('<span class="link-arrow icon-arrow-left" title="分页"></span>')) ?><?php next_posts_link(('<span class="link-arrow icon-arrow-right" title="分页"></span>')) ?>
		</nav>
	</article>	
	<?php get_footer(); ?>
	<a href="#" class="back-to-top"><span class="icon-arrow-up"></span></a>
</body>
</html>