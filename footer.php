	<footer>
		<div class="container">
			<div class="wrp_logo_sidebars">
				<?php if(get_field( 'logo_footer', 'option' )): ?>
					<?php $logoFooter = get_field( 'logo_footer', 'option' ); ?>
					<a href="<?php echo home_url(); ?>" class="logo_footer">
						<img src="<?php echo $logoFooter['sizes']['thumbnail']; ?>" alt="">
					</a>
				<?php endif; ?>
				<div class="wrp_sidebars">
					<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>

							<?php dynamic_sidebar( 'footer-sidebar' ); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="wrp_social_copyright">
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
				<p class="copyright"><?php echo get_field( 'copyright_footer', 'option' ) ?: 'Copyright © 2018 AVENTY. All rights reserved.'; ?></p>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>