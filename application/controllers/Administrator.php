<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        $data = $this->tab_card();

        $config = array(
            'title' => 'Superuser',
            'content' => $data,
        );
        return primary_page($config);
    }

    public function card()
    {
        $config = array(
            'title'          => 'Data Table',
            'icon'          => 'flaticon-users-1',
            'action'    => '',
            'content'     => '',
        );
        return card($config);
    }

    public function tab_card()
    {

        $data = $this->table();
        $config = array(
            'title'    => 'Data Contact Perusahaan',
            'data'    => array(
                array(
                    'id'            => 'suplier',
                    'button_title'     => 'Supplier',
                    'icon'            => 'flaticon-users-1',
                    'content'        => $data,
                ),
                array(
                    'id'            => 'customer',
                    'button_title'     => 'Customer',
                    'icon'            => 'flaticon-users-1',
                    'content'        => '5'
                ),
            )
        );
        return tab_card($config);
    }

    function table()
    {
        $config['table'] = array(
            'table_type'   => 'table-hover table-bordered',
        );
        $config['t_head'] = array(
            array(
                'class'     => 'text-center w-25',
                'scope'     => '',
                'colspan'   => '',
                'rowspan'   => '',
                'data'      => 'No',
            ),
            array(
                'class' => 'text-center w-50',
                'scope' => '',
                'data'  => 'Nama',
            ),
        );

        $config['t_body']['1'] = array(
            array(
                'class' => 'text-center w-5',
                'scope'     => '',
                'colspan'   => '',
                'rowspan'   => '',
                'data'  =>  '1',
            ),
            array(
                'class' => 'text-center w-50',
                'scope' => '',
                'data'  => 'Joan',
            ),
        );

        return table($config);
    }
}
