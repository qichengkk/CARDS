<div id="page-content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>New car model</h1>

				<hr>

				<!-- div id="new_make_form_error" class="alert alert-danger center" --><!-- Dynamic --><!-- /div -->
				<?php echo validation_errors(); ?>

				<form id="new_make_form" class="form" method="post" accept-charset="utf-8" action="<?= site_url('make/add') ?>">

					<div class="form-group col-xs-12">
						<input type="text" class="form-control" name="name" placeholder="Make">
					</div>

					<div class="form-group col-xs-12">
						<input type="submit" class="btn btn-primary" value="Add">
						<a href="<?= site_url('make') ?>" class="btn btn-link">Cancel</a>
					</div>

				</form>

			</div>
		</div>
	</div>

</div><!-- end of page-content-wrapper -->