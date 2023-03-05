<?php
$facebook_url               =   film_config('facebook_url');
$twitter_url                =   film_config('twitter_url');
$vimeo_url                  =   film_config('vimeo_url');
$linkedin_url               =   film_config('linkedin_url');
$youtube_url                =   film_config('youtube_url');
$footer1_title              =   film_config('footer1_title');
$footer1_content            =   film_config('footer1_content');
$footer2_title              =   film_config('footer2_title');
$footer2_content            =   film_config('footer2_content');
$footer3_title              =   film_config('footer3_title');
$footer3_content            =   film_config('footer3_content');
$footer_text                =   film_config('copyright_text');
$theme_dir                  =   'theme/default/';
$assets_dir                 =   'assets/theme/default/';
?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="footer-about  ">
                    <div class="movie-heading"> <span><?php echo $footer1_title; ?></span>
                        <div class="disable-bottom-line"></div>
                    </div>
                    <img class="img-responsive" src="<?php echo base_url(); ?>uploads/system_logo/<?php echo film_config('logo'); ?>" alt="Logo">
                    <?php echo $footer1_content; ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="bottom-post ">
                    <div class="movie-heading"> <span><?php echo $footer2_title; ?></span>
                        <div class="disable-bottom-line"></div>
                    </div>
                    <?php echo $footer2_content; ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="sendus  ">
                    <div class="movie-heading"> <span><?php echo trans('subscribe'); ?></span>
                        <div class="disable-bottom-line"></div>
                    </div>
                    <div id="contact-form">
                        <div class="expMessage"></div>
                        <p class="text-light"><?php echo trans('subscribe_mail_list_text'); ?></p>
                        <input type="text" name="formInput[name]" id="name" class="form-control half-wdth-field pull-right" placeholder="Your name" required>
                        <input type="email" name="formInput[email]" id="email" class="form-control half-wdth-field pull-right" placeholder="Email" required>
                        <div>
                            <div id="error" style="display: none;"></div>
                            <a class="btn btn-success" id="subscribe-btn"><?php echo trans('subscribe'); ?> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view($theme_dir . 'copyright'); ?>