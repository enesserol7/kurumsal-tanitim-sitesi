					<div class="accord-tab-box">
						<h3><?php echo $title4; ?></h3>
						<div class="accordion-box">
						<?php $sayac = 1; ?>
						<?php foreach ($questions as $question) { ?>
							<div class="accord-elem <?php echo ($sayac == 1) ? "active"  : "" ?>">
								<div class="accord-title">
									<h5><i class="fa fa-question"></i><?php echo $question->title; ?></h5>
									<a class="accord-link" href="#"></a>
								</div>
								<div class="accord-content">
									<span class="image-content"><i class="fa fa-suitcase"></i></span>
									<p><?php echo $question->description; ?></p>
								</div>
							</div>
						<?php $sayac++; ?>
						<?php } ?>
						</div>
					</div>