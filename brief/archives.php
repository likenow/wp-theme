<?php
/*
Template Name: archives
*/
?>
<?php get_header(); ?>
	<article>
		<!-- the loop -->
		<?php if (have_posts()) :?><?php while (have_posts()) : the_post(); ?>		
			<section id="post-<?php the_ID(); ?>" class="section-body auto rel">		
				<section class="inner-section">
					<header class="inner-header">
						<h2 class="archives-h2 icon-folder-open">文章存档</h2>						
					</header>
					<div class="post-content post-archives">						
						<?php zww_archives_list(); ?>
					</div>
				</section>					
			</section>
		<?php endwhile; ?>				
		<?php else : ?>
		<!-- 404page todo -->
		<?php endif; ?>
		<!-- endloop -->		
	</article>
	<?php get_footer(); ?>
	<a href="#" class="back-to-top"><span class="icon-arrow-up"></span></a>
</body>
</html>