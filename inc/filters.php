<?php

// Shortcode: [estate_ajax_filter_search]
function estate_ajax_filter_search_shortcode() {

	function my_ajax_filter_search_scripts() {
		wp_enqueue_script( 'ajax_filter_search', get_stylesheet_directory_uri() . '/script.js', array(), '1.0', true );
		wp_localize_script( 'ajax_filter_search', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
	my_ajax_filter_search_scripts();

    ob_start(); 
	?>

    <div id="estate-ajax-filter-search">
        <form action="estate_filter" method="POST">
            <div class="row form-group">
                <div class="col col-6 col-md-3">
                    <label for="district">Район</label>
                    <select name="district" id="district" class="form-control">
						<?php 
							foreach (get_terms( 'district' ) as $district){ ?>
								<option value="<?php echo $district->id ?>"> <?php echo $district->name ?> </option>
							<?php }
						?>
					</select>
                </div>
                <div class="col col-6 col-md-3">
                    <label for="building-type">Тип дома</label>
                    <select name="building-type" id="building-type" class="form-control">
						<option value=""> Любой </option>
						<option value="панель"> Панель </option>
						<option value="кирпич"> Кирпич </option>
						<option value="пеноблок"> Пеноблок </option>
                    </select>
                </div>
				<div class="col col-6 col-md-3">
                    <label for="stores-count">Количество этажей</label>
                    <select name="stores-count" id="stores-count" class="form-control">
						<option value=""> Любое </option>
						<?php 
							for ($i = 1; $i <= 20; $i++){ ?>
								<option value="<?php echo $i ?>"> <?php echo $i ?> </option>
							<?php }
						?>
                    </select>
                </div>
				<div class="col col-6 col-md-3">
                    <label for="ecology">Экология</label>
                    <select name="ecology" id="ecology" class="form-control">
						<option value=""> Любая </option>
						<?php 
							for ($i = 1; $i <= 5; $i++){ ?>
								<option value="<?php echo $i ?>"> <?php echo $i ?> </option>
							<?php }
						?>
                    </select>
                </div>
				<div class="col col-6 col-md-3">
                    <label for="rooms-count">Количество комнат</label>
                    <select name="rooms-count" id="rooms-count" class="form-control">
						<option value=""> Любое </option>
						<?php 
							for ($i = 1; $i <= 4; $i++){ ?>
								<option value="<?php echo $i ?>"> <?php echo $i ?> </option>
							<?php }
						?>
                    </select>
                </div>
				<div class="col col-6 col-md-3">
                    <label for="area">Площадь м2</label>
					<div class="row mx-0">
						<input type="text" id="area-from" name="area-from" placeholder="от" class="form-control col-6" />
						<input type="text" id="area-to" name="area-to" placeholder="до" class="form-control col-6" />
					</div>
                </div>
				<div class="col col-6 col-md-3">
                    <label for="balcony">Балкон</label>
                    <select name="balcony" id="balcony" class="form-control">
						<option value=""> Неважно </option>
						<option value="Есть"> Есть </option>
						<option value="Нет"> Нет </option>
                    </select>
                </div>
				<div class="col col-6 col-md-3">
                    <label for="bathroom">Ванная комната</label>
                    <select name="bathroom" id="bathroom" class="form-control">
						<option value=""> Неважно </option>
						<option value="Есть"> Есть </option>
						<option value="Нет"> Нет </option>
                    </select>
                </div>
            </div>

            <button class="btn btn-primary btn-lg" type="submit"> Поиск</button>
			<input type="hidden" name="action" value="estate_filter">

        </form>
        <div id="ajax_filter_search_results"></div>
    </div>

     
    <?php
    return ob_get_clean();
}
 
add_shortcode ('estate_ajax_filter_search', 'estate_ajax_filter_search_shortcode');