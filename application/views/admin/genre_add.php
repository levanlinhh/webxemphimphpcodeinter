<?php echo form_open(base_url() . 'admin/genre/add/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

<h4 class="text-center text-white"><?php echo trans('new_genre_add'); ?></h4>
<hr>
<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo trans('name'); ?></label>
    <div class="col-sm-12">
        <input type="text" id="title" name="name" class="form-control" required>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <label class="control-label"><?php echo trans('slug'); ?> (<?php echo base_url('watch/slug'); ?></label>
        <input type="text" id="slug" name="slug" class="form-control" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3"><?php echo trans('description'); ?></label>
    <div class="col-sm-12">
        <textarea class="wysihtml5 form-control" name="description" rows="5"></textarea>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-3"><?php echo trans('icon'); ?></label>
    <div class="col-sm-12">
        <div class="profile-info-name text-center"> <img id="thumb_image" src="<?php echo base_url('uploads/default_image/genre.png') ?>" class="img-thumbnail bg-gray-50" alt="genre" width="120"> </div>
        <br>
        <div id="thumbnail_content">
            <input type="file" id="thumbnail_file" onchange="showImg(this);" name="image" class="filestyle" data-input="false" accept="image/*">
        </div><br>
        <p class="btn btn-sm btn-white" id="thumb_link" href="#"><span class="btn-label mr-1"> <i class="fa fa-link"></i></span><?php echo trans('link'); ?></p>
        <p class="btn btn-sm btn-white" id="thumb_file" href="#"><span class="btn-label mr-1"> <i class="fa fa-file-o"></i></span><?php echo trans('file'); ?></p><br>
        <small><?php echo trans('genre_country_icon_note'); ?></small>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-3"><?php echo trans('featured'); ?></label>
    <div class="col-sm-12">
        <select class="form-control m-bot15" name="featured">
            <option value="0"><?php echo trans('none_featured'); ?></option>
            <option value="1"><?php echo trans('featured'); ?></option>
        </select>
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
</script>
<script>
    jQuery(document).ready(function() {
        $('#thumb_link').click(function() {
            $('#thumbnail_content').html('<input type="text" name="image_link" class="form-control">');
        });

        $('#thumb_file').click(function() {
            $('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="image" class="filestyle" data-input="false" accept="image/*"></div>');
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