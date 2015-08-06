<div id="page-content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Add new car to inventory</h1>

				<hr>

				<!-- div id="new_make_form_error" class="alert alert-danger center" --><!-- Dynamic --><!-- /div -->
				<?php echo validation_errors(); ?>

				<!-- form id="new_model_form" class="form" method="post" accept-charset="utf-8" action="add" enctype="multipart/form-data" -->

				<form id="new_car_form" class="form" method="post" accept-charset="utf-8" action="<?= site_url('car/add') ?>">

					<!-- Car information -->
					<fieldset>
						<legend>Vehicle information</legend>

						<div class="form-group col-xs-12">
							<input type="text" class="form-control" name="VIN" placeholder="VIN">
						</div>

						<div class="form-group col-xs-12">
							<select class="form-control" name="make_id">
								<?php foreach ($makes as $make): ?>
								<option value="<?php echo $make['id'] ?>"><?php echo $make['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-xs-12">
							<select class="form-control" name="model_id">
								<option>Select a model...</option>
								<option class="divider"></option>

								<?php foreach ($models as $model): ?>
								<option value="<?php echo $model['id'] ?>"><?php echo $model['name']." ".$model['serie'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-xs-4">
							<label for="year">Year</label>
							<input type="number" class="form-control" name="year" min="1900" max="2027">
						</div>

						<div class="form-group col-xs-4">
							<label for="mileage">Mileage</label>
							<input type="number" class="form-control" name="mileage" min="0" max="1000000">
						</div>

						<div class="form-group col-xs-4">
							<label for="mileage">Estimated price</label>
							<input type="text" class="form-control" name="estimated_price" placeholder="Estimated Price">
						</div>

						<div class="form-group col-xs-12">
							<select class="form-control" name="color">
								<?php foreach ($colors as $color): ?>
								<option value="<?php echo $color ?>"><?php echo $color ?></option>
								<?php endforeach ?>
							</select>
						</div>						

						<div class="form-group col-xs-12">
							<textarea class="form-control" name="description" placeholder="Description (optional)"></textarea>
						</div>

					</fieldset>

					<div class="center">
						<a href="#fields-for-features" id="add-more-features" class="btn btn-link">Add more feature...</a>
						<br />
						<br />
					</div>

					<!-- Features -->
					<fieldset id="fields-for-features">
						<legend>Additional features</legend>

						<div class="form-group col-xs-4">
							<label for="engine">Engine</label>
							<input type="text" class="form-control" name="engine" placeholder="e.g. 3.5L V6">
						</div>

						<div class="form-group col-xs-4">
							<label for="transmission">Transmission</label>
							<input type="text" class="form-control" name="transmission" placeholder="e.g. 6-Speed Manual">
						</div>

						<div class="form-group col-xs-4">
							<label for="powertrain">Drive train</label>
							<select class="form-control" name="powertrain">
								<option value="FWD">FWD</option>
								<option value="RWD">RWD</option>
								<option value="AWD">AWD</option>
								<option value="4WD">4WD</option>
							</select>
						</div>

						<p class="sub-legend"><strong>Fuel economy (L/100km)</strong></p>

						<div class="form-group col-xs-6">
							<label for="city_fuel_consumption">City</label>
							<input type="number" class="form-control" name="city_fuel_consumption">
						</div>

						<div class="form-group col-xs-6">
							<label for="hw_fuel_consumption">Highway</label>
							<input type="number" class="form-control" name="hw_fuel_consumption">
						</div>

						<p class="sub-legend"><strong>Comfort</strong></p>

						<div class="form-group col-sm-4">
							<input type="checkbox" name="cruise_control" value="1"> Cruise Control
						</div>

						<div class="form-group col-sm-4">
							<input type="checkbox" name="air_conditioner" value="1"> Air Conditioner
						</div>

						<div class="form-group col-sm-4">
							<input type="checkbox" name="satellite_radio" value="1"> Satellite Radio
						</div>

						<div class="form-group col-sm-4">
							<input type="checkbox" name="airbags" value="1"> Airbags
						</div>

						<div class="form-group col-sm-4">
							<input type="checkbox" name="sunroof" value="1"> Sunroof
						</div>

						<div class="form-group col-xs-12">
							<label for="interior">Interior</label>
							<select class="form-control" name="interior">
								<option value="Leather">Leather</option>
								<option value="Upholstery">Upholstery</option>
								<option value="Fabric">Fabric</option>
							</select>
						</div>
					</fieldset>

					<!-- Client/Suplier information -->
					<fieldset>
						<legend>Supplier information</legend>

						<div id="fields-for-client-select" class="form-group col-xs-12">
							<select id="field-for-client-select" class="form-control" name="client_id" onchange='show_client_form()'>
								<option>Select supplier...</option>
								<option class="divider"></option>

                                <?php foreach ($clients as $client): ?>
                                    <option value="<?php echo $client['name'] ?>"><?php echo $client['name'] ?></option>
                                <?php endforeach ?>

								<option class="divider"></option>
								<option>Not in list</option>
							</select>
						</div>

						<div id="fields-for-client">
							<!-- Hidden by default. Visible when client is not in list. -->

							<div class="form-group col-xs-12">
								<input type="text" class="form-control" name="client_name" placeholder="Name">
							</div>

							<!-- Address -->
							<div class="form-group col-xs-12">
								<input type="text" class="form-control" name="client_address" placeholder="Address">
							</div>

							<!-- City, Province -->
							<div class="form-group col-xs-8">
								<input type="text" class="form-control" name="client_city" placeholder="City">
							</div>

							<div class="form-group col-xs-4">
								<input type="text" class="form-control" name="client_state" placeholder="Province/State">
							</div>

							<!-- Postal Code/Zip, Country -->
							<div class="form-group col-xs-6">
								<input type="text" class="form-control" name="client_postal" placeholder="Postal/Zip Code">
							</div>

							<div class="form-group col-xs-6">
							<select class="form-control" name="client_id">
								<option>Select country...</option>
								<option class="divider"></option>

								<option value="1">Canada</option>
								<option value="2">USA</option>
								<option value="3">China</option>
							</select>
							</div>

							<!-- Contact -->
							<div class="form-group col-xs-6">
								<input type="text" class="form-control" name="client_phone" placeholder="Phone">
							</div>

							<div class="form-group col-xs-6">
								<input type="number" class="form-control" name="cut_off_year" min="0" max="99" placeholder="Cut-off year">
							</div>

						</div>

					</fieldset>

					<hr />

					<div class="form-group col-xs-12">
						<input type="submit" class="btn btn-primary" value="Add">
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
	$('#fields-for-features').hide();
	$('#add-more-features').click(function(e) {
		$(this).parent().hide();
		$('#fields-for-features').show();
	});
	// -----------------

	// Hide client form
	// ----------------
	if ($('#field-for-client-select').val() == "Not in list") {
		//$('#fields-for-client').show();
		//$('fields-for-client-select').hide();
        window.location.href = '<?=site_url('client/add')?>';
	} else {
		$('#fields-for-client').hide();
		$('fields-for-client-select').show();
	};

	// $('#fields-for-client').hide();
	$('#field-for-client-select').on('change', function() {
		if ($(this).val() == "Not in list") {
			//$('#fields-for-client').show();
			//$('#fields-for-client-select').hide();
            window.location.href = '<?=site_url('client/add')?>';
		};
	});
	// ----------------

});
</script>