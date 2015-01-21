<?php
/**
********************functions********************
**/
	/*
	**********启用边栏**********
	*/
	if(function_exists('register_sidebar')){//判断当前wordpress是否支持边栏小工具
		register_sidebar(array(//以数组的方式传递参数
			'name' =>'边栏',
			'before_title' =>'<h3 class="widget-title">',
			'after_title' =>'</h3>',
		));
	}
	/*
	**********启用导航栏**********
	*/
	if(function_exists('register_nav_menus')){
		register_nav_menus( array(
			'header-menu' => __( '顶部菜单' )
		) );
	}
	/*
	**********启用特殊图片支持**********
	*/
	add_theme_support('post-thumbnails');
	/*
	**********让主题支持特定的postformats**********
	*/
	add_theme_support('post-formats',array('aside','gallery','video','audio'));
	/*
	**********快速添加友情链接**********
	*/
	add_action('admin_init', 'wpjam_blogroll_settings_api_init');
	function wpjam_blogroll_settings_api_init() {
		add_settings_field('wpjam_blogroll_setting', '友情链接', 'wpjam_blogroll_setting_callback_function', 'reading');
		register_setting('reading','wpjam_blogroll_setting');
	}
	 
	function wpjam_blogroll_setting_callback_function() {
		echo '<textarea name="wpjam_blogroll_setting" rows="10" cols="50" id="wpjam_blogroll_setting" class="large-text code">' . get_option('wpjam_blogroll_setting') . '</textarea>';
	}

	function wpjam_blogroll(){
		$wpjam_blogroll_setting = get_option('wpjam_blogroll_setting');
		if($wpjam_blogroll_setting){
			$wpjam_blogrolls = explode("\n", $wpjam_blogroll_setting);
			foreach ($wpjam_blogrolls as $wpjam_blogroll) {
				$wpjam_blogroll = explode("|", $wpjam_blogroll );
				echo ' | <a href="'.trim($wpjam_blogroll[0]).'" title="'.esc_attr(trim($wpjam_blogroll[1])).'">'.trim($wpjam_blogroll[1]).'</a>';
			}
		}
	}
	/*增强搜索功能*/
	add_filter('posts_orderby_request', 'wpjam_search_orderby_filter');
	function wpjam_search_orderby_filter($orderby = ''){
		if(is_search()){
			global $wpdb;
			$keyword = $wpdb->prepare($_REQUEST['s'],'');
			return "((CASE WHEN {$wpdb->posts}.post_title LIKE '%{$keyword}%' THEN 2 ELSE 0 END) + (CASE WHEN {$wpdb->posts}.post_content LIKE '%{$keyword}%' THEN 1 ELSE 0 END)) DESC, {$wpdb->posts}.post_modified DESC, {$wpdb->posts}.ID ASC";
		}else{
			return $orderby;
		}
	}
	/*评论列表*/
	if ( ! function_exists( 'brief_comment' ) ) :
	function brief_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'brief' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'brief' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
			// Proceed with normal comments.
			global $post;
		?>

		<?php if($comment->user_id === $post->post_author){ ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<?php }else{ ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<?php } ?>

			<article id="comment-<?php comment_ID(); ?>" class="comment-box">
				<header class="comment-box-header fix">
					<div class="comment-box-author-avatar">
						<?php echo get_avatar( $comment, 50 ); ?>
					</div>
					<div class="comment-box-author">
						<?php comment_author_link();
							echo ( $comment->user_id === $post->post_author ) ? '<span> ' . __( '(author)', 'brief' ) . '</span>' : '';
						?>
					</div>
					<div class="comment-meta fix">					
						<div class="comment-time icon-clock">
							<?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'brief' ), get_comment_date(), get_comment_time() )
							); ?>
						</div>
						<div class="reply icon-undo">
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '回复', 'brief' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div>
					</div>					
				</header>

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'brief' ); ?></p>
				<?php endif; ?>

				<section class="comment-box-content">
					<?php comment_text(); ?>
				</section>				
			</article>
		<?php
			break;
		endswitch; // end comment_type check
	}
	endif;
	/* Archives list by zwwooooo | http://zww.me */
	 function zww_archives_list() {
	     if( !$output = get_option('zww_archives_list') ){
	         $output = '<div id="archives"><p>[<a id="al_expand_collapse" href="#">全部展开/收缩</a>] <em>(注: 点击月份可以展开)</em></p>';
	         $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' ); //update: 加上忽略置顶文章
	         $year=0; $mon=0; $i=0; $j=0;
	         while ( $the_query->have_posts() ) : $the_query->the_post();
	             $year_tmp = get_the_time('Y');
	             $mon_tmp = get_the_time('m');
	             $y=$year; $m=$mon;
	             if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
	             if ($year != $year_tmp && $year > 0) $output .= '</ul>';
	             if ($year != $year_tmp) {
	                 $year = $year_tmp;
	                 $output .= '<h3 class="al_year">'. $year .' 年</h3><ul class="al_mon_list">'; //输出年份
	             }
	             if ($mon != $mon_tmp) {
	                 $mon = $mon_tmp;
	                 $output .= '<li><span class="al_mon">'. $mon .' 月</span><ul class="al_post_list">'; //输出月份
	             }
	             $output .= '<li>'. get_the_time('d日: ') .'<a href="'. get_permalink() .'">'. get_the_title() .'</a> <em>('. get_comments_number('0', '1', '%') .')</em></li>'; //输出文章日期和标题
	         endwhile;
	         wp_reset_postdata();
	         $output .= '</ul></li></ul></div>';
	         update_option('zww_archives_list', $output);
	     }
	     echo $output;
	 }
	 function clear_zal_cache() {
	     update_option('zww_archives_list', ''); // 清空 zww_archives_list
	 }
	 add_action('save_post', 'clear_zal_cache'); // 新发表文章/修改文章时
?>