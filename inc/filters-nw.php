<?php

// Shortcode: [estate_ajax_filter_search]
function estate_ajax_filter_search_shortcode() {
    ob_start(); 
	
	$disctricts = get_terms( 'district' );
	$estates = get_posts([
		'post_type' => 'estate',
		'numberposts' => -1,
	]);

	$estate_fields = array();
	$pre_estate_fields = get_field_objects();
	foreach ($pre_estate_fields as $field) {
		$estate_fields[] = $field['name'];
	}
	$estate_fields = array_unique($estate_fields);


	$room_fields = array();
	$pre_room_fields = get_field_objects()['room']['sub_fields'];

	//echo '<pre>'; print_r($pre_room_fields); echo '</pre>';
	foreach ($pre_room_fields as $field) {
		$room_fields[] = $field['name'];
	}
	$room_fields = array_unique($room_fields);


	$estate_values = array();
	foreach ($estate_fields as $field) {
		$pre_values = array();

		foreach ($estates as $estate) {
			$pre_values[] = get_field($field, $estate);
		}
		$pre_values = array_unique($pre_values);
		$estate_values[$field] = $pre_values; 
	}

	$room_values = array();
	foreach ($room_fields as $field) {
		$pre_values = array();
		//echo '<pre>'; print_r($field); echo '</pre>';

		foreach ($estate_values['room'] as $room) {
			//$pre_values[] = get_field($field, $estate);
			echo '<pre>'; print_r($room[$field]); echo '</pre>';
		}
		$pre_values = array_unique($pre_values);
		$room_values[$field] = $pre_values; 
	}
	 

	//echo '<pre>'; print_r($estate_fields); echo '</pre>';
	//echo '<pre>'; print_r($room_fields); echo '</pre>';
	//echo '<pre>'; print_r($room_fields); echo '</pre>';
	?>

	<div id="estate-ajax-filter-search">
		<form action="" method="get">
			<div class="row">
				<div class="col-12">
                    <label for="district">Район</label>
                    <select name="district" id="district">
						<?php 
							foreach ($disctricts as $district){ ?>
								<option value="<?php echo $district->slug ?>"> <?php echo $district->name ?> </option>
							<?php }
						?>
					</select>
                </div>
				<?php foreach ($estate_fields as $field) { 
					if ($field == 'room' ) {
						continue;
					}
					if ($field == 'photo' ) {
						continue;
					}
					if ($field == 'coordinates' ) {
						continue;
					}

					?>
					<div class="col-12">
						<label for="<?php echo $field; ?>"> <?php echo $field; ?> </label>
						<select name="<?php echo $field; ?>" id="<?php echo $field; ?>">
							<?php foreach ($estate_values[$field] as $option) { ?>
								<option value="<?php echo $option ?>"> <?php echo $option ?> </option>
							<?php } ?>
						</select>
					</div>
				<?php } ?>
			</div>
		</form>
		<ul id="ajax_filter_search_results"></ul>
	</div>

	
 

    <!-- <div id="estate-ajax-filter-search">
        <form action="" method="get">
            <div class="row">
                <div class="col">
                    <label for="district">Район</label>
                    <select name="district" id="district">
						<?php 
							foreach ($disctricts as $district){ ?>
								<option value="<?php echo $district->slug ?>"> <?php echo $district->name ?> </option>
							<?php }
						?>
					</select>
                </div>
                <div class="col">
                    <label for="home-name">home-name</label>
                    <select name="home-name" id="home-name">
						<?php 
							foreach ($estates as $estate){ ?>
								<option value="<?php //echo get_field() ?>"> <?php echo $district->name ?> </option>
							<?php }
						?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="language">Language</label>
                    <select name="language" id="language">
                        <option value="">Any Language</option>
                        <option value="english">English</option>
                        <option value="korean">Korean</option>
                        <option value="hindi">Hindi</option>
                        <option value="serbian">Serbian</option>
                        <option value="malayalam">Malayalam</option>
                    </select>
                </div>
                <div class="col">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre">
                        <option value="">Any Genre</option>
                        <option value="action">Action</option>
                        <option value="comedy">Comedy</option>
                        <option value="drama">Drama</option>
                        <option value="horror">Horror</option>
                        <option value="romance">Romance</option>
                    </select>
                </div>
            </div>
            <input type="submit" id="submit" name="submit" value="Search">
        </form>
        <ul id="ajax_filter_search_results"></ul>
    </div> -->

     
    <?php
    return ob_get_clean();
}
 
add_shortcode ('estate_ajax_filter_search', 'estate_ajax_filter_search_shortcode');
