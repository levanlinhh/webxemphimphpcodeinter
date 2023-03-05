<?php
$business_address   =   $this->db->get_where('config', array('title' => 'business_address'))->row()->value;
$business_phone     =   $this->db->get_where('config', array('title' => 'business_phone'))->row()->value;
$contact_email      =   $this->db->get_where('config', array('title' => 'contact_email'))->row()->value;
$business_phone     =   $this->db->get_where('config', array('title' => 'business_phone'))->row()->value;
$site_name          =   $this->db->get_where('config', array('title' => 'site_name'))->row()->value;
$site_url           =   $this->db->get_where('config', array('title' => 'site_url'))->row()->value;
?>
<div id="section-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h2 class="block-title text-center"><?php echo trans('send_a_request'); ?><br>
                    <small><?php echo trans('movie_not_avilable?_send_us_a_note_using_the_form_below.'); ?></small>
                </h2>

                <div class="sendus">
                    <div class="movie-heading m-b-20"> <span><?php echo trans('send_us_request'); ?></span>
                        <div class="disable-bottom-line"></div>
                    </div>
                    <div id="contact-form">
                        <div class="expMessage"></div>
                        <form class="custom-form" id="request-form" method="post" action="<?php echo base_url('send_movie_requiest'); ?>">
                            <input type="text" name="name" id="name" value="<?php if ($this->session->userdata('name')) {
                                                                                echo $this->session->userdata('name');
                                                                            } ?>" class="form-control half-wdth-field" placeholder="Your Name">
                            <div id="name_error"></div>
                            <input type="text" name="email" id="email" value="<?php if ($this->session->userdata('email')) {
                                                                                    echo $this->session->userdata('email');
                                                                                } ?>" class="form-control half-wdth-field pull-right" placeholder="Your Email">
                            <div id="email_error"></div>
                            <input type="text" name="movie_name" id="movie_name" class="form-control half-wdth-field pull-right" placeholder="Movie Name">
                            <div id="movie_name_error"></div>
                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message"></textarea>
                            <div id="message_error"></div>
                            <input type="hidden" name="action" value="submitform">
                            <div>
                                <button type="submit" value="submit" id="submit-btn" class="btn btn-success"> <span class="btn-label"><i class="fi ion-paper-airplane"></i></span><?php echo trans('send_message'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12">
                <address class="m-l-50">
                    <h2 class="block-title text-center"><?php echo trans('or_contact_us'); ?><br>
                        <small><?php echo trans('our_business_address_is_below.'); ?></small>
                    </h2>
                    <p><strong><?php echo trans('address'); ?>:&nbsp;</strong><?php echo $business_address; ?></p>
                    <p><strong><?php echo trans('email'); ?>:&nbsp;</strong><a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></p>
                    <p><strong><?php echo trans('phone'); ?>:&nbsp;</strong><?php echo $business_phone; ?></p>
                    <p><strong><?php echo trans('web'); ?>:&nbsp;</strong><a href="<?php echo $site_url; ?>"><?php echo $site_url; ?></a></p>
                </address>
            </div>
        </div>
    </div>
</div>