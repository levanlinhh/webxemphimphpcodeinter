<div class="card">
	<div class="row">
		<div class="col-sm-6">
			<?php echo form_open(base_url() . 'admin/video_type/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
			<h4 class="text-center panel-title"><?php echo trans('add_new_video_type'); ?></h4>
			<hr>
			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo trans('video_type'); ?></label>
				<div class="col-sm-12">
					<input type="text" name="video_type" class="form-control" required />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label"><?php echo trans('description'); ?></label>
				<div class="col-sm-12">
					<input type="text" name="video_type_desc" class="form-control" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-3"><?php echo trans('menu'); ?></label>
				<div class="col-sm-8">
					<div class="animated-checkbox checkbox-inline">
						<label>
							<input type="checkbox" name='primary_menu' value="1"><span class="label-text text-white"><?php echo trans('primary_menu'); ?></span>
						</label>
					</div>
					<div class="animated-checkbox checkbox-inline">
						<label>
							<input type="checkbox" name='footer_menu' value="1"><span class="label-text text-white"><?php echo trans('footer_menu'); ?></span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('add') ?> </button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-sm-6">
			<h4 class="text-center panel-title">Danh sách loại phim</h4>
			<hr>
			<table id="datatable-buttons" class="table table-bordered table-striped dataTable">
				<thead>
					<tr>
						<th><?php echo trans('sl'); ?></th>
						<th><?php echo trans('video_type'); ?></th>
						<th><?php echo trans('description'); ?></th>
						<th><?php echo trans('menu_bar'); ?></th>
						<th><?php echo trans('footer'); ?></th>
						<th><?php echo trans('option'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $sl = 1;
					foreach ($video_types as $video_type) :

					?>
						<tr id='row_<?php echo $video_type['video_type_id']; ?>'>
							<td class="align-middle"><?php echo $sl++; ?></td>
							<td class="align-middle"><strong><?php echo $video_type['video_type']; ?></strong></td>
							<td class="align-middle"><?php echo $video_type['video_type_desc']; ?></td>
							<td class="align-middle"><?php if ($video_type['primary_menu'] == '1') {
															echo "Yes";
														} else {
															echo "No";
														} ?></td>
							<td class="align-middle"><?php if ($video_type['footer_menu'] == '1') {
															echo "Yes";
														} else {
															echo "No";
														} ?></td>
							<td class="align-middle">
								<a class="btn btn-primary" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/video_type_edit/' . $video_type['video_type_id']; ?>" id="menu"><i class="fa fa-pencil"></i></a>
								<a class="btn btn-danger" onclick="delete_row(<?php echo " 'video_type' " . ',' . $video_type['video_type_id']; ?>)"><i class="fa fa-remove"></i></a>

							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script src="<?php echo base_url() ?>assets/js/plugins/parsley.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();
	});
</script>