<?php    
    $default_meta_description       =   film_config('meta_description');
    $default_focus_keyword          =   film_config('focus_keyword');
    $author                         =   film_config('author');
    $front_end_theme                =   film_config('front_end_theme');
    $theme_dir                      =   'theme/'.film_config('active_theme').'/';
    $assets_dir                     =   'assets/theme/'.film_config('active_theme').'/';
    $dark_theme                     =   film_config('dark_theme');
    $google_analytics_id            =   film_config('google_analytics_id');       
    $footer_templete                =   film_config('footer_templete');
    $share_this_enable              =   film_config('social_share_enable');    
    $push_notification_enable       =   film_config('push_notification_enable');
    $site_name                      =   film_config('site_name');
    $recaptcha_enable               =   film_config('recaptcha_enable');  
    $favicon                        =   film_config('favicon');
    $enable_ribbon                  =   film_config('enable_ribbon');
?>
<!DOCTYPE html>
<html lang="en">
<head data-cast-api-enabled="true">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php if (isset($meta_description)) { echo $meta_description;} else{ echo $default_meta_description;} ?>" />
    <meta name="keywords" content="<?php if (isset($focus_keyword)) { echo $focus_keyword;} else{ echo $default_focus_keyword ; } ?>" />
    <meta name="author" content="<?php echo $author; ?>" />
    <link rel="canonical" href="<?php if(isset($canonical) && !empty($canonical)): echo $canonical; else: echo base_url(); endif; ?>">
<?php if($page_name =='watch' || $page_name == 'watch_tv' || $page_name == 'blog_details'): ?>
    <meta property="og:locale" content="en_US" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="<?php echo $meta_description; ?>" />
    <meta name="twitter:title" content="<?php echo $og_title; ?>" />
    <meta property="og:title" content="<?php echo $og_title; ?>" />
    <meta property="og:url" content="<?php echo $og_url; ?>" />
    <meta property="og:type" content="movie" />
    <meta property="og:description" content="<?php echo $meta_description; ?>" />
    <meta property="og:image" content="<?php echo $og_image_url; ?>" />
<?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('uploads/system_logo/').$favicon; ?>">
    <title><?php if(isset($title) && !empty($title)): echo $title; else: echo $site_name; endif; ?> - <?php echo trans('site_title'); ?></title>
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/plugins/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/<?php echo $front_end_theme; ?>.css">
    <script type="text/javascript" src="<?php echo base_url($assets_dir); ?>js/jquery-2.2.4.min.js"></script>
<?php if($dark_theme=='1'): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/dark.css">
<?php endif; ?>
<?php if($this->language_model->get_rtl_status()): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/rtl.css">
<?php endif; ?>
    <!-- Slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>swiper/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>swiper/css/<?php echo (film_config('slider_type') == 'cubik') ? 'cubik':'custom'; ?>.css">
<?php if($page_name =='update_profile'): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/bootstrap-datepicker.min.css"></script>
<?php endif; ?>
<?php if($page_name=='watch' || $page_name=='watch_tv'): ?>
    <!-- VideoJS -->
    <link href="https://cdn.jsdelivr.net/npm/video.js@6.13.0/dist/video-js.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/player/watermark/videojs-logo.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/player/videojs-share/videojs-share.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/player/videojs-seek-buttons/videojs-seek-buttons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/player/videojs-mobile-ui/videojs-mobile-ui.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/@silvermine/videojs-chromecast@1.2.0/dist/silvermine-videojs-chromecast.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/video.js@6.13.0/dist/video.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/player/videojs-mobile-ui/videojs-mobile-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@silvermine/videojs-chromecast@1.2.0/dist/silvermine-videojs-chromecast.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js?loadCastFramework=1"></script>
<?php if($page_name=='watch'): ?>
    <!-- Magnific Popup -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/plugins/magnific-popup.css">
<?php endif; ?>
<?php endif; ?>
<?php if($page_name=='home' || $page_name=='live_tv' || $page_name=='watch_tv' || $page_name=='watch'): ?>
    <!-- Owlcarousel -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/owl-custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/owl.theme.default.min.css">
    <script type="text/javascript" src="<?php echo base_url($assets_dir); ?>js/owl.carousel.min.js"></script>
