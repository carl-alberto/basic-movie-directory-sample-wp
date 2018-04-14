<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single' );

			do_action( 'storefront_single_post_after' );

			echo __( 'DIRECTOR: ', 'text_domain' ) . esc_html( get_post_meta( get_the_ID(), 'director', true ) ) . '<br />';

			echo __( 'RUNTIME: ', 'text_domain' ) . esc_html( get_post_meta( get_the_ID(), 'run_time', true ) ) . '<br />';

			echo get_the_date() ;

			echo sprintf( '<img src="%1s"/>', esc_url( wp_get_attachment_url( get_post_meta( get_the_ID(), 'image', true ) ) ) );

		endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
