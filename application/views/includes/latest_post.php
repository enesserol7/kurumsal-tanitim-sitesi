<div class="latest-post">
	<h3><?php echo $title3; ?></h3>
	<div class="row">
	<?php foreach ($news as $news) { ?>
		<div class="col-md-4">
			<div class="item news-item">
				<div class="inner-item">
					<img src="<?php echo get_picture("news_v",$news->img_url,"370x297"); ?>" alt="<?php echo $news->title; ?>">
					<div class="hover-item">
						<!--<ul>
							<li><a class="autor" href="#"><i class="fa fa-user"></i> TrendyStuff</a></li>
							<li><a class="date" href="#"><i class="fa fa-clock-o"></i> 19 October, 2013</a></li>
							<li><a class="comment-numb" href="#"><i class="fa fa-comments"></i> 16 Comments</a></li>
						</ul>-->
					</div>
				</div>
				<h2><?php echo $news->title; ?></h2>
				<p><?php echo character_limiter(strip_tags($news->description),150); ?> </p>
				<a class="read-more" href="<?php echo base_url("$url5/{$this->session->userdata("language")}/$news->url"); ?>"><?php echo $title13; ?> <i class="fa fa-arrow-right"></i></a>
			</div>
		</div>
	<?php } ?>
	</div>
</div>