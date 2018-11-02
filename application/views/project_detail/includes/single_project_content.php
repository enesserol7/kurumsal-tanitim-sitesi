<div class="col-md-10 col-md-offset-1">
	<div class="single-project-content">
		<div class="flexslider">
			<ul class="slides">
				<li>
					<img alt="<?php echo $service->title; ?>" src="<?php echo get_picture("services_v",$service->img_url,"1008x600"); ?>" />
				</li>
			</ul>
		</div>
		<h1><?php echo $service->title; ?></h1>
		<p><?php echo $service->description; ?></p>
	</div>
</div>