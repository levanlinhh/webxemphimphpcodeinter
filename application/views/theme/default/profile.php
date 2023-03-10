<section class="inner-banner-section banner-section bg-overlay-black <?php echo (film_config('bg_img_disable') == '1') ? '' : 'bg_img'; ?>">
    <div id="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="page-title">
                        <h1 class="text-uppercase">
                            <?php echo trans('profile_information'); ?>
                        </h1>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12 text-right">
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url(); ?>"><i class="fi ion-ios-home"></i><?php echo trans('site_title'); ?></a>
                        </li>
                        <li class="active"><?php echo trans('profile'); ?></li>
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
                        <div class="sidebar col-md-3 col-sm-9">
                            <div class="sidebar-menu">
                                <div class="sb-title"><i class="fa fa-navicon mr5"></i> <?php echo trans("menu"); ?></div>
                                <ul>
                                    <li class="active">
                                        <a href="<?php echo base_url('my-account/profile'); ?>">
                                            <i class="fa fa-user m-r-10"></i> <?php echo trans("profile"); ?>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo base_url('my-account/change-password'); ?>">
                                            <i class="fa fa-unlock-alt m-r-10"></i> <?php echo trans("change_password"); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pp-main col-md-9 col-sm-9">
                            <div class="ppm-head">
                                <div class="ppmh-title"><i class="fa fa-user mr5"></i> <?php echo trans('profile'); ?></div>
                            </div>
                            <div class="ppm-content user-content row">
                                <div class="uct-avatar col-md-3">
                                    <img src="<?php echo $this->common_model->get_img('user', $profile_info->user_id) . '?' . time(); ?>" title="<?php echo $profile_info->name; ?>" alt="<?php echo $profile_info->name; ?>">
                                </div>
                                <div class="uct-info col-md-9">
                                    <div class="block">
                                        <label><?php echo trans('full_name'); ?>:</label> <?php if ($profile_info->name == '') : echo 'Vui l??ng c???p nh???t';
                                                                                            else : echo $profile_info->name;
                                                                                            endif; ?>
                                    </div>
                                    <div class="block">
                                        <label><?php echo trans('email'); ?>:</label> <?php if ($profile_info->email == '') : echo 'Vui l??ng c???p nh???t';
                                                                                        else : echo $profile_info->email;
                                                                                        endif; ?>
                                    </div>
                                    <div class="block">
                                        <label><?php echo trans('gender'); ?>:</label> <?php if ($profile_info->gender == '1') : echo trans('male');
                                                                                        elseif ($profile_info->gender == '2') : echo trans('female');
                                                                                        else : echo 'N/a';
                                                                                        endif; ?>
                                    </div>
                                    <div class="block">
                                        <label><?php echo trans('phone'); ?>:</label> <?php if ($profile_info->phone == '') : echo 'Vui l??ng c???p nh???t';
                                                                                        else : echo $profile_info->phone;
                                                                                        endif; ?>
                                    </div>
                                    <div class="block">
                                        <label><?php echo trans('date_of_birth'); ?>:</label> <?php if ($profile_info->dob == '') : echo 'Vui l??ng c???p nh???t';
                                                                                                else : echo date('d/m/Y', strtotime($profile_info->dob));
                                                                                                endif; ?>
                                    </div>
                                    <div class="mt20">
                                        <a href="<?php echo base_url('my-account/update'); ?>" class="btn btn-success" title=""><?php echo trans('edit_account_info'); ?></a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>