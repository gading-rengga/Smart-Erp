<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Blueprint");
	}

	public function _array()
	{
		$data = [
			"ID" => "",
			"group_title" => "",
			"title" => "",
			"url" => "",
			"icon" => "",
		];

		return $data;
	}

	public function index()
	{
		$content = $this->card();
		$config = [
			"title" => "Data Menu",
			"content" => $content,
		];
		return primary_page($config);
	}

	public function card()
	{
		$config = [
			"title" => "Data Menu",
			"icon" => "flaticon-users-1",
			"action" => $this->modal(),
			"content" => $this->table(),
		];
		return card($config);
	}

	public function modal($id = 0)
	{
		$title = $id == 0 ? "Add" : "Edit";
		$color = $id == 0 ? "primary" : "warning";
		$grid = $this->grid($id);
		$config = [
			"id" => "modal_menu_" . $id,
			"btn-title" => $title,
			"btn-color" => $color,
			"title" => "Form Menu",
			"post_url" => "Menu/save",
			"size" => "",
			"type" => "fade", //scrollable,fade,default
			"content" => $grid,
		];
		return modal($config);
	}

	public function grid($id = 0)
	{
		$group_title = [
			"title" => "Group Title" . $id,
			"name" => "group_title",
			"value" => $id,
			"required" => "",
			"type" => "text",
		];
		$title = [
			"title" => "Title",
			"name" => "title",
			"value" => "",
			"required" => "true",
			"type" => "text",
		];
		$icon = [
			"title" => "Icon",
			"name" => "icon",
			"value" => "",
			"required" => "true",
			"type" => "text",
		];
		$url = [
			"title" => "Url",
			"name" => "url",
			"value" => "",
			"required" => "true",
			"type" => "text",
		];
		$config = [
			[
				"col" => "md-12",
				"content" => input($group_title),
			],
			[
				"col" => "md-12",
				"content" => input($title),
			],
			[
				"col" => "md-12",
				"content" => input($icon),
			],
			[
				"col" => "md-12",
				"content" => input($url),
			],
		];

		return grid($config);
	}

	public function table()
	{
		$get_allmenu = [
			"select" => "*",
			"table" => "tbl_menu",
		];
		$data_menu = $this->Blueprint->get($get_allmenu);

		$config["table"] = [
			"table_type" => "table-hover",
		];
		$config["t_head"] = [
			[
				"class" => "text-center w-5",
				"data" => "No",
			],
			[
				"class" => "text-center w-25",
				"data" => "Group Title",
			],
			[
				"class" => "text-center w-25",
				"data" => "Title",
			],
			[
				"class" => "text-center w-25",
				"data" => "Icon",
			],
			[
				"class" => "text-center w-25",
				"data" => "Url",
			],
			[
				"class" => "text-center w-auto",
				"data" => "Action",
			],
		];
		$no = 0;
		foreach ($data_menu as $index => $value) {
			$edit_btn = $this->modal($value["ID"]);
			$dropdown_config = [
				"title" => "Action",
				"color" => "primary",
				"action" => [$edit_btn],
			];
			$dropdown = dropdown($dropdown_config);
			$config["t_body"][$index] = [
				[
					"class" => "text-center",
					"data" => ++$no,
				],
				[
					"class" => "text-center",
					"data" => $value["group_title"],
				],
				[
					"class" => "text-center",
					"data" => $value["title"],
				],
				[
					"class" => "text-center",
					"data" => $value["icon"],
				],
				[
					"class" => "text-center",
					"data" => $value["url"],
				],
				[
					"class" => "text-center",
					"data" => $dropdown,
				],
			];
		}
		return table($config);
	}

	public function save()
	{
		$group_title = $this->input->post("group_title");
		$title = $this->input->post("title");
		$icon = $this->input->post("icon");
		$url = $this->input->post("url");

		$data = [
			"group_title" => $group_title,
			"title" => $title,
			"icon" => $icon,
			"url" => $url,
		];

		$allert_config = [
			"color" => "warning",
			"label" => "Data Berhasil Disimpan",
		];
		$allert = allert($allert_config);
		$this->session->set_flashdata("data", $allert);

		$this->Blueprint->insert("tbl_menu", $data);

		redirect("Menu");
	}
}
