<?php 

add_action( 'init', 'Hp_taxonomy' );

function Hp_taxonomy() {
	$args = [
		'label'  => esc_html__( 'Районы', 'Hp_taxonomy' ),
		'labels' => [
			'menu_name'                  => esc_html__( 'Районы', 'Hp_taxonomy' ),
			'all_items'                  => esc_html__( 'Все районы', 'Hp_taxonomy' ),
			'edit_item'                  => esc_html__( 'Редактировать район', 'Hp_taxonomy' ),
			'view_item'                  => esc_html__( 'Просмотр района', 'Hp_taxonomy' ),
			'update_item'                => esc_html__( 'Обновить район', 'Hp_taxonomy' ),
			'add_new_item'               => esc_html__( 'Добавить новый район', 'Hp_taxonomy' ),
			'new_item'                   => esc_html__( 'Новый район', 'Hp_taxonomy' ),
			'parent_item'                => esc_html__( 'Родительский район', 'Hp_taxonomy' ),
			'parent_item_colon'          => esc_html__( 'Родительский район', 'Hp_taxonomy' ),
			'search_items'               => esc_html__( 'Поиск района', 'Hp_taxonomy' ),
			'popular_items'              => esc_html__( 'Популярные районы', 'Hp_taxonomy' ),
			'separate_items_with_commas' => esc_html__( 'Районы через запятую', 'Hp_taxonomy' ),
			'add_or_remove_items'        => esc_html__( 'Добавить или удалить районы', 'Hp_taxonomy' ),
			'choose_from_most_used'      => esc_html__( 'Используйте из частых районов', 'Hp_taxonomy' ),
			'not_found'                  => esc_html__( 'Районы не найдены', 'Hp_taxonomy' ),
			'name'                       => esc_html__( 'Районы', 'Hp_taxonomy' ),
			'singular_name'              => esc_html__( 'Район', 'Hp_taxonomy' ),
		],
		'public'               => true,
		'show_ui'              => true,
		'show_in_menu'         => true,
		'show_in_nav_menus'    => true,
		'show_tagcloud'        => true,
		'show_in_quick_edit'   => true,
		'show_admin_column'    => true,
		'show_in_rest'         => true,
		'hierarchical'         => false,
		'query_var'            => true,
		'sort'                 => false,
		'rewrite_no_front'     => false,
		'rewrite_hierarchical' => false,
		'rewrite' => true
	];
	register_taxonomy( 'district', [ 'estate' ], $args );
}