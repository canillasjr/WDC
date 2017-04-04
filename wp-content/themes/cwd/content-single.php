<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<img src="<?php echo post_format_icon(get_post_format()); ?>" width="45" alt="" class="post-icon" />

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php undiscovered_posted_on(); ?>
		</div>
		<?php endif; ?>

		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'read more <span class="meta-nav">&raquo;</span>', 'undiscovered' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'undiscovered' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'undiscovered' ) );
				if ( $categories_list && undiscovered_categorized_blog() ) :
			?>
			<span class="cat-links">
				<img src="<?php echo get_template_directory_uri(); ?>/img/icon_folder.svg" width="16" alt="" /> <?php echo $categories_list; ?>
			</span>
			<?php endif; ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'undiscovered' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<img src="<?php echo get_template_directory_uri(); ?>/img/icon_ribbon.svg" width="16" alt="" /> <?php echo $tags_list; ?>
			</span>
			<?php endif; ?>
		<?php endif; ?>
	</footer>
</article>
