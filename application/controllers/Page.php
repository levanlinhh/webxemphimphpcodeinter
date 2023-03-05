<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Page extends Home_Core_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($slug = '')
    {
        $page = $this->common_model->page_is_exist($slug);
        if ($slug != '' && $slug != NULL && $page) {
            $data['page_details'] = $this->common_model->get_page_details_by_slug($slug);
            $data['title'] = $data['page_details']->page_title;
            $data['focus_keyword'] = $data['page_details']->focus_keyword;
            $data['meta_description'] = $data['page_details']->meta_description;
            // seo
            $data['title']                  = !empty(trim($data['page_details']->seo_title)) ? $data['page_details']->seo_title : $data['page_details']->page_title;
            $data['meta_description']       = $data['page_details']->meta_description;
            $data['focus_keyword']          = $data['page_details']->focus_keyword;
            $data['canonical']              = base_url('page/' . $data['page_details']->slug);
            // end seo
            $data['page_name'] = 'page';
            $this->load->view('theme/' . $this->active_theme . '/index', $data);
        } else {
            redirect('error', 'refresh');
        }
    }

    public function about_us()
    {
        $data['title'] = 'Giới thiệu';
        $data['page_name'] = 'about';
        $this->load->view('theme/' . $this->active_theme . '/index', $data);
    }
}
