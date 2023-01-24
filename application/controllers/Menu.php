<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Blueprint');
    }

    public function index()
    {
        $content = $this->card();
        $config = array(
            'title' => 'Data Menu',
            'content' => $content,
        );
        return primary_page($config);
    }

    public function card()
    {
        $config = array(
            'title'     => 'Data Table',
            'icon'      => 'flaticon-users-1',
            'action'    => '',
            'content'   => $this->table(),
        );
        return card($config);
    }

    public function table()
    {
        $get_allmenu = array(
            'select'    => '*',
            'table'    => 'tbl_menu',
        );
        $data_menu = $this->Blueprint->get($get_allmenu);

        $config['table'] = array(
            'table_type'   => 'table-hover table-bordered',
        );
        $config['t_head'] = array(
            array(
                'class'     => 'text-center w-5',
                'data'      => 'No',
            ),
            array(
                'class' => 'text-center w-25',
                'data'  => 'Group Title',
            ),
            array(
                'class' => 'text-center w-25',
                'data'  => 'Title',
            ),
            array(
                'class' => 'text-center w-25',
                'data'  => 'Icon',
            ),
            array(
                'class' => 'text-center w-25',
                'data'  => 'Url',
            ),
            array(
                'class' => 'text-center w-auto',
                'data'  => 'Action',
            ),
        );

        $no = 0;
        foreach ($data_menu as $index => $value) {
            $config['t_body'][$index] = array(
                array(
                    'class' => 'text-center',
                    'data'  =>  ++$no,
                ),
                array(
                    'class' => 'text-center',
                    'data'  => $value['group_title'],
                ),
                array(
                    'class' => 'text-center',
                    'data'  => $value['title'],
                ),
                array(
                    'class' => 'text-center',
                    'data'  => $value['icon'],
                ),
                array(
                    'class' => 'text-center',
                    'data'  => $value['url'],
                ),
                array(
                    'class' => 'text-center',
                    'data'  => '',
                ),
            );
        }

        return table($config);
    }
}
