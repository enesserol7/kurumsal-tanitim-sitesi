<div class="col-md-10 single-post col-md-offset-1">
	<div class="single-post-content">
		<div class="flexslider">
			<ul class="slides">
				<li>
					<img alt="<?php echo $news->title; ?>" src="<?php echo get_picture("news_v", $news->img_url, "1008x600"); ?>" />
				</li>
			</ul>
		</div>
		<h1><?php echo $news->title; ?></h1>
		<p><?php echo $news->description; ?></p>
	</div>
<!--<?php //$this->load->view("detail/includes/comment_section"); ?>-->
<!--<?php //$this->load->view("detail/includes/leave_comment"); ?>-->
</div>