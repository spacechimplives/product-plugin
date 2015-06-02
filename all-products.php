<?php


function do_all_boxes($atts=null,$content=null){
$type = 'product';
$output = '';
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
    $output.= output_box(get_product_atts($id));
  endwhile;
} else{
    $output = 'No Products Matched that Query';
}
wp_reset_query();
return $output;
}