<?php 
add_action( 'init', 'Hp_Cpt' );

function Hp_Cpt() {
	$args = [
		'label'  => esc_html__( 'Объекты недвижимости', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Объекты недвижимости', 'Hp_Cpt' ),
			'name_admin_bar'     => esc_html__( 'Объект недвижимости', 'Hp_Cpt' ),
			'add_new'            => esc_html__( 'Добавить объект', 'Hp_Cpt' ),
			'add_new_item'       => esc_html__( 'Добавить новый объект', 'Hp_Cpt' ),
			'new_item'           => esc_html__( 'Новый объект недвижимости', 'Hp_Cpt' ),
			'edit_item'          => esc_html__( 'Редактировать объект недвижимости', 'Hp_Cpt' ),
			'view_item'          => esc_html__( 'Просмотр объекта недвижимости', 'Hp_Cpt' ),
			'update_item'        => esc_html__( 'Просмотр объекта недвижимости', 'Hp_Cpt' ),
			'all_items'          => esc_html__( 'Все объекты', 'Hp_Cpt' ),
			'search_items'       => esc_html__( 'Поиск объекта недвижимости', 'Hp_Cpt' ),
			'parent_item_colon'  => esc_html__( 'Родительский объект недвижимости', 'Hp_Cpt' ),
			'not_found'          => esc_html__( 'Объекты недвижимости не найдены', 'Hp_Cpt' ),
			'not_found_in_trash' => esc_html__( 'Объекты недвижимости не найдены в корзине', 'Hp_Cpt' ),
			'name'               => esc_html__( 'Объекты недвижимости', 'Hp_Cpt' ),
			'singular_name'      => esc_html__( 'Объект недвижимости', 'Hp_Cpt' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-building',
		'supports' => [
			'title'
		],
		
		'rewrite' => true
	];

	register_post_type( 'estate', $args );
}