<div id="page-content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Add new car to inventory</h1>

				<hr>

				<?php if (!empty(validation_errors())) : ?>
				<div class="alert alert-danger"><?php echo validation_errors(); ?></div>
				<?php endif ?>

				<form id="new_car_form" class="form" method="post" accept-charset="utf-8" action="<?= site_url('car/add') ?>">

					<!-- Car information -->
					<fieldset>
						<legend>Vehicle information</legend>

						<div class="form-group col-xs-12">
							<input type="text" class="form-control" name="VIN" placeholder="VIN">
						</div>

						<div class="form-group col-xs-12">
							<select class="form-control" name="make_id" disabled>
								<?php foreach ($makes as $make): ?>
								<option value="<?php echo $make['id'] ?>" <?php if ($make['name'] == 'Porsche') { echo "selected"; } ?>>
									<?php echo $make['name'] ?>
								</option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-xs-12">
							<select class="form-control" name="model_id">
								<option disabled selected>Select a model...</option>

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
							<label>Color</label>
							<select class="form-control" name="color">
								<?php foreach ($colors as $color): ?>
								<option value="<?php echo $color ?>"><?php echo $color ?></option>
								<?php endforeach ?>
							</select>
						</div>		

						<div class="form-group col-xs-6">
							<label for="mileage">Purchase price</label>
							<input type="text" class="form-control" name="purchase_price" placeholder="Purchased Price">
						</div>		

						<div class="form-group col-xs-6">
							<label for="mileage">Estimated price</label>
							<input type="text" class="form-control" name="estimated_price" placeholder="Estimated Price">
						</div>							

						<div class="form-group col-xs-12">
							<textarea class="form-control" name="description" placeholder="Description (optional)"></textarea>
						</div>

					</fieldset>

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
							<input type="number" class="form-control" name="city_fuel_consumption" min="1.0" max="30.0">
						</div>

						<div class="form-group col-xs-6">
							<label for="hw_fuel_consumption">Highway</label>
							<input type="number" class="form-control" name="hw_fuel_consumption" min="1.0" max="30.0">
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
								<option disabled selected>Select supplier...</option>
								
								<?php foreach ($clients as $client) : ?>
								<option value="<?php echo $client['CId'] ?>"><?php echo $client['name'] ?></option>
								<?php endforeach ?>

								<option value="X">Not in list</option>
							</select>
						</div>

						<div id="fields-for-client">
							<!-- Hidden by default. Visible when client is not in list. -->

							<div class="form-group col-xs-8">
								<input type="text" class="form-control" name="client_name" placeholder="Name">
							</div>

							<div class="form-group col-xs-4">
								<select class="form-control" name="client_type">
									<option value="Owner">Owner</option>
									<option value="Dealer">Dealer</option>
									<option value="Auction">Auction</option>
									<option value="Showroom">Showroom</option>
								</select>
							</div>

							<!-- Address -->
							<div class="form-group col-xs-12">
								<input type="text" class="form-control" name="client_address" placeholder="123 Avenue, City, Province">
							</div>

							<!-- Contact -->
							<div class="form-group col-xs-8">
								<input type="text" class="form-control" name="client_phone" placeholder="Phone">
							</div>

							<!-- Country -->
							<div class="form-group col-xs-4">
								<select class="form-control" name="client_country">
									<option disabled selected>Select country...</option>

                                    <?php foreach ($countries as $country) : ?>
                                        <option value="<?php echo $country['name'] ?>"><?php echo $country['name'] ?></option>
                                    <?php endforeach ?>

								</select>
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