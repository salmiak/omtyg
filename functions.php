<?php

//---------------------------------------------------------------------------------
//	Aktivera olika inbyggd funktionallitet
//---------------------------------------------------------------------------------

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


add_image_size( 'fp_sm', 400, 400, true );
add_image_size( 'fp_lg', 600, 600, true );



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
	echo '<script type="text/javascript">';
	echo 'var _gaq = _gaq || [];';
	echo '_gaq.push(["_setAccount", "UA-XXXXXXX-X"]);';
	echo '_gaq.push(["_trackPageview"]);';
	echo '(function() {';
	echo 'var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;';
	echo 'ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";';
	echo 'var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);';
	echo '})();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

?>