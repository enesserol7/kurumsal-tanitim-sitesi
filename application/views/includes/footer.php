<?php $settings = get_settings(); ?>
				<footer>
					<div class="up-footer">
						<div class="row">
							<div class="col-md-4">
								<div class="widget footer-widgets flickr-widget">
									<h4>Flickr Gallery</h4>
									<ul class="flickr-list">
										<li><a href="#"><img alt="" src="<?php echo base_url("assets/"); ?>images/flickr1.png"></a></li>
										<li><a href="#"><img alt="" src="<?php echo base_url("assets/"); ?>images/flickr2.png"></a></li>
										<li><a href="#"><img alt="" src="<?php echo base_url("assets/"); ?>images/flickr3.png"></a></li>
										<li><a href="#"><img alt="" src="<?php echo base_url("assets/"); ?>images/flickr4.png"></a></li>
										<li><a href="#"><img alt="" src="<?php echo base_url("assets/"); ?>images/flickr5.png"></a></li>
										<li><a href="#"><img alt="" src="<?php echo base_url("assets/"); ?>images/flickr6.png"></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="widget footer-widgets message-widget">
									<h4><?php echo $title5; ?></h4>
									<form id="footer-contact" class="contact-work-form">
										<input type="text" name="name" id="name" placeholder="<?php echo $form1; ?>"/>
										<input type="text" name="mail" id="mail" placeholder="<?php echo $form2; ?>"/>
										<textarea name="comment" id="comment" placeholder="<?php echo $form3; ?>"></textarea>
										<button type="submit" name="contact-submit" class="submit_contact">
											<i class="fa fa-envelope"></i> <?php echo $form4; ?>
										</button>
										<div class="msg"></div>
									</form>
								</div>
							</div>
							<div class="col-md-4">
								<div class="widget footer-widgets info-widget">
									<h4><?php echo $title6; ?></h4>
									<ul class="contact-list">
										<li><a class="phone" href="#"><i class="fa fa-phone"></i><?php echo $settings->phone_1 ?></a></li>
									<?php if($settings->phone_2 != "") { ?>
										<li><a class="phone" href="#"><i class="fa fa-phone"></i><?php echo $settings->phone_2 ?></a></li>
									<?php } ?>
										<li><a class="mail" href="#"><i class="fa fa-envelope"></i><?php echo $settings->email; ?></a></li>
										<li><a class="address" href="#"><i class="fa fa-home"></i> <?php echo $settings->address; ?></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="footer-line">
						<?php date_default_timezone_set('Europe/Istanbul'); ?>
						<p>&#169; <?php echo date("Y"); ?> <?php echo $settings->company_name; ?>,  <?php echo $title7; ?></p>
						<a class="go-top" href="#"></a>
					</div>
				</footer>