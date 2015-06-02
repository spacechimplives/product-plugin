<?php
function check_pages_live($pages=['products-json']){
    $ids =[];
    foreach($pages as $page){
        if(get_page_by_title() == NULL) {
            add_fly_template(create_pages_fly('products-json'));
            $ids .= null;
        } else {
            $page = get_page_by_title('products-json');
            add_fly_template($page->ID);
            $ids .= $page->ID;
        }
    }
    return $ids;
}
 function create_pages_fly($pageName) {
        $createPage = array(
          'post_title'    => $pageName,
          'post_content'  => 'Starter content',
          'post_status'   => 'publish',
          'post_author'   => 1,
          'post_type'     => 'page',
          'post_name'     => $pageName
        );

        // Insert the post into the database
        return wp_insert_post( $createPage );
}
function add_fly_template($id){
  
    $theme_files = array('archive-product.php', 'product-box/archive-product.php');
    $exists_in_theme = locate_template($theme_files, false);
    if ( $exists_in_theme != '' ) {
      return $exists_in_theme;
    } else {
        $file = 'example.txt';
        $newfile = 'example.txt.bak';

        if (!copy($file, $newfile)) {
            echo "failed to copy $file...\n";
        }
        return plugin_dir_path(__FILE__) . 'templates/archive-product.php';
    }
  
}