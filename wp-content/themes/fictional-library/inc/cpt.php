<?php
// Register Custom Post Type
function custom_post_type_books() {

    $labels = array(
        'name'                  => _x( 'Books', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Books', 'text_domain' ),
        'name_admin_bar'        => __( 'Books', 'text_domain' ),
        'archives'              => __( 'Books', 'text_domain' ),
        'attributes'            => __( 'Book Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Book Item:', 'text_domain' ),
        'all_items'             => __( 'All Books', 'text_domain' ),
        'add_new_item'          => __( 'Add New Book', 'text_domain' ),
        'add_new'               => __( 'Add New Book', 'text_domain' ),
        'new_item'              => __( 'New Book', 'text_domain' ),
        'edit_item'             => __( 'Edit Book', 'text_domain' ),
        'update_item'           => __( 'Update Book', 'text_domain' ),
        'view_item'             => __( 'View Book', 'text_domain' ),
        'view_items'            => __( 'View Books', 'text_domain' ),
        'search_items'          => __( 'Search Books', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into Book', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Book', 'text_domain' ),
        'items_list'            => __( 'Books list', 'text_domain' ),
        'items_list_navigation' => __( 'Books navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter Books list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Book', 'text_domain' ),
        'description'           => __( 'books of johns library', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => false,
    );
    register_post_type( 'books', $args );

}
add_action( 'init', 'custom_post_type_books', 0 );

// Register Custom Taxonomy
function custom_taxonomy_topics() {

    $labels = array(
        'name'                       => _x( 'Topics', 'Taxonomy General Name', 'johns-library' ),
        'singular_name'              => _x( 'Topic', 'Taxonomy Singular Name', 'johns-library' ),
        'menu_name'                  => __( 'Topics', 'johns-library' ),
        'all_items'                  => __( 'All Topics', 'johns-library' ),
        'parent_item'                => __( 'Parent Topics', 'johns-library' ),
        'parent_item_colon'          => __( 'Parent Topics:', 'johns-library' ),
        'new_item_name'              => __( 'New Topic', 'johns-library' ),
        'add_new_item'               => __( 'Add New Topic', 'johns-library' ),
        'edit_item'                  => __( 'Edit Topic', 'johns-library' ),
        'update_item'                => __( 'Update Topic', 'johns-library' ),
        'view_item'                  => __( 'View Topic', 'johns-library' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'johns-library' ),
        'add_or_remove_items'        => __( 'Add or remove Topics', 'johns-library' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'johns-library' ),
        'popular_items'              => __( 'Popular Topics', 'johns-library' ),
        'search_items'               => __( 'Search Topics', 'johns-library' ),
        'not_found'                  => __( 'Not Found', 'johns-library' ),
        'no_terms'                   => __( 'No items', 'johns-library' ),
        'items_list'                 => __( 'Items list', 'johns-library' ),
        'items_list_navigation'      => __( 'Items list navigation', 'johns-library' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'topics', array( 'books' ), $args );

}
add_action( 'init', 'custom_taxonomy_topics', 0 );
