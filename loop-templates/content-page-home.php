<?php
/**
 * Partial template for content in page-home.php
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	<div class="row lead-row">
		<div class="col-md-7">
			<h1><?php the_field('lead_message');?></h1>
			<div class="lead-detail">
				<?php the_field('lead_details');?>
			</div>
			<div class="get-started-buttons">
				<h2>get started as</h2>
				<?php
				$html = '';
					// Check rows exists.
					if( have_rows('started_buttons') ):

					    // Loop through rows.
					    while( have_rows('started_buttons') ) : the_row();

					        // Load sub field value.
					        $text = get_sub_field('button_text');
					        $link = get_sub_field('button_link');
					        // Do something...
					        $html .= '<a class="started-buttons" href="' . $link . '">' . $text . '</a>';
					    // End loop.
					    endwhile;

					// No value.
					else :
					    // Do something...
					endif;
					echo $html;
					?>
			</div>
		</div>
		<div class="col-md-5 teacher-scene"></div>
	</div>
	<!--end lead row-->

	<div class="row secondary-row">
		<div class="col-md-7">
			<h2><?php the_field('second_message');?></h2>
			<div class="secondary-detail">
				<?php the_field('second_message_details');?>
			</div>
		</div>
		<div class="col-md-7">
		</div>
	</div>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
