<?php
$header_templete                =   film_config('header_templete');
$theme_dir                      =   'theme/default/';
$assets_dir                     =   'assets/theme/default/';
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
$facebook_url                   =   film_config('facebook_url');
$twitter_url                    =   film_config('twitter_url');
$vimeo_url                      =   film_config('vimeo_url');
$linkedin_url                   =   film_config('linkedin_url');
$youtube_url                    =   film_config('youtube_url');
$business_phone                 =   film_config('business_phone');
$contact_email                  =   film_config('contact_email');
?>
<?php if ($header_templete == 'header1') : ?>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>uploads/system_logo/<?php echo film_config('logo'); ?>" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar1">
                <?php $this->load->view($theme_dir . 'left_menu_item'); ?>
                <?php $this->load->view($theme_dir . 'right_menu_item'); ?>
                <form class="navbar-form navbar-right" style="margin-right: -15px;" method="get" action="<?php echo base_url('search'); ?>">
                    <div class="input-group custom-search">
                        <input type="text" name="q" value="<?php if (isset($search_keyword)) {
                                                                echo $search_keyword;
                                                            } ?>" autocomplete="off" id="search-input" class="form-control custom-search-input" placeholder="Tìm tên phim..">
                        <button class="custom-search-botton" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
<?php elseif ($header_templete == 'header2') : ?>
    <div id="primary-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12 border-right">
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>"> <img class="img-responsive" src="<?php echo base_url(); ?>uploads/system_logo/<?php echo film_config('logo'); ?>?<?php echo time(); ?>" alt="Logo"> </a>
                    </div>
                </div>
                <div class="col-md-4 m-t-10">
                    <form class="navbar-form navbar-left" method="get" action="<?php echo base_url('search'); ?>">
                        <div class="input-group">
                            <input type="text" name="q" value="<?php if (isset($search_keyword)) {
                                                                    echo $search_keyword;
                                                                } ?>" autocomplete="off" id="search-input" class="form-control" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="social-icon">
                        <ul class="list-inline list-unstyled">
                            <?php
                            if ($facebook_url != '') :
                                echo '<li><a href="' . $facebook_url . '"><i class="fa fa-facebook"></i></a></li>';
                            endif;
                            if ($twitter_url != '') :
                                echo '<li><a href="' . $twitter_url . '"><i class="fa fa-twitter"></i></a></li>';
                            endif;
                            if ($vimeo_url != '') :
                                echo '<li><a href="' . $vimeo_url . '"><i class="fa fa-vimeo"></i></a></li>';
                            endif;
                            if ($linkedin_url != '') :
                                echo '<li><a href="' . $linkedin_url . '"><i class="fa fa-linkedin"></i></a></li>';
                            endif;
                            if ($youtube_url != '') :
                                echo '<li><a href="' . $youtube_url . '"><i class="fa fa-youtube"></i></a></li>';
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 border-left">
                    <?php $this->load->view($theme_dir . 'right_menu_item'); ?>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar1">
                <?php $this->load->view($theme_dir . 'left_menu_item'); ?>
            </div>
        </div>
    </nav>
<?php elseif ($header_templete == 'header3') : ?>
    <header class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="top-info-left">
                        <a href=""><i class="fa fa-envelope"></i> <?php echo $contact_email; ?></a>
                        <a href=""><i class="fa fa-phone"></i> <?php echo $business_phone; ?></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="social-icon pull-right">
                        <ul class="list-inline list-unstyled">
                            <?php
                            if ($facebook_url != '') :
                                echo '<li><a href="' . $facebook_url . '"><i class="fa fa-facebook"></i></a></li>';
                            endif;
                            if ($twitter_url != '') :
                                echo '<li><a href="' . $twitter_url . '"><i class="fa fa-twitter"></i></a></li>';
                            endif;
                            if ($vimeo_url != '') :
                                echo '<li><a href="' . $vimeo_url . '"><i class="fa fa-vimeo"></i></a></li>';
                            endif;
                            if ($linkedin_url != '') :
                                echo '<li><a href="' . $linkedin_url . '"><i class="fa fa-linkedin"></i></a></li>';
                            endif;
                            if ($youtube_url != '') :
                                echo '<li><a href="' . $youtube_url . '"><i class="fa fa-youtube"></i></a></li>';
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="header6">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>uploads/system_logo/<?php echo film_config('logo'); ?>" alt="logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar1">
                    <?php $this->load->view($theme_dir . 'left_menu_item'); ?>
                    <?php $this->load->view($theme_dir . 'right_menu_item'); ?>

                    <form class="navbar-form navbar-right" method="get" action="<?php echo base_url('search'); ?>">
                        <div class="input-group custom-search">
                            <input type="text" name="q" value="<?php if (isset($search_keyword)) {
                                                                    echo $search_keyword;
                                                                } ?>" autocomplete="off" id="search-input" class="form-control custom-search-input" placeholder="Search..">
                            <button class="custom-search-botton" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
