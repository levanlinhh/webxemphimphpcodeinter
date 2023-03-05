<?php echo form_open(base_url() . 'admin/manage_user/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
<h4 class="text-center text-white"><?php echo trans('new_user_information'); ?></h4>
<hr>
<div class="form-group">
	<label class="control-label"><?php echo trans('full_name'); ?></label>
	<input type="text" name="name" class="form-control" placeholder="<?php echo trans('enter_user_full_name'); ?>" />
</div>
<div class="form-group">
	<label class="control-label"><?php echo trans('email'); ?></label>
	<input type="text" name="email" class="form-control" placeholder="<?php echo trans('enter_email'); ?>" />
</div>

<div class="form-group">
	<label class="control-label"><?php echo trans('login_password'); ?></label>
	<input type="password" name="password" class="form-control" placeholder="<?php echo trans('enter_login_password'); ?>" />
</div>


<div class="form-group">
	<label class="control-label"><?php echo trans('user_role'); ?></label>
	<select class="form-control" name="role" required>
		< <option value="admin"><?php echo trans('admin'); ?></option>
			<option value="subscriber"><?php echo trans('subscriber'); ?></option>
	</select>
</div>

<div class="form-group">
	<div class="col-sm-offset-3 mt-2">
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