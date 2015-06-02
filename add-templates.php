<?php



add_filter('template_include', 'products_template');

function products_template( $template ) {
    //archive
  if ( is_post_type_archive('product') ) {
    $theme_files = array('archive-product.php', 'product-box/archive-product.php');
    $exists_in_theme = locate_template($theme_files, false);
    if ( $exists_in_theme != '' ) {
      return $exists_in_theme;
    } else {
      return plugin_dir_path(__FILE__) . 'templates/archive-product.php';
    }
  }
  //single
    if ( is_singular('product') ) {
    $theme_files = array('single-product.php', 'product-box/single-product.php');
    $exists_in_theme = locate_template($theme_files, false);
    if ( $exists_in_theme != '' ) {
      return $exists_in_theme;
    } else {
      return plugin_dir_path(__FILE__) . 'templates/single-product.php';
    }
  }

  return $template;
}



