<?php $settings = get_settings(); ?>
		<header class="clearfix">
			<div class="header-logo">
				<a class="logo" href="<?php echo base_url(); ?>"><img alt="" src="<?php echo get_picture("settings_v", $settings->logo, "165x57") ?>"></a>
			</div>
			<a class="elemadded responsive-link" href="#">Menu</a>
			<div class="navbar-vertical">
				<ul class="main-menu">
					<li class="drop"><a href="<?php echo base_url();echo $url1; ?>"><span><?php echo $link1; ?></span></a>
						<!--<ul class="drop-down">
							<li><a href="index.html"><span>Home Default</span></a></li>
							<li><a href="home-blog.html"><span>Home Blog</span></a></li>
							<li><a href="home-portfolio.html"><span>Home Portfolio</span></a></li>
							<li><a href="home-shop.html"><span>Home Shop</span></a></li>
						</ul>-->
					</li>
					<!--<li class="drop"><a href="#"><span>Sliders</span></a>
						<ul class="drop-down">
							<li><a href="index.html"><span>Revolution Slider</span></a></li>
							<li><a href="flexslider.html"><span>Flexslider</span></a></li>
						</ul>
					</li>-->
					<li><a href="<?php echo base_url();echo $url2; ?>"><span><?php echo $link2; ?></span></a></li>
					<!--<li class="drop"><a href="<?php //echo base_url("portfolyo"); ?>"><span>Portfolyo</span></a>-->
						<!--<ul class="drop-down">
							<li><a href="portfolio-2col.html"><span>Portfolio 2col</span></a></li>
							<li><a href="portfolio-3col.html"><span>Portfolio 3col</span></a></li>
							<li class="drop"><a href="#"><span>Level 3</span></a>
								<ul class="drop-down level3">
									<li><a href="#"><span>Level 3</span></a></li>
									<li><a href="#"><span>Level 3</span></a></li>
									<li><a href="#"><span>Level 3</span></a></li>
								</ul>
							</li>
						</ul>-->
					</li>
					<!--<li><a href="<?php //echo base_url();echo $url3; ?>"><span><?php //echo $link3; ?></span></a></li>-->
					<li class="drop"><a href="<?php echo base_url();echo $url3; ?>"><span><?php echo $link3; ?></span></a>
						<ul class="drop-down">
						<?php foreach ($services as $service) { ?>
							<li><a href="<?php echo base_url("$url6/{$this->session->userdata("language")}/$service->url"); ?>"><span><?php echo $service->title; ?></span></a></li>
						<?php } ?>
						</ul>
					</li>
					<li class="drop"><a href="#"><span><?php echo $link5; ?></span></a>
						<ul class="drop-down">
						<?php foreach ($countries as $country) { ?>
							<li><a href="<?php echo base_url();echo $url7; echo $country->url; ?>"><span><?php echo $country->title; ?></span></a></li>
						<?php } ?>
						</ul>
					</li>
					<!--<li><a href="shop.html"><span>Shop</span></a></li>-->
					<!--<li><a href="shortcodes.html"><span>Shortcodes</span></a></li>-->
					<li><a href="<?php echo base_url();echo $url4; ?>"><span><?php echo $link4; ?></span></a></li>
				</ul>
			</div>
		</header>