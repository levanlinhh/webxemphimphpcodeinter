<div class="card">
	<div class="row py-3">
		<div class="col-sm-12">
			<div class="btn-group dropdown pull-right">
				<button type="button" class="btn btn-primary btn-sm waves-effect waves-light text-capital">
					<?php
					switch ($type) {
						case 'published':
							echo 'PUBLISHED';
							break;
						case 'unpublished':
							echo 'UNPUBLISHED';
							break;
						default:
							echo 'FILTER';
							break;
					}
					?>
				</button>
				<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="caret"></i></button>
				<ul class="dropdown-menu" role="menu">
					<li><a class="dropdown-item" href="<?php echo base_url() . 'admin/pages/published' ?>"><?php echo trans('published'); ?></a></li>
					<li><a class="dropdown-item" href="<?php echo base_url() . 'admin/pages/unpublished' ?>"><?php echo trans('unpublished'); ?></a></li>
					<li><a class="dropdown-item" href="<?php echo base_url() . 'admin/pages/' ?>"><?php echo trans('all_pages'); ?></a></li>
				</ul>
			</div>
			<a href="<?php echo base_url() . 'admin/pages_add'; ?>" class="btn btn-primary waves-effect waves-light"><span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('add_page'); ?></a> <br>
			<br>
			<table class="table table-bordered table-striped dataTable" id="datatable">
				<thead>
					<tr>
						<th><?php echo trans('sl'); ?></th>
						<th><?php echo trans('title'); ?></th>
						<th><?php echo trans('slug'); ?></th>
						<th><?php echo trans('publish_at'); ?></th>
						<th><?php echo trans('status'); ?></th>
						<th><?php echo trans('option'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $sl = 1;

					switch ($type) {
						case 'published':
							$this->db->order_by('page_id', 'DESC');
							$pages = $this->db->get_where('page', array('publication' => '1'))->result_array();
							break;
						case 'unpublished':
							$this->db->order_by('page_id', 'DESC');
							$pages = $this->db->get_where('page', array('publication' => '0'))->result_array();
							break;
						default:
							$this->db->order_by('page_id', 'DESC');
							$pages = $this->db->get('page')->result_array();
							break;
					}
					foreach ($pages as $page) :
					?>
						<tr id='row_<?php echo $page['page_id']; ?>'>
							<td class="align-middle"><?php echo $sl++; ?></td>
							<td class="align-middle"><?php echo $page['page_title']; ?></td>
							<td class="align-middle"><?php echo $page['slug']; ?></td>
							<td class="align-middle"><?php echo date('d/m/Y', strtotime($page['publish_at'])); ?></td>
							<td class="align-middle">
								<?php if ($page['publication'] == '1') { ?>
									<span class="label label-primary label-xs"><?php echo trans('published'); ?></span>
								<?php } else { ?>
									<span class="label label-warning label-mini"><?php echo trans('unpublished'); ?></span>
								<?php } ?>
							</td>
							<td class="align-middle">
								<div class="btn-group">
									<a class="btn btn-primary" href="<?php echo base_url() . 'admin/pages_edit/' . $page['page_id']; ?>"><i class="fa fa-pencil"></i></a>
									<a class="btn btn-secondary" target="_blank" href="<?php echo base_url() . 'page/' . $page['slug']; ?>"><i class="fa fa-eye"></i></a>
									<?php if ($page['deletable'] != 0) : ?>
										<a class="btn btn-danger" href="#" onclick="delete_row(<?php echo " 'page' " . ',' . $page['page_id']; ?>)"><i class="fa fa-pencil"></i></a>
									<?php endif; ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/parsley.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();
	});
</script>
<script src="<?php echo base_url() ?>assets/js/plugins/moment.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-filestyle.min.js" type="text/javascript"></script>