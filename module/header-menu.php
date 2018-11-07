<div class="header_menu">
		<ul>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php echo get_image_option('link', 'img_logo', 'thumb350', false); ?>" alt=""></a>
		</ul>
		<ul>
			<div id="menu-top">
				<ul><?php echo get_option('option'); ?></ul>
					<ul><i class="fas fa-phone"></i></ul>
				<ul><?php echo get_option('telephone'); ?></ul>
			</div>
			<!-- Menu -->
			<i class="fas fa-bars"></i>
			<?php
				$args = array(
				'container' => 'div',
				'container_class' => 'menu',
				'container_id' => '',
				'depth' => '3',
				'theme_location' => 'top',
				'menu_class'=> ''
				);
				wp_nav_menu( $args );
			?>
	</ul>
</div>
