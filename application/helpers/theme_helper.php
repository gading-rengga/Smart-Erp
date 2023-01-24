<?php
function theme($data)
{
    if (is_callable($data['theme'])) {
        $data['theme']($data);
    } else {
        echo "Tema Tidak Ada";
    }
}

function metronic($data)
{
    $ci = &get_instance();
    $data['menu'] = $data['menu'];


    $data['header'] = $ci->load->view('theme/metronic/header', $data['session'], TRUE);
    $data['header_mobile'] = $ci->load->view('theme/metronic/header-mobile', NULL, TRUE);
    $data['sidebar'] = $ci->load->view('theme/metronic/sidebar', $data, TRUE);
    $data['topbar'] = $ci->load->view('theme/metronic/topbar', NULL, TRUE);
    $data['sub_topbar'] = $ci->load->view('theme/metronic/sub_topbar', NULL, TRUE);
    $data['sub_footer'] = $ci->load->view('theme/metronic/sub_footer', NULL, TRUE);
    $data['right_panel'] = $ci->load->view('theme/metronic/right_panel', NULL, TRUE);
    $data['footer'] = $ci->load->view('theme/metronic/footer', NULL, TRUE);
    $data['content'] = $data['content']['content'];


    $ci->load->view('theme/metronic/master', $data);
}
