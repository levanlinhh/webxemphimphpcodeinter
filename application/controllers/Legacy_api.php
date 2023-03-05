<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Legacy_api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('legacy_api_model');
        $this->load->database();

        /*cache controling*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        ('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    // index function
    public function index()
    {
        echo "This is API";
    }

    //test api function
    public function test()
    {
        $response                   =   array();
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response['status']     = 'success';
                $response['message']    = 'Khóa API đã được xác minh.';
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get slider function
    public function get_slider()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response['slider_type']        =   $this->db->get_where('config', array('title' => 'slider_type'))->row()->value;
                if ($response['slider_type'] == 'image') :
                    if ($this->db->get_where('slider', array('publication' => '1'))->num_rows() == 0)
                        $response['slider_type']        = "disable";
                    $response['data']           =   $this->common_model->all_published_slider();
                elseif ($response['slider_type'] == 'movie') :
                    $response['data']           =   $this->legacy_api_model->get_movies_for_slider();
                elseif ($response['slider_type'] == 'tv') :
                    $response['slider_type']    =   'image';
                    $this->db->where('publish', '1');
                    $num_rows = $this->db->get('live_tv')->num_rows();
                    if ($num_rows == 0)
                        $response['slider_type']        = "disable";
                    $response['data']           =   $this->legacy_api_model->get_tv_for_slider();
                endif;

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    public function get_home_content()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response               =   $this->legacy_api_model->get_home_content();
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    /***** 
    movie section strat here
     *****/

    // get latest movies function
    public function get_latest_movies()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $limit              =   $this->input->get('limit');
                $response           =   $this->legacy_api_model->get_latest_movies($limit);

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get movies function
    public function get_movies()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $page              =   $this->input->get('page');
                $response           =   $this->legacy_api_model->get_movies($page);

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get features genre  function
    public function get_features_genre_and_movie()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response               =   $this->legacy_api_model->get_features_genre_and_movie();
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get movies  by genre ID function
    public function get_movie_by_genre_id()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $id                 =   $this->input->get('id');
                if (!empty($id) && $id != '' && $id != NULL && is_numeric($id)) :
                    $validity           = $this->legacy_api_model->verify_genre_id($id);
                    if ($validity) :
                        $page                   =   $this->input->get('page');
                        $response               =   $this->legacy_api_model->get_movie_by_genre_id($id, $page);
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID thể loại.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID thể loại không được rỗng hoặc trống.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get movies  by country ID function
    public function get_movie_by_country_id()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $id                 =   $this->input->get('id');
                if (!empty($id) && $id != '' && $id != NULL && is_numeric($id)) :
                    $validity           = $this->legacy_api_model->verify_country_id($id);
                    if ($validity) :
                        $page                   =   $this->input->get('page');
                        $response               =   $this->legacy_api_model->get_movie_by_country_id($id, $page);
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID quốc gia.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID thể loại không được rỗng hoặc trống.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    /***** 
    movie section end here
     *****/


    /***** 
    tv-series section start here
     *****/


    // get latest movies function
    public function get_latest_tvseries()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $limit              =   $this->input->get('limit');
                $response           =   $this->legacy_api_model->get_latest_tvseries($limit);

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get movies function
    public function get_tvseries()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $page              =   $this->input->get('page');
                $response           =   $this->legacy_api_model->get_tvseries($page);

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get movies  by genre ID function
    public function get_tvseries_by_genre_id()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $id                 =   $this->input->get('id');
                if (!empty($id) && $id != '' && $id != NULL && is_numeric($id)) :
                    $validity           = $this->legacy_api_model->verify_genre_id($id);
                    if ($validity) :
                        $page                   =   $this->input->get('page');
                        $response               =   $this->legacy_api_model->get_tvseries_by_genre_id($id, $page);
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID thể loại.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID thể loại không được rỗng hoặc trống.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get movies  by country ID function
    public function get_tvseries_by_country_id()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $id                 =   $this->input->get('id');
                if (!empty($id) && $id != '' && $id != NULL && is_numeric($id)) :
                    $validity           = $this->legacy_api_model->verify_country_id($id);
                    if ($validity) :
                        $page                   =   $this->input->get('page');
                        $response               =   $this->legacy_api_model->get_tvseries_by_country_id($id, $page);
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID quốc gia.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID thể loại không được rỗng hoặc trống.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    /***** 
    tvseries section end here
     *****/


    // get all country function
    public function get_all_country()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response               =   $this->legacy_api_model->get_all_country();
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }


    // get all genre  function
    public function get_all_genre()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response               =   $this->legacy_api_model->get_all_genre();
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get featured tv channel function
    public function get_featured_tv_channel()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $page              =   $this->input->get('page');
                $response           =   $this->legacy_api_model->get_featured_tv_channel($page);

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get featured tv channel function
    public function get_all_tv_channel()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $page              =   $this->input->get('page');
                $response           =   $this->legacy_api_model->get_all_tv_channel($page);

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get featured tv channel function
    public function get_tv_channel()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $limit              =   $this->input->get('limit');
                $response           =   $this->legacy_api_model->get_tv_channel($limit);

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get featured tv channel function
    public function get_all_tv_channel_by_category()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $limit              =   $this->input->get('limit');
                $response           =   $this->legacy_api_model->get_all_tv_channel_by_category($limit);

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get movies  by country ID function
    public function get_tv_channel_by_category_id()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $id                 =   $this->input->get('id');
                if (!empty($id) && $id != '' && $id != NULL && is_numeric($id)) :
                    $validity           = $this->legacy_api_model->verify_live_tv_category_id($id);
                    if ($validity) :
                        $page                   =   $this->input->get('page');
                        $response               =   $this->legacy_api_model->get_tv_channel_by_category_id($id, $page);
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID danh mục kênh TV.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'TV Channel category must not be null or empty.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }


    // get single movie,tvseries & live tv details
    public function get_single_details()
    {
        $response                   =   array();
        $api_secret_key             =   $this->input->get('api_secret_key');
        $type                       =   $this->input->get('type');
        $id                         =   $this->input->get('id');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                // verify type
                if ($type == 'movie' || $type == 'tvseries' || $type == 'tv') :
                    // verify id
                    if (!empty($id) && $id != '' && $id != NULL && is_numeric($id)) :
                        if ($type == 'movie') :
                            $verify           = $this->legacy_api_model->verify_movie_tvseries_id($id);
                            if ($verify) :
                                $this->common_model->watch_count_by_slug($id);
                                $response               =   $this->legacy_api_model->get_single_movie_details_by_id($id);
                            else :
                                $response['status']     = 'error';
                                $response['message']    = 'Không tìm thấy ID phim.';
                            endif;
                        elseif ($type == 'tvseries') :
                            $verify           = $this->legacy_api_model->verify_movie_tvseries_id($id);
                            if ($verify) :
                                $this->common_model->watch_count_by_slug($id);
                                $response               =   $this->legacy_api_model->get_single_tvseries_details_by_id($id);
                            else :
                                $response['status']     = 'error';
                                $response['message']    = 'Không tìm thấy ID phim.';
                            endif;
                        elseif ($type == 'tv') :
                            $verify           = $this->legacy_api_model->verify_tv_id($id);
                            if ($verify) :
                                $response               =   $this->legacy_api_model->get_single_tv_details_by_id($id);
                            else :
                                $response['status']     = 'error';
                                $response['message']    = 'Không tìm thấy ID TV.';
                            endif;
                        endif;
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'ID phải hợp lệ.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'Loại phải được thỏa mãn.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }




    // login function
    public function login()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $email                      =   trim($this->input->get('email'));
                $password                   =   md5(trim($this->input->get('password')));
                if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password != '' && $password != NULL) :
                    $login_status               = $this->legacy_api_model->validate_user($email, $password);
                    if ($login_status) :
                        $credential    =   array('email' => $email, 'password' => $password, 'status' => '1');
                        $this->db->where($credential);
                        $this->db->update('user', array('last_login' => date('Y-m-d H:i')));
                        $user_info              = $this->legacy_api_model->get_user_info($email, $password);
                        $response['status']     = 'success';
                        $response['user_id']    = $user_info->user_id;
                        $response['name']       = $user_info->name;
                        $response['email']      = $user_info->email;
                        $response['image_url']  = $this->common_model->get_image_url('user', $user_info->user_id);
                        $response['gender']     = "Không biết";
                        if ($user_info->gender == '1') :
                            $response['gender']      = "Nam";
                        elseif ($user_info->gender == '0') :
                            $response['gender']      = "Nữ";
                        endif;
                        $response['join_date']  = $user_info->join_date;
                        $response['last_login'] = $user_info->last_login;
                    else :
                        $response['status']     = 'error';
                        $response['data']       = 'Email và tên người dùng không khớp. Vui lòng thử lại.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['data']       = 'Vui lòng nhập email và mật khẩu hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }


    // signup function
    public function signup()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $name                       =   trim($this->input->get('name'));
                $email                      =   trim($this->input->get('email'));
                $password                   =   trim($this->input->get('password'));
                if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password != '' && $password != NULL && strlen($password) > 3) :
                    $md5_password               = md5($password);
                    $signup_ability             = $this->legacy_api_model->check_signup_ability_by_email($email);
                    if ($signup_ability) :
                        $this->legacy_api_model->create_user($name, $email, $md5_password);
                        $this->load->model('email_model');
                        $this->email_model->account_opening_email($email, $password);
                        $user_info              = $this->legacy_api_model->get_user_info($email, $md5_password);
                        $response['status']     = 'success';
                        $response['user_id']    = $user_info->user_id;
                        $response['name']       = $user_info->name;
                        $response['email']      = $user_info->email;
                        $response['gender']     = "Không biết";
                        if ($user_info->gender == '1') :
                            $response['gender']      = "Nam";
                        elseif ($user_info->gender == '0') :
                            $response['gender']      = "Nữ";
                        endif;
                        $response['join_date']  = $user_info->join_date;
                        $response['last_login'] = $user_info->last_login;
                    else :
                        $response['status']     = 'error';
                        $response['data']       = 'Email đã tồn tại.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['data']       = 'Vui lòng nhập email và mật khẩu hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get_user_details_by_user_id function
    public function get_user_details_by_user_id()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                      =   trim($this->input->get('id'));
                if (is_numeric($user_id) && $user_id != '' && $user_id != NULL) :
                    $is_valid_user_id               = $this->legacy_api_model->validate_user_by_id($user_id);
                    if ($is_valid_user_id) :
                        $user_info              = $this->legacy_api_model->get_user_info_by_user_id($user_id);
                        $response['status']     = 'success';
                        $response['user_id']    = $user_info->user_id;
                        $response['name']       = $user_info->name;
                        $response['email']      = $user_info->email;
                        $response['gender']     = "Không biết";
                        $response['is_authorized']     = "0";
                        if ($user_info->user_id == '1')
                            $response['is_authorized']     = "1";
                        if ($user_info->gender == '1') :
                            $response['gender']      = "Nam";
                        elseif ($user_info->gender == '0') :
                            $response['gender']      = "Nữ";
                        endif;
                        $response['join_date']  = $user_info->join_date;
                        $response['last_login'] = $user_info->last_login;
                    else :
                        $response['status']     = 'error';
                        $response['data']       = 'Không tìm thấy ID người dùng.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['data']       = 'Vui lòng nhập ID người dùng hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }


    // get_user_details_by_email function
    public function get_user_details_by_email()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $email                      =   trim($this->input->get('email'));
                if (filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '' && $email != NULL) :
                    $is_valid_email               = $this->legacy_api_model->validate_user_by_email($email);
                    if ($is_valid_email) :
                        $user_info              = $this->legacy_api_model->get_user_info_by_email($email);
                        $response['status']     = 'success';
                        $response['user_id']    = $user_info->user_id;
                        $response['name']       = $user_info->name;
                        $response['email']      = $user_info->email;
                        $response['image_url']  = $this->common_model->get_image_url('user', $user_info->user_id);
                        $response['gender']     = "Không biết";
                        if ($user_info->gender == '1') :
                            $response['gender']      = "Nam";
                        elseif ($user_info->gender == '0') :
                            $response['gender']      = "Nữ";
                        endif;
                        $response['join_date']  = $user_info->join_date;
                        $response['last_login'] = $user_info->last_login;
                    else :
                        $response['status']     = 'error';
                        $response['data']       = 'Không tìm thấy email.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['data']       = 'Vui lòng nhập email hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // update profile function
    public function update_profile()
    {
        $api_secret_key             =   $this->input->post('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                    =   trim($this->input->post('id'));
                if (is_numeric($user_id) && $user_id != '' && $user_id != NULL) :
                    $is_valid_user_id               = $this->legacy_api_model->validate_user_by_id($user_id);
                    if ($is_valid_user_id) :
                        $email                      =   trim($this->input->post('email'));
                        if (filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '' && $email != NULL) :
                            $name                       =   trim($this->input->post('name'));
                            $password                   =   trim($this->input->post('password'));
                            $gender                     =   trim($this->input->post('gender'));
                            $data['email']              =   $email;
                            if (!empty($name) && $name != '' && $name != NULL) :
                                $data['name']           =   $name;
                            endif;
                            if (!empty($password) && $password != '' && $password != NULL) :
                                $data['password']           =   md5($password);
                            endif;
                            if (!empty($gender) && $gender != '' && $gender != NULL) :
                                if ($gender == 'Male') :
                                    $data['gender']           =   '1';
                                elseif ($gender == 'Female') :
                                    $data['gender']           =   '0';
                                endif;
                            endif;
                            $this->legacy_api_model->update_profile($user_id, $data);
                            if (!empty($_FILES['photo']))
                                move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/user_image/' . $user_id . '.jpg');
                            $response['status']     = 'success';
                            $response['data']       = 'Hô sơ được cập nhật thành công.';
                        else :
                            $response['status']     = 'error';
                            $response['data']       = 'Vui lòng nhập email hợp lệ.';
                        endif;
                    else :
                        $response['status']     = 'error';
                        $response['data']       = 'Không tìm thấy ID người dùng.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['data']       = 'Vui lòng nhập ID người dùng hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // deactivate account function
    public function deactivate_account()
    {
        $api_secret_key             =   $this->input->post('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                    =   trim($this->input->post('id'));
                $password                   =   md5(trim($this->input->post('password')));
                $reason                     =   trim($this->input->post('reason'));
                if ($password != '' && $password != NULL && $reason != '' && $reason != NULL) :
                    $user_exist               = $this->legacy_api_model->validate_user_by_id_password($user_id, $password);
                    if ($user_exist) :
                        $credential    =   array('user_id' => $user_id, 'password' => $password);
                        $this->db->where($credential);
                        $this->db->update('user', array('status' => '0', 'deactivate_reason' => $reason));
                        $response['status']     = 'succes';
                        $response['data']       = 'Đã hủy kích hoạt tài khoản thành công.';
                    else :
                        $response['status']     = 'error';
                        $response['data']       = 'Vui lòng gửi ID người dùng và mật khẩu hợp lệ.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['data']       = 'Vui lòng nhập ID người dùng và mật khẩu.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }



    // get search function
    public function search()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $q                  =   $this->input->get('q');
                if (!empty($q) && $q != '' && $q != NULL) :
                    $page               =   $this->input->get('page');
                    $response['movie']              =   $this->legacy_api_model->get_movie_search_result($q, $page);
                    $response['tvseries']           =   $this->legacy_api_model->get_tvseries_search_result($q, $page);
                    $response['tv_channels']        =   $this->legacy_api_model->get_tv_channel_search_result($q, $page);
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'Chuỗi tìm kiếm trống.';
                endif;

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get app config function
    public function get_config()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $menu                   = $this->db->get_where('config', array('title' => 'app_menu'))->row()->value;
                $mandatory_login        = $this->db->get_where('config', array('title' => 'app_mandatory_login'))->row()->value;
                $genre_visible          = $this->db->get_where('config', array('title' => 'genre_visible'))->row()->value;
                $country_visible        = $this->db->get_where('config', array('title' => 'country_visible'))->row()->value;

                $response['menu']                   = 'grid';
                if ($menu == "vertical") :
                    $response['menu']               = 'vertical';
                endif;

                $response['program_guide_enable']   = false;

                $response['mandatory_login']        = false;
                if ($mandatory_login == "true") :
                    $response['mandatory_login']    = true;
                endif;

                $response['genre_visible']        = true;
                if ($genre_visible == "false") :
                    $response['genre_visible']    = false;
                endif;

                $response['country_visible']        = true;
                if ($country_visible == "false") :
                    $response['country_visible']    = false;
                endif;

                // mobile ads config
                $response['ads_enable']                         =   $this->db->get_where('config', array('title' => 'mobile_ads_enable'))->row()->value;
                $response['mobile_ads_network']                 =   $this->db->get_where('config', array('title' => 'mobile_ads_network'))->row()->value;
                $response['admob_app_id']                       =   $this->db->get_where('config', array('title' => 'admob_app_id'))->row()->value;
                $response['admob_banner_ads_id']                =   $this->db->get_where('config', array('title' => 'admob_banner_ads_id'))->row()->value;
                $response['admob_interstitial_ads_id']          =   $this->db->get_where('config', array('title' => 'admob_interstitial_ads_id'))->row()->value;
                $response['fan_native_ads_placement_id']        =   $this->db->get_where('config', array('title' => 'fan_native_ads_placement_id'))->row()->value;
                $response['fan_banner_ads_placement_id']        =   $this->db->get_where('config', array('title' => 'fan_banner_ads_placement_id'))->row()->value;
                $response['fan_interstitial_ads_placement_id']  =   $this->db->get_where('config', array('title' => 'fan_interstitial_ads_placement_id'))->row()->value;
                $response['startapp_app_id']                    =   $this->db->get_where('config', array('title' => 'startapp_app_id'))->row()->value;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }




    // get favorite function
    public function get_favorite()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                  =   $this->input->get('user_id');
                if (!empty($user_id) && $user_id != '' && $user_id != NULL && is_numeric($user_id)) :
                    $page               =   $this->input->get('page');
                    $response           =   $this->legacy_api_model->get_favorite($user_id, $page);
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID người dùng không hợp lệ.';
                endif;

            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get add_favorite function
    public function add_favorite()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                  =   $this->input->get('user_id');
                if (!empty($user_id) && $user_id != '' && $user_id != NULL && is_numeric($user_id)) :
                    $is_valid_user_id         = $this->legacy_api_model->validate_user_by_id($user_id);
                    if ($is_valid_user_id) :
                        $videos_id              =   $this->input->get('videos_id');
                        if (!empty($videos_id) && $videos_id != '' && $videos_id != NULL && is_numeric($videos_id)) :
                            $verify                 = $this->legacy_api_model->verify_movie_tvseries_id($videos_id);
                            if ($verify) :
                                $if_exist = $this->legacy_api_model->verify_favorite_list($user_id, $videos_id);
                                if (!$if_exist) :
                                    $this->legacy_api_model->add_favorite($user_id, $videos_id);
                                    $response['status']     = 'success';
                                    $response['message']    = 'Thêm thành công.';
                                else :
                                    $response['status']     = 'error';
                                    $response['message']    = 'Đã tồn tại trong yêu thích của bạn.';
                                endif;
                            else :
                                $response['status']     = 'error';
                                $response['message']    = 'Không tìm thấy ID phim.';
                            endif;
                        else :
                            $response['status']     = 'error';
                            $response['message']    = 'ID phim không hợp lệ.';
                        endif;
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID người dùng.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID người dùng không hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }


    // get add_favorite function
    public function verify_favorite_list()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                  =   $this->input->get('user_id');
                if (!empty($user_id) && $user_id != '' && $user_id != NULL && is_numeric($user_id)) :
                    $is_valid_user_id         = $this->legacy_api_model->validate_user_by_id($user_id);
                    if ($is_valid_user_id) :
                        $videos_id              =   $this->input->get('videos_id');
                        $if_exist = $this->legacy_api_model->verify_favorite_list($user_id, $videos_id);
                        if ($if_exist) :
                            $response['status']     = 'success';
                            $response['message']    = 'Tìm thấy trong mục yêu thích.';
                        else :
                            $response['status']     = 'error';
                            $response['message']    = 'Không tìm thấy trong mục yêu thích.';
                        endif;
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID người dùng.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID người dùng không hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get remove_favorite function
    public function remove_favorite()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                  =   $this->input->get('user_id');
                if (!empty($user_id) && $user_id != '' && $user_id != NULL && is_numeric($user_id)) :
                    $is_valid_user_id         = $this->legacy_api_model->validate_user_by_id($user_id);
                    if ($is_valid_user_id) :
                        $videos_id              =   $this->input->get('videos_id');
                        if (!empty($videos_id) && $videos_id != '' && $videos_id != NULL && is_numeric($videos_id)) :
                            $verify                 = $this->legacy_api_model->verify_favorite_list($user_id, $videos_id);
                            if ($verify) :
                                $this->legacy_api_model->remove_favorite($user_id, $videos_id);
                                $response['status']     = 'success';
                                $response['message']    = 'Đã xóa thành công.';
                            else :
                                $response['status']     = 'error';
                                $response['message']    = 'ID phim không được tìm thấy trong danh sách yêu thích của bạn.';
                            endif;
                        else :
                            $response['status']     = 'error';
                            $response['message']    = 'ID phim không hợp lệ.';
                        endif;
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID người dùng.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID người dùng không hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }


    // signup function
    public function password_reset()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $email                      =   trim($this->input->get('email'));
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) :
                    $user_exist             = $this->common_model->check_email($email);
                    if ($user_exist) :
                        $new_password           = $this->common_model->generate_random_string();
                        $this->legacy_api_model->reset_password($email, $new_password);
                        $this->load->model('email_model');
                        $this->email_model->android_password_reset_email($email, $new_password);
                        $response['status']     = 'success';
                        $response['message']    = 'Kiểm tra email của bạn. Chúng tôi đã gửi mật khẩu của bạn qua email.';
                    else :
                        $response['status']     = 'error';
                        $response['data']       = 'Email chưa được đăng ký.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'Vui lòng nhập email hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get single movie,tvseries & live tv details
    public function get_all_comments()
    {
        $response                   =   array();
        $api_secret_key             =   $this->input->get('api_secret_key');
        $type                       =   $this->input->get('type');
        $id                         =   $this->input->get('id');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                // verify id
                if (!empty($id) && $id != '' && $id != NULL && is_numeric($id)) :
                    $verify           = $this->legacy_api_model->verify_movie_tvseries_id($id);
                    if ($verify) :
                        $response               =   $this->legacy_api_model->get_all_comments($id);
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID phim.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID phải hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // add_comments function
    public function add_comments()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                  =   $this->input->get('user_id');
                if (!empty($user_id) && $user_id != '' && $user_id != NULL && is_numeric($user_id)) :
                    $is_valid_user_id         = $this->legacy_api_model->validate_user_by_id($user_id);
                    if ($is_valid_user_id) :
                        $videos_id              =   $this->input->get('videos_id');
                        if (!empty($videos_id) && $videos_id != '' && $videos_id != NULL && is_numeric($videos_id)) :
                            $verify                 = $this->legacy_api_model->verify_movie_tvseries_id($videos_id);
                            if ($verify) :
                                $comment              =   trim($this->input->get('comment'));
                                if (!empty($comment) && $comment != '' && $comment != NULL) :
                                    $comments_id                = $this->legacy_api_model->add_comments($user_id, $videos_id, $comment);
                                    $response['status']         = 'success';
                                    $response['message']        = 'Thêm bình luận thành công.';
                                    $response['comments_id']    = $comments_id;
                                else :
                                    $response['status']     = 'error';
                                    $response['message']    = 'Bình luận trống';
                                endif;
                            else :
                                $response['status']     = 'error';
                                $response['message']    = 'Không tìm thấy ID phim.';
                            endif;
                        else :
                            $response['status']     = 'error';
                            $response['message']    = 'ID phim không hợp lệ.';
                        endif;
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID người dùng.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID người dùng không hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // add_comments function
    public function add_replay()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                  =   $this->input->get('user_id');
                if (!empty($user_id) && $user_id != '' && $user_id != NULL && is_numeric($user_id)) :
                    $is_valid_user_id         = $this->legacy_api_model->validate_user_by_id($user_id);
                    if ($is_valid_user_id) :
                        $comments_id              =   $this->input->get('comments_id');
                        if (!empty($comments_id) && $comments_id != '' && $comments_id != NULL && is_numeric($comments_id)) :
                            $verify                 = $this->legacy_api_model->verify_comments_id($comments_id);
                            if ($verify) :
                                $comment              =   trim($this->input->get('comment'));
                                if (!empty($comment) && $comment != '' && $comment != NULL) :
                                    $replay_id                = $this->legacy_api_model->add_replay($user_id, $comments_id, $comment);
                                    $response['status']         = 'success';
                                    $response['message']        = 'Thêm phản hồi thành công.';
                                    $response['replay_id']      = $replay_id;
                                else :
                                    $response['status']     = 'error';
                                    $response['message']    = 'Bình luận trống.';
                                endif;
                            else :
                                $response['status']     = 'error';
                                $response['message']    = 'Không tìm thấy ID bình luận.';
                            endif;
                        else :
                            $response['status']     = 'error';
                            $response['message']    = 'ID phim không hợp lệ.';
                        endif;
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID người dùng.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID người dùng không hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get single all replay
    public function get_all_replay()
    {
        $response                   =   array();
        $api_secret_key             =   $this->input->get('api_secret_key');
        $id                         =   $this->input->get('id');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                // verify id
                if (!empty($id) && $id != '' && $id != NULL && is_numeric($id)) :
                    $verify           = $this->legacy_api_model->verify_comments_id($id);
                    if ($verify) :
                        $response               =   $this->legacy_api_model->get_replay_by_comments_id($id);
                    else :
                        $response['status']     = 'error';
                        $response['message']    = 'Không tìm thấy ID phim.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'ID phải hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get preroll ads function
    public function get_preroll_ads_details()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response['status']       =   $this->db->get_where('config', array('title' => 'preroll_ads_enable'))->row()->value;
                $response['video_url']    =   $this->db->get_where('config', array('title' => 'preroll_ads_video'))->row()->value;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }
    // get admob ads function
    public function get_admob_ads_details()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response['status']                     =   $this->db->get_where('config', array('title' => 'admob_ads_enable'))->row()->value;
                $response['admob_app_id']               =   $this->db->get_where('config', array('title' => 'admob_app_id'))->row()->value;
                $response['admob_banner_ads_id']        =   $this->db->get_where('config', array('title' => 'admob_banner_ads_id'))->row()->value;
                $response['admob_interstitial_ads_id']  =   $this->db->get_where('config', array('title' => 'admob_interstitial_ads_id'))->row()->value;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }


    // get admob ads function
    public function get_ads()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $response['ima_preroll'] =   $this->legacy_api_model->get_preroll_ads_details();
                $response['admob']      =   $this->legacy_api_model->get_admob_ads_details();
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get admob ads function
    public function get_user_info_by_code()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $code                    =   trim($this->input->get('code'));
                if (is_numeric($code) && $code != '' && $code != NULL) :
                    $is_valid_code               = $this->legacy_api_model->validate_tv_connection_code($code);
                    if ($is_valid_code) :
                        $user_id                    =   $this->legacy_api_model->get_user_id_by_tv_connection_code($code);
                        if (is_numeric($user_id) && $user_id != '' && $user_id != NULL) :
                            $is_valid_user_id               = $this->legacy_api_model->validate_user_by_id($user_id);
                            if ($is_valid_user_id) :
                                $response['status']     = 'success';
                                $response['user_info'] =   $this->legacy_api_model->get_user_info_by_user_id($user_id);
                            else :
                                $response['status']     = 'error';
                                $response['message']    = 'Đã xảy ra sự cố với người dùng. Vui lòng liên hệ với quản trị viên hệ thống.';
                            endif;
                        else :
                            $response['status']     = 'error';
                            $response['message']       = 'Vui lòng nhập ID người dùng hợp lệ.';
                        endif;
                    else :
                        $response['status']         = 'error';
                        $response['message']        = 'Mã không hợp lệ hoặc hết hạn. Vui lòng tạo lại mã từ điện thoại của bạn.';
                    endif;
                else :
                    $response['status']         = 'error';
                    $response['message']        = 'Vui lòng nhập Mã hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }

    // get admob ads function
    public function get_tv_connection_code()
    {
        $api_secret_key             =   $this->input->get('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $user_id                    =   trim($this->input->get('id'));
                if (is_numeric($user_id) && $user_id != '' && $user_id != NULL) :
                    $is_valid_user_id               = $this->legacy_api_model->validate_user_by_id($user_id);
                    if ($is_valid_user_id) :
                        $response['status']         = 'success';
                        $response['code']           =    $this->legacy_api_model->get_tv_connection_code($user_id);
                    else :
                        $response['status']     = 'error';
                        $response['message']       = 'Không tìm thấy ID người dùng.';
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']       = 'Vui lòng nhập ID người dùng hợp lệ.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }


    // login function
    public function firebase_auth()
    {
        $api_secret_key             =   $this->input->post('api_secret_key');
        // check api secret is sent
        if (!empty($api_secret_key) && $api_secret_key != '' && $api_secret_key != NULL) :
            // verify api secret key
            $verify_apps_api_secret_key =   $this->legacy_api_model->check_mobile_apps_api_secret_key($api_secret_key);
            if ($verify_apps_api_secret_key) :
                $uid                      =   trim($this->input->post('uid'));
                if ($uid != '' && $uid != NULL) :
                    $login_status               = $this->legacy_api_model->validate_user_by_uid($uid);
                    if ($login_status) :
                        $credential    =   array('firebase_auth_uid' => $uid, 'status' => '1');
                        $this->db->where($credential);
                        $this->db->update('user', array('last_login' => date('Y-m-d H:i')));
                        $user_info              = $this->legacy_api_model->get_user_info_by_uid($uid);
                        $response['status']     = 'success';
                        $response['user_id']    = $user_info->user_id;
                        $response['name']       = $user_info->name;
                        $response['email']      = $user_info->email;
                        $response['image_url']  = $this->common_model->get_image_url('user', $user_info->user_id);
                        $response['gender']     = "Không biết";
                        if ($user_info->gender == '1') :
                            $response['gender']      = "Nam";
                        elseif ($user_info->gender == '0') :
                            $response['gender']      = "Nữ";
                        endif;
                        $response['join_date']  = $user_info->join_date;
                        $response['last_login'] = $user_info->last_login;
                    else :
                        $name = $this->input->post('name');
                        if ($name == '' || $name == NULL) :
                            $name = 'No name set';
                        endif;

                        $email = $this->input->post('email');
                        if ($email == '' || $email == NULL) :
                            $email = $uid . '@youremail.com';
                        endif;

                        $phone = $this->input->post('phone');
                        if ($phone == '' || $phone == NULL) :
                            $phone = '00000000000';
                        endif;

                        $gender = strtolower($this->input->post('gender'));
                        if ($gender == '' || $gender == NULL) :
                            $gender = '1';
                        elseif ($gender == 'male') :
                            $gender = '1';
                        elseif ($gender == 'female') :
                            $gender = '0';
                        endif;

                        $firebase_data['name']               = $name;
                        $firebase_data['username']           = uniqid();
                        $firebase_data['email']              = $email;
                        $firebase_data['phone']              = $phone;
                        $firebase_data['gender']             = $gender;
                        $firebase_data['password']           = md5($uid);
                        $firebase_data['firebase_auth_uid']  = $uid;
                        $firebase_data['role']               = 'subscriber';
                        $firebase_data['join_date']          = date('Y-m-d H:i');
                        $firebase_data['last_login']         = date('Y-m-d H:i');
                        $this->legacy_api_model->create_user_by_firebase_auth_uid($firebase_data);
                        $user_info              = $this->legacy_api_model->get_user_info_by_uid($uid);
                        $image_source           =   $this->input->post('photo_url');
                        if ($image_source != '' && $image_source != NULL) :
                            $save_to                =   'uploads/user_image/' . $user_info->user_id . '.jpg';
                            $this->common_model->grab_image($image_source, $save_to);
                        endif;
                        $response['status']     = 'success';
                        $response['user_id']    = $user_info->user_id;
                        $response['name']       = $user_info->name;
                        $response['email']      = $user_info->email;
                        $response['image_url']  = $this->common_model->get_image_url('user', $user_info->user_id);
                        $response['gender']     = "Không biết";
                        if ($user_info->gender == '1') :
                            $response['gender']      = "Nam";
                        elseif ($user_info->gender == '0') :
                            $response['gender']      = "Nữ";
                        endif;
                        $response['join_date']  = $user_info->join_date;
                        $response['last_login'] = $user_info->last_login;
                    endif;
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'Điện thoại trống không.';
                endif;
            else :
                $response['status']     = 'error';
                $response['message']    = 'Khóa bí mật API không hợp lệ.';
            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Khóa bí mật API không được để trống hoặc rỗng.';
        endif;
        echo json_encode($response);
    }
}
