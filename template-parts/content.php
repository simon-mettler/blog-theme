<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simon-blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		#if ( 'post' === get_post_type() ) :
		#endif; ?>


		<?php
		if ( is_singular() ) { 
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '<div class="post-meta">';
			simon_blog_posted_on();
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'simon-blog' ) );
			if ( $tags_list && is_singular()) {
				printf( '  |  <span class="tags-links">' . esc_html__( 'Tags: %1$s', 'simon-blog' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			echo '</div>';
		}else {
			echo '<a class="blog-list" href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
			simon_blog_posted_on();
			the_title( ' | <span class="entry-title">', '</span>' );
			echo '</a>';}
		?>
	</header><!-- .entry-header -->

	<?php simon_blog_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) :
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'simon-blog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
	endif;

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simon-blog' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php simon_blog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
