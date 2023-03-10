<?php
$theme_dir          =   'theme/default/';
$site_name          =   $this->db->get_where('config', array('title' => 'site_name'))->row()->value;
?>
<div class="movie-payer p-t-15">
    <?php
    $player_color_skin          =   $this->db->get_where('config', array('title' => 'player_color_skin'))->row()->value;
    if (isset($_GET['key'])) :
        $query = $this->db->get_where('live_tv_url', array('stream_key' => $_GET['key']), 1);
        $num_rows = $query->num_rows();
        if ($num_rows > 0) :
            $video_file     = $query->row();
            $file_source    = $video_file->source;
            $file_url       = $video_file->url;
        else :
            $file_source    = $watch_tv->stream_from;
            $file_url       = $watch_tv->stream_url;
        endif;
    else :
        $file_source    = $watch_tv->stream_from;
        $file_url       = $watch_tv->stream_url;
    endif;
    if ($file_source == 'hls' || $file_source == 'rtmp' || $file_source == 'mpeg-dash') :
    ?>
        <?php if ($file_source == 'hls' || $file_source == 'rtmp') : ?>
            <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.min.js"></script>
        <?php endif; ?>
        <?php if ($file_source == 'mpeg-dash') : ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dashjs/2.6.7/dash.all.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-dash/2.9.1/videojs-dash.min.js"></script>
            <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
        <?php endif; ?>
        <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls preload="none" width="640" height="265" poster="<?php echo $this->live_tv_model->get_tv_poster($watch_tv->poster); ?>" data-setup="{}">
            <p class="vjs-no-js"><?php echo trans('to_view_this_video_please_enable_javascript,_and_consider_upgrading_to_a_web_browser_that'); ?> <a href="http://videojs.com/html5-video-support/" target="_blank"><?php echo trans('supports_html5_video'); ?></a></p>
        </video>
        <script>
            var options;
            options = {
                "controls": true,
                "autoplay": true,
                "preload": "auto",
                techOrder: ['chromecast', 'html5'],
                sources: [{
                    src: '<?php echo $file_url; ?>',
                    type: '<?php if ($file_source == 'mp4' || $file_source == 'gdrive' || $file_source == 'amazone') {
                                echo 'video/mp4';
                            } else if ($file_source == 'flv') {
                                echo 'video/x-flv';
                            } else if ($file_source == 'webm' || $file_source == 'mkv') {
                                echo 'video/webm';
                            } else if ($file_source == 'm3u8') {
                                echo 'application/x-mpegURL';
                            } ?>'
                }],
                chromecast: {
                    requestTitleFn: function(source) { // Not required
                        return '<?php echo str_replace('"', '', str_replace("'", "", $watch_tv->tv_name)); ?>';
                    },
                    requestSubtitleFn: function(source) { // Not required
                        return 'Watching Live TV';
                    },
                    requestCustomDataFn: function(source) { // Not required
                        return {
                            'live': false,
                        }
                    },
                    requestPosterFn: function() {
                        return [{
                            'url': '<?php echo $this->common_model->get_video_thumb_url($watch_tv->live_tv_id); ?>'
                        }];
                    }
                },
                plugins: {
                    chromecast: {
                        customData: {
                            live: false
                        }
                    },
                }
            };
            var film_player = videojs('play', options);
        </script>
        <?php $this->load->view($theme_dir . '/tv_player_plugin'); ?>
    <?php endif; ?>
    <?php if ($file_source == 'youtube') : ?>
        <video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" poster="<?php echo $this->live_tv_model->get_tv_poster($watch_tv->poster); ?>">

        </video>
        <script src="<?php echo base_url(); ?>assets/player/videojs-youtube/Youtube.min.js"></script>

        <script>
            videojs("play", {
                "controls": true,
                "autoplay": true,
                "preload": "auto",
                "width": 640,
                "height": 265,
                "techOrder": ["youtube"],
                "sources": [{
                    "type": "video/youtube",
                    "src": "<?php echo $file_url; ?>"
                }],
            });
        </script>
    <?php endif; ?>
    <?php if ($file_source == 'embed') : ?>
        <div class="video-embed-container">
            <iframe class="responsive-embed-item" src="<?php echo $file_url; ?>" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
        </div>
    <?php endif; ?>
</div>

<div class="media row channel-title">
    <div class="media-left col-md-2 col-sm-12 col-xs-6">
        <img src="<?php echo $this->live_tv_model->get_tv_thumbnail($watch_tv->thumbnail); ?>" class="media-object">
    </div>
    <div class="col-md-6 col-sm-12 hidden-xs">
        <h5 class="media-heading"><?php echo $watch_tv->tv_name; ?></h5>
        <div class="media-content">
            <p class="live"><?php echo trans("watching_live_on") . ' ' . $site_name; ?></p>
        </div>
    </div>
    <div class="media-right col-md-4 col-sm-12 col-xs-6">
        <div class="btn-group" style="float: right;">
            <a href="<?php echo base_url('live-tv/') . $watch_tv->slug; ?>" class="btn btn-sm btn-default"><?php echo $watch_tv->stream_label; ?></a>
            <?php
            if ($this->live_tv_model->get_stream_url($watch_tv->live_tv_id, 'opt1') != '') :
            ?>
                <a href="<?php echo base_url('live-tv/') . $this->live_tv_model->get_slug_by_live_tv_id($watch_tv->live_tv_id) . '.html?key=' . $this->live_tv_model->get_stream_key($watch_tv->live_tv_id, 'opt1'); ?>" class="btn btn-sm btn-default"><?php echo $this->live_tv_model->get_stream_label($watch_tv->live_tv_id, 'opt1'); ?></a>
            <?php endif; ?>
            <?php
            if ($this->live_tv_model->get_stream_url($watch_tv->live_tv_id, 'opt2') != '') :
            ?>
                <a href="<?php echo base_url('live-tv/') . $this->live_tv_model->get_slug_by_live_tv_id($watch_tv->live_tv_id) . '.html?key=' . $this->live_tv_model->get_stream_key($watch_tv->live_tv_id, 'opt2'); ?>" class="btn btn-sm btn-default"><?php echo $this->live_tv_model->get_stream_label($watch_tv->live_tv_id, 'opt2'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>