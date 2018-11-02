<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Admin, Dashboard, Bootstrap" />
<?php $settings = get_settings(); ?>
<?php if($settings->logo == "default") { $favicon_image = base_url("assets") . "/assets/images/logo.png";
} else { $favicon_image = get_picture("settings_v", $settings->favicon, "32x32"); }?>
<link rel="shortcut icon" sizes="196x196" href="<?php echo $favicon_image; ?>">
<title><?php echo $settings->company_name; ?> | CMS</title>
<?php $this->load->view("includes/include_style"); ?>