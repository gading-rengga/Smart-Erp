<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userdata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Blueprint');
    }

    public function index()
    {

        $config = array(
            'title' => 'Data User',
            'content' => '',
        );
        return primary_page($config);
    }
}
