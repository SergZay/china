<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<?php the_custom_logo(); ?>
			<div class="wrp_menu_phone">
				<div class="nav_phone">
					<?php wp_nav_menu( array(
						'theme_location'  => 'header-menu',
						'menu'            => '',
						'container'       => '',
						'container_class' => 'menu-{menu-slug}-container',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<nav id = "%1$s" class = "%2$s">%3$s</nav>',
						'depth'           => 0,
						'walker'          => '',
					) ); ?>
					<?php if(get_field( 'phone_number', 'option' )): ?>
						<a href="tel:<?php the_field( 'phone_number', 'option' ); ?>" class="phone"><?php the_field( 'phone_number', 'option' ); ?></a>
					<?php else: ?>
						<a href="#" class="phone">+86 21 6243 0658</a>
					<?php endif; ?>
				</div>
				<div class="nav-icon">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	</header>