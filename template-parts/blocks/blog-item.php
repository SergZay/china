<?php

/**
 * List posts Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog_item' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blog_item';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$title = get_field('title_list_posts') ?: 'Title';
$category = get_field('category_list_posts') ?: 1;

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
		<h3 class="title_section"><?php echo $title; ?></h3>
		<?php
			$args = array(
				'cat'              => $category,
				'posts_per_page'   => 3
			);

			$wp_query = new WP_Query( $args );
		?>
		<?php if ( $wp_query->have_posts() ) : ?>
			<div class="wrp_items">
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php get_template_part( 'template-parts/post', 'item' ); ?>
				<?php endwhile; ?>
			</div>
		<?php else: ?>
		<!-- no posts found -->
		<?php endif; ?>


		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<script>
			var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
			var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
			var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
			var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
			<a href="#" class="read_more">Смотреть еще</a>
		<?php endif; ?>

	</div>
</section>