<?php defined('BASEPATH') or exit('No direct script access allowed');

class Core_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // timezone
        date_default_timezone_set(film_config('timezone'));
    }
}

class Admin_Core_Model extends Core_Model
{
    public function __construct()
    {
        parent::__construct();
    }
}
