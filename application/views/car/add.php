<div id="page-content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Add new car to inventory</h1>

				<hr>

				<!-- div id="new_make_form_error" class="alert alert-danger center" --><!-- Dynamic --><!-- /div -->
				<?php echo validation_errors(); ?>

				<!-- form id="new_model_form" class="form" method="post" accept-charset="utf-8" action="add" enctype="multipart/form-data" -->

				<?php echo form_open_multipart('car/add', ['id' => 'new_car_form', 'class' => 'form']);?>

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

						<div class="form-group col-xs-6">
							<label for="from_year">Year</label>
							<input type="number" class="form-control" name="year" min="1900" max="2017">
						</div>

						<div class="form-group col-xs-6">
							<label for="from_year">Mileage</label>
							<input type="number" class="form-control" name="year" min="0" max="1000000">
						</div>

						<div class="form-group col-xs-12">
							<input type="text" class="form-control" name="color" placeholder="Color">
						</div>

						<div class="form-group col-xs-12">
							<input type="text" class="form-control" name="estimated_price" placeholder="Est. Price">
						</div>

					</fieldset>

					<fieldset>
						<legend>Supplier information</legend>

						<div id="client-select" class="form-group col-xs-12">
							<select id="select-client" class="form-control" name="client_id" onchange='show_client_form()'>
								<option>Select supplier...</option>
								<option class="divider"></option>

								<option value="1">H Gregroire, St-Eustache, QC Canada</option>
								<option value="2">John Scott, St-Leonard, QC Canada</option>
								<option value="3">Prestige, Montreal, QC Canada</option>

								<option class="divider"></option>
								<option>Not in list</option>
							</select>
						</div>

						<div id="client-full-form">
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
								<input type="number" class="form-control" name="year" min="0" max="99" placeholder="Cut-off year">
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
	$('#client-full-form').hide();
	$('#select-client').on('change', function() {
		if ($(this).val() == "Not in list") {
			$('#client-full-form').show();
			$('#client-select').hide();
		};
	});
	// ----------------

});
</script>