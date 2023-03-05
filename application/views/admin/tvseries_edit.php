<style type="text/css">
    .p-a {
        padding: 10px
    }

    button.close {
        padding: 0
    }
</style>
<?php
$videos   = $this->db->get_where('videos', array('videos_id' => $param1))->result_array();
foreach ($videos as $video) :
    echo form_open(base_url() . 'admin/tvseries/update/' . $param1, array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));
?>
    <div class="row">
        <div class="col-md-6">
            <div class="card cta cta--featured p-a">
                <div class="card-block mt-2">
                    <h3 class="card-title no-margin-top"><?php echo trans('tv_series_info'); ?></h3>
                </div>
                <span class="header-line"></span>
                <div class="card-block mt-2">
                    <input type="hidden" name="imdbid" id="imdbid">
                    <div class="form-group">
                        <label class=" control-label"><?php echo trans('title'); ?></label>
                        <input type="text" name="title" value="<?php echo $video['title'] ?>" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('slug'); ?> (<?php echo base_url(); ?>)</label>
                        <input type="text" id="slug" name="slug" value="<?php echo $video['slug'] ?>" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('description'); ?></label>
                        <textarea class="wysihtml5 form-control" name="description" id="description" rows="10"><?php echo $video['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('actor'); ?></label>
                        <select class="form-control select2" name="actor[]" multiple="multiple" id="actor">
                            <option value="" disabled>--Actors--</option>
                            <?php
                            $actors = $this->db->get_where('star', array('star_type' => 'actor'))->result_array();
                            $directors = $this->db->get_where('star', array('star_type' => 'director'))->result_array();
                            $writers = $this->db->get_where('star', array('star_type' => 'writer'))->result_array();
                            foreach ($actors as $actor) : ?>
                                <option value="<?php echo $actor['star_id']; ?>" <?php if (preg_match('/\b' . $actor["star_id"] . '\b/', $video['stars'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $actor['star_name']; ?></option>
                            <?php endforeach; ?>
                            <option value="" disabled>--<?php echo trans('directors'); ?>--</option>
                            <?php foreach ($directors as $director) : ?>
                                <option value="<?php echo $director['star_id']; ?>" <?php if (preg_match('/\b' . $director["star_id"] . '\b/', $video['stars'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $director['star_name']; ?></option>
                            <?php endforeach; ?>
                            <option value="" disabled>--<?php echo trans('writer'); ?>--</option>
                            <?php foreach ($writers as $writer) : ?>
                                <option value="<?php echo $writer['star_id']; ?>" <?php if (preg_match('/\b' . $writer["star_id"] . '\b/', $video['stars'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $writer['star_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('director'); ?></label>
                        <select class="form-control select2" name="director[]" multiple="multiple" id="director">
                            <option value="" disabled>--Directors--</option>
                            <?php
                            $actors = $this->db->get_where('star', array('star_type' => 'actor'))->result_array();
                            $directors = $this->db->get_where('star', array('star_type' => 'director'))->result_array();
                            $writers = $this->db->get_where('star', array('star_type' => 'writer'))->result_array();
                            foreach ($directors as $director) : ?>
                                <option value="<?php echo $director['star_id']; ?>" <?php if (preg_match('/\b' . $director["star_id"] . '\b/', $video['director'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $director['star_name']; ?></option>
                            <?php endforeach; ?>
                            <option value="" disabled>--<?php echo trans('actors'); ?>--</option>
                            <?php foreach ($actors as $actor) : ?>
                                <option value="<?php echo $actor['star_id']; ?>" <?php if (preg_match('/\b' . $actor["star_id"] . '\b/', $video['director'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $actor['star_name']; ?></option>
                            <?php endforeach; ?>
                            <option value="" disabled>--<?php echo trans('writer'); ?>--</option>
                            <?php foreach ($writers as $writer) : ?>
                                <option value="<?php echo $writer['star_id']; ?>" <?php if (preg_match('/\b' . $writer["star_id"] . '\b/', $video['director'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $writer['star_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('writer'); ?></label>
                        <select class="form-control select2" name="writer[]" multiple="multiple" id="writer">
                            <option value="" disabled>--Writer--</option>
                            <?php
                            $actors = $this->db->get_where('star', array('star_type' => 'actor'))->result_array();
                            $directors = $this->db->get_where('star', array('star_type' => 'director'))->result_array();
                            $writers = $this->db->get_where('star', array('star_type' => 'writer'))->result_array();
                            foreach ($writers as $writer) : ?>
                                <option value="<?php echo $writer['star_id']; ?>" <?php if (preg_match('/\b' . $writer["star_id"] . '\b/', $video['writer'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $writer['star_name']; ?></option>
                            <?php endforeach; ?>
                            <option value="" disabled>--<?php echo trans('actors'); ?>--</option>
                            <?php foreach ($actors as $actor) : ?>
                                <option value="<?php echo $actor['star_id']; ?>" <?php if (preg_match('/\b' . $actor["star_id"] . '\b/', $video['writer'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $actor['star_name']; ?></option>
                            <?php endforeach; ?>
                            <option value="" disabled>--<?php echo trans('directors'); ?>--</option>
                            <?php foreach ($directors as $director) : ?>
                                <option value="<?php echo $director['star_id']; ?>" <?php if (preg_match('/\b' . $director["star_id"] . '\b/', $video['writer'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $director['star_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row p-0">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo trans('release_date'); ?></label>
                                <div class="input-group">
                                    <input type="text" name="release" id="release_date" class="form-control" value="<?php echo $video['release']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo trans('imdb_rating'); ?></label>
                                <input type="text" name="rating" value='<?php echo $video['imdb_rating']; ?>' id="rating" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('country'); ?></label>
                        <select class="form-control select2" name="country[]" multiple="multiple" id="country">
                            <optgroup label="Select Country">
                                <?php $country = $this->db->get('country')->result_array();
                                foreach ($country as $v_country) : ?>
                                    <option value="<?php echo $v_country['country_id']; ?>" <?php if (preg_match('/\b' . $v_country['country_id'] . '\b/', $video['country'])) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $v_country['name']; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('genre'); ?></label>
                        <select class="form-control select2" name="genre[]" multiple="multiple" id="genre">
                            <?php $genre = $this->db->get('genre')->result_array();
                            foreach ($genre as $v_genre) : ?>
                                <option value="<?php echo $v_genre['genre_id']; ?>" <?php if (preg_match('/\b' . $v_genre['genre_id'] . '\b/', $video['genre'])) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $v_genre['name']; ?></option>
                                <option value="<?php echo $v_genre['genre_id']; ?>"><?php echo $v_genre['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label"><?php echo trans('video_type'); ?></label>
                        <select class="form-control select2" name="video_type[]" multiple="multiple">
                            <?php $video_types = $this->db->get('video_type')->result_array();
                            foreach ($video_types as $video_type) : ?>
                                <option value="<?php echo $video_type['video_type_id']; ?>" <?php if (preg_match('/\b' . $video_type['video_type_id'] . '\b/', $video['video_type'])) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $video_type['video_type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row p-0">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo trans('runtime'); ?></label>
                                <input type="text" name="runtime" value="<?php echo $video['runtime']; ?>" id="runtime" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo trans('video_quality'); ?></label>
                                <select class="form-control m-bot15" name="video_quality">
                                    <?php $quality = $this->db->get_where('quality', array('status' => '1'))->result_array();
                                    foreach ($quality as $quality) : ?>
                                        <option value="<?php echo $quality['quality'] ?>" <?php if ($quality['quality'] == $video['video_quality']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php echo $quality['quality'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row p-0">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo trans('publication'); ?></label>
                                <div class="toggle">
                                    <label>
                                        <input type="checkbox" name="publication" <?php if ($video['publication'] == '1') {
                                                                                        echo 'checked';
                                                                                    } ?>><span class="button-indecator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?php echo trans('enable_download'); ?></label>
                                <div class="toggle">
                                    <label>
                                        <input type="checkbox" name="enable_download" <?php if ($video['enable_download'] == '1') {
                                                                                            echo 'checked';
                                                                                        } ?>><span class="button-indecator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Trailer URL(YouTube Only)</label>
                        <input type="url" name="trailler_youtube_source" value="<?php echo $video['trailler_youtube_source']; ?>" id="trailler_youtube_source" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pull-left">
                            <a href="<?php echo base_url() . 'admin/videos/#' . $param1 ?>" class="link ml-2 text-left"> <?php echo trans('back_to_list'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card cta cta--featured p-a">
                <div class="card-block mt-2">
                    <h3 class="card-title no-margin-top"><?php echo trans('poster'); ?>, <?php echo trans('thumbnail'); ?> & <?php echo trans('seo'); ?></h3>
                </div>
                <span class="header-line"></span>
                <div class="card-block mt-2">
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('thumbnail'); ?></label>
                        <div class="profile-info-name text-center"> <img id="thumb_image" src="<?php echo $this->common_model->get_video_thumb_url($param1) . '?' . time(); ?>" width="150" class="img-thumbnail" alt=""> </div>
                        <br>
                        <div id="thumbnail_content">
                            <input type="file" id="thumbnail_file" onchange="showImg(this);" name="thumbnail" class="filestyle" data-input="false" accept="image/*">
                        </div><br>
                        <p class="btn btn-sm btn-white" id="thumb_link" href="#"><span class="btn-label mr-1"> <i class="fa fa-link"></i></span>
                            <?php echo trans('link') ?>
                        </p>
                        <p class="btn btn-sm btn-white" id="thumb_file" href="#"><span class="btn-label mr-1"> <i class="fa fa-file-o"></i></span>
                            <?php echo trans('file') ?>
                        </p>

                    </div>

                    <div class="form-group">
                        <label class="control-label"><?php echo trans('poster'); ?></label>
                        <div class="profile-info-name text-center"> <img id="poster_image" src="<?php echo $this->common_model->get_video_poster_admin_url($param1) . '?' . time(); ?>" width="350" class="img-thumbnail" alt=""> </div>
                        <br>
                        <div id="poster_content">
                            <input type="file" id="poster_file" onchange="showImg2(this);" name="poster_file" class="filestyle" data-input="false" accept="image/*">
                        </div><br>
                        <p class="btn btn-sm btn-white" id="poster_link" href="#"><span class="btn-label mr-1"> <i class="fa fa-link"></i></span>
                            <?php echo trans('link') ?>
                        </p>
                        <p class="btn btn-sm btn-white" id="poster_file_btn" href="#"><span class="btn-label mr-1"> <i class="fa fa-file-o"></i></span>
                            <?php echo trans('file') ?>
                        </p>

                    </div>
                    <h3 class="card-title"><?php echo trans('seo_and_marketing'); ?></h3>
                    <div class="form-group">
                        <label class=" control-label"><?php echo trans('seo_title'); ?></label>
                        <input type="text" name="seo_title" id="seo_title" value="<?php echo $video['seo_title']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label"><?php echo trans('focus_keyword'); ?></label>
                        <input type="text" name="focus_keyword" value="<?php echo $video['focus_keyword']; ?>" id="focus_keyword" class="form-control"><br>
                        <p><?php echo trans('use_comma_to_separate_keyword'); ?></p>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo trans('meta_description'); ?></label>
                        <textarea class="wysihtml5 form-control" name="meta_description" id="meta_description" rows="5"><?php echo $video['meta_description']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label"><?php echo trans('tags'); ?></label>
                        <input type="text" name="tags" id="tags" value="<?php echo $video['tags']; ?>" class="form-control"><br>
                        <p><?php echo trans('use_comma_to_separate_tags'); ?></p>
                    </div>

                    <div class="form-group">
                        <label class="control-label"><?php echo trans('send_email_newslatter_to_subscriber'); ?></label>
                        <div class="toggle">
                            <label>
                                <input type="checkbox" name="email_notify"><span class="button-indecator"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label"><?php echo trans('send_push_notification_to_subscriber'); ?></label>
                        <div class="toggle">
                            <label>
                                <input type="checkbox" name="push_notify"><span class="button-indecator"></span>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 pull-right">
                            <button type="submit" class="btn btn-primary pull-right waves-effect"> <span class="btn-label mr-1"> <i class="fa fa-floppy-o"></i></span><?php echo trans('save_changes'); ?></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <?php echo form_close(); ?>
<?php endforeach; ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.min.js"></script>
<script>
    jQuery(document).ready(function() {
        $(".select2").select2();
        $('form').parsley();
        $('#release_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
        $(":file").filestyle({
            input: false
        });
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
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/parsley.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bloodhound.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/typeahead.jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/moment.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/date.js"></script>
<script>
    jQuery(document).ready(function() {
        $('#country').select2({
            placeholder: 'Select Country'
        });
        $('#language').select2({
            placeholder: 'Select Language'
        });
        $('#genre').select2({
            placeholder: 'Select Genre'
        });
        $('#video_type').select2({
            placeholder: 'Select Video Type'
        });
        $('#focus_keyword').tagsinput();
        $('#tags').tagsinput({
            typeahead: {
                source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
            }
        });
        $('#thumb_link').click(function() {
            $('#thumbnail_content').html('<input type="text" name="thumb_link" class="form-control">');
        });
        $('#thumb_file').click(function() {
            $('#thumbnail_content').html('<input type="file" id="thumbnail_file" onchange="showImg(this);" name="thumbnail" class="filestyle" data-input="false" accept="image/*"></div>');
            $(":file").filestyle({
                input: false
            });
        });

        $('#poster_link').click(function() {
            $('#poster_content').html('<input type="text" name="poster_link" class="form-control">');
        });
        $('#poster_file_btn').click(function() {
            $('#poster_content').html('<input type="file" id="poster_file" onchange="showImg2(this);" name="poster_file" class="filestyle" data-input="false" accept="image/*"></div>');
            $(":file").filestyle({
                input: false
            });
        });
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $(document).on('click', '#import_btn', function() {
            $('#result').html('');
            var from = $("#from").val();
            var id = $("#imdb_id").val();
            if (from != '' && id != '') {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "admin/import_movie"; ?>',
                    data: "id=" + encodeURIComponent(id) + "&from=" + encodeURIComponent(from),
                    dataType: 'json',
                    beforeSend: function() {
                        $("#import_btn").html('Fetching...');
                    },
                    success: function(response) {
                        var imdb_status = response.imdb_status;
                        var imdbid = response.imdbid;
                        var title = response.title;
                        var plot = response.plot;
                        var runtime = response.runtime;
                        var actor = JSON.parse("[" + response.actor + "]");
                        var director = JSON.parse("[" + response.director + "]");
                        var writer = JSON.parse("[" + response.writer + "]");
                        var country = JSON.parse("[" + response.country + "]");
                        var genre = JSON.parse("[" + response.genre + "]");
                        var rating = response.rating;
                        var release = new Date(response.release).toString('yyyy-MM-dd');
                        var poster = response.poster;
                        if (imdb_status == 'success') {
                            $('#result').html('<div class="alert alert-success alert-dismissable mt-2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data imported successfully.</div>');
                            $("#title").val(title);
                            //Đổi chữ thành chữ thường
                            title = title.toLowerCase();
                            //Đổi ký tự có dấu thành không dấu
                            title = title.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                            title = title.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                            title = title.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                            title = title.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                            title = title.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                            title = title.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                            title = title.replace(/đ/gi, 'd');
                            //Xóa các ký tự đặt biệt
                            title = title.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                            //Đổi khoảng trắng thành ký tự gạch ngang
                            title = title.replace(/ /gi, "-");
                            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                            title = title.replace(/\-\-\-\-\-/gi, '-');
                            title = title.replace(/\-\-\-\-/gi, '-');
                            title = title.replace(/\-\-\-/gi, '-');
                            title = title.replace(/\-\-/gi, '-');
                            //Xóa các ký tự gạch ngang ở đầu và cuối
                            title = '@' + title + '@';
                            title = title.replace(/\@\-|\-\@|\@/gi, '');
                            $("#slug").val(title);
                            $("#imdbid").val(imdbid);
                            $("#description").val(plot);
                            $("#runtime").val(runtime);
                            $('#actor').val(actor).trigger('change');
                            $("#director").val(director).trigger('change');
                            $("#writer").val(writer).trigger('change');
                            $("#country").val(country).trigger('change');
                            $("#genre").val(genre).trigger('change');
                            $("#rating").val(parseFloat(rating).toFixed(1));
                            $("#release_date").datepicker("setDate", release);
                            $('#thumbnail_content').html('<input type="text" name="thumb_link" value="' + poster + '" class="form-control">');
                            $('#thumb_image').attr('src', poster);
                            $('#import_btn').html('Fetch');
                        } else {
                            $('#result').html('<div class="alert alert-danger alert-dismissable mt-2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No data found in database..</div>');
                            $('#import_btn').html('Fetch');
                        }
                    }
                });
            } else {
                alert('Please input IMDb/TMDB ID');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#add-sourch").click(function() {
            if ($('#source1').length > 0) {
                var main_content = $('div[id^="source"]:last');
                var num = parseInt(main_content.prop("id").match(/\d+/g), 10) + 1;
                var clone_content = main_content.clone().prop('id', 'source' + num);
                clone_content.insertAfter(main_content);
            } else {
                $('<div class="form-inline mt-2" id="source1"><div class="form-group" id="_source1"><label class="control-label" id="sourcelabel1">Title</label>&nbsp;&nbsp;<input type="text" name="source_name[]" id="embed_link" class="form-control" placeholder="Name ex: server-2" required>&nbsp;&nbsp;<label class="control-label" id="sourcelabel1">URL</label>&nbsp;&nbsp;<input type="url" name="embed_link[]" id="embed_link" class="form-control" placeholder="http://server-2.com/movies/titalic.mp4" required>&nbsp;&nbsp;<button onClick="$(this).parent().parent().remove();" id="remove_btn" class="btn btn-danger" id="add-sourch"><i class="fa fa-close"></i></button></div><br><br>').insertAfter("#video-source");
            }
        });
    });
</script>
<script type="text/javascript">
    function loadAllActor() {
        var returnArray = [];
        var types = 'actor';
        $.ajax({
            url: '<?= base_url('admin/load_stars') ?>',
            type: 'post',
            data: {
                types: types
            },
            dataType: 'json',
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    var id = JSON.parse(response[i]['id']);
                    var name = response[i]['name'];
                    $("#actor").append("<option value='" + item + "'>" + item + "</option>");
                    returnArray[i]["id"] = id;
                    returnArray[i]["name"] = name;
                }
            }
        });
        return returnArray;
    }

    function load_actor() {
        $.get('<?php echo base_url() . "admin/load_stars2"; ?>', function(data) {
            $("#actor").html('');
            $("#actor").empty('');
            $('#actor').val('');
            $("#actor").html(data);
            $("#actor").select2("destroy");
            $("#actor").select2().trigger('change');
        });
    }

    function load_star() {
        var types = 'actor';
        $.ajax({
            url: '<?php echo base_url() . "admin/load_stars"; ?>',
            type: 'post',
            data: {
                types: types
            },
            dataType: 'json',
            success: function(response) {
                var len = response.length;
                $("#actor").empty();
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#actor").append("<option value='" + id + "'>" + name + "</option>");
                }
                $("#actor").select2("destroy").select2();
                $("#actor").trigger('change');
            }
        });
    }
</script>