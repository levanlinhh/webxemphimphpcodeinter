<?php
$s = 0;
$seasons = $this->common_model->get_seasons_by_videos_id($watch_videos->videos_id);
foreach ($seasons as $season) :
    if ($this->common_model->get_num_episodes_by_seasons_id($season['seasons_id']) > 0) :
        $episodes = $this->common_model->get_episodes_by_videos_id_and_season_id($watch_videos->videos_id, $season['seasons_id']);
        $s++;
        $i = 0;
        $current_key = '000000';
        if (isset($_GET['key'])) :
            $current_key = $_GET['key'];
        else :
            $current_key = $first_ep_details->stream_key;
        endif; ?>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="latest-movie m-t-10 m-b-10">
                    <div class="movie-heading overflow-hidden"> <span><?php echo $season['seasons_name']; ?></span>
                        <div class="disable-bottom-line"></div>
                        <div class="pull-right" style="padding:0;margin-top:0;">
                            <?php if ($watch_videos->trailler_youtube_source != NULL && $watch_videos->trailler_youtube_source != '') : ?>
                                <a href="<?php echo $watch_videos->trailler_youtube_source; ?>" class="popup-youtube btn btn-server" style="padding: 7px;"><?php echo trans('trailler'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="list-server m-t-10 m-b-10">
                    <span><i class="fa fa-database"></i> Danh sách tập</span>
                    <ul class="episodes" id="list_episodes">
                        <?php foreach ($episodes as $episode) : $i++; ?>
                            <li class="item" style="padding: 0;">
                                <?php if ($current_key == $episode['stream_key']) : ?>
                                    <a class="active" href="<?php echo base_url() . 'watch/' . $watch_videos->slug . '.html?key=' . $episode['stream_key']; ?>">
                                        <?php echo $episode['episodes_name']; ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php echo base_url() . 'watch/' . $watch_videos->slug . '.html?key=' . $episode['stream_key']; ?>">
                                        <?php echo $episode['episodes_name']; ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>