<div class="item">
	<div class="item_img">
		<?php the_post_thumbnail( 'blog-thumbnail' ); ?>
	</div>
	<div class="item_text">
		<h4><?php the_title(); ?></h4>
		<time><?php the_time( 'j.m.Y' ); ?></time>
		<div class="item_description">
			<?php the_excerpt(); ?>
		</div>
	</div>
</div>