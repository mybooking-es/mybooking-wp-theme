<?php
/**
*		SINGLE POST
*  	-----------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'mybooking_container_type' );
?>

<div class="wrapper page_content" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<main class="site-main" id="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'mybooking-parts/loops/mybooking-content-single' ); ?>
				<?php mybooking_post_nav(); ?>
			<?php endwhile; ?>

		</main>
	</div>
</div>

<?php get_footer();