<?php endif ?>
<?php if($recaptcha_enable == '1'): ?>
    <!-- reCAPTCHA JavaScript API -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php endif; ?>
    <!-- Typehead Search  -->
    <style type="text/css">
    <?php if($front_end_theme =='blue'): ?>    
    :root{--swiper-theme-color:#08c;--primary-color:#08c;--secenday-color:#0088c0}
    <?php elseif($front_end_theme =='orange'): ?>
    :root{--swiper-theme-color:#ff8a00;--primary-color:#ff8a00;--secenday-color:#ffa73f}
    <?php elseif($front_end_theme =='red'): ?>
    :root{--swiper-theme-color:#d50055;--primary-color:#d50055;--secenday-color:#ff0009}
    <?php else: ?>
    :root{--swiper-theme-color:#FDD922;--primary-color:#FDD922;--secenday-color:#0088c0}
    <?php endif; ?>
    .owl-carousel .owl-next,.owl-carousel .owl-prev{background-color:var(--primary-color)}a{color:var(--primary-color)}a:hover{color:var(--secenday-color)}.vjs-chromecast-button .vjs-icon-placeholder{width:18px;height:18px}
    </style>
    <style type="text/css">.ribbon {<?php if($enable_ribbon == '0'): ?>display:none;<?php endif; ?>width:110px;height:80px;overflow:hidden;position:absolute;background:url(<?php echo base_url($assets_dir); ?>images/lock.png);background-repeat:no-repeat;overflow:hidden}.ribbon-top-right{bottom:0;left:0}.tv-ribbon{<?php if($enable_ribbon == '0'): ?>display:none;<?php endif; ?>top:10px;left:5px;position:absolute;z-index:6;padding:2px 11px;background-color:#ffe22e;color:#383737;border-top-right-radius:5px;border-bottom-right-radius:5px;font-size:14px;font-weight:700}.modal-header{background:var(--primary-color);border-bottom:transparent;color:#fff}</style>
<?php if($page_name=='movies' || $page_name=='tv_series'): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url($assets_dir); ?>css/filter.css">
<?php endif; ?>
    <style>.bg_img {background-image: url(<?php echo (film_config("bg_image") != '' && file_exists('uploads/bg/'.film_config("bg_image"))) ? base_url('uploads/bg/').film_config("bg_image") : base_url('uploads/bg/bg.jpg'); ?>);}#myFooter{background-color:#232323}#myFooter .footer-copyright{background-color:#151414}</style>
</head>
<body class="<?php if(film_config('preloader_disable') != '1'): echo 'no-scroll-y'; endif;?>">
    <?php if(film_config('preloader_disable') != '1'): ?>
    <!-- Preloader -->
    <div id="preloader">
        <div id="film-preloader" class="film-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">L</span>                            
                    <span data-text-preloader="O" class="letters-loading">O</span>                            
                    <span data-text-preloader="A" class="letters-loading">A</span>                            
                    <span data-text-preloader="D" class="letters-loading">D</span>                            
                    <span data-text-preloader="I" class="letters-loading">I</span>                            
                    <span data-text-preloader="N" class="letters-loading">N</span>                            
                    <span data-text-preloader="G" class="letters-loading">G</span>
                </div>
            </div>  
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <!-- end preloader -->
    <?php endif; ?>
<div id="wrapper">
        <div id="main-content">            
        <?php
            $this->load->view($theme_dir .'header');            
            if ($page_name == 'home'):
                $this->load->view($theme_dir .'slider');
            endif; 
        ?> 
        <?php
            $this->load->view($theme_dir.$page_name);
            $this->load->view($theme_dir.'footer/'.$footer_templete);
            $this->load->view($theme_dir.'movie_request');             
        ?>
        </div>
    </div>
    <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
    <div class="navbar_wrapper">
      <nav class="footer_nav footer_nav--icons">
        <ul>
          <li>
            <a href="<?php echo base_url();?>">
              <svg class="icon icon-home" viewBox="0 0 24 24" width="24" height="24">
                <path fill="currentColor" d="M21.6 8.2l-9-7c-0.4-0.3-0.9-0.3-1.2 0l-9 7c-0.3 0.2-0.4 0.5-0.4 0.8v11c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3v-11c0-0.3-0.1-0.6-0.4-0.8zM14 21h-4v-8h4v8zM20 20c0 0.6-0.4 1-1 1h-3v-9c0-0.6-0.4-1-1-1h-6c-0.6 0-1 0.4-1 1v9h-3c-0.6 0-1-0.4-1-1v-10.5l8-6.2 8 6.2v10.5z"></path>
              </svg>
              <span>Home</span>
            </a>
          </li>
            <?php if($this->session->userdata('login_status') == 1):?>
              <li>
                <a href="<?php echo base_url('my-account/profile'); ?>">
                  <svg class="icon icon-login" viewBox="0 0 24 24" width="24" height="24">
                    <g fill="currentColor">
                      <path d="M16 14h-8c-2.8 0-5 2.2-5 5v2c0 0.6 0.4 1 1 1s1-0.4 1-1v-2c0-1.7 1.3-3 3-3h8c1.7 0 3 1.3 3 3v2c0 0.6 0.4 1 1 1s1-0.4 1-1v-2c0-2.8-2.2-5-5-5z"></path>
                      <path d="M12 12c2.8 0 5-2.2 5-5s-2.2-5-5-5-5 2.2-5 5 2.2 5 5 5zM12 4c1.7 0 3 1.3 3 3s-1.3 3-3 3-3-1.3-3-3 1.3-3 3-3z"></path>
                    </g>
                  </svg>
                  <span><?php echo trans('profile'); ?></span>
                </a>
            <?php else: ?>
                  <?php if(film_config('frontend_login_enable') =='1'): ?>
                      </li><li>
                        <a href="<?php echo base_url('user/login'); ?>">
                          <svg class="icon icon-login" viewBox="0 0 24 24" width="24" height="24">
                            <g fill="currentColor">
                              <path d="M16 14h-8c-2.8 0-5 2.2-5 5v2c0 0.6 0.4 1 1 1s1-0.4 1-1v-2c0-1.7 1.3-3 3-3h8c1.7 0 3 1.3 3 3v2c0 0.6 0.4 1 1 1s1-0.4 1-1v-2c0-2.8-2.2-5-5-5z"></path>
                              <path d="M12 12c2.8 0 5-2.2 5-5s-2.2-5-5-5-5 2.2-5 5 2.2 5 5 5zM12 4c1.7 0 3 1.3 3 3s-1.3 3-3 3-3-1.3-3-3 1.3-3 3-3z"></path>
                            </g>
                          </svg>
                          <span><?php echo trans('login'); ?></span>
                        </a>
                      </li>
                  <?php endif; ?>
            <?php endif; ?>
          <li>
            <a href="<?php echo base_url('list/phim-le')?>">
              <svg class="icon icon-movies" width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                <line x1="7" y1="2" x2="7" y2="22"></line>
                <line x1="17" y1="2" x2="17" y2="22"></line>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <line x1="2" y1="7" x2="7" y2="7"></line>
                <line x1="2" y1="17" x2="7" y2="17"></line>
                <line x1="17" y1="17" x2="22" y2="17"></line>
                <line x1="17" y1="7" x2="22" y2="7"></line>
              </svg>
              <span><?php echo trans('movies'); ?></span>
            </a>
          </li>
            <?php if(film_config('tv_series_publish') == '1'): ?>
              <li>
                <a href="<?php echo base_url('list/phim-bo')?>">
                  <svg class="icon icon-series" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                    <polyline points="17 2 12 7 7 2"></polyline>
                  </svg>
                  <span><?php echo trans('tv_series'); ?></span>
                </a>
              </li>
            <?php endif; ?>
          <li>
            <a href="#search">
              <svg class="icon icon-search" viewBox="0 0 24 24" width="24" height="24">
                <path fill="currentColor" d="M21.7 20.3l-3.7-3.7c1.2-1.5 2-3.5 2-5.6 0-5-4-9-9-9s-9 4-9 9c0 5 4 9 9 9 2.1 0 4.1-0.7 5.6-2l3.7 3.7c0.2 0.2 0.5 0.3 0.7 0.3s0.5-0.1 0.7-0.3c0.4-0.4 0.4-1 0-1.4zM4 11c0-3.9 3.1-7 7-7s7 3.1 7 7c0 1.9-0.8 3.7-2 4.9 0 0 0 0 0 0s0 0 0 0c-1.3 1.3-3 2-4.9 2-4 0.1-7.1-3-7.1-6.9z"></path>
              </svg>
              <span><?php echo trans('search'); ?></span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div id="search" class="">
        <button type="button" class="close">×</button>
        <form method="get" action="<?php echo base_url('search');?>" novalidate="">
            <input type="search" name="q" value="" autocomplete="off" id="search-input2" placeholder="Search.." class="ui-autocomplete-input">
            <button type="submit" class="btn btn-primary"><?php echo trans('search'); ?></button>
        </form>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url($assets_dir); ?>js/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url($assets_dir); ?>js/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url($assets_dir); ?>js/jquery.lazy.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url($assets_dir); ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url($assets_dir); ?>js/main.js"></script>
<?php if($page_name=='home'): ?>
    <script type="text/javascript" src="<?php echo base_url($assets_dir); ?>js/swiper.js"></script> 
<?php endif; ?>
<?php if($page_name=='watch'): ?>
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.popup-youtube').magnificPopup({
            type: 'iframe'
          });
        });
    </script>
<?php endif; ?>
<?php if($google_analytics_id !='' && $google_analytics_id !=NULL && !empty($google_analytics_id)): ?>
    <!-- Google analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', '<?php echo $google_analytics_id; ?>', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- END Google analytics -->
<?php endif; ?>
<?php  if($share_this_enable =='1'):?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58d74b9dcfd76af7"></script>
<?php endif; ?>
    <script>
        $(document).ready(function() {
            var success_message = '<?php echo $this->session->flashdata('success'); ?>';
            var error_message = '<?php echo $this->session->flashdata('error'); ?>';
            if (success_message != '') {
                swal('Success!',success_message,'success');
            }
            if (error_message != '') {
                swal('Error!',error_message,'error');
            }
        });
    </script>
    <?php
        if($push_notification_enable == '1'):
        $onesignal_appid                    =   film_config('onesignal_appid');    
        $onesignal_actionmessage            =   film_config('onesignal_actionmessage');    
        $onesignal_acceptbuttontext         =   film_config('onesignal_acceptbuttontext');    
        $onesignal_cancelbuttontext         =   film_config('onesignal_cancelbuttontext');    
     ?>
    <!-- oneSignal -->
    <script type="text/javascript" src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(["init", {
            appId: "<?php echo $onesignal_appid; ?>",
            subdomainName: 'push',
            autoRegister: false,
            promptOptions: {
                actionMessage: "<?php echo $onesignal_actionmessage;?>",
                acceptButtonText: "<?php echo $onesignal_acceptbuttontext;?>",
                cancelButtonText: "<?php echo $onesignal_cancelbuttontext;?>"
            }
        }]);
    </script>
    <script>
        function subscribe() {
            OneSignal.push(["registerForPushNotifications"]);
            event.preventDefault();
        }
        function unsubscribe(){
            OneSignal.setSubscription(true);
        }
        var OneSignal = OneSignal || [];
        OneSignal.push(function() {
            OneSignal.on('subscriptionChange', function (isSubscribed) {
                console.log("The user's subscription state is now:", isSubscribed);
                OneSignal.sendTag("user_id","4444", function(tagsSent) {
                    console.log("Tags have finished sending!");
                });
            });
            var isPushSupported = OneSignal.isPushNotificationsSupported();
            if (isPushSupported) {
                OneSignal.isPushNotificationsEnabled().then(function(isEnabled) {
                    if (isEnabled) {
                        console.log("Push notifications are enabled!");
                    } else {
                        OneSignal.showHttpPrompt();
                        console.log("Push notifications are not enabled yet.");
                    }
                });
            } else {
                console.log("Push notifications are not supported.");
            }
        });
    </script>
<?php endif; ?>
</body>
</html>