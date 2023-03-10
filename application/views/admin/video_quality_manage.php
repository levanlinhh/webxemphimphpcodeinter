<?php $default_quality    =   $this->db->get_where('config', array('title' => 'default_quality'))->row()->value; ?>
<div class="card">
	<div class="row">
		<div class="col-sm-6">
			<?php echo form_open(base_url() . 'admin/video_quality/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
			<h4 class="text-center text-white"><?php echo trans('add_video_quality'); ?></h4>
			<hr>
			<div class="form-group">
				<label class="col-sm-6 control-label"><?php echo trans('video_quality'); ?></label>
				<div class="col-sm-9">
					<input type="text" name="quality" class="form-control" required />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-6 control-label"><?php echo trans('description'); ?></label>
				<div class="col-sm-9">
					<input type="text" name="description" class="form-control" />
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('add') ?> </button>
				</div>
			</div>
			<?php echo form_close(); ?>

			<?php echo form_open(base_url() . 'admin/video_quality/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
			<h4 class="text-center text-white"><?php echo trans('default_video_quality'); ?></h4>
			<hr>
			<div class="form-group">
				<label class="col-sm-6 control-label"><?php echo trans('default_video_quality'); ?></label>
				<div class="col-sm-9">
					<select class="form-control m-bot15" name="video_quality">
						<?php $qualities = $this->db->get_where('quality', array('status' => '1'))->result_array();
						foreach ($qualities as $qlt) : ?>
							<option value="<?php echo $qlt['quality'] ?>" <?php if ($default_quality == $qlt['quality']) : echo "selected";
																			endif; ?>><?php echo $qlt['quality'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-floppy-o"></i></span><?php echo trans('save_changes') ?> </button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-sm-6">
			<h4 class="text-center text-white"><?php echo trans('video_quality_list'); ?></h4>
			<hr>
			<table id="datatable-buttons" class="table table-bordered table-striped dataTable">
				<thead>
					<tr>
						<th><?php echo trans('sl'); ?></th>
						<th><?php echo trans('video_quality'); ?></th>
						<th><?php echo trans('description'); ?></th>
						<th><?php echo trans('option'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $sl = 1;
					foreach ($quality as $quality) :
					?>
						<tr id='row_<?php echo $quality['quality_id']; ?>'>
							<td class="align-middle"><?php echo $sl++; ?></td>
							<td class="align-middle"><strong><?php echo $quality['quality']; ?></strong></td>
							<td class="align-middle"><?php echo $quality['description']; ?></td>
							<td class="align-middle">
								<a class="btn btn-primary" data-toggle="modal" data-target="#mymodal" data-id="<?php echo base_url() . 'admin/view_modal/video_quality_edit/' . $quality['quality_id']; ?>" id="menu"><i class="fa fa-pencil"></i></a>
								<a class="btn btn-danger" onclick="delete_row(<?php echo " 'quality' " . ',' . $quality['quality_id']; ?>)"><i class="fa fa-remove"></i></a>
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