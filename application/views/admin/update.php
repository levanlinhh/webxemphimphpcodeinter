<?php $version = trans('core_version'); ?>
<?php echo form_open(base_url() . 'updater/process/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
<div class="card">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-border panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo trans('system_updater'); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group row">
						<label class="control-label col-sm-3"><?php echo trans('current_version'); ?></label>
						<div class="col-sm-3">
							<strong class="text-white"><?php echo film_config('version'); ?></strong>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 control-label"><?php echo trans('update_file'); ?></label>
						<div class="col-sm-3">
							<input type="file" name="zip_file" class="filestyle">
						</div>
					</div>

					<div class="col-sm-offset-3 mt-2">
						<button type="submit" class="btn btn-primary"><span class="btn-label mr-1"> <i class="fa fa-upload"></i></span><?php echo trans('process_update'); ?> </button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-filestyle.min.js" type="text/javascript"></script>