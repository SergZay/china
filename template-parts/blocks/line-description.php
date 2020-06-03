<?php

/**
 * Line Banner Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'line_description' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'line_description';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

?>
<section id="<?php echo esc_attr($id); ?>" class="line_description">
	<?php if(get_field( 'title_line_description' )): ?>
		<?php the_field( 'title_line_description' ); ?>
	<?php else: ?>
		<h2>Example title</h2>
	<?php endif; ?>
</section>