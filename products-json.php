<?php

function do_all_json($atts=null,$content=null){
$type = 'product';
$output = [];
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'caller_get_posts'=> 1
  );

$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
  while ($my_query->have_posts()) : $my_query->the_post(); 
    $id = get_the_ID(); 
    $output.= get_product_json($id);
  endwhile;
} else{
    $output = json_encode(['data'=>'nope']);
}
wp_reset_query();
header('Content-Type: application/json');
echo json_encode($output);
}

//do_action('put_products_json');