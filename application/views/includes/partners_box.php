					<div class="clients-section">
						<h3><?php echo $title2; ?></h3>
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<ul class="partner-list">
									<?php foreach ($brands as $brand) { ?>
										<li><img alt="<?php echo $brand->title; ?>" src="<?php echo get_picture("brands_v", $brand->img_url, "178x57") ?>"></li>
									<?php } ?>
									</ul>
								</div>
								<!--<div class="item">
									<ul class="partner-list">
										<li><img alt="" src="<?php //echo base_url("assets/"); ?>images/client.png"></li>
										<li><img alt="" src="<?php //echo base_url("assets/"); ?>images/client.png"></li>
										<li><img alt="" src="<?php //echo base_url("assets/"); ?>images/client.png"></li>
										<li><img alt="" src="<?php //echo base_url("assets/"); ?>images/client.png"></li>
									</ul>
								</div>-->
							</div>
							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"></a>
							<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"></a>
						</div>
					</div>