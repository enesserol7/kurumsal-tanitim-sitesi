<div class="recent-works">
	<h3><?php echo $title1; ?></h3>
	<div class="row">
	<?php foreach ($services as $service) { ?>
		<div class="col-md-4">
			<div class="work-post">
				<div class="work-post-gal">
					<img alt="<?php echo $service->title; ?>" src="<?php echo get_picture("services_v",$service->img_url,"800x625"); ?>">
					<div class="hover-box">
						<a class="page" href="<?php echo base_url("$url6/{$this->session->userdata("language")}/$service->url"); ?>"></a>
					</div>
				</div>
				<div class="work-post-content">
					<h2><?php echo $service->title; ?></h2>
					<span><?php echo character_limiter(strip_tags($service->description),50); ?></span>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</div>