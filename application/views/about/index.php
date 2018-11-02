<!doctype html>
<html lang="en" class="no-js">
<head>
<?php $this->load->view("about/includes/head"); ?>
</head>
<body>
	<!-- Background -->
	<div id="background-container">
		<img alt="" src="<?php echo base_url("assets/"); ?>upload/background.jpg">
	</div>
	<!-- End Background -->
	<!-- Container -->
	<div id="container" class="container">
		<!-- top-line
		    ================================================== -->
<?php $this->load->view("includes/top_line"); ?>
		<!-- End Top line -->
		<!-- Header
		    ================================================== -->
<?php $this->load->view("includes/header"); ?>
		<!-- End Header -->
		<!-- content 
			================================================== -->
		<div id="content">
			<div class="inner-content">
				<!-- slider 
					================================================== -->
				<div id="page-banner">
					<h1><?php echo $title8; ?></h1>
					<!--<p>find out more about our company</p>-->
				</div>
				<!-- End slider -->
				<!-- Content sections 
					================================================== -->
				<div class="content-sections">
<?php $this->load->view("about/includes/about_box"); ?>
					<!-- staff-box -->
<!--<?php //$this->load->view("about/includes/staff_box"); ?>-->
<!--<?php //$this->load->view("about/includes/pricing_box"); ?>-->
					<!-- partners box -->
<?php $this->load->view("includes/partners_box"); ?>
				</div>
				<!-- End content sections -->
				<!-- footer 
					================================================== -->
<?php $this->load->view("includes/footer"); ?>
				<!-- End footer -->
			</div>
			<!-- End innercontent -->
		</div>
		<!-- End content -->
	</div>
	<!-- End Container -->
<?php $this->load->view("about/includes/include_script"); ?>
</body>
</html>