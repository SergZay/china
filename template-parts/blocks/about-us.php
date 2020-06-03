<?php

/**
 * About Us Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about_us' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about_us';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$title = get_field('title_about_us') ?: 'Title';
$description = get_field('text_about_us') ?: 'Description';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
		<h3 class="title_section"><?php echo $title; ?></h3>
		<div class="wrp_text">
			<?php echo $description; ?>
		</div>
	</div>
</section>