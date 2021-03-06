<div id="page-content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Update car: <small><?php echo $car['year']." ".$car['make']." ".$car['model']." ".$car['serie'] ?></small>
                </h1>
				<hr>

				<?php if (!empty(validation_errors())) : ?>
				<div class="alert alert-danger"><?php echo validation_errors(); ?></div>
				<?php endif ?>

				<form id="new_car_form" class="form" method="post" accept-charset="utf-8" action="<?= site_url('car/update') ?>/<?php echo $car['VIN'] ?> ">

					<!-- Car information -->
					<fieldset>
						<legend>Vehicle information</legend>

						<div class="form-group col-xs-12">
							<input type="text" class="form-control" name="VIN" value="<?php echo $car['VIN'] ?>">
						</div>

						<div class="form-group col-xs-12">
							<select class="form-control" name="make_id" disabled>
								<?php 
									$model = $this->model_model->get($car[0]['model_id'])[0];
									$make = $this->make_model->get($model[0]['make_id'])[0];
								?>
								<option value="<?php echo $make['id'] ?>" selected><?php echo $make['name'] ?></option>
							</select>
						</div>

						<div class="form-group col-xs-12">
							<select class="form-control" name="model_id">
								<option value="<?php echo $model['id'] ?>" selected><?php echo $model['name']." ".$model['serie'] ?></option>
							</select>
						</div>

						<div class="form-group col-xs-4">
							<label for="year">Year</label>
							<input type="number" class="form-control right" name="year" min="1900" max="2027" value="<?php echo $car['year'] ?>">
						</div>

						<div class="form-group col-xs-4">
							<label for="mileage">Mileage</label>
							<input type="number" class="form-control right" name="mileage" min="0" max="1000000" value="<?php echo $car['mileage'] ?>">
						</div>

						<div class="form-group col-xs-4">
							<label for="mileage">Estimated price</label>
							<input type="text" class="form-control right" name="estimated_price" value="<?php echo $car['estimated_price'] ?>">
						</div>

						<div class="form-group col-xs-12">
							<select class="form-control" name="color">
								<?php foreach ($colors as $color): ?>
								<option value="<?php echo $color ?>" <?php if ($car['color'] == $color) { echo "selected"; } ?>><?php echo $color ?></option>
								<?php endforeach ?>
							</select>
						</div>						

						<div class="form-group col-xs-12">
							<textarea class="form-control" name="description"><?php echo $car['description'] ?></textarea>
						</div>

					</fieldset>

					<!--
					<div class="center">
						<a href="#" id="add-more-features" class="btn btn-link">Add more feature...</a>
						<br />
						<br />
					</div>
					-->

					<!-- Features -->
					<fieldset id="fields-for-features">
						<legend>Additional features</legend>

						<div class="form-group col-xs-4">
							<label for="engine">Engine</label>
							<input type="text" class="form-control" name="engine" value="<?php echo $feature['engine'] ?>">
						</div>

						<div class="form-group col-xs-4">
							<label for="transmission">Transmission</label>
							<input type="text" class="form-control" name="transmission" value="<?php echo $feature['transmission'] ?>">
						</div>

						<div class="form-group col-xs-4">
							<label for="powertrain">Drive train</label>
							<select class="form-control" name="powertrain">
								<option value="FWD" <?php if ($feature['powertrain'] == "FWD") echo "selected"; ?>>FWD</option>
								<option value="RWD" <?php if ($feature['powertrain'] == "RWD") echo "selected"; ?>>RWD</option>
								<option value="AWD" <?php if ($feature['powertrain'] == "AWD") echo "selected"; ?>>AWD</option>
								<option value="4WD" <?php if ($feature['powertrain'] == "4WD") echo "selected"; ?>>4WD</option>
							</select>
						</div>

						<p class="sub-legend"><strong>Fuel economy (L/100km)</strong></p>

						<div class="form-group col-xs-6">
							<label for="city_fuel_consumption">City</label>
							<input type="number" class="form-control" name="city_fuel_consumption" value="<?php echo $feature['city_fuel_consumption'] ?>">
						</div>

						<div class="form-group col-xs-6">
							<label for="hw_fuel_consumption">Highway</label>
							<input type="number" class="form-control" name="hw_fuel_consumption" value="<?php echo $feature['hw_fuel_consumption'] ?>">
						</div>

						<p class="sub-legend"><strong>Comfort</strong></p>

						<div class="form-group col-sm-4">
							<?php
								if ($feature['cruise_control'] == 1) {
									$cruise_control = "checked";
								} else {
									$cruise_control = "";
								}
							?>
							<input type="checkbox" name="cruise_control" value="1" <?php echo $cruise_control ?>> Cruise Control
						</div>

						<div class="form-group col-sm-4">
							<?php
								if ($feature['air_conditioner'] == 1) {
									$air_conditioner = "checked";
								} else {
									$air_conditioner = "";
								}
							?>
							<input type="checkbox" name="air_conditioner" value="1" <?php echo $air_conditioner ?>> Air Conditioner
						</div>

						<div class="form-group col-sm-4">
							<?php
								if ($feature['satellite_radio'] == 1) {
									$satellite_radio = "checked";
								} else {
									$satellite_radio = "";
								}
							?>
							<input type="checkbox" name="satellite_radio" value="1" <?php echo $satellite_radio ?>> Satellite Radio
						</div>

						<div class="form-group col-sm-4">
							<?php
								if ($feature['airbags'] == 1) {
									$airbags = "checked";
								} else {
									$airbags = "";
								}
							?>
							<input type="checkbox" name="airbags" value="1" <?php echo $airbags ?>> Airbags
						</div>

						<div class="form-group col-sm-4">
							<?php
								if ($feature['sunroof'] == 1) {
									$sunroof = "checked";
								} else {
									$sunroof = "";
								}
							?>
							<input type="checkbox" name="sunroof" value="1" <?php echo $sunroof ?>> Sunroof
						</div>

						<div class="form-group col-xs-12">
							<label for="interior">Interior</label>
							<select class="form-control" name="interior">
								<option value="Leather" <?php if ($feature['interior'] == "Leather") echo "selected"; ?>>Leather</option>
								<option value="Upholstery" <?php if ($feature['interior'] == "Upholstery") echo "selected"; ?>>Upholstery</option>
								<option value="Fabric" <?php if ($feature['interior'] == "Fabric") echo "selected"; ?>>Fabric</option>
							</select>
						</div>
					</fieldset>

					<hr />

					<div class="form-group col-xs-12">
						<input type="submit" class="btn btn-primary" value="Update">
						<a href="<?= site_url('car') ?>" class="btn btn-link">Cancel</a>
					</div>

				</form>

			</div>
		</div>
	</div>

</div><!-- end of page-content-wrapper -->

<script>
$(document).ready(function(){

	// Hide feature form
	// -----------------
	/*
	$('#fields-for-features').hide();
	$('#add-more-features').click(function() {
		$(this).parent().hide();
		$('#fields-for-features').show();
	});
	*/
	// -----------------

	// Hide client form
	// ----------------
	if ($('#field-for-client-select').val() == "X") {
		$('#fields-for-client').show();
		$('fields-for-client-select').hide();
	} else {
		$('#fields-for-client').hide();
		$('fields-for-client-select').show();
	};

	// $('#fields-for-client').hide();
	$('#field-for-client-select').on('change', function() {
		if ($(this).val() == "X") {
			$('#fields-for-client').show();
			$('#fields-for-client-select').hide();
		};
	});
	// ----------------

});
</script>