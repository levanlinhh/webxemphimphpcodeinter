<section class="inner-banner-section banner-section bg-overlay-black <?php echo (film_config('bg_img_disable') == '1') ? '' : 'bg_img'; ?>">
    <?php if ($this->common_model->get_ads_status('home_header') == '1') : ?>
        <!-- header ads -->
        <div id="ads" style="padding: 20px 0px;text-align: center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php echo $this->common_model->get_ads('home_header'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- header ads -->
    <?php endif; ?>
    <?php
    $live_tv_publish    =   $this->db->get_where('config', array('title' => 'live_tv_publish'))->row()->value;
    if ($this->live_tv_model->get_featured_tv_status() && $live_tv_publish == '1') :
    ?>
        <div id="section-opt">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="latest-movie movie-opt">
                            <div class="movie-heading overflow-hidden"> <span><?php echo trans('featured_tv_channels'); ?></span>
                                <div class="disable-bottom-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="owl-carousel live_tv_owl">
                            <?php
                            $featured_tvs = $this->live_tv_model->get_featured_live_tv();
                            foreach ($featured_tvs as $tv) :
                            ?>
                                <div class="item">
                                    <figure class="figure">
                                        <?php if ($tv['is_paid'] == '1') : ?>
                                            <span class="tv-ribbon">VIP</span>
                                        <?php endif; ?>
                                        <a href="<?php echo base_url('live-tv/') . $tv['slug']; ?>">
                                            <div>
                                                <img class="owl-lazy" src="<?php echo base_url('uploads/default_image/tv_poster.jpg'); ?>" data-src="<?php echo $this->live_tv_model->get_tv_poster($tv['poster']); ?>" alt="<?php echo $tv['tv_name']; ?>" />
                                            </div>
                                            <figcaption class="figure-caption "><?php echo $tv['tv_name']; ?></figcaption>
                                        </a>
                                    </figure>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <script type="text/javascript">
                            $('.live_tv_owl').owlCarousel({
                                stagePadding: 0,
                                loop: true,
                                rtl: false,
                                lazyLoad: true,
                                margin: 15,
                                center: true,
                                nav: true,
                                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                                dots: false,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    600: {
                                        items: 3
                                    },
                                    800: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 4
                                    },
                                    1200: {
                                        items: 5
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <div id="section-opt">
        <div class="container">
            <div class="movies-list-wrap mlw-latestmovie m-t-30">
                <div class="ml-title">
                    <span class="pull-left title"><?php echo trans('movie_suggestion'); ?></span>
                    <div class="clearfix"></div>
                </div>
                <div class="movies-list movies-list-full tab-pane fade active in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $hot_videos = $this->common_model->get_hot_videos(); ?>
                            <?php foreach ($hot_videos as $videos) : ?>
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <?php include('thumbnail.php'); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="section-opt">
        <div class="container">
            <div class="movies-list-wrap mlw-latestmovie">
                <div class="ml-title m-b-10">
                    <span class="pull-left title"><?php echo trans('latest_movies'); ?></span>
                    <a href="<?php echo base_url('list/phim-le') ?>" class="pull-right see-more"><?php echo trans('view_more'); ?> <i class="fa fa fa-caret-right"></i></a>
                    <ul role="tablist" class="nav nav-tabs">
                        <?php
                        $featured_genres = $this->common_model->get_features_genres(6);
                        foreach ($featured_genres as $genre) :
                        ?>
                            <li>
                                <a data-toggle="tab" role="tab" href="#<?php echo $genre['slug']; ?>" aria-expanded="false"><?php echo $genre['description'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-content">
                    <div id="latest-all" class="movies-list movies-list-full tab-pane fade active in">
                        <div class="row clean-preset">
                            <div class="movie-container">
                                <?php
                                $latest_published_videos = $this->common_model->latest_published_videos(12);
                                foreach ($latest_published_videos as $videos) :
                                ?>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <?php include('thumbnail.php'); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    $featured_genres = $this->common_model->get_features_genres(6);
                    foreach ($featured_genres as $genre) :
                    ?>
                        <div id="<?php echo $genre['slug']; ?>" class="movies-list movies-list-full tab-pane fade">
                            <div class="row clean-preset">
                                <div class="movie-container">
                                    <?php
                                    $genre_videos = $this->genre_model->get_video_by_genre_id($genre['genre_id']);
                                    foreach ($genre_videos as $videos) :
                                    ?>
                                        <div class="col-md-2 col-sm-3 col-xs-6">
                                            <?php include('thumbnail.php'); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="section-opt">
        <div class="container">
            <div class="movies-list-wrap mlw-latestmovie">
                <div class="ml-title">
                    <span class="pull-left title">Phim chiếu rạp</span>
                    <a href="<?php echo base_url('genre/phim-chieu-rap') ?>" class="pull-right see-more"><?php echo trans('view_more'); ?> <i class="fa fa fa-caret-right"></i></a>
                    <div class="clearfix"></div>
                </div>
                <div class="movies-list movies-list-full tab-pane fade active in">
                    <div class="row clean-preset">
                        <div class="movie-container">
                            <?php $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                            $genre_videos = $this->genre_model->fetch_genre_video_by_slug(12, $page, 'phim-chieu-rap');
                            foreach ($genre_videos as $videos) : ?>
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <?php include('thumbnail.php'); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $tv_series_publish = $this->db->get_where('config', array('title' => 'tv_series_publish'))->row()->value;
    if ($tv_series_publish == '1') :
    ?>
        <div id="section-opt">
            <div class="container">
                <div class="movies-list-wrap mlw-latestmovie">
                    <div class="ml-title m-b-10">
                        <span class="pull-left title"><?php echo trans('latest_tv_series'); ?></span>
                        <a href="<?php echo base_url('list/phim-bo') ?>" class="pull-right see-more"><?php echo trans('view_more'); ?> <i class="fa fa fa-caret-right"></i></a>
                        <ul role="tablist" class="nav nav-tabs">
                            <?php
                            $featured_genres = $this->common_model->get_features_genres(6);
                            foreach ($featured_genres as $genre) :
                            ?>
                                <li class="">
                                    <a data-toggle="tab" role="tab" href="#<?php echo $genre['slug']; ?>-tvseries" aria-expanded="false"><?php echo $genre['description'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-content">
                        <div id="latest-all-tvseries" class="movies-list movies-list-full tab-pane fade active in">
                            <div class="row clean-preset">
                                <div class="movie-container">
                                    <?php
                                    $latest_published_videos = $this->common_model->latest_published_tv_series(12);
                                    foreach ($latest_published_videos as $videos) :
                                    ?>
                                        <div class="col-md-2 col-sm-3 col-xs-6">
                                            <?php include('thumbnail.php'); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        $featured_genres = $this->common_model->get_features_genres(6);
                        foreach ($featured_genres as $genre) :
                        ?>
                            <div id="<?php echo $genre['slug']; ?>-tvseries" class="movies-list movies-list-full tab-pane fade">
                                <div class="row clean-preset">
                                    <div class="movie-container">
                                        <?php
                                        $genre_videos = $this->genre_model->get_tvseries_by_genre_id($genre['genre_id']);
                                        foreach ($genre_videos as $videos) :
                                        ?>
                                            <div class="col-md-2 col-sm-3 col-xs-6">
                                                <?php include('thumbnail.php'); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<script src="<?php echo base_url('assets/theme/default/'); ?>swiper/js/swiper.min.js"></script>