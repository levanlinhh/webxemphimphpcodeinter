<?php
$player_watermark           =   $this->db->get_where('config', array('title' => 'player_watermark'))->row()->value;
$player_watermark_logo      =   $this->db->get_where('config', array('title' => 'player_watermark_logo'))->row()->value;
$player_watermark_url       =   $this->db->get_where('config', array('title' => 'player_watermark_url'))->row()->value;
$player_share               =   $this->db->get_where('config', array('title' => 'player_share'))->row()->value;
$player_share_fb_id         =   $this->db->get_where('config', array('title' => 'player_share_fb_id'))->row()->value;
$player_seek_button         =   $this->db->get_where('config', array('title' => 'player_seek_button'))->row()->value;
$player_seek_forward        =   $this->db->get_where('config', array('title' => 'player_seek_forward'))->row()->value;
$player_seek_back           =   $this->db->get_where('config', array('title' => 'player_seek_back'))->row()->value;
$player_volume_remember     =   $this->db->get_where('config', array('title' => 'player_volume_remember'))->row()->value;
?>

<?php if ($player_watermark == '1') : ?>
    <script src="<?php echo base_url(); ?>assets/player/watermark/videojs-logo.min.js"></script>
    <script>
        film_player.videoLogo({
            watermark: ' ',
            logo: '<?php echo base_url() . $player_watermark_logo; ?>', // default 'logo.png'
            homepage: '<?php echo $player_watermark_url; ?>',
        });
    </script>
<?php endif;
if ($player_share == '1') : ?>
    <script src="<?php echo base_url(); ?>assets/player/videojs-share/videojs-share.js"></script>
    <script>
        film_player.share({
            appId: 11231434324
        });
    </script>
<?php endif; ?>
<script src="<?php echo base_url(); ?>assets/player/hotkeys/videojs.hotkeys.min.js"></script>
<script>
    film_player.ready(function() {
        this.hotkeys({
            seekStep: 5
        });
    });
</script>
<?php if ($player_volume_remember == '1') : ?>
    <script src="<?php echo base_url(); ?>assets/player/videojs.persistvolume/videojs.persistvolume.js"></script>
    <script>
        film_player.ready(function() {
            this.persistvolume({
                namespace: "film_player-previus-volume"
            });
        });
    </script>
<?php endif; ?>