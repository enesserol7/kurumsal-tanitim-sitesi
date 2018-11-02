<?php $settings = get_settings(); ?>
		<div class="top-line">
			<div class="container">
				<p>
					<span><i class="fa fa-phone"></i><?php echo $settings->phone_1; ?></span>
					<span><i class="fa fa-envelope-o"></i><?php echo $settings->email; ?></span>
				</p>
				<ul class="social-icons">
					<?php if($settings->facebook != "") { ?>
                	<li><a class="facebook" href="https://facebook.com/<?php echo $settings->facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                	<?php } ?>
                	<?php if($settings->twitter != "") { ?>
                	<li><a class="twitter" href="https://twitter.com/<?php echo $settings->twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                	<?php } ?>
                	<?php if($settings->instagram != "") { ?>
                	<li><a class="instagram" href="https://instagram.com/<?php echo $settings->instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                	<?php } ?>
                	<?php if($settings->linkedin != "") { ?>
                	<li><a class="linkedin" href="https://linkedin.com/in/<?php echo $settings->linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                	<?php } ?>
				</ul>
				<ul class="social-icons">
					<li><a href="<?php echo base_url(); ?>">TR</a></li>
					<li><a href="<?php echo base_url("home/en"); ?>">EN</a></li>
					<li><a href="<?php echo base_url("zuhause/de"); ?>">DE</a></li>
				</ul>
			</div>
		</div>