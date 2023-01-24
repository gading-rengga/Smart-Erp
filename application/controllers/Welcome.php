<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$content = $this->card();
		$config = array(
			'title' => 'User',
			'content' => $content,
		);
		return primary_page($config);
	}

	public function card()
	{
		$modal = $this->modal();
		$config = array(
			'title'         => 'Data Table',
			'icon'          => 'flaticon-users-1',
			'action'        => $modal,
			'content'       => '',
		);
		return card($config);
	}

	public function modal()
	{
		$grid = $this->grid();

		$config = array(
			'title'     => 'Form Data User',
			'post_url'  => 'User/save',
			'size'      => 'md',
			'type'      => 'fade', //scrollable,fade,default
			'content'   => $grid,
		);
		return modal($config);
	}

	public function grid()
	{
		$array = array(
			array(
				'id'    => 1,
				'name'  => 'Gading Rengga'
			),
			array(
				'id'    => 2,
				'name'  => 'Gavi'
			),
			array(
				'id'    => 3,
				'name'  => 'Novi'
			),
			array(
				'id'    => 4,
				'name'  => 'Nizam'
			),
		);


		$hiden = array(
			'title' 		=> '',
			'name'  		=> '',
			'value' 		=> '',
			'placeholder' 	=> '',
			'required' 		=> 'true',
			'type' 			=> 'hidden'
		);
		$nama = array(
			'title' 		=> '',
			'name'  		=> '',
			'value' 		=> '',
			'placeholder' 	=> '',
			'required' 		=> 'true',
			'type' 			=> 'text'
		);

		$textarea = array(
			'title' => 'Text Area',
			'name'  => '',
			'value' => '',
			'required' => 'true',
			'placeholder'   => 'blabla'
		);

		$select = array(
			'title'         => 'Customer',
			'name'          => 'name',
			'value'         => '',
			'data'          => $array,
			'data_id'       => 'id',
			'data_value'    => 'name',
			'required'      => 'true'
		);


		$config = array(
			array(
				'col'       => 'xs-12',
				'content'   => input($nama)
			),
			array(
				'col'       => 'md-12',
				'content'   => select_option($select)
			),
			array(
				'col'       => 'md-12',
				'content'   => textarea($textarea)
			),
		);
		return grid($config);
	}

	public function save()
	{
		$customer = $this->input->post('name');
		var_dump($customer);
		die();
		redirect('User');
	}
}
