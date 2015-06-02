<?php
/*
* Plugin Name: Products Tools 
* Description: products widget 
*/

/*
//require_once(plugin_dir_path( __FILE__ ).'get-product.php');
//require_once(plugin_dir_path( __FILE__ ).'output.php');
//require_once(plugin_dir_path( __FILE__ ).'shortcode.php');
//require_once(plugin_dir_path( __FILE__ ).'all-products.php');
//require_once(plugin_dir_path( __FILE__ ).'add-templates.php');
//require(plugin_dir_path( __FILE__ ).'products-json.php');
//require(plugin_dir_path( __FILE__ ).'create-page.php');
//require(plugin_dir_path( __FILE__ ).'widget.php');
//require(plugin_dir_path( __FILE__ ).'widget2.php');
*/

function product_box_cpt() {
	register_post_type( 'product', array(  
		'labels' => array(    'name' => 'Products',    
			'singular_name' => 'Product',   ),  
		'description' => 'Hosting Prodcuts.',  
		'public' => true,  
		'menu_position' => 8,  
		'supports' => array( 'title', 'editor', 'custom-fields' ),  
		'has_archive' => 'products')
	);
}
		
		
function product_box_scripts() {	
	wp_enqueue_script( 'angular', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js', array(), '1.3.15', true);	
	wp_enqueue_script( 'product-box-js', plugin_dir_url( __FILE__ ).'product-box.js', array('angular'), null, true);
}

//init actionsadd_action( 'init', 'product_box_cpt' );
//add_action('init','check_pages_live');

//add scripts

add_action( 'wp_enqueue_scripts', 'product_box_scripts' );
//add shortcodes

add_shortcode('product_box', 'product_box');
add_shortcode('product_boxes','do_all_boxes');

//add actions

add_action('put_products_json','do_all_json');
add_action('put_products_json','do_single_json');

//add angular attribute to header

function html_ng_app() {	
	if ( is_singular('product') ){    
		$output = 'ng-app="productStore"';    
		return $output;	
	}	
	else { 
		return null;
	}
}

add_filter('language_attributes', 'html_ng_app' );

//test sidebar
/*register_sidebar( array(	
	'name' => __( 'Product Sidebar', 'theme_text_domain' ),	
	'id' => 'product-display-sidebar',	
	'description' => 'displays products',    
	'class' => '',	
	'before_widget' => '<li id="%1$s" class="widget %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h2 class="widgettitle">',	
	'after_title' => '</h2>' ));*/