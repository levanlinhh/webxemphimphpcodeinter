<?php
$facebook_url               =   $this->db->get_where('config', array('title' => 'facebook_url'))->row()->value;
$twitter_url                =   $this->db->get_where('config', array('title' => 'twitter_url'))->row()->value;
$vimeo_url                  =   $this->db->get_where('config', array('title' => 'vimeo_url'))->row()->value;
$linkedin_url               =   $this->db->get_where('config', array('title' => 'linkedin_url'))->row()->value;
$youtube_url                =   $this->db->get_where('config', array('title' => 'youtube_url'))->row()->value;
$footer1_title              =   $this->db->get_where('config', array('title' => 'footer1_title'))->row()->value;
$footer1_content            =   $this->db->get_where('config', array('title' => 'footer1_content'))->row()->value;
$footer2_title              =   $this->db->get_where('config', array('title' => 'footer2_title'))->row()->value;
$footer2_content            =   $this->db->get_where('config', array('title' => 'footer2_content'))->row()->value;
$footer3_title              =   $this->db->get_where('config', array('title' => 'footer3_title'))->row()->value;
$footer3_content            =   $this->db->get_where('config', array('title' => 'footer3_content'))->row()->value;
$footer_text                =   $this->db->get_where('config', array('title' => 'copyright_text'))->row()->value;
$site_name                  =   $this->db->get_where('config', array('title' => 'site_name'))->row()->value;
$about_us_enable            =   $this->db->get_where('config', array('title' => 'about_us_enable'))->row()->value;
$about_us_to_footer_menu    =   $this->db->get_where('config', array('title' => 'about_us_to_footer_menu'))->row()->value;
$contact_to_footer_menu     =   $this->db->get_where('config', array('title' => 'contact_to_footer_menu'))->row()->value;
$tv_series_pin_footer_menu  =   $this->db->get_where('config', array('title' => 'tv_series_pin_footer_menu'))->row()->value;
$live_tv_pin_footer_menu    =   $this->db->get_where('config', array('title' => 'live_tv_pin_footer_menu'))->row()->value;
$privacy_policy_to_footer_menu  =   $this->db->get_where('config', array('title' => 'privacy_policy_to_footer_menu'))->row()->value;
$dmca_to_footer_menu            =   $this->db->get_where('config', array('title' => 'dmca_to_footer_menu'))->row()->value;
$theme_dir                  =   'theme/default/';
$assets_dir                 =   'assets/theme/default/';
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir . 'css/'); ?>footer-with-button-logo.css">
<?php $front_end_theme = $this->db->get_where('config', array('title' => 'front_end_theme'))->row()->value; ?>
<?php if ($front_end_theme == 'blue') : ?>
    <style type="text/css">
        #myFooter {
            background-color: #08c
        }
    </style>
<?php elseif ($front_end_theme == 'orange') : ?>
    <style type="text/css">
        #myFooter {
            background-color: #060606
        }
    </style>
<?php elseif ($front_end_theme == 'red') : ?>
    <style type="text/css">
        #myFooter {
            background-color: red
        }
    </style>
<?php else : ?>
    <style type="text/css">
        #myFooter {
            background-color: #FDD922
        }
    </style>
<?php endif; ?>
<footer id="myFooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h2 class="logo"><a href="<?php echo base_url(); ?>"> <img class="img-responsive" src="<?php echo base_url() ?>uploads/system_logo/<?php echo film_config('logo'); ?>" width="150" alt="Logo"> </a></h2>
            </div>
            <div class="col-sm-2">
                <h5><?php echo $footer1_title; ?></h5>
                <?php echo $footer1_content; ?>
            </div>
            <div class="col-sm-2">
                <h5><?php echo $footer2_title; ?></h5>
                <?php echo $footer2_content; ?>
            </div>
            <div class="col-sm-2">
                <h5><?php echo trans('links'); ?></h5>
                <?php $all_video_type_on_footer_menu = $this->common_model->all_video_type_on_footer_menu();
                foreach ($all_video_type_on_footer_menu as $video_type) :
                ?>
                    <a href="<?php echo base_url() . 'type/' . $video_type->slug ?>"><?php echo $video_type->video_type; ?></a><br />
                <?php endforeach; ?>
                <?php if ($contact_to_footer_menu == '1') : ?>
                    <a href="<?php echo base_url('contact-us') ?>"><?php echo trans('contact_us'); ?></a><br />
                <?php endif; ?>
                <?php if ($about_us_enable == '1' && $about_us_to_footer_menu == '1') : ?>
                    <a href="<?php echo base_url('about-us') ?>"><?php echo trans('about_us'); ?></a><br />
                <?php endif; ?>
                <a href="javascript:void(0);"><?php echo trans('faq'); ?></a><br>
                <a href="<?php echo base_url() . '/sitemap.xml' ?>">Sitemap</a>
            </div>
            <div class="col-sm-3">
                <h5><?php echo $footer3_title; ?></h5>
                <?php $all_video_type_on_footer_menu = $this->common_model->all_video_type_on_footer_menu();
                foreach ($all_video_type_on_footer_menu as $video_type) :
                ?>
                    <a href="<?php echo base_url() . 'type/' . $video_type->slug ?>"><?php echo $video_type->video_type; ?></a><br />
                <?php endforeach; ?>
                <?php $all_page_on_footer_menu = $this->common_model->all_page_on_footer_menu();
                foreach ($all_page_on_footer_menu as $pages) :
                ?>
                    <a href="<?php echo base_url() . 'page/' . $pages->slug; ?>"><?php echo $pages->page_title ?></a><br />
                <?php endforeach; ?>
                <?php if ($live_tv_pin_footer_menu == '1') : ?>
                    <a href="<?php echo base_url('live-tv') ?>"><?php echo trans('live_tv'); ?></a><br />
                <?php endif; ?>
                <?php if ($tv_series_pin_footer_menu == '1') : ?>
                    <a href="<?php echo base_url('tv-series') ?>"><?php echo trans('tv_series'); ?></a><br />
                <?php endif; ?>
                <?php if ($privacy_policy_to_footer_menu == '1') : ?>
                    <a href="<?php echo base_url('privacy-policy') ?>"><?php echo trans('privacy_olicy'); ?></a><br />
                <?php endif; ?>
                <?php if ($dmca_to_footer_menu == '1') : ?>
                    <a href="<?php echo base_url('dmca') ?>"><?php echo trans('dmca'); ?></a>
                <?php endif; ?>
                <p style="font-size:12px;">© 2022 <?php echo trans('site_ftitle'); ?></p>
            </div>
        </div>
    </div>
</footer>