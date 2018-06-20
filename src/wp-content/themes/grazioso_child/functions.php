<?php
// 親テーマと子テーマのCSSを読み込み
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('parent-style')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/core.css',  array('parent-style') );
}

register_sidebar(array(
     'name' => 'SingleSidebar' ,
     'id' => 'single-sidebar' ,
     'before_widget' => '<div class="widget">',
     'after_widget' => '</div>',
     'before_title' => '<h2>',
     'after_title' => '</h2>'
));

/* ビジュアルエディタがタグを勝手に削除するのを阻止 */
function custom_tiny_mce_before_init( $init_array ) {
global $allowedposttags;
$init_array['valid_elements'] = '*[*]'; //すべてのタグを許可(削除されないように)
$init_array['extended_valid_elements'] = '*[*]'; //すべてのタグを許可(削除されないように)
$init_array['valid_children'] = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']'; //aタグ内にすべてのタグを入れられるように
$init_array['indent'] = true; //インデントを有効に
$init_array['wpautop'] = false; //テキストやインライン要素を自動的にpタグで囲む機能を無効に
$init_array['force_p_newlines'] = false; //改行したらpタグを挿入する機能を無効に
return $init_array;
}
add_filter( 'tiny_mce_before_init', 'custom_tiny_mce_before_init' );

?>