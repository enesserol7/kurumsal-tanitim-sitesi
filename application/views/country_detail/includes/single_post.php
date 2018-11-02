<div class="col-md-10 single-post col-md-offset-1">
	<div class="single-post-content">
		<div class="flexslider">
			<ul class="slides">
				<li>
					<img alt="<?php echo $country->title; ?>" src="<?php echo get_picture("references_v", $country->img_url, "555x343"); ?>" />
				</li>
			</ul>
		</div>
		<h1><?php echo $country->title; ?></h1>
		<p><?php echo $country->description; ?></p>
	</div>
<!--<?php //$this->load->view("detail/includes/comment_section"); ?>-->
<!--<?php //$this->load->view("detail/includes/leave_comment"); ?>-->
</div>