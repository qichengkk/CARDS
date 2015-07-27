<div id="page-content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Edit car model</h1>

				<hr>

				<!-- div id="new_make_form_error" class="alert alert-danger center" --><!-- Dynamic --><!-- /div -->
				<?php echo validation_errors(); ?>

				<form id="edit_model_form" class="form" method="post" accept-charset="utf-8" action="<?= site_url('model/update') ?>/<?php echo $result[0]['id'] ?>">

					<div class="form-group col-xs-12">
						<select class="form-control" name="make_id">
							<?php foreach ($make as $make_item): ?>
							<option value="<?php echo $make_item['id'] ?>" <?php if ($result[0]['make_id'] == $make_item['id']) echo "selected" ?>>
								<?php echo $make_item['name'] ?>
							</option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group col-xs-12">
						<input type="text" class="form-control" name="name" value="<?php echo $result[0]['name'] ?>">
					</div>

					<div class="form-group col-xs-12">
						<input type="text" class="form-control" name="serie" value="<?php echo $result[0]['serie'] ?>">
					</div>

					<div class="form-group col-xs-12">
						<select class="form-control" name="type">
							<option value="Sedan" <?php if ($result[0]['type'] == "Sedan") echo "selected";?>>Sedan</option>
							<option value="Coupe" <?php if ($result[0]['type'] == "Coupe") echo "selected";?>>Coupe</option>
							<option value="Roadster" <?php if ($result[0]['type'] == "Roadster") echo "selected";?>>Roadster</option>
							<option value="SUV" <?php if ($result[0]['type'] == "SUV") echo "selected";?>>Crossover/SUV</option>
						</select>
					</div>

					<div class="form-group col-xs-6">
						<label for="from_year">Production start year</label>
						<input type="number" class="form-control" name="from_year" min="1900" max="2027" value="<?php echo $result[0]['from_year'] ?>">
					</div>

					<div class="form-group col-xs-6">
						<label for="from_year">Production end year</label>
						<input type="number" class="form-control" name="to_year" min="1900" max="2027" value="<?php echo $result[0]['to_year'] ?>">
					</div>

					<div class="form-group col-xs-12">
						<input type="submit" class="btn btn-primary" value="Update">
						<a href="<?= site_url('model') ?>" class="btn btn-link">Cancel</a>
					</div>

				</form>

			</div>
		</div>
	</div>

</div><!-- end of page-content-wrapper -->