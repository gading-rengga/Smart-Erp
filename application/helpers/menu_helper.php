<?php

function data_menu()
{
    $ci = &get_instance();
    $ci->load->model('Blueprint');
    $data_menu = $ci->session->userdata('session')['acces_menu'];
    foreach ($data_menu as $value) {

        // Get access_menu
        $get_menu = array(
            'select'    => '*',
            'where'     => 'ID',
            'args'      => $value['menu'],
            'table'     => 'tbl_menu'
        );
        $menu[] = $ci->Blueprint->get_where($get_menu);
    }
    return $menu;
}

function data_submenu()
{
    $ci = &get_instance();
    $ci->load->model('Blueprint');
    $menu = data_menu();

    foreach ($menu as $value) {
        // Get access_menu
        $get_submenu = array(
            'select'    => '*',
            'where'     => 'reff',
            'args'      => $value[0]['ID'],
            'table'     => 'tbl_submenu'
        );
        $submenu[] = $ci->Blueprint->get_where($get_submenu);
    }

    return $submenu;
}

function menu()
{
    $ci = &get_instance();
    $uri = $ci->uri->segment(1);
    $ci->load->model('Blueprint');

    $menu = data_menu();

    foreach ($menu as $key => $value) {
        $value = $value[0];
        $data[$key] = array(
            'group_title'   => $value['group_title'],
            'title'         => $value['title'],
            'icon'          => 'fas fa-users-cog',
            'url'           => $value['url'],
        );

        $get_submenu = array(
            'select'    => '*',
            'where'     => 'reff',
            'args'      => $value['ID'],
            'table'     => 'tbl_submenu'
        );
        $submenu = $ci->Blueprint->get_where($get_submenu);
        $data[$key]['submenu'] = $submenu;
        $url = array();
        foreach ($submenu as $val) {
            $url[] = $val['url'];
        }

        $data[$key]['is_active'] =  $value['url'] == $uri ||  in_array($uri, $url)  ? 'true' : 'false';
    }
    return $data;
}
