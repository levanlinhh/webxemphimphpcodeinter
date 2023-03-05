<style type="text/css">
	.p-a {
		padding: 10px
	}

	button.close {
		padding: 0
	}
</style>
<?php echo form_open(base_url() . 'admin/manage_live_tv/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
<div class="card">
	<div class="row">
		<div class="col-sm-6">
			<h4 class="text-center text-white"><?php echo trans('tv_channel_info'); ?></h4>
			<hr>

			<div class="form-group">
				<label class=" control-label"><?php echo trans('tv_name'); ?></label>
				<input type="text" name="tv_name" id="title" class="form-control" placeholder="<?php echo trans('tv_name'); ?>" required />
			</div>

			<div class="form-group">
				<label class="control-label "><?php echo trans('description'); ?></label>
				<textarea class="wysihtml5 form-control" name="description" id="about_text" rows="10"></textarea>
			</div>

			<div class="form-group">
				<label class=" control-label"><?php echo trans('category'); ?></label>
				<select class="form-control" name="live_tv_category_id" required>
					<option value=""><?php echo trans('select'); ?></option>
					<?php $live_tv_categories = $this->db->get_where('live_tv_category', array('status' => '1'))->result_array();
					foreach ($live_tv_categories as $live_tv_category) : ?>
						<option value="<?php echo $live_tv_category['live_tv_category_id']; ?>"><?php echo $live_tv_category['live_tv_category']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label class="control-label "><?php echo trans('thumbnail'); ?></label>
				<p>
					<img id="thumb_image" src="<?php echo base_url() . 'uploads/default_image/tv_thumbnail.jpg'; ?>" width="110" class="img-thumbnail" alt=""><br>
			</div>

			<div class="form-group">
				<label class="control-label "></label>
				<input type="file" name="thumbnail" onchange="showImg(this);" class="filestyle" data-input="false" accept="image/*">
			</div>

			<div class="form-group">
				<label class="control-label "><?php echo trans('poster'); ?></label><br>
				<img id="poster_image" src="<?php echo base_url() . 'uploads/default_image/tv_poster.jpg'; ?>" width="400" class="img-thumbnail" alt="">
			</div>

			<div class="form-group">
				<label class="control-label "></label>
				<input type="file" name="poster" onchange="showImg2(this);" class="filestyle" data-input="false" accept="image/*">
			</div>
		</div>
		<div class="col-sm-6">
			<h4 class="text-center text-white"><?php echo trans('seo_and_stream_urls'); ?></h4>
			<hr>
			<div class="row">
				<div class="form-group col-md-3">
					<label class=" control-label"><?php echo trans('stream_from'); ?></label>
					<select class="form-control" name="stream_from" required>
						<option value="">From</option>
						<option value="hls" selected>HLS/M3U8/HTTP</option>
						<option value="youtube">Youtube Live</option>
						<option value="embed">Embed</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><?php echo trans('label'); ?></label>
					<input type="text" name="stream_label" value="HD" class="form-control" placeholder="<?php echo trans('label'); ?>" required />
				</div>
				<div class="form-group col-md-6 align-self-end">
					<label class="control-label"><?php echo trans('stream_url'); ?></label>
					<input type="text" name="stream_url" class="form-control" placeholder="Primary/high quality stream URL" required />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-3">
					<label class=" control-label"><?php echo trans('stream_from_optional'); ?></label>
					<select class="form-control" name="stream_from1">
						<option value="">From</option>
						<option value="hls" selected>HLS/M3U8/HTTP</option>
						<option value="youtube">Youtube Live</option>
						<option value="embed">Embed</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><?php echo trans('label_optional'); ?></label>
					<input type="text" name="stream_label1" value="SD" class="form-control" placeholder="<?php echo trans('label'); ?>" />
				</div>
				<div class="form-group col-md-6 align-self-end">
					<label class="control-label"><?php echo trans('stream_url_optional'); ?></label>
					<input type="text" name="stream_url1" class="form-control" placeholder="<?php echo trans('standard_quality_stream_url'); ?>" />
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-3">
					<label class=" control-label"><?php echo trans('stream_from_optional'); ?></label>
					<select class="form-control" name="stream_from2">
						<option value="">From</option>
						<option value="hls" selected>HLS/M3U8/HTTP</option>
						<option value="youtube">Youtube Live</option>
						<option value="embed">Embed</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label"><?php echo trans('label_optional'); ?></label>
					<input type="text" name="stream_label2" value="LQ" class="form-control" placeholder="<?php echo trans('label'); ?>" />
				</div>
				<div class="form-group col-md-6 align-self-end">
					<label class="control-label"><?php echo trans('stream_url_optional'); ?></label>
					<input type="text" name="stream_url2" class="form-control" placeholder="<?php echo trans('low_quality_stream_url'); ?>" />
				</div>
			</div>
			<h4 class="text-white"><?php echo trans('seo_and_marketing'); ?></h4>
			<div class="form-group">
				<label class=" control-label"><?php echo trans('seo_title'); ?></label>
				<input type="text" name="seo_title" id="seo_title" class="form-control" placeholder="<?php echo trans('seo_title'); ?>" />
			</div>
			<div class="form-group">
				<label class="control-label "><?php echo trans('meta_description'); ?></label>
				<textarea class="wysihtml5 form-control" name="meta_description" id="meta_description" rows="5"></textarea>
			</div>
			<div class="form-group">
				<label class="control-label "><?php echo trans('focus_keyword'); ?></label>
				<input type="text" name="focus_keyword" id="focus_keyword" class="form-control"><br>
				<p><?php echo trans('use_comma_to_separate_keyword'); ?></p>
			</div>

			<div class="form-group">
				<label class="control-label "><?php echo trans('tags'); ?></label>
				<input type="text" name="tags" id="tags" class="form-control"><br>
				<p><?php echo trans('use_comma_to_separate_tags'); ?></p>
			</div>

			<div class="row p-0">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label "><?php echo trans('publish'); ?></label>
						<div class="col-sm-6">
							<div class="toggle">
								<label>
									<input type="checkbox" name="publish" checked><span class="button-indecator"></span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label "><?php echo trans('featured'); ?></label>
						<div class="col-sm-6">
							<div class="toggle">
								<label>
									<input type="checkbox" name="featured" checked><span class="button-indecator"></span>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group" style="display: none;">
				<label class="control-label">Free/Paid</label>
				<select class="form-control" name="is_paid">
					<option value="0">Free</option>
					<option value="1" selected>Paid</option>
				</select>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 mt-2 pull-right">
					<button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('create'); ?> </button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close() ?>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/parsley.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();
	});
