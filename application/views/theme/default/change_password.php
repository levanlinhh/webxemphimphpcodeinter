<section class="inner-banner-section banner-section bg-overlay-black <?php echo (film_config('bg_img_disable') == '1') ? '' : 'bg_img'; ?>">
    <?php
    $success_msg    =   $this->session->flashdata('success');
    $error_msg      =   $this->session->flashdata('error');
    ?>
    <div id="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="page-title">
                        <h1 class="text-uppercase">
                            <?php echo trans('change_password'); ?>
                        </h1>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12 text-right">
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url(); ?>"><i class="fi ion-ios-home"></i><?php echo trans('site_title'); ?></a>
                        </li>
                        <li class="active"><?php echo trans('change_password'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="section-opt">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="profiles-wrap">
                        <div class="sidebar col-md-3 col-sm-3">
                            <div class="sidebar-menu">
                                <div class="sb-title"><i class="fa fa-navicon mr5"></i> <?php echo trans("menu"); ?></div>
                                <ul>
                                    <li class="">
                                        <a href="<?php echo base_url('my-account/profile'); ?>">
                                            <i class="fa fa-user m-r-10"></i> <?php echo trans("profile"); ?>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="<?php echo base_url('my-account/change-password'); ?>">
                                            <i class="fa fa-unlock-alt m-r-10"></i> <?php echo trans("change_password"); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pp-main col-md-9 col-sm-9">
                            <div class="ppm-head">
                                <div class="ppmh-title"><i class="fa fa-key mr5"></i> <?php echo trans('change_password'); ?></div>
                            </div>
                            <div class="ppm-content update-content">
                                <div class="uc-form">
                                    <form id="profile-form" action="<?php echo base_url() . 'user/change_password/update'; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        <?php
                                        if ($success_msg != '') {
                                            echo '<div class="alert alert-success">' . $success_msg . '.</div>';
                                        }
                                        if ($error_msg != '') {
                                            echo '<div class="alert alert-danger">' . $error_msg . '.</div>';
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-4 control-label"><?php echo trans('old_password'); ?></label>
                                            <div class="col-sm-8">
                                                <input name="password" type="password" class="form-control" id="full_name" value="" placeholder="Nh???p m???t kh???u c??" required>
                                                <span id="error-full_name" class="help-block error-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password" class="col-sm-4 control-label"><?php echo trans('new_password'); ?></label>
                                            <div class="col-sm-8">
                                                <input name="new_password" type="password" class="form-control" id="full_name" value="" placeholder="Nh???p m???t kh???u m???i" required>
                                                <span id="error-full_name" class="help-block error-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="retype_new_password" class="col-sm-4 control-label"><?php echo trans('new_password_again'); ?></label>
                                            <div class="col-sm-8">
                                                <input name="retype_new_password" type="password" class="form-control" id="full_name" value="" placeholder="Nh???p l???i m???t kh???u" required>

                                                <span id="error-full_name" class="help-block error-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-4 control-label"></label>
                                            <div class="col-sm-2">
                                                <button type="submit" value="submit" class="btn btn-success btn-sm m-t-20"> <span class="btn-label"><i class="fa fa-floppy-o"></i></span><?php echo trans('save_changes'); ?> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>