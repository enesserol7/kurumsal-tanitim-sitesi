<?php $settings = get_settings($this->session->userdata("language")); ?>
	<title><?php echo $title1; ?> | <?php echo $settings->company_name; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="<?php echo character_limiter(strip_tags($settings->meta_description), 255); ?>">
	<meta name="keywords" content="<?php echo character_limiter(strip_tags($settings->meta_keywords), 255); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="enes erol">
	<meta property="og:image" content="path/to/image.jpg">
	<meta property="og:title" content="<?php echo $settings->company_name; ?>" />
    <meta property="og:description" content="<?php echo character_limiter(strip_tags($settings->meta_description), 255); ?>" />
    <meta property="og:keywords" content="<?php echo character_limiter(strip_tags($settings->meta_keywords), 255); ?>" />
    <meta name="title" content="<?php echo $settings->company_name; ?>" />
  	<meta name="owner" content="Net Bilişim Hizmetleri" />
  	<meta name="copyright" content="(c) 2018" />
    <?php if($settings->logo == "default") { $favicon_image = base_url("assets") . "/assets/images/logo.png";
	} else { $favicon_image = get_picture("settings_v", $settings->favicon, "32x32"); }?>
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo $favicon_image; ?>" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/bootstrap.css" type="text/css" media="screen">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/"); ?>css/fullwidth.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/"); ?>css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/"); ?>css/magnific-popup.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/"); ?>css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/"); ?>css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/"); ?>css/responsive.css" media="screen">