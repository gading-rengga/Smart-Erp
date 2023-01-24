<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_blueprint');
        $this->load->model('Blueprint');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('theme/metronic/login');
        } else {
            $this->auth();
        }
    }

    public function auth()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->Auth_blueprint->get_user($username, $password);

        if ($user[0] > 0) {

            // Get Data Kelurahan
            $get_kelurahan = array(
                'select'    => 'name',
                'where'     => 'id',
                'args'      => $user[0]['kelurahan'],
                'table'     => 'tbl_kelurahan'
            );
            $kelurahan = $this->Blueprint->get_where($get_kelurahan);
            $user[0]['kelurahan'] = $kelurahan[0]['name'];

            // Get Data kecamatan
            $get_kecamatan = array(
                'select'    => 'name',
                'where'     => 'id',
                'args'      => $user[0]['kecamatan'],
                'table'     => 'tbl_kecamatan'
            );
            $kecamatan = $this->Blueprint->get_where($get_kecamatan);
            $user[0]['kecamatan'] = $kecamatan[0]['name'];

            // Get Data kabupaten
            $get_kabupaten = array(
                'select'    => 'name',
                'where'     => 'id',
                'args'      => $user[0]['kabupaten'],
                'table'     => 'tbl_kabupaten'
            );
            $kabupaten = $this->Blueprint->get_where($get_kabupaten);
            $user[0]['kabupaten'] = $kabupaten[0]['name'];

            // Get Data provinsi
            $get_provinsi = array(
                'select'    => 'name',
                'where'     => 'id',
                'args'      => $user[0]['provinsi'],
                'table'     => 'tbl_provinsi'
            );
            $provinsi = $this->Blueprint->get_where($get_provinsi);
            $user[0]['provinsi'] = $provinsi[0]['name'];

            // Get Data dpartement
            $get_dpartement = array(
                'select'    => 'name',
                'where'     => array(
                    array(
                        'data' => 'ID',
                        'args'  => $user[0]['dpartement']
                    )
                ),
                'table'     => 'tbl_dpartement'
            );
            $dpartement = $this->Blueprint->get_multiwhere($get_dpartement);
            $user[0]['dpartement'] = $dpartement[0]['name'];

            // Get Data company
            $get_company = array(
                'select'    => 'name',
                'where'     => 'id',
                'args'      => $user[0]['company'],
                'table'     => 'tbl_company'
            );
            $company = $this->Blueprint->get_where($get_company);
            $user[0]['company'] = $company[0]['name'];

            // Get access_menu
            $get_accmenu = array(
                'select'    => 'menu',
                'where'     => 'user_id',
                'args'      => $user[0]['ID'],
                'table'     => 'tbl_acces_menu'
            );
            $accmenu = $this->Blueprint->get_where($get_accmenu);
            $user[0]['acces_menu'] = $accmenu;



            $data = array(
                'session' => $user[0]
            );
            $this->session->set_userdata($data);
            $config_alert_success = array(
                array(
                    'title'     => 'Anda Berhasil Login ',
                    'alert_type' => 'alert-success'
                ),
            );
            // $allert_success = allert($config_alert_success);
            // $this->session->set_flashdata('msg', $allert_success);

            $data_menu = data_menu();
            foreach ($data_menu as $key => $val) {
                $menu[$key] = $val;
            }
            redirect(base_url($menu[0][0]['url']));
        } else {
            redirect('Login/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('session');
        redirect('login');
    }
}
