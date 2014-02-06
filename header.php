<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!-- 
	
		Välkommen till källkoden för Omtyg.se
		
		Denna sajt körs på Wordpress och är kodad av Alfred Gunnarsson.
		
	-->
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<title><?php wp_title(''); ?></title>
	
	<!-- 
		Om du lägger ikonerna i din webbrot så kan du ta bort de här raderna nedan, men vill du att det ska fungera för Android med så bör du behålla dem. 
		Och vill du ha Android 2.1-stöd så måste du också lägga till rel="apple-touch-icon-precomposed".
	-->
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/bilder/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/bilder/apple-touch-icon.png">	
	
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic|Crimson+Text:400,600,400italic,600italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/libs/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!--[if IE]>
		<script src="http://ajax.cdnjs.com/ajax/libs/modernizr/1.7/modernizr-1.7.min.js"></script>
	<![endif]-->
		
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
  
    <div class="header">
      <?php if(!is_front_page() ) { ?><a href="<?php bloginfo('url'); ?>" class="miniLogo">Omtyg</a><?php } ?>
      <div class="col-xs-12 text-right capitals mini sans-serif">
        anna@omtyg.se | 0712 34 56 78
      </div>
    </div>
