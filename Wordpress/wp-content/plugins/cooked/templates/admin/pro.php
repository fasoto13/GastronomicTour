<div id="cooked-welcome-screen">
	<div class="wrap about-wrap">
		<div id="welcome-panel" class="welcome-panel">

			<img src="<?php echo COOKED_URL; ?>/assets/admin/images/pro-banner.png" class="cooked-welcome-banner">

			<div class="welcome-panel-intro">
				<h1><?php echo sprintf( __('Ready for %s?','cooked'), 'Cooked Pro' ); ?></h1>
                <?php echo wpautop( sprintf( esc_html__( 'The %s upgrade adds loads of new features like ratings, favorites, user profiles and more. Check out the list below for all of the details.', 'cooked' ), 'Cooked Pro' ) ); ?>
            </div>

			<div class="welcome-panel-content">
				<div class="welcome-panel-column-container">
					<div class="welcome-panel-column welcome-panel-full">
						<div class="cooked-pro-features">
							<ul class="cooked-whatsnew-list cooked-whatsnew-pro">
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Premium Support","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "User Profiles","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "User Ratings","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "User Favorites","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Ingredient Links","cooked" ); ?></li>
							</ul>
							<ul class="cooked-whatsnew-list cooked-whatsnew-pro">
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Social Sharing","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Recipe Submissions","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Modern Grid Layout","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Full-Width Layout","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Pagination Options","cooked" ); ?></li>
							</ul>
							<ul class="cooked-whatsnew-list cooked-whatsnew-pro">
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Compact List Layout","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Fitness Layout","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Cuisines","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Cooking Methods","cooked" ); ?></li>
								<li><i class="cooked-icon cooked-icon-star"></i> <?php esc_html_e( "Tags","cooked" ); ?></li>
							</ul>
						</div>
						<div class="cooked-welcome-bottom">
							<a href="https://cooked.pro/" target="_blank" class="cooked-pro-button"><?php echo sprintf( esc_html__( "Get %s","cooked" ), "Cooked Pro" ); ?></a>
							<span class="cooked-coupon-code"><?php echo sprintf( esc_html__( 'Use coupon code %s for %s off!', 'cooked' ), '<strong>COOKED10</strong>', '<strong>10%</strong>' ); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
