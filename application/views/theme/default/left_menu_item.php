<?php
$registration_enable            =   film_config('registration_enable');
$frontend_login_enable          =   film_config('frontend_login_enable');
$country_to_primary_menu        =   film_config('country_to_primary_menu');
$genre_to_primary_menu          =   film_config('genre_to_primary_menu');
$release_to_primary_menu        =   film_config('release_to_primary_menu');
$contact_to_primary_menu        =   film_config('contact_to_primary_menu');
$privacy_policy_to_primary_menu =   film_config('privacy_policy_to_primary_menu');
$dmca_to_primary_menu           =   film_config('dmca_to_primary_menu');
$az_to_primary_menu             =   film_config('az_to_primary_menu');
$az_to_footer_menu              =   film_config('az_to_footer_menu');
$movie_request_enable           =   film_config('movie_request_enable');
?>

<ul class="nav navbar-nav navbar-left m-l-20">
    <li><a href="<?php echo base_url(); ?>"><?php echo trans('site_title'); ?></a></li>
    <li><a href="<?php echo base_url('list/phim-le') ?>"><?php echo trans('movies'); ?></a></li>
    <?php
    $tv_series_publish          = film_config('tv_series_publish');
    $tv_series_pin_primary_menu = film_config('tv_series_pin_primary_menu');
    if ($tv_series_publish == '1' && $tv_series_pin_primary_menu == '1') :
    ?>
        <li><a href="<?php echo base_url('list/phim-bo') ?>"><?php echo trans('tv_series'); ?></a></li>
    <?php endif; ?>
    <?php if ($genre_to_primary_menu == '1') : ?>
        <li class="dropdown">
            <a href="javascript(0);" class="dropdown-toggle" data-toggle="dropdown"><?php echo trans('genre'); ?></a>
            <div class="dropdown-menu row col-lg-12 three-column-navbar" role="menu">
                <?php $all_published_genre = $this->genre_model->all_published_genre();
                foreach ($all_published_genre as $genre) :
                ?>
                    <div class="col-md-4">
                        <ul class="menu-item list-unstyled">
                            <li><a href="<?php echo base_url('genre/' . $genre->slug); ?>"><?php echo $genre->name; ?></a></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </li>
    <?php endif; ?>
    <?php if ($country_to_primary_menu == '1') : ?>
        <li class="dropdown">
            <a href="javascript(0);" class="dropdown-toggle" data-toggle="dropdown"><?php echo trans('country'); ?></a>
            <div class="dropdown-menu row col-lg-12 three-column-navbar" role="menu">
                <?php $all_published_country = $this->country_model->all_published_country();
                foreach ($all_published_country as $country) :
                ?>
                    <div class="col-md-4">
                        <ul class="menu-item list-unstyled">
                            <li><a href="<?php echo base_url('country/' . $country->slug); ?>"><?php echo $country->name; ?></a></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </li>
    <?php endif; ?>
    <?php if ($release_to_primary_menu == '1') : ?>
        <li class="dropdown">
            <a href="javascript(0);" class="dropdown-toggle" data-toggle="dropdown"><?php echo trans('release'); ?></a>
            <div class="dropdown-menu row col-lg-12 three-column-navbar" role="menu">
                <?php $current_year = date("Y");
                $end_year = $current_year - 14;
                for ($i = $current_year; $i > $end_year; $i--) :
                ?>
                    <div class="col-md-4">
                        <ul class="menu-item list-unstyled">
                            <li><a href="<?php echo base_url('year/' . $i); ?>">Năm <?php echo $i; ?></a></li>
                        </ul>
                    </div>
                <?php endfor; ?>
                <div class="col-md-3">
                    <ul class="menu-item list-unstyled">
                        <li><a href="<?php echo base_url('year'); ?>"><?php echo trans('more'); ?>..</a></li>
                    </ul>
                </div>
            </div>
        </li>
    <?php endif; ?>
    <?php if ($az_to_primary_menu == '1') : ?>
        <li><a href="<?php echo base_url('az') ?>"><?php echo trans('az'); ?></a></li>
    <?php endif; ?>
    <?php
    $live_tv_publish          = film_config('live_tv_publish');
    $live_tv_pin_primary_menu = film_config('live_tv_pin_primary_menu');
    if ($live_tv_publish == '1' && $live_tv_pin_primary_menu == '1') :
    ?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url('live-tv') ?>"><?php echo trans('tv'); ?>&nbsp;<span class="badge badge-danger" style="background-color: #d00202;"><?php echo trans('live'); ?></span>
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('live-tv') ?>"><?php echo trans('all_channels'); ?></a></li>
                <?php $live_tv_category = $this->live_tv_model->get_all_live_tv_category();
                foreach ($live_tv_category as $item) :
                ?>
                    <li><a href="<?php echo base_url('live-tv/category/' . $item['slug']); ?>"><?php echo $item['live_tv_category']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endif; ?>
    <?php $all_video_type_on_primary_menu = $this->common_model->all_video_type_on_primary_menu();
    foreach ($all_video_type_on_primary_menu as $video_type) :
    ?>
        <li><a href="<?php echo base_url() . 'type/' . $video_type->slug ?>"><?php echo $video_type->video_type; ?></a></li>
    <?php endforeach; ?>
    <?php
    $blog_enable = film_config('blog_enable');
    if ($blog_enable == '1') :
    ?>
        <li><a href="<?php echo base_url('blog') ?>"><?php echo trans('blog'); ?></a></li>
    <?php endif; ?>
    <?php $all_page_on_primary_menu = $this->common_model->all_page_on_primary_menu();
    foreach ($all_page_on_primary_menu as $pages) :
    ?>
        <li><a href="<?php echo base_url() . 'page/' . $pages->slug ?>"><?php echo $pages->page_title ?></a></li>
    <?php endforeach; ?>
    <?php if ($movie_request_enable == '1') : ?>
        <li><a href="#" data-toggle="modal" data-target="#movieRequest"><?php echo trans('request'); ?></a></li>
    <?php endif; ?>
    <?php if ($privacy_policy_to_primary_menu == '1') : ?>
        <li><a href="<?php echo base_url('privacy-policy') ?>"><?php echo trans('privacy_policy'); ?></a></li>
    <?php endif; ?>
    <?php if ($dmca_to_primary_menu == '1') : ?>
        <li><a href="<?php echo base_url('dmca') ?>"><?php echo trans('dmca'); ?></a></li>
    <?php endif; ?>
    <?php if ($contact_to_primary_menu == '1') : ?>
        <li><a href="<?php echo base_url('contact-us') ?>"><?php echo trans('contact'); ?></a></li>
    <?php endif; ?>
    <li><a href="<?php echo base_url('genre/phim-chieu-rap') ?>" style="color:#ff9601">Phim chiếu rạp</a></li>
</ul>