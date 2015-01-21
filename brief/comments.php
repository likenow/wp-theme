<?php

	/*生成评论表单*/

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
	    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( '<span class="comment-name icon-user"></span>' ) . '</label> ' .
	        '<input id="author" name="author" type="text" placeholder="姓名" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	    'email'  => '<p class="comment-form-email"><label for="email">' . __( '<span class="comment-mail icon-mail"></span>' ) . '</label> ' .
	        '<input id="email" name="email" type="text" placeholder="邮箱" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
	    'url'    => '<p class="comment-form-url"><label for="url">' . __( '<span class="comment-site icon-home"></span>' ) . '</label>' .
        	'<input id="url" name="url" type="text" placeholder="网址" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);	

	$rpy = get_comments_number();
	if( $rpy == 0 ){
		$rpy = __('0条评论');
	}elseif ($rpy == 1) {
		$rpy = __('1条评论');
	}elseif ($rpy >= 2) {
		$rpy = __('('.$rpy.')条评论');
	}

	$comments_args = array(
	    'fields' =>  $fields,
	    'title_reply'=> $rpy,
	    'label_submit' => __('发布'),
	    'comment_notes_after' => '',
	    'comment_notes_before' => '',
	    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( '', 'noun' ) . '</label><textarea id="comment" name="comment" placeholder="说点什么···" cols="45" rows="8" aria-required="true"></textarea></p>',
	);
	 
	comment_form($comments_args);

	// 显示评论列表

	?>
	
	<ul class="comment-list">
		<?php wp_list_comments( array( 'callback' => 'brief_comment', 'style' => 'ul' ) ); ?>
	</ul>