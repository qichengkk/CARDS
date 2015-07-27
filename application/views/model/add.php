<div id="page-content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>New car model</h1>

				<hr>

				<!-- div id="new_make_form_error" class="alert alert-danger center" --><!-- Dynamic --><!-- /div -->
				<?php echo validation_errors(); ?>

				<form id="new_model_form" class="form" method="post" accept-charset="utf-8" action="<?= site_url('model/add') ?>">

					<div class="form-group col-xs-12">
						<select class="form-control" name="make_id">
							<?php foreach ($make as $make_item): ?>
							<option value="<?php echo $make_item['id'] ?>"><?php echo $make_item['name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group col-xs-12">
						<input type="text" class="form-control" name="name" placeholder="Make">
					</div>

					<div class="form-group col-xs-12">
						<input type="text" class="form-control" name="serie" placeholder="Serie">
					</div>

					<div class="form-group col-xs-12">
						<select class="form-control" name="type">
							<option value="Sedan">Sedan</option>
							<option value="Coupe">Coupe</option>
							<option value="Roadster">Roadster</option>
							<option value="SUV">Crossover/SUV</option>
						</select>
					</div>

					<div class="form-group col-xs-6">
						<label for="from_year">Production start year</label>
						<input type="number" class="form-control" name="from_year" min="1900" max="2017">
					</div>

					<div class="form-group col-xs-6">
						<label for="from_year">Production end year</label>
						<input type="number" class="form-control" name="to_year" min="1900" max="2017">
					</div>

					<div class="form-group col-xs-12">
						<input type="submit" class="btn btn-primary" value="Add">
						<a href="<?= site_url('model') ?>" class="btn btn-link">Cancel</a>
					</div>

				</form>

			</div>
		</div>
	</div>

</div><!-- end of page-content-wrapper -->