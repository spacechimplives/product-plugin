<?php

function get_product_atts($prod_id = '45') {

//Get from Custom Fields
        $title = get_the_title($prod_id);
        $price = get_field('price',$prod_id);
        $type = get_field('type',$prod_id);
        $description = get_field('description',$prod_id);		
        $img = get_field('image',$prod_id);
//Return in Array to Output
        return [
        'title' => $title,
        'type' => $type,
        'level' => $level,
        'os' => $os,
        'img' => $img['url'],
        'price' => $price,
        'panel' => $panel,
        'db' => 'mssql',
        'features-summ' => $features_summ,
        'features-full' => $features_full,
        'link' => $link,
        'button_color' => $butt
    ];
    
}

function get_product_json($prod_id = '172') {

//Get from Custom Fields
        $title = get_the_title($prod_id);
        $price = get_field('price',$prod_id);
        $type = get_field('type',$prod_id);		
        $description = get_field('description',$prod_id);
		$img = get_field('image',$prod_id);
//Return in Array to Output
        return json_encode([
        'title' => $title,
        'type' => $type,
        'img' => $img['url'],
        'price' => $price,
    ]);
    
    
}