<?php elseif ($header_templete == 'header4') : ?>
    <header class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="top-info-left">
                        <a href=""><i class="fa fa-envelope"></i> <?php echo $contact_email; ?></a>
                        <a href=""><i class="fa fa-phone"></i> <?php echo $business_phone; ?></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="top-info-right">
                        <div class="social-icon">
                            <ul class="list-inline list-unstyled">
                                <?php
                                if ($facebook_url != '') :
                                    echo '<li><a href="' . $facebook_url . '"><i class="fa fa-facebook"></i></a></li>';
                                endif;
                                if ($twitter_url != '') :
                                    echo '<li><a href="' . $twitter_url . '"><i class="fa fa-twitter"></i></a></li>';
                                endif;
                                if ($vimeo_url != '') :
                                    echo '<li><a href="' . $vimeo_url . '"><i class="fa fa-vimeo"></i></a></li>';
                                endif;
                                if ($linkedin_url != '') :
                                    echo '<li><a href="' . $linkedin_url . '"><i class="fa fa-linkedin"></i></a></li>';
                                endif;
                                if ($youtube_url != '') :
                                    echo '<li><a href="' . $youtube_url . '"><i class="fa fa-youtube"></i></a></li>';
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>uploads/system_logo/<?php echo film_config('logo'); ?>" alt="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar1">
                <?php $this->load->view($theme_dir . 'left_menu_item'); ?>

                <?php $this->load->view($theme_dir . 'right_menu_item'); ?>
                <form class="navbar-form navbar-left" method="get" action="<?php echo base_url('search'); ?>">
                    <div class="input-group">
                        <input type="text" name="q" value="<?php if (isset($search_keyword)) {
                                                                echo $search_keyword;
                                                            } ?>" autocomplete="off" id="search-input" class="form-control" placeholder="Search..">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                </form>
            </div>
        </div>
    </nav>
<?php elseif ($header_templete == 'header5') : ?>
    <header class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="top-info-left">
                        <a href=""><i class="fa fa-envelope"></i> <?php echo $contact_email; ?></a>
                        <a href=""><i class="fa fa-phone"></i> <?php echo $business_phone; ?></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="top-info-right">
                        <div class="social-icon">
                            <ul class="list-inline list-unstyled">
                                <?php
                                if ($facebook_url != '') :
                                    echo '<li><a href="' . $facebook_url . '"><i class="fa fa-facebook"></i></a></li>';
                                endif;
                                if ($twitter_url != '') :
                                    echo '<li><a href="' . $twitter_url . '"><i class="fa fa-twitter"></i></a></li>';
                                endif;
                                if ($vimeo_url != '') :
                                    echo '<li><a href="' . $vimeo_url . '"><i class="fa fa-vimeo"></i></a></li>';
                                endif;
                                if ($linkedin_url != '') :
                                    echo '<li><a href="' . $linkedin_url . '"><i class="fa fa-linkedin"></i></a></li>';
                                endif;
                                if ($youtube_url != '') :
                                    echo '<li><a href="' . $youtube_url . '"><i class="fa fa-youtube"></i></a></li>';
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="header3">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>uploads/system_logo/<?php echo film_config('logo'); ?>" alt="logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar1">
                    <?php $this->load->view($theme_dir . 'left_menu_item'); ?>

                    <?php $this->load->view($theme_dir . 'right_menu_item'); ?>
                    <form class="navbar-form navbar-left" method="get" action="<?php echo base_url('search'); ?>">
                        <div class="input-group">
                            <input type="text" name="q" value="<?php if (isset($search_keyword)) {
                                                                    echo $search_keyword;
                                                                } ?>" autocomplete="off" id="search-input" class="form-control" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                    </form>
                </div>
            </div>
        </nav>
    </div>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#search-input").autocomplete({
            source: "<?php echo base_url(); ?>/home/autocompleteajax",
            focus: function(event, ui) {
                return false;
            },
            select: function(event, ui) {
                window.location.href = ui.item.url;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="th-title"><b>' + item.title + '</b></div><br><div class="th-title">' + item.type + '</div></div></a>';
            return $("<li></li>").data("item.autocomplete", item).append(inner_html).appendTo(ul);
        };
    });
</script>
<script>
    $(".dropdown").hover(function() {
        $(this).addClass("open");
    }, function() {
        $(this).removeClass("open");
    });
    $('.search_tools').click(function() {
        $(".search").toggleClass('open');
        if ($(".search").hasClass("open")) {
            $(this).html('<a href="#"><span class="fa fa-close"></span></a>');
        } else {
            $(this).html('<a href="#"><span class="fa fa-search"></span></a>');
        }
    });
</script>