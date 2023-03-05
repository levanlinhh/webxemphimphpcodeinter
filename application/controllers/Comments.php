<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Comments extends Home_Core_Controller
{
    function __construct()
    {
        parent::__construct();
        /*cache controlling*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        ('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    /*default index function, redirects to login/dashboard */
    public function index()
    {
        if ($this->session->userdata('login_status') != 1)
            redirect(base_url(), 'refresh');
    }
    function comment($param1 = '', $param2 = '')
    {
        $url = $this->input->post('url');
        if ($this->session->userdata('login_status') != 1) {
            $this->session->set_flashdata('error', 'Bạn phải đăng nhập để bình luận.');
            redirect($url, 'refresh');
        }
        $data['user_id'] = $this->session->userdata('user_id');
        $data['video_id'] = $this->input->post('video_id');
        $data['comment'] = $this->input->post('comment');
        $data['comment_at'] = date("Y-m-d H:i");

        $this->db->insert('comments', $data);
        $this->session->set_flashdata('success', 'Bình luận thành công');
        redirect($url, 'refresh');
    }
    function replay($param1 = '', $param2 = '')
    {
        $url = $this->input->post('url');
        if ($this->session->userdata('login_status') != 1) {
            $this->session->set_flashdata('error', 'Bạn phải đăng nhập để phản hồi.');
            redirect($url, 'refresh');
        }


        $data['user_id'] = $this->session->userdata('user_id');
        $data['video_id'] = $this->input->post('video_id');
        $data['comment'] = $this->input->post('comment');
        $data['replay_for'] = $this->input->post('replay_for');
        $data['comment_at'] = date("Y-m-d H:i");
        $data['comment_type'] = '2';

        $this->db->insert('comments', $data);
        $this->session->set_flashdata('success', 'Phản hồi thành công');
        redirect($url, 'refresh');
    }

    function post_replay($param1 = '', $param2 = '')
    {
        $url = $this->input->post('url');
        if ($this->session->userdata('login_status') != 1) {
            $this->session->set_flashdata('error', 'Bạn phải đăng nhập để phản hồi.');
            redirect($url, 'refresh');
        }
        $data['user_id'] = $this->session->userdata('user_id');
        $data['post_id'] = $this->input->post('post_id');
        $data['comment'] = $this->input->post('comment');
        $data['replay_for'] = $this->input->post('replay_for');
        $data['comment_at'] = date("Y-m-d H:i");
        $data['comment_type'] = '2';

        $this->db->insert('post_comments', $data);
        $this->session->set_flashdata('success', 'Phản hồi thành công');
        redirect($url, 'refresh');
    }

    function post_comment($param1 = '', $param2 = '')
    {
        $url = $this->input->post('url');
        if ($this->session->userdata('login_status') != 1) {
            $this->session->set_flashdata('error', 'Bạn phải đăng nhập để bình luận.');
            redirect($url, 'refresh');
        }

        $data['user_id'] = $this->session->userdata('user_id');
        $data['post_id'] = $this->input->post('post_id');
        $data['comment'] = $this->input->post('comment');
        $data['comment_at'] = date("Y-m-d H:i");

        $this->db->insert('post_comments', $data);
        $this->session->set_flashdata('success', 'Bình luận thành công');
        redirect($url, 'refresh');
    }
}
