<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */

if ( ! function_exists( 'undiscovered_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function undiscovered_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'undiscovered' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'undiscovered' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'undiscovered' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'undiscovered_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function undiscovered_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'undiscovered' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'undiscovered' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body clear">
			<?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, $args['avatar_size'] ); } ?>

			<div class="comment-right">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php printf( __( '%s', 'undiscovered' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'undiscovered' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit', 'undiscovered' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'undiscovered' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'reply_text'=> '',
						'before'    => '<div class="reply">',
						'after'     => '</div>'
					) ) );
				?>
			</div>
		</article>

	<?php
	endif;
}
endif; // ends check for undiscovered_comment()

if ( ! function_exists( 'undiscovered_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function undiscovered_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf(__( '<span class="posted-on">%1$s</span>', 'undiscovered' ), $time_string);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function undiscovered_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so undiscovered_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so undiscovered_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in undiscovered_categorized_blog.
 */
function undiscovered_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'undiscovered_category_transient_flusher' );
add_action( 'save_post',     'undiscovered_category_transient_flusher' );

function post_format_icon($post_format){
	$color = undiscovered_options('secondary_color', '#BE3243');

	if($post_format == ""){
		$post_format = "standard";
	}

	return get_template_directory_uri() . "/svg/" . $post_format . ".php?color=" . urlencode($color);
}

function get_social_networks(){
	$icons = "Facebook|Twitter|GooglePlus|Instagram|LinkedIn|Skype|RSS|Blogger|Delicious|Deviantart|Dribbble|Flickr|Picassa|Pinterest|Spotify|Tumblr|Vimeo|Youtube";
	
	return explode("|", $icons);
}

function social_icons_list(){
	$icons = get_social_networks();
	$options = ( get_option( 'undiscovered_options' ) ) ? get_option( 'undiscovered_options' ) : null; 

	foreach($icons as $icon){
		$url = (isset($options['social_'.strtolower($icon)])) ? $options['social_'.strtolower($icon)] : '';

		if($url != "" && $url != "blank"){
			echo '<a href="'.$url.'" class="social-icon"><img src="'.get_template_directory_uri().'/img/social/social_'.strtolower($icon).'_circle.svg" alt="" /></a>';
		}
	}
}
