<div id="slider">
<!--
#################################
						- THEMEPUNCH BANNER -
#################################
-->
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<ul>
			<!-- THE FIRST SLIDE -->
		<?php foreach ($slides as $slide) { ?>
			<li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300">
				<!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
				<img alt="<?php echo $slide->title; ?>" src="<?php echo get_picture("slides_v",$slide->img_url,"857x505"); ?>" >
				<!-- THE CAPTIONS IN THIS SLDIE -->
				<div class="caption large_text sfb"
				data-x="240"
				data-y="113"
				data-speed="600"
				data-start="1200"
				data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine" ><?php echo $slide->title; ?> <span></span></div>
				<div class="caption big_white sft stt"
				data-x="240"
				data-y="150"
				data-speed="500"
				data-start="1400"
				data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine" ><?php echo $slide->description; ?></div>
				<!--<div class="caption randomrotate"
				data-x="115"
				data-y="210"
				data-speed="600"
				data-start="1600"
				data-easing="easeOutExpo" data-end="7200" data-endspeed="300" data-endeasing="easeInSine" ><img src="<?php //echo base_url("assets/"); ?>images/slider-icons/circle.png" alt="Image 1"></div>-->
				<!--<div class="caption modern_small_text_dark sft"
				data-x="158"
				data-y="326"
				data-speed="600"
				data-start="1700"
				data-easing="easeOutExpo" data-end="7350" data-endspeed="300" data-endeasing="easeInSine" >5 star support</div>-->
				<!--<div class="caption randomrotate"
				data-x="325"
				data-y="210"
				data-speed="600"
				data-start="1800"
				data-easing="easeOutExpo" data-end="7400" data-endspeed="300" data-endeasing="easeInSine" ><img src="<?php //echo base_url("assets/"); ?>images/slider-icons/circle1.png" alt="Image 2"></div>-->
				<!--<div class="caption modern_small_text_dark sft"
				data-x="365"
				data-y="326"
				data-speed="600"
				data-start="1900"
				data-easing="easeOutExpo" data-end="7450" data-endspeed="300" data-endeasing="easeInSine" >Update Notifier</div>-->
				<!--<div class="caption randomrotate"
				data-x="533"
				data-y="210"
				data-speed="600"
				data-start="2000"
				data-easing="easeOutExpo" data-end="7500" data-endspeed="300" data-endeasing="easeInSine" ><img src="<?php //echo base_url("assets/"); ?>images/slider-icons/circle2.png" alt="Image 3"></div>-->
				<!--<div class="caption modern_small_text_dark sft"
				data-x="579"
				data-y="326"
				data-speed="600"
				data-start="2100"
				data-easing="easeOutExpo" data-end="7550" data-endspeed="300" data-endeasing="easeInSine" >Lovely design</div>-->
			</li>
		<?php } ?>
		</ul>
	</div>
</div>
</div>