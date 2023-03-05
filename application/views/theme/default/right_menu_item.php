<?php
$registration_enable            =   film_config('registration_enable');
$frontend_login_enable          =   film_config('frontend_login_enable');
?>
<ul class="nav navbar-nav navbar-right" style="margin-right: -40px;">
    <?php if ($this->session->userdata('login_status') == 1) : ?>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img img-circle" src="<?php echo $this->common_model->get_img('user', $this->session->userdata('user_id')); ?>" height="20"> </a>
            <ul class="dropdown-menu" role="menu">
                <?php
                if ($this->session->userdata('admin_is_login') == 1) :
                    echo '<li><a href="' . base_url() . 'admin"><i class="fa fa-cogs m-r-10"></i>' . trans('control_panel') . '</a></li>';
                endif;
                ?>
                <li><a href="<?php echo base_url('my-account/profile'); ?>"><i class="fa fa-user-circle m-r-10"></i><?php echo trans('profile'); ?></a></li>
                <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out m-r-10"></i><?php echo trans('logout'); ?></a></li>
            </ul>
        </li>
    <?php else : ?>
        <?php if ($frontend_login_enable == '1') : ?>
            <li class="hidden-xs-down"><a href="<?php echo base_url('user/login'); ?>"><?php echo trans('account'); ?></a></li>
        <?php endif; ?>
    <?php endif; ?>
</ul>