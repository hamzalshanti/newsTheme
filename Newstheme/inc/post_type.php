<?php 


function roya_register_post_type(){

$args  = array(
	'label' => 'الجرائد' , 
    'public' => true ,
    'has_archive' => true,
    'supports' => array('title','thumbnail', 'custom-fields')
);
register_post_type( 'journal', $args );

$args  = array(
	'label' => 'وظائف' , 
    'public' => true ,
    'has_archive' => true,
    'supports' => array('title', 'custom-fields')
);
register_post_type( 'job', $args );

}

add_action( 'init', 'roya_register_post_type' );


// function wpdocs_codex_book_init() {
//   $labels = array(
//       'name'                  => 'Books',
//       'singular_name'         => 'Book',
//       'menu_name'             => 'Books',
//       'name_admin_bar'        => 'Book',
//       'add_new'               => 'Add New ',
//       'add_new_item'          => 'Add New Book',
//       'new_item'              => 'New Book',
//       'edit_item'             => 'Edit Book',
//       'view_item'             => 'View Book',
//       'all_items'             => 'All Books',
//       'search_items'          => 'Search Books',
//       'parent_item_colon'     => 'Parent Books:',
//       'not_found'             => 'No books found.',
//       'not_found_in_trash'    => 'No books found in Trash.',
//       'featured_image'        => 'Book Cover Image',
//       'set_featured_image'    => 'Set cover image',
//       'remove_featured_image' => 'Remove cover image',
//       'use_featured_image'    => 'Use as cover image',
//       'archives'              => 'Book archives',
//       'uploaded_to_this_item' => 'Uploaded to this book',
//       'filter_items_list'     => 'Filter books list',
//       'items_list_navigation' => 'Books list navigation',
//       'items_list'            => 'Books list',
//   );

//   $args = array(
//       'labels'             => $labels,
//       'public'             => true,
//       'publicly_queryable' => true,
//       'show_ui'            => true,
//       'show_in_menu'       => true,
//       'query_var'          => true,
//       'rewrite'            => array( 'slug' => 'book' ),
//       'capability_type'    => 'post',
//       'has_archive'        => true,
//       'hierarchical'       => false,
//       'menu_position'      => null,
//       'menu_icon'          => 'dashicons-book',
//       'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields' ),
//   );

//   register_post_type( 'book', $args );
// }

// add_action( 'init', 'wpdocs_codex_book_init' );



// function book_taxonomy() {

//   $args = array(
//     'label'=> 'Brands',
//     'hierarchical' => true,
//   );
// register_taxonomy('brand', 'book', $args );

//   $args = array(
//     'label'=> 'Key Words',
//   );
// register_taxonomy('key_words', 'book', $args );


// }
// add_action( 'init', 'book_taxonomy');


