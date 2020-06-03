<?php

/**
 * Main Banner Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'banner' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$displayMenu = get_field('display_social_menu-main-banner') ?: '';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php if($displayMenu): ?>
		<?php if( have_rows( 'social_menu', 'option' ) ): ?>
			<ul class="social">
				<?php while ( have_rows( 'social_menu', 'option' ) ) : the_row(); ?>
					<li>
						<a href="<?php the_sub_field( 'link', 'option' ); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-<?php the_sub_field( 'name_link', 'option' ); ?>.png" alt="">
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>
	<?php if(get_field( 'title-main-banner' )): ?>
		<?php the_field( 'title-main-banner' ); ?>
	<?php else: ?>
		<h1>Example <br> <em>title</em></h1>
	<?php endif; ?>
</section>