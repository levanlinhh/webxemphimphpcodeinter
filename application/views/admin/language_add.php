<?php echo form_open(base_url() . 'admin/movie_language/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

<h4 class="text-center text-white"><?php echo trans('new_langauge_add'); ?></h4>
<hr>
<div class="form-group">
    <label class=" col-sm-3 control-label"><?php echo trans('name'); ?></label>
    <div class="col-sm-12">
        <input type="text" name="name" class="form-control" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3"><?php echo trans('description'); ?></label>
    <div class="col-sm-12">
        <textarea class="wysihtml5 form-control" name="description" rows="5"></textarea>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3"><?php echo trans('publication'); ?></label>
    <div class="col-sm-12">
        <select class="form-control m-bot15" name="publication">
            <option value="1"><?php echo trans('published'); ?></option>
            <option value="0"><?php echo trans('unpublished'); ?></option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9 mt-2">
        <button type="submit" class="btn btn-primary waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-plus"></i></span><?php echo trans('create'); ?> </button>
        <button type="" class="btn btn-white ml-1 waves-effect" data-dismiss="modal"><?php echo trans('close'); ?> </button>
    </div>
</div>
</form>
<script>
    jQuery(document).ready(function() {
        $('form').parsley();
    });
    jQuery(document).ready(function() {
        $('#thumb_link').click(function() {
            $('#thumbnail_content').html('<input type="text" name="image_link" class="form-control">');
        });
        $('#thumb_file').click(function() {
            $('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="image" class="filestyle" data-input="false" accept="image/*"></div>');
        });
    });
</script>
<!--instant image display-->
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
<!--end instant image display-->