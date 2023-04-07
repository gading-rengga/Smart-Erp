<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employe extends CI_Controller
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
            'title' => 'Data Karyawan',
            'content' => $content,
        );
        return primary_page($config);
    }

    public function card()
    {
        $modal = $this->modal();
        $config = array(
            'title'         => 'Data Karyawan',
            'icon'          => 'flaticon-users-1',
            'action'        => $modal,
            'content'       => $this->content(),
        );
        return card($config);
    }

    public function content()
    {
        $config = array(
            array(
                'col'       => 'md-6',
                'content'   => $this->table()
            ),
        );

        return grid($config);
    }

    public function table()
    {
        $config['table'] = array(
            'id'            => 'tbl-employe',
            'table_type'    => 'table-striped'
        );
        $config['t_head'] = array(
            array(
                'class'     => 'text-center w-5',
                'data'      => 'No',
            ),
            array(
                'class' => 'text-center w-auto',
                'data'  => 'Nama',
            ),
        );

        $get_employe = array(
            'select'    => '*',
            'where'     => 'company',
            'data'      => '1',
            'table'     => 'tbl_employe'
        );
        $data_employe = $this->Blueprint->get_where($get_employe);

        $no = 0;
        foreach ($data_employe as $index => $val) {
            $config['t_body'][$index] = array(
                array(
                    'class' => 'text-center light',
                    'data'      => ++$no,
                ),
                array(
                    'class' => 'text-center',
                    'scope' => '',
                    'data'  => $val['fullname'],
                ),
            );
        }


        return table($config);
    }

    public function modal()
    {
        $grid = $this->grid();

        $config = array(
            'title'     => 'Form Data Karyawan',
            'post_url'  => 'Employe/save',
            'size'      => '',
            'type'      => 'fade', //scrollable,fade,default
            'content'   => $grid,
        );
        return modal($config);
    }

    public function grid()
    {
        //Config Blueprint
        $get_district = array('select' => array('id', 'name'), 'table' => 'tbl_districts');
        $get_regency = array('select' => array('id', 'name'), 'table' => 'tbl_regency');
        $get_province = array('select' => array('id', 'name'), 'table' => 'tbl_province');

        $get_dpartement = array(
            'select'    => '*',
            'where'     => 'reff',
            'data'      => '1',
            'table'     => 'tbl_dpartement'
        );

        // Data Blueprint
        $data_district = $this->Blueprint->get_distinct($get_district);
        $data_regency = $this->Blueprint->get_distinct($get_regency);
        $data_province = $this->Blueprint->get_distinct($get_province);
        $data_dpartement = $this->Blueprint->get_where($get_dpartement);

        // Configuration Form 
        $fullname = array(
            'title' => 'Full Name',
            'name'  => 'fullname',
            'value' => '',
            'required' => '',
            'type' => 'text'
        );

        $nickname = array(
            'title' => 'Nick Name',
            'name'  => 'nickname',
            'value' => '',
            'required' => '',
            'type' => 'text'
        );

        $email = array(
            'title' => 'Email',
            'name'  => 'email',
            'value' => '',
            'required' => '',
            'type' => 'text'
        );

        $no_telp = array(
            'title' => 'No Telp',
            'name'  => 'no_telp',
            'value' => '',
            'required' => '',
            'type' => 'text'
        );

        $dpartement = array(
            'title'         => 'Dpartement',
            'name'          => 'dpartement',
            'value'         => '',
            'data'          => $data_dpartement,
            'data_id'       => 'ID',
            'data_value'    => 'name',
            'required'      => ''
        );

        $address = array(
            'title' => 'Address',
            'name'  => 'address',
            'value' => '',
            'required' => '',
            'type' => 'text'
        );

        $district = array(
            'title'         => 'District',
            'name'          => 'district',
            'value'         => '',
            'data'          => $data_district,
            'data_id'       => 'id',
            'data_value'    => 'name',
            'required'      => ''
        );

        $regency = array(
            'title'         => 'Regency',
            'name'          => 'regency',
            'value'         => '',
            'data'          => $data_regency,
            'data_id'       => 'id',
            'data_value'    => 'name',
            'required'      => ''
        );

        $province = array(
            'title'         => 'Province',
            'name'          => 'province',
            'value'         => '',
            'data'          => $data_province,
            'data_id'       => 'id',
            'data_value'    => 'name',
            'required'      => ''
        );

        $file = array(
            'title' => 'File/Picture',
            'name'  => 'image',
            'value' => '',
            'required' => '',

            'placeholder' => 'Pilih File Gambar'
        );


        // Configuration  Grid
        $config = array(
            array(
                'col'       => 'md-6',
                'content'   => input($fullname)
            ),
            array(
                'col'       => 'md-6',
                'content'   => input($nickname)
            ),
            array(
                'col'       => 'md-6',
                'content'   => input($email)
            ),
            array(
                'col'       => 'md-6',
                'content'   => input($no_telp)
            ),
            array(
                'col'       => 'md-6',
                'content'   => select_option($dpartement)
            ),
            array(
                'col'       => 'md-6',
                'content'   => input($address)
            ),
            array(
                'col'       => 'md-6',
                'content'   => select_option($district)
            ),
            array(
                'col'       => 'md-6',
                'content'   => select_option($regency)
            ),
            array(
                'col'       => 'md-6',
                'content'   => select_option($province)
            ),
            array(
                'col'       => 'md-6',
                'content'   => upload_file($file)
            ),
        );
        return grid($config);
    }

    public function save()
    {
        $fullname = $this->input->post('fullname');
        $nickname = $this->input->post('nickname');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $address = $this->input->post('address');
        $district = $this->input->post('district');
        $regency = $this->input->post('regency');
        $province = $this->input->post('province');


        $config_file = array(
            'file_location' =>  'assets/system/image_user',
            'file_type'     => 'gif|jpg|png',
            'max_size'      => 2000,
            'data'          => 'image'
        );

        $data_file = upload_single_file($config_file);

        $data = array(
            'fullname'  => $fullname,
            'nickname'  => $nickname,
            'no_telp'  => $no_telp,
            'address'  => $address,
            'district'  => $district,
            'regency'  => $regency,
            'province'  => $province,
            'image'     => $data_file['data']['file_name']
        );


        $allert_config = array(
            'color'  => 'warning',
            'label' => 'Data Berhasil Disimpan'
        );
        $allert = allert($allert_config);
        $this->session->set_flashdata('data', $allert);


        $this->Blueprint->insert('tbl_employe', $data);

        redirect('Employe');
    }
}
