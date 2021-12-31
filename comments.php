<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noon_Post
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

//Declare Vars
$comment_send = 'Post Comment';
$comment_reply = 'Leave a Message';
$comment_reply_to = 'Reply';
 
$comment_author = 'Name';
$comment_email = 'E-Mail';
$comment_body = 'Comment';
$comment_url = 'Website';
$comment_cookies_1 = ' By commenting you accept the';
$comment_cookies_2 = ' Privacy Policy';
 
$comment_before = 'Registration isn\'t required.';
 
$comment_cancel = 'Cancel Reply';

?>
<div class="widget mb-50">
	<div class="title">
		<?php 
		if(get_comments_number()){
			?>
			<h5><?php echo get_comments_number($post->ID) ?> Comments</h5>
			<?php
		} else{
			echo"No Comments";
		}
		?>
	</div>
	<ul class="widget-comments">
		<?php wp_list_comments(
			$args = array(
				'walker'            => null,
				'max_depth'         => '',
				'style'             => 'li -> ',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 64,
				
			)
		); ?>
	</ul>


	<?php
	//Array
	$comments_args = array(
		//Define Fields
		'fields' => array(
			//Author field
			'author' => '<div class="row"> <div class="col-md-6 ">
					<div class="form-group"> 
						<input class="form-control" id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"></input>
					</div>
				</div>',

			'email' => '<div class="col-md-6">
				<div class="form-group"> 
					<input class="form-control" id="email" name="email" placeholder="' . $comment_email .'"></input>
				</div>
			</div> </div>',

			'url' => '<div class="row"><div class="col-md-12 ">
				<div class="form-group"> 
					<input class="form-control"  id="url" name="url" placeholder="' . $comment_url .'"></input>
				</div>
			</div></div>',

		
			'cookies' => '<input type="checkbox" required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>',
		),
		// Change the title of send button
		'label_submit' => __( $comment_send ),
		// Change the title of the reply section
		'title_reply' => __( $comment_reply ),
		// Change the title of the reply section
		'title_reply_to' => __( $comment_reply_to ),
		//Cancel Reply Text
		'cancel_reply_link' => __( $comment_cancel ),
		// Redefine your own textarea (the comment body).
		'comment_field' => '<div class="row"><div class="col-md-12 ">
				<div class="form-group"> 
					<textarea class="form-control"  id="comment" name="comment" placeholder="' . $comment_body .'"></textarea>
				</div>
			</div></div>',

		// 'comment_field' => '<div class="row"><div class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea></div></div>',
		//Message Before Comment
		'comment_notes_before' => __( $comment_before),
		// Remove "Text or HTML to be displayed after the set of comment fields".
		'comment_notes_after' => '',
		//Submit Button ID
		'id_submit' => __( 'comment-submit' ),
		'submit_field'  => '<div class="col-12">%1$s %2$s</div>',
		'submit_button'   => '<button name="submit" type="submit" id="%2$s" class="btn-custom" > '. $comment_send .' </button>',
		// 'submit_field' => '<div class="col-12"></div>',
		
	
	);
	comment_form( $comments_args );




	?>

</div>






