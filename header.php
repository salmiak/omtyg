  <!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!-- 
	
		Välkommen till källkoden för Omtyg.se
		
		Denna sajt körs på Wordpress och är kodad av Alfred Gunnarsson.
		
	-->
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<title><?php wp_title('&raquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/bilder/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/bilder/apple-touch-icon.png">	
	
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Crimson+Text:400,600,400italic,600italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/libs/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php if( has_post_thumbnail() ) { 
	  $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	?>
	  <meta property="og:image" content="<?php echo $large_image_url[0]; ?>" /> 
	<?php } ?>
	
	<!--[if IE]>
		<script src="http://ajax.cdnjs.com/ajax/libs/modernizr/1.7/modernizr-1.7.min.js"></script>
	<![endif]-->
		
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
  
    <div class="header">
      <?php if(!is_front_page() ) { ?><a href="<?php bloginfo('url'); ?>" class="miniLogo sans-serif capitals text-green">Omtyg</a><?php } ?>
      <div class="col-xs-12 text-right capitals mini sans-serif">
        <a href="mailto:anna@omtyg.se" class="text-green">anna@omtyg.se</a>
      </div>
    </div>