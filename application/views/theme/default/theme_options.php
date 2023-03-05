<?php echo form_open(base_url() . 'admin/theme_options/update/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo trans('theme_option'); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('website_preloader'); ?></label>
                        <div class="col-sm-3 ">
                            <select class="form-control" name="preloader_disable" required>
                                <option value="0" <?php if (film_config("preloader_disable") == "0") {
                                                        echo "selected";
                                                    } ?>><?php echo trans('enable'); ?></option>
                                <option value="1" <?php if (film_config("preloader_disable") == "1") {
                                                        echo "selected";
                                                    } ?>><?php echo trans('disable'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('dark_theme_enable'); ?></label>
                        <div class="col-sm-3 ">
                            <select class="form-control" name="dark_theme" required>
                                <option value="1" <?php if (film_config("dark_theme") == "1") {
                                                        echo "selected";
                                                    } ?>><?php echo trans('enable'); ?></option>
                                <option value="0" <?php if (film_config("dark_theme") == "0") {
                                                        echo "selected";
                                                    } ?>><?php echo trans('disable'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('bg_image'); ?></label>
                        <div class="col-sm-3 ">
                            <select class="form-control" name="bg_img_disable" required>
                                <option value="0" <?php if ((film_config('bg_img_disable') == '0')) {
                                                        echo "selected";
                                                    } ?>><?php echo trans('enable'); ?></option>
                                <option value="1" <?php if ((film_config('bg_img_disable') == '1')) {
                                                        echo "selected";
                                                    } ?>><?php echo trans('disable'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('website_background_image'); ?></label>
                        <div class="col-sm-3">
                            <img class="img-fluid" id="bg_image" src="<?php echo (film_config("bg_image") != '') ? base_url('uploads/bg/') . film_config("bg_image") : base_url('uploads/bg/bg.jpg'); ?>" alt="<?php echo trans('website_background_image'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3"></label>
                        <div class="col-sm-3">
                            <input type="file" onchange="showImg2(this);" name="bg_image" class="filestyle" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('landing_page_with_search'); ?></label>
                        <div class="col-sm-3 ">
                            <select class="form-control" name="landing_page_enable" required>
                                <option value="1" <?php if (film_config("landing_page_enable") == "1") {
                                                        echo "selected";
                                                    } ?>><?php echo trans('enable'); ?></option>
                                <option value="0" <?php if (film_config("landing_page_enable") == "0") {
                                                        echo "selected";
                                                    } ?>><?php echo trans('disable'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('landing_page_image'); ?></label>
                        <div class="col-sm-3">
                            <img class="img-fluid" id="landing_page_image" src="<?php echo (film_config("landing_page_image_url") != '') ? base_url('uploads/') . film_config("landing_bg") : base_url('uploads/landing_page/bg.jpg'); ?>" alt="Landing Page BG">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3"></label>
                        <div class="col-sm-3">
                            <input type="file" onchange="showImg(this);" name="landing_page_image" class="filestyle" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('front_end_theme_color'); ?></label>
                        <div class="col-sm-3 ">
                            <select class="form-control" name="front_end_theme" required>
                                <option value="blue" <?php if (film_config("front_end_theme") == "default") {
                                                            echo "selected";
                                                        } ?>>Mặc định</option>
                                <option value="orange" <?php if (film_config("front_end_theme") == "orange") {
                                                            echo "selected";
                                                        } ?>>Orange</option>
                                <option value="blue" <?php if (film_config("front_end_theme") == "blue") {
                                                            echo "selected";
                                                        } ?>>Blue</option>
                                <option value="red" <?php if (film_config("front_end_theme") == "red") {
                                                        echo "selected";
                                                    } ?>>Red</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('header_template'); ?></label>
                        <div class="col-sm-3 ">
                            <select class="form-control" name="header_templete" required>
                                <option value="header1" <?php if (film_config("header_templete") == "header1") {
                                                            echo "selected";
                                                        } ?>>Mặc định</option>
                                <option value="header2" <?php if (film_config("header_templete") == "header2") {
                                                            echo "selected";
                                                        } ?>>Header 2</option>
                                <option value="header3" <?php if (film_config("header_templete") == "header3") {
                                                            echo "selected";
                                                        } ?>>Header 3</option>
                                <option value="header4" <?php if (film_config("header_templete") == "header4") {
                                                            echo "selected";
                                                        } ?>>Header 4</option>
                                <option value="header5" <?php if (film_config("header_templete") == "header5") {
                                                            echo "selected";
                                                        } ?>>Header 5</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('footer_template'); ?></label>
                        <div class="col-sm-3 ">
                            <select class="form-control" name="footer_templete" required>
                                <option value="footer1" <?php if (film_config("footer_templete") == "footer1") {
                                                            echo "selected";
                                                        } ?>>Mặc định</option>
                                <option value="footer2" <?php if (film_config("footer_templete") == "footer2") {
                                                            echo "selected";
                                                        } ?>>Footer 2</option>
                                <option value="footer3" <?php if (film_config("footer_templete") == "footer3") {
                                                            echo "selected";
                                                        } ?>>Footer 3</option>
                                <option value="footer4" <?php if (film_config("footer_templete") == "footer4") {
                                                            echo "selected";
                                                        } ?>>Footer 4</option>
                                <option value="footer5" <?php if (film_config("footer_templete") == "footer5") {
                                                            echo "selected";
                                                        } ?>>Footer 5</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('google_map_api'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" value="<?php echo film_config("map_api"); ?>" name="map_api" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('google_map_lat'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" value="<?php echo film_config("map_lat"); ?>" name="map_lat" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label pt-1"><?php echo trans('google_map_lang'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" value="<?php echo film_config("map_lng"); ?>" name="map_lng" class="form-control" />
                        </div>
                    </div>


                    <div class="col-sm-offset-3 col-sm-9 mt-3 p-0">
                        <button type="submit" class="btn btn-primary"><span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo trans('save_changes'); ?> </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function showImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#landing_page_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function showImg2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#bg_image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>