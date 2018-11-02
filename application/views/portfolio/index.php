<!doctype html>
<html lang="en" class="no-js">
<head>
<?php $this->load->view("portfolio/includes/head"); ?>
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
					<h1><?php echo $title11; ?></h1>
					<!--<p>latest designs from vertical</p>-->
				</div>
				<!-- End slider -->
				<!-- Content sections 
					================================================== -->
<?php $this->load->view("portfolio/includes/portfolio_box"); ?>
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
<?php $this->load->view("portfolio/includes/include_script"); ?>
</body>
</html>