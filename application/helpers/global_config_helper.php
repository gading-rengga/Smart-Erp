<?php

function global_configuration($args)
{
    $ci = &get_instance();
    $ci->load->model('Blueprint');
    $data_user = $ci->session->userdata('session');

    $data = array(
        'theme'         => 'metronic',
        'company_data'  => '',
        'session'       => $data_user,
        'content'       => $args,
        'menu'          => menu(),
    );

    return theme($data);
}


function primary_page($data)
{
    return global_configuration($data);
}
