<div class="card">
	<div class="row">
		<div class="col-sm-12">
			<?php
			$posts   = $this->db->get_where('posts', array('posts_id' => $param1))->result_array();
			foreach ($posts as $post) :
			?>
				<?php echo form_open(base_url() . 'admin/posts/update/' . $param1, array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
				<h4 class="text-center text-white"><?php echo trans('post_edit'); ?></h4>
				<hr>
				<div class="form-group">
					<label class="control-label"><?php echo trans('post_title'); ?></label>
					<input type="text" name="post_title" id="title" value="<?php echo $post['post_title'] ?>" class="form-control" required>
				</div>

				<div class="form-group">
					<label class="control-label"><?php echo trans('slug'); ?> (<?php echo base_url(); ?>)</label>
					<input type="text" id="slug" name="slug" class="form-control input-sm" value="<?php echo $post['slug'] ?>" required>
				</div>

				<div class="form-group">
					<label class="control-label"><?php echo trans('content'); ?></label>
					<textarea class="wysihtml5 form-control" name="content" id="content" rows="10"><?php echo $post['content'] ?></textarea>
				</div>

				<div class="form-group">
					<label class="control-label"><?php echo trans('thumbnail'); ?></label>
					<div class="profile-info-name text-center"> <img id="thumb_image" src="<?php echo $post['image_link']; ?>" class="img-thumbnail" alt=""> </div>
					<br>
					<div id="thumbnail_content">
						<input type="text" name="thumb_link" value="<?php echo $post['image_link']; ?>" class="form-control">
					</div><br>
					<p class="btn btn-sm btn-white" id="thumb_link" href="#"><span class="btn-label mr-1"> <i class="fa fa-link"></i></span><?php echo trans('link') ?></p>
					<p class="btn btn-sm btn-white" id="thumb_file" href="#"><span class="btn-label mr-1"> <i class="fa fa-file-o"></i></span><?php echo trans('file') ?></p>
				</div>

				<div class="form-group">
					<label class="control-label"><?php echo trans('category'); ?></label>
					<?php $categories = $this->db->get('post_category')->result_array();
					$category_ids = explode(',', $post['category_id']);
					foreach ($categories as $category) : ?>
						<div class="checkbox checkbox-inline">
							<input type="checkbox" name='category_id[]' id="<?php echo $category['post_category_id']; ?>" value="<?php echo $category['post_category_id']; ?>" required <?php if (in_array($category['post_category_id'], $category_ids)) {
																																															echo 'checked';
																																														} ?>>
							<label for="inlineCheckbox1"> <?php echo $category['category']; ?> </label>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="form-group">
					<label class="control-label"><?php echo trans('publication'); ?></label>
					<select class="form-control m-bot15" name="publication">
						<option value="1" <?php if ($post['publication'] == '1') {
												echo 'selected';
											} ?>><?php echo trans('published'); ?></option>
						<option value="0" <?php if ($post['publication'] == '0') {
												echo 'selected';
											} ?>><?php echo trans('unpublished'); ?></option>
					</select>
				</div>
				<h4 class="text-center text-white"><?php echo trans('seo_setting') ?></h4>
				<hr>
				<div class="form-group">
					<label class="control-label"><?php echo trans('seo_title') ?></label>
					<input type="text" name="seo_title" id="seo_title" value="<?php echo $post['seo_title'] ?>" class="form-control">
				</div>

				<div class="form-group">
					<label class="control-label"><?php echo trans('focus_keyword'); ?></label>
					<input type="text" name="focus_keyword" value="<?php echo $post['focus_keyword'] ?>" id="focus_keyword" class="form-control">
					<br>
					<p><?php echo trans('use_comma_to_separate_keyword'); ?></p>
				</div>
				<div class="form-group">
					<label class="control-label"><?php echo trans('meta_description'); ?></label>
					<textarea class="wysihtml5 form-control" name="meta_description" id="meta_description" rows="5"><?php echo $post['meta_description'] ?></textarea>
				</div>
			<?php endforeach; ?>
			<div class="form-group">
				<div class="col-sm-offset-3 pull-right mt-2">
					<button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-floppy-o"></i></span><?php echo trans('save_changes'); ?> </button>
				</div>
			</div>
			<?php echo form_close(); ?>

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
					$('#focus_keyword').tagsinput();
				});
			</script>
			<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-tagsinput.min.js"></script>
			<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-filestyle.min.js" type="text/javascript"></script>
			<script>
				jQuery(document).ready(function() {
					$('#thumb_link').click(function() {
						$('#thumbnail_content').html('<input type="text" name="thumb_link" class="form-control">');
					});

					$('#thumb_file').click(function() {
						$('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="thumbnail" class="filestyle" data-input="false" accept="image/*"></div>');
					});

					$('#description').summernote({
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
		</div>
	</div>
</div>