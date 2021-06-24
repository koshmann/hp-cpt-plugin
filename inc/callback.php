<?php

add_action('wp_ajax_estate_filter', 'filter_search_callback');
add_action('wp_ajax_nopriv_estate_filter', 'filter_search_callback');
 
function filter_search_callback() {
 
	$tax_query = array();
 
    if(isset($_POST['district'])) {
        $district = $_POST['district'];
        $tax_query[] = array(
            'taxonomy' => 'district',
            'field' => 'id',
            'terms' => $district
        );
    }

    $meta_query = array('relation' => 'OR' ); // чтобы долго не искать

    if(isset($_POST['building-type'])) {
        $building_type = sanitize_text_field($_POST['building-type']);
        $meta_query[] = array(
            'key' => 'building-type',
            'value' => $building_type,
            'compare' => '='
        );
    }
 
    if(isset($_POST['stores-count'])) {
        $stores_count = sanitize_text_field($_POST['stores-count']);
        $meta_query[] = array(
            'key' => 'stores-count',
            'value' => $stores_count,
            'compare' => '=',
			'type' => 'NUMERIC'
        );
    }
 
    if(isset($_POST['ecology'])) {
        $ecology = $_POST['ecology'] ;
        $meta_query[] = array(
            'key' => 'ecology',
            'value' => $ecology,
            'compare' => '=',
			'type' => 'NUMERIC'        
		);
    }

	if(isset($_POST['rooms-count'])) {
        $rooms_count = $_POST['rooms-count'];
        $meta_query[] = array(
            'key' => 'room_rooms',
            'value' => $rooms_count,
            'compare' => '=',
			'type' => 'NUMERIC'
        );
    }
	
	//if both minimum price and maximum price are specified we will use BETWEEN comparison
	if( isset( $_POST['area-from'] ) && isset( $_POST['area-to'] ) ) {
		$meta_query[] = array(
			'key' => 'room_area',
			'value' => array( $_POST['area-from'], $_POST['area-to'] ),
			'type' => 'DECIMAL',
			'compare' => 'between'
		);
	} else {
		// if only min price is set
		if( isset( $_POST['area-from'] ) ){
			$meta_query[] = array(
				'key' => 'room_area',
				'value' => $_POST['area-from'],
				'type' => 'DECIMAL',
				'compare' => '>'
			);
		}
 
		// if only max price is set
		if( isset( $_POST['area-to'] ) ) {
			$meta_query[] = array(
				'key' => 'room_area',
				'value' => $_POST['area-to'],
				'type' => 'DECIMAL',
				'compare' => '<'
			);
		}
	}

	if(isset($_POST['balcony'])) {
        $balcony = sanitize_text_field($_POST['balcony']);
        $meta_query[] = array(
            'key' => 'room_balcony',
            'value' => $balcony,
            'compare' => '='
        );
    }
	if(isset($_POST['bathroom'])) {
        $bathroom = sanitize_text_field($_POST['bathroom']);
        $meta_query[] = array(
            'key' => 'room_bathroom',
            'value' => $bathroom,
            'compare' => '='
        );
    }
 
	$search_query = new WP_Query( array(
		'post_type' => 'estate',
		'posts_per_page' => 5,
		'meta_query' => $meta_query,
		'tax_query' => $tax_query,
	) );

 
    if ( $search_query->have_posts() ) { ?>
		<div class="estate-listings-row mt-3">
			<div class="row row-cols-1 row-cols-md-3">
				<?php while ( $search_query->have_posts() ) {
					$search_query->the_post(); ?>
					<div class="col pb-4">
						<article class="card">
							<?php
								$image = get_field('photo');
								$size = 'large';
								if( $image ) {
									echo wp_get_attachment_image( $image, $size, "", array( "class" => "card-img-top" ) );
								}
							?>
							<div class="card-body">
								<h5 class="card-title "> <?php echo get_the_title() ?> </h5>
								<div class="row border-top mb-2">
									<div class="col-6 border-right border-bottom py-2">
										<p class="small mb-0">Площадь </p> 
										<?php echo get_field('room')['area'] . ' м2'?> 
									</div>
									<div class="col-6 py-2 border-bottom">
										<p class="small mb-0">Комнат </p> 
										<?php echo get_field('room')['rooms']?> 
									</div>
									<div class="col-6 border-right py-2">
										<p class="small mb-0">Этажей </p> 
										<?php the_field('stores-count')?> 
									</div>
									<div class="col-6 py-2">
										<p class="small mb-0">Тип дома </p> 
										<?php the_field('building-type')?> 
									</div>
									<div class="col-12 border-top py-2"> <?php the_field('coordinates')?></div>
								</div>
								<a href="<?php echo get_post_permalink()?> " class="btn btn-primary">Подробнее</a>
							</div>
						</article>
					</div>
					<?php
				} ?>
			</div>
		</div>
		<?php

        wp_reset_query();
 
    } else {
        // no posts found
    }
    wp_die();
}