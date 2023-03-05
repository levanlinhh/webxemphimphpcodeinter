<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cron extends Home_Core_Controller
{
    public function index($slug = '')
    {
        echo "This is cron.";
    }
    public function image($cron_key = '', $param2 = '')
    {
        // check cron key is sent
        if (!empty($cron_key) && $cron_key != '' && $cron_key != NULL) :
            // verify api secret key
            $verify_apps_cron_key =   $this->common_model->check_cron_key($cron_key);
            if ($verify_apps_cron_key) :
                $this->db->limit(100);
                $images = $this->db->get_where('cron', array('type' => 'image', 'action' => 'download'))->result_array();
                $i      = 0;
                foreach ($images as $image) :
                    $this->common_model->grab_image($image['image_url'], $image['save_to']);
                    $this->db->where('cron_id', $image['cron_id']);
                    $this->db->delete('cron');
                    $i++;
                endforeach;
                echo $i . ' Đã lưu hình ảnh vào máy chủ.';
            else :
                echo 'Khóa Cron không hợp lệ.';
            endif;
        else :
            echo 'Khoá Cron không được rỗng hoặc trống.';
        endif;
    }

    public function email($cron_key = '', $param2 = '')
    {
        // check cron key is sent
        if (!empty($cron_key) && $cron_key != '' && $cron_key != NULL) :
            // verify api secret key
            $verify_apps_cron_key =   $this->common_model->check_cron_key($cron_key);
            if ($verify_apps_cron_key) :
                $this->db->limit(100);
                $emails = $this->db->get_where('cron', array('type' => 'email', 'action' => 'send'))->result_array();
                $i      = 0;
                $this->load->model('email_model');
                foreach ($emails as $email) :
                    $this->email_model->send_email($email['message'], $email['email_sub'], $email['email_to'], $email['admin_email_from'], $email['admin_email']);
                    $this->db->where('cron_id', $email['cron_id']);
                    $this->db->delete('cron');
                    $i++;
                endforeach;
                echo $i . ' Đã gửi email đến người đăng ký.';
            else :
                echo 'Khóa Cron không hợp lệ.';
            endif;
        else :
            echo 'Khoá Cron không được rỗng hoặc trống.';
        endif;
    }

    public function daily($cron_key = '', $param2 = '')
    {
        // check cron key is sent
        if (!empty($cron_key) && $cron_key != '' && $cron_key != NULL) :
            // verify api secret key
            $verify_apps_cron_key =   $this->common_model->check_cron_key($cron_key);
            if ($verify_apps_cron_key) :
                $this->reset_daily_view();
                $exchange_rate_update_by_cron        =   $this->db->get_where('config', array('title' => 'exchange_rate_update_by_cron'))->row()->value;
                if ($exchange_rate_update_by_cron == '1') :
                    $this->common_model->exchange_rate_update();
                endif;
                $db_backup              =   $this->db->get_where('config', array('title' => 'db_backup'))->row()->value;
                $backup_schedule        =   $this->db->get_where('config', array('title' => 'backup_schedule'))->row()->value;
                if ($db_backup == '1' && $backup_schedule == '1') :
                    $this->common_model->create_backup();
                endif;
                echo 'Quá trình Cron đã hoàn thành';
            else :
                echo 'Khóa Cron không hợp lệ.';
            endif;
        else :
            echo 'Khoá Cron không được rỗng hoặc trống.';
        endif;
    }

    public function weekly($cron_key = '', $param2 = '')
    {
        // check cron key is sent
        if (!empty($cron_key) && $cron_key != '' && $cron_key != NULL) :
            // verify api secret key
            $verify_apps_cron_key =   $this->common_model->check_cron_key($cron_key);
            if ($verify_apps_cron_key) :
                $this->reset_weekly_view();
                $db_backup              =   $this->db->get_where('config', array('title' => 'db_backup'))->row()->value;
                $backup_schedule        =   $this->db->get_where('config', array('title' => 'backup_schedule'))->row()->value;
                if ($db_backup == '1' && $backup_schedule == '7') :
                    $this->common_model->create_backup();
                endif;
                echo 'Quá trình Cron đã hoàn thành';
            else :
                echo 'Khóa Cron không hợp lệ.';
            endif;
        else :
            echo 'Khoá Cron không được rỗng hoặc trống.';
        endif;
    }

    public function monthly($cron_key = '', $param2 = '')
    {
        // check cron key is sent
        if (!empty($cron_key) && $cron_key != '' && $cron_key != NULL) :
            // verify api secret key
            $verify_apps_cron_key =   $this->common_model->check_cron_key($cron_key);
            if ($verify_apps_cron_key) :
                $this->reset_monthly_view();
                $db_backup              =   $this->db->get_where('config', array('title' => 'db_backup'))->row()->value;
                $backup_schedule        =   $this->db->get_where('config', array('title' => 'backup_schedule'))->row()->value;
                if ($db_backup == '1' && $backup_schedule == '30') :
                    $this->common_model->create_backup();
                endif;
                echo 'Quá trình Cron đã hoàn thành';
            else :
                echo 'Khóa Cron không hợp lệ.';
            endif;
        else :
            echo 'Khoá Cron không được rỗng hoặc trống.';
        endif;
    }

    public function reset_daily_view()
    {
        $data['today_view'] = 0;
        $this->db->update('videos', $data);
        return TRUE;
    }

    public function reset_weekly_view()
    {
        $data['weekly_view'] = 0;
        $this->db->update('videos', $data);
        return TRUE;
    }

    public function reset_monthly_view()
    {
        $data['monthly_view'] = 0;
        $this->db->update('videos', $data);
        return TRUE;
    }
}
