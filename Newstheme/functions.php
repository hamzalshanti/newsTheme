<?php


function roya_inc_files(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
  require_once get_template_directory() . '/inc/post_type.php';
  require_once get_template_directory() . '/inc/theme-setting.php';
}
add_action( 'after_setup_theme', 'roya_inc_files' );

function roya_add_style() {

  wp_enqueue_style('fontasomecss', get_template_directory_uri() . '/assets/css/all.min.css', array(), '4.0.1', 'all');

  wp_enqueue_style('bootstrapCss', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.5', 'all');

   wp_enqueue_style('style', get_stylesheet_uri()); 

   wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '4.4.1', true);

  wp_enqueue_script('bootstrapJs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.5', true);

  wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), '4.4.1', true);

  
         

}
add_action('wp_enqueue_scripts', 'roya_add_style');



function roya_register_manus() {
  register_nav_menu('main-menu', 'Header Menu');
  register_nav_menus(array(
    'main-menu' => 'Header Menu',
));  
}
add_action('init' , 'roya_register_manus');



function roya_register_components(){
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo');
}
add_action('init','roya_register_components');


add_filter( 'wpseo_breadcrumb_links', 'wpseo_breadcrumb_remove_postname' );
function wpseo_breadcrumb_remove_postname( $links ) {
	if( sizeof($links) > 1 ){
		array_pop($links);
	}
	return $links;
}



function roya_widgets() {

  register_sidebar( 
   array(
    'name'          => 'المشاهدات اليومية',
    'id'            => "daily_pop",
    'description'   => '',
    'class'         => '',
    'before_widget' => '',
    'after_widget'  => "",
    'before_title'  => '',
    'after_title'   => "",
  )
  
  );

  register_sidebar( 
    array(
     'name'          => 'المشاهدات اليومية',
     'id'            => "daily_pop",
     'description'   => '',
     'class'         => '',
     'before_widget' => '',
     'after_widget'  => "",
     'before_title'  => '',
     'after_title'   => "",
   )
   
   );

   register_sidebar( 
    array(
     'name'          => 'المشاهدات الاسبوعية',
     'id'            => "weekly_pop",
     'description'   => '',
     'class'         => '',
     'before_widget' => '',
     'after_widget'  => "",
     'before_title'  => '',
     'after_title'   => "",
   )
   
   );

   register_sidebar( 
    array(
     'name'          => 'المشاهدات الشهرية',
     'id'            => "monthly_pop",
     'description'   => '',
     'class'         => '',
     'before_widget' => '',
     'after_widget'  => "",
     'before_title'  => '',
     'after_title'   => "",
   )
   
   );

   register_sidebar( 
    array(
     'name'          => 'الأكثر قراءة',
     'id'            => "alltime_pop",
     'description'   => '',
     'class'         => '',
     'before_widget' => '',
     'after_widget'  => "",
     'before_title'  => '',
     'after_title'   => "",
   )
   
   );
   register_sidebar( 
    array(
     'name'          => 'اطياف',
     'id'            => "atyaf",
     'description'   => '',
     'class'         => '',
     'before_widget' => '',
     'after_widget'  => "",
     'before_title'  => '',
     'after_title'   => "",
   )
   
   );
}

add_action('widgets_init', 'roya_widgets' );
