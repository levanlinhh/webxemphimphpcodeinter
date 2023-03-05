<?php echo form_open(base_url() . 'admin/seasons_manage/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

<h4 class="text-center text-white"><?php echo trans('new_seasons_information'); ?></h4>
<hr>
<div class="form-group">
	<label class="control-label"><?php echo trans('seasons_name'); ?></label>
	<input type="text" name="seasons_name" class="form-control" placeholder="Enter seasons name" required />
</div>
<div class="form-group">
	<label class="control-label"><?php echo trans('order'); ?></label>
	<input type="number" name="order" class="form-control" value="0" required />
</div>
<input type="hidden" name="videos_id" value="<?php echo $param2; ?>">

<div class="form-group row">
	<div class="col-sm-offset-3 col-sm-6 mt-2">
		<button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('create'); ?> </button>
		<button type="" class="btn btn-white ml-1 waves-effect" data-dismiss="modal"><?php echo trans('close'); ?> </button>
	</div>
</div>
</form>
<script>
	jQuery(document).ready(function() {
		$('form').parsley();
	});
</script>