</style>
<div class="card">
	<div class="row py-3">
		<div class="col-sm-12"> <?php echo form_open(base_url() . 'admin/pages/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
			<h4 class="text-center text-white"><?php echo trans('add_new_page') ?></h4>
			<hr>
			<div class="form-group">
				<label class=" control-label"><?php echo trans('page_title'); ?></label>
				<input type="text" name="page_title" id="title" class="form-control" required>
			</div>
			<div class="form-group">
				<label class="control-label"><?php echo trans('slug'); ?> (<?php echo base_url(); ?>)</label>
				<input type="text" id="slug" name="slug" class="form-control input-sm" required>
			</div>
			<div class="form-group">
				<label class="control-label"><?php echo trans('content'); ?></label>
				<textarea class="wysihtml5 form-control" name="content" id="content" rows="10"></textarea>
			</div>
			<div class="form-group">
				<label class="control-label"><?php echo trans('hook_to'); ?></label>
				<div class="animated-checkbox checkbox-inline">
					<label>
						<input type="checkbox" name='primary_menu' value="1"><span class="label-text text-white"><?php echo trans('primary_menu'); ?> </span>
					</label>
				</div>
				<div class="animated-checkbox checkbox-inline">
					<label>
						<input type="checkbox" name='footer_menu' value="1"><span class="label-text text-white"><?php echo trans('footer_menu'); ?> </span>
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label"><?php echo trans('publication'); ?></label>
				<select class="form-control m-bot15" name="publication">
					<option value="1"><?php echo trans('published'); ?></option>
					<option value="0"><?php echo trans('unpublished'); ?></option>
				</select>
			</div>
			<h4 class="text-center text-white"><?php echo trans('seo_setting') ?></h4>
			<hr>
			<div class="form-group">
				<label class=" control-label"><?php echo trans('seo_title') ?></label>
				<input type="text" name="seo_title" id="title" class="form-control">
			</div>

			<div class="form-group">
				<label class=" control-label"><?php echo trans('focus_keyword'); ?></label>
				<input type="text" name="focus_keyword" id="focus_keyword" class="form-control">
				<br>
				<p><?php echo trans('use_comma_to_separate_keyword'); ?></p>
			</div>
			<div class="form-group">
				<label class="control-label"><?php echo trans('meta_description'); ?></label>
				<textarea class="wysihtml5 form-control" name="meta_description" id="meta_description" rows="5"></textarea>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 pull-right mt-2">
					<button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('create'); ?> </button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/parsley.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();
	});
</script>

<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/summernote-bs4.min.js"></script>
<script>
	jQuery(document).ready(function() {
		$('#content').summernote({
			height: 200, // set editor height
			minHeight: null, // set minimum height of editor
			maxHeight: null, // set maximum height of editor
			focus: false // set focus to editable area after initializing summernote
		});
		$('#stars').tagsinput();
		$('#focus_keyword').tagsinput();
		$("#title").keyup(function() {
			var slug = $(this).val();
			//?????i ch??? th??nh ch??? th?????ng
			slug = slug.toLowerCase();
			//?????i k?? t??? c?? d???u th??nh kh??ng d???u
			slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
			slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
			slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
			slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
			slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
			slug = slug.replace(/??|???|???|???|???/gi, 'y');
			slug = slug.replace(/??/gi, 'd');
			//X??a c??c k?? t??? ?????t bi???t
			slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
			//?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
			slug = slug.replace(/ /gi, "-");
			//?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
			slug = slug.replace(/\-\-\-\-\-/gi, '-');
			slug = slug.replace(/\-\-\-\-/gi, '-');
			slug = slug.replace(/\-\-\-/gi, '-');
			slug = slug.replace(/\-\-/gi, '-');
			//X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
			slug = '@' + slug + '@';
			slug = slug.replace(/\@\-|\-\@|\@/gi, '');
			$("#slug").val(slug);
		});
	});
</script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-tagsinput.min.js"></script>