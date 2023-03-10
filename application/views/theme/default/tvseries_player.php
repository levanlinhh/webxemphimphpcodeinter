<?php
$theme_dir      =   'theme/default/';
$assets_dir     =   'assets/theme/default/';
$first_ep_details = array();
?>
<div class="movie-payer p-t-15">
	<?php
	if (($total_episodes > 0)) :
		$player_color_skin          =   $this->db->get_where('config', array('title' => 'player_color_skin'))->row()->value;
		if (isset($_GET['key']) && $this->common_model->validate_stream_key($_GET['key'])) :
			$video_file 	= $this->common_model->get_single_episode_details_by_key($_GET['key']);
			$video_file_id  = $video_file->episodes_id;
			$source_type    = $video_file->source_type;
			$file_source    = $video_file->file_source;
			$file_url       = $video_file->file_url;
		else :
			$first_ep_details 	= $this->common_model->get_first_episode_details_videos_id($videos_id);
			$video_file 		= $first_ep_details;
			$video_file_id  	= $video_file->episodes_id;
			$source_type    	= $video_file->source_type;
			$file_source    	= $video_file->file_source;
			$file_url       	= $video_file->file_url;
		endif;
		$subtitles = $this->common_model->get_episode_subtitles_by_episode_id($video_file_id);
		if ($file_source == 'mp4' || $file_source == 'webm' || $file_source == 'mkv' || $file_source == 'flv' || $file_source == 'm3u8' || $file_source == 'gdrive' || $file_source == 'amazone') :
	?>
			<?php if ($file_source == 'm3u8' || $file_source == 'flv') : ?>
				<script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.min.js"></script>
			<?php endif; ?>
			<video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls preload="none" width="640" height="265" poster="<?php echo $this->common_model->get_video_poster_url($watch_videos->videos_id); ?>" data-setup="{}">
				<?php
				foreach ($subtitles as $subtitle) :
				?>
					<track kind="<?php echo $subtitle['kind']; ?>" src="<?php echo $subtitle['src']; ?>" srclang="<?php echo $subtitle['srclang']; ?>" label="<?php echo $subtitle['language']; ?>">
					</track>
				<?php endforeach; ?>
				<p class="vjs-no-js"><?php echo trans('to_view_this_video_please_enable_javascript,_and_consider_upgrading_to_a_web_browser_that'); ?> <a href="http://videojs.com/html5-video-support/" target="_blank"><?php echo trans('supports_html5_video'); ?></a></p>
			</video>
			<script>
				var options;
				options = {
					"controls": true,
					"autoplay": false,
					"preload": "auto",
					"playbackRates": [0.5, 1, 1.5, 2, 3, 4],
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
							return '<?php echo str_replace('"', '', str_replace("'", "", $watch_videos->title)); ?>';
						},
						requestSubtitleFn: function(source) { // Not required
							return 'Watching TVShows';
						},
						requestCustomDataFn: function(source) { // Not required
							return {
								'live': false,
							}
						},
						requestPosterFn: function() {
							return [{
								'url': '<?php echo $this->common_model->get_video_thumb_url($watch_videos->videos_id); ?>'
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
			<?php $this->load->view($theme_dir . 'player_plugin') ?>
		<?php endif; ?>
		<?php if ($file_source == 'youtube') : ?>
			<video id="play" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" poster="<?php echo $this->common_model->get_video_poster_url($watch_videos->videos_id); ?>">
				<?php
				foreach ($subtitles as $subtitle) :
				?>
					<track kind="<?php echo $subtitle['kind']; ?>" src="<?php echo $subtitle['src']; ?>" srclang="<?php echo $subtitle['srclang']; ?>" label="<?php echo $subtitle['language']; ?>">
					</track>
				<?php endforeach; ?>
			</video>
			<script src="<?php echo base_url(); ?>assets/player/videojs-youtube/Youtube.min.js"></script>
			<script>
				videojs("play", {
					"controls": true,
					"autoplay": false,
					"preload": "auto",
					"playbackRates": [0.5, 1, 1.5, 2],
					"width": 640,
					"height": 265,
					techOrder: ["youtube"],
					sources: [{
						"type": "video/youtube",
						"src": "<?php echo $file_url; ?>"
					}],
				});
			</script>
		<?php endif; ?>
		<?php if ($file_source == 'vimeo') : ?>
			<script src="https://cdn.jsdelivr.net/npm/video.js@5.20.1/dist/video.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/player/videojs-vimeo/vimeo.js"></script>
			<video id="playerjs" class="video-js vjs-big-play-centered skin-<?php echo $player_color_skin; ?> vjs-16-9" controls autoplay width="960" height="400" data-setup='{}'>
			</video>
			<script>
				videojs("playerjs", {
					"controls": true,
					"autoplay": false,
					"preload": "auto",
					"playbackRates": [0.5, 1, 1.5, 2],
					"width": 640,
					"height": 265,
					techOrder: ["vimeo"],
					sources: [{
						"type": "video/vimeo",
						"src": "https://vimeo.com/257776764"
					}],
				});
			</script>
		<?php endif; ?>
		<?php if ($file_source == 'embed') : ?>
			<div class="video-embed-container"><iframe class="responsive-embed-item" src="<?php echo $file_url; ?>" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
		<?php endif; ?>
	<?php else : ?>
		<div class="video-embed-container"><iframe width="853" height="480" src="https://www.youtube.com/embed?listType=search&list=<?php echo $watch_videos->title; ?>" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
	<?php endif; ?>
	<?php $this->load->view($theme_dir . 'disclaimer'); ?>
	<div class="row">
		<div class="col-md-12 m-b-10">
			<?php $movie_report_enable =   $this->db->get_where('config', array('title' => 'movie_report_enable'))->row()->value; ?>
			<?php if ($movie_report_enable == '1') : ?>
				<div class="pull-right" style="background-color:unset;padding:0;">
					<a data-toggle="modal" id="menu" class="btn btn-server" style="padding: 5px;" data-target="#report-modal" data-id="<?php echo base_url('home/view_modal/report/' . $watch_videos->videos_id) ?>"><i class="fa fa-warning"></i>&nbsp;report</a>
				</div>
			<?php endif; ?>
			<?php if ($movie_report_enable == '1') : $this->load->view($theme_dir . 'report');
			endif; ?>
		</div>
	</div>
</div>

<?php $this->load->view($theme_dir . 'seasion_episode', array('videos_id' => $watch_videos->videos_id, 'first_ep_details' => $first_ep_details)); ?>