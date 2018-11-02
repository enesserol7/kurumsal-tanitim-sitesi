<div class="content-sections">
	<div class="portfolio-box with-3-col">
		<!--<ul class="filter">
			<li><a href="#" class="active" data-filter="*"><i class="fa fa-th"></i>Show All</a></li>
			<li><a href="#" data-filter=".web-design">Web Design</a></li>
			<li><a href="#" data-filter=".photography">Photography</a></li>
			<li><a href="#" data-filter=".nature">Nature</a></li>
			<li><a href="#" data-filter=".logo">Logo</a></li>
		</ul>-->
		<div class="portfolio-container">
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
		<!--<ul class="pagination-list">
			<li><a class="active" href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		</ul>-->
	</div>			
</div>