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
</article>
