<?php

//---------------------------------------------------------------------------------
//	Aktivera olika inbyggd funktionallitet
//---------------------------------------------------------------------------------

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


add_image_size( 'fp_sm', 400, 400, true );
add_image_size( 'fp_lg', 600, 600, true );


//---------------------------------------------------------------------------------
//	Lägg till meta-data om bilder på post-json
//---------------------------------------------------------------------------------

add_filter( 'json_prepare_post', function ($data, $post, $context) {
	// $data['omtyg_post_images'] = 	get_field('images', $post['ID']); // Dessa används ej, men lägger på en hel del laddningstid.
	$data['omtyg_fp_size'] = 	get_field('fp_size', $post['ID']);
	$data['omtyg_forSale'] = 	get_field('forSale', $post['ID']);
	return $data;
}, 10, 3 );


//---------------------------------------------------------------------------------
//	Ta bort blandat skräp från head
//---------------------------------------------------------------------------------

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


//---------------------------------------------------------------------------------
//	Lägg till Google Analytics i footern, ändra UA-XXXXX-X till din egen tracking-kod
//---------------------------------------------------------------------------------
function add_google_analytics() {
	echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51813239-1', 'omtyg.se');
  ga('send', 'pageview');

</script>";
}
add_action('wp_footer', 'add_google_analytics');

//---------------------------------------------------------------------------------
//  Advanced Custom Fields
//---------------------------------------------------------------------------------

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_page',
		'title' => 'Page',
		'fields' => array (
			array (
				'key' => 'field_53124210b1a9d',
				'label' => 'Index på Förstasidan',
				'name' => 'index',
				'type' => 'number',
				'instructions' => 'På vilken plats på förstasidan ska denna visas. Sätter du 0 kommer den innan alla andra inlägg.',
				'required' => 1,
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_5312fc4ca1800',
				'label' => 'Storlek på förstasidan',
				'name' => 'fp_size',
				'type' => 'select',
				'instructions' => 'Hur stor ska denna sida vara på förstasidans rutnät.',
				'required' => 1,
				'choices' => array (
					'fp_sm' => 'Liten',
					'fp_lg' => 'Stor',
				),
				'default_value' => 'fp_sm',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post',
		'title' => 'Post',
		'fields' => array (
			array (
				'key' => 'field_52e38aada1684',
				'label' => 'Storlek på förstasidan',
				'name' => 'fp_size',
				'type' => 'select',
				'instructions' => 'Hur stor ska detta inlägga vara på förstasidans rutnät.',
				'required' => 1,
				'choices' => array (
					'fp_sm' => 'Liten',
					'fp_lg' => 'Stor',
				),
				'default_value' => 'fp_sm',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53961c860ece0',
				'label' => 'Till salu',
				'name' => 'forSale',
				'type' => 'true_false',
				'instructions' => 'Sätt denna till True för att visa "Till salu"-bannern.',
				'message' => 'Visa "Till Salu"-banner.',
				'default_value' => 0,
			),
			array (
				'key' => 'field_52dc03323782e',
				'label' => 'Bilder',
				'name' => 'images',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_52dc05065eca5',
						'label' => 'Bild',
						'name' => 'image',
						'type' => 'image',
						'required' => 1,
						'column_width' => 30,
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_52dc05205eca6',
						'label' => 'Bildtext / Beskrivning',
						'name' => 'image_caption',
						'type' => 'textarea',
						'column_width' => 70,
						'default_value' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Image',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'excerpt',
				1 => 'custom_fields',
				2 => 'discussion',
				3 => 'comments',
				4 => 'slug',
				5 => 'author',
				6 => 'format',
				7 => 'tags',
				8 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}


?>