</script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/summernote-bs4.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-tagsinput.min.js"></script>
<script>
	jQuery(document).ready(function() {
		$('form').parsley();
	});
</script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script>
	jQuery(document).ready(function() {
		$('#tags').tagsinput();
		$(":file").filestyle({
			input: false
		});
		$('#focus_keyword').tagsinput();
		$('#about_text').summernote({
			height: 200, // set editor height
			minHeight: null, // set minimum height of editor
			maxHeight: null, // set maximum height of editor
			focus: false // set focus to editable area after initializing summernote
		});
	});
</script>
<script>
	$("#title").keyup(function() {
		var slug = $(this).val();
		//Đổi chữ thành chữ thường
		slug = slug.toLowerCase();
		//Đổi ký tự có dấu thành không dấu
		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
		//Xóa các ký tự đặt biệt
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		//Đổi khoảng trắng thành ký tự gạch ngang
		slug = slug.replace(/ /gi, "-");
		//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
		//Xóa các ký tự gạch ngang ở đầu và cuối
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		$("#slug").val(slug);
	});
</script>
<script type="text/javascript">
	function showImg(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#thumb_image')
					.attr('src', e.target.result)
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<script type="text/javascript">
	function showImg2(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#poster_image')
					.attr('src', e.target.result)
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>