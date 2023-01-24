<?php
function upload_single_file($data)
{
    $ci = &get_instance();

    $config['upload_path'] = './' . $data['file_location'] . '';
    $config['allowed_types'] = $data['file_type'];
    $config['max_size'] = $data['max_size'];


    $ci->upload->initialize($config);

    if (!$ci->upload->do_upload($data['data'])) {
        $error = array('error' => $ci->upload->display_errors());
    } else {
        $data_file = array('data' => $ci->upload->data());
        return $data_file;
    }
}
