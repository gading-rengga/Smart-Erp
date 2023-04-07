<?php
function card($data)
{
	ob_start(); ?>
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="<?= $data["icon"] ?> text-primary"></i>
                </span>
                <h3 class="card-label"><?= $data["title"] ?>
                    <small><?= isset($data["sub_title"])
                    	? $data["sub_title"]
                    	: "" ?></small>
                </h3>
            </div>
            <div class="card-toolbar">
                <?php if (isset($data["action"])) { ?>
                    <?php if (
                    	$data["action"] != strip_tags($data["action"])
                    ) { ?>
                        <?= $data["action"] ?>
                    <?php } else { ?>
                        <a href="<?= $data[
                        	"action"
                        ] ?>" class="btn btn-sm btn-primary font-weight-bold">Add</a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
            <?= $data["content"] ?>
        </div>
    </div>

<?php
$contents = ob_get_clean();
return $contents;
}

function tab_card($data)
{
	$i = 0;
	$x = 0;
	ob_start();
	?>
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label"><?= $data["title"] ?></h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <?php foreach ($data["data"] as $value) { ?>
                        <?php $i = ++$i; ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $i == 1
                            	? "active"
                            	: "" ?>" data-toggle="tab" href="#<?= $value[
	"id"
] ?>">
                                <span class="nav-icon"><i class="<?= isset(
                                	$value["icon"]
                                )
                                	? $value["icon"]
                                	: "" ?>"></i></span>
                                <span class="nav-text"><?= $value[
                                	"button_title"
                                ] ?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <?php foreach ($data["data"] as $val) { ?>
                    <?php $x = ++$x; ?>
                    <div class="tab-pane fade <?= $x == 1
                    	? "show active"
                    	: "" ?>" id="<?= $val[
	"id"
] ?>" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
                        <?= $val["content"] ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

function table($data)
{
	ob_start(); ?>
    <div id="<?= isset($data["table"]["id"])
    	? $data["table"]["id"]
    	: "" ?>" class="table-responsive">
        <table class="table <?= isset($data["table"]["table_type"])
        	? $data["table"]["table_type"]
        	: "" ?>">
            <thead>
                <tr>
                    <?php if (isset($data["t_head"])) { ?>
                        <?php foreach ($data["t_head"] as $value) { ?>
                            <th class="<?= $value["class"] ?>" scope="<?= isset(
	$value["scope"]
)
	? $value["scope"]
	: "" ?>" colspan="<?= isset($value["colspan"])
	? $value["colspan"]
	: "" ?>" rowspan="<?= isset($value["rowspan"])
	? $value["rowspan"]
	: "" ?>"><?= $value["data"] ?></th>
                        <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data["t_body"])) { ?>
                    <?php foreach ($data["t_body"] as $value) { ?>
                        <tr>
                            <?php foreach ($value as $val) { ?>
                                <td class="<?= isset($val["class"])
                                	? $val["class"]
                                	: "" ?>" scope="<?= isset($val["scope"])
	? $val["scope"]
	: "" ?>" colspan="<?= isset($val["colspan"])
	? $val["colspan"]
	: "" ?>" rowspan="<?= isset($val["rowspan"])
	? $val["rowspan"]
	: "" ?>"><?= $val["data"] ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

function modal($data)
{
	ob_start(); ?>
    <!-- Button trigger modal-->
    <button type="button" class="btn btn-<?= $data[
    	"btn-color"
    ] ?> w-100" data-toggle="modal" data-target="#<?= $data["id"] ?>">
        <?= $data["btn-title"] ?>
    </button>

    <!-- Modal-->
    <div class="modal fade" id="<?= $data[
    	"id"
    ] ?>" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-<?= isset($data["size"])
        	? $data["size"]
        	: "" ?> modal-dialog-<?= isset($data["type"]) ? $data["type"] : "" ?>" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $data["title"] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form enctype='multipart/form-data' method="post" action="<?= base_url(
                	$data["post_url"]
                ) ?>">
                    <div class="modal-body">
                        <?php if (isset($data["type"])) { ?>
                            <?php if ($data["type"] == "scrollable") { ?>
                                <div data-scroll="true" data-height="300" class="scroll ps ps--active-y" style="height: 300px; overflow: hidden;">
                                    <?= $data["content"] ?>
                                    <div class="ps__rail-x" style="left: 0px; bottom: -210px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 210px; right: 0px; height: 300px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 60px; height: 86px;"></div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <?= $data["content"] ?>
                            <?php } ?>
                        <?php } else {echo $data["content"];} ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

function grid($data)
{
	ob_start(); ?>
    <div class="row p-0">
        <?php foreach ($data as $value) { ?>
            <div class="col-<?= $value["col"] ?>">
                <?php if (is_array($value["content"])) { ?>
                    <?= grid($value["content"]) ?>
                <?php } else { ?>
                    <?= $value["content"] ?>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

//==================================================
// Form Input Area
//==================================================
function input($data)
{
	ob_start(); ?>
    <div class="form-group p-0">
        <?php if ($data["type"] !== "hidden") { ?>
            <label><?= $data["title"] ?>
                <?php if (
                	isset($data["required"]) &&
                	$data["required"] == "true"
                ) { ?>
                    <span class="text-danger">*</span>
                <?php } else {} ?>
            </label>
        <?php } ?>
        <input type="<?= $data[
        	"type"
        ] ?>" <?= isset($data["required"]) && $data["required"] == "true" ? "required" : "" ?> class="form-control" name="<?= $data["name"] ?>" value="<?= $data["value"] ?>" id="<?= isset($data["id"]) ? $data["id"] : "" ?>" placeholder="<?= isset($data["placeholder"]) ? $data["placeholder"] : "" ?>">
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

function select_option($data)
{
	ob_start(); ?>
    <div class="form-group">
        <label><?= $data["title"] ?>
            <?php if (
            	isset($data["required"]) &&
            	$data["required"] == "true"
            ) { ?>
                <span class="text-danger">*</span>
            <?php } else {} ?>
        </label>
        <div class="dropdown bootstrap-select form-control dropup">
            <select <?= isset($data["required"]) && $data["required"] == "true"
            	? "required"
            	: "" ?> class="form-control selectpicker" id="<?= isset($data["id"]) ? $data["id"] : "" ?>" name="<?= $data["name"] ?>" data-size="7" data-live-search="true" tabindex="null">
                <option value="">Select</option>
                <?php foreach ($data["data"] as $val) { ?>
                    <?php if (@$val[$data["data_id"]] == @$data["value"]) { ?>
                        <option value="<?= @$val[
                        	$data["data_id"]
                        ] ?>" selected><?= @$val[
	$data["data_value"]
] ?></option>
                    <?php } ?>
                    <option value="<?= @$val[$data["data_id"]] ?>"><?= @$val[
	$data["data_value"]
] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

function textarea($data)
{
	ob_start(); ?>
    <div class="form-group mb-1">
        <label><?= $data["title"] ?>
            <?php if (
            	isset($data["required"]) &&
            	$data["required"] == "true"
            ) { ?>
                <span class="text-danger">*</span>
            <?php } else {} ?>
        </label>
        <textarea <?= isset($data["required"]) && $data["required"] == "true"
        	? "required"
        	: "" ?> class="form-control" name="<?= $data["name"] ?>" value="<?= $data["value"] ?>" id="<?= isset($data["id"]) ? $data["id"] : "" ?>" placeholder="<?= isset($data["placeholder"]) ? $data["placeholder"] : "" ?>" rows="3"></textarea>
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

function upload_file($data)
{
	ob_start(); ?>
    <div class="form-group">
        <label><?= $data["title"] ?>
            <?php if (
            	isset($data["required"]) &&
            	$data["required"] == "true"
            ) { ?>
                <span class="text-danger">*</span>
            <?php } else {} ?>
        </label>
        <div></div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" <?= isset(
            	$data["required"]
            ) && $data["required"] == "true"
            	? "required"
            	: "" ?> class="form-control" name="<?= $data["name"] ?>" value="<?= $data["value"] ?>" id="<?= isset($data["id"]) ? $data["id"] : "" ?>">
            <label class="custom-file-label"><?= isset($data["placeholder"])
            	? $data["placeholder"]
            	: "" ?></label>
        </div>
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

function allert($data)
{
	?>
    <div class="alert alert-custom alert-<?= $data[
    	"color"
    ] ?> fade show" role="alert" style="position: absolute;right: 15px;top: 15px;height: 10px;">
        <div class=" alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text"><?= $data["label"] ?></div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
<?php
$contents = ob_get_clean();
return $contents;
}

function dropdown($data)
{
	ob_start(); ?>
    <div class="dropdown dropdown-inline">
        <a href="#" class="btn btn-light-<?= $data[
        	"color"
        ] ?> btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $data["title"] ?></a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
            <!--begin::Navigation-->
            <ul class="navi navi-hover">
                <?php foreach ($data["action"] as $val) { ?>
                    <li class="navi-item p-1">
                        <?= $val ?>
                    </li>
                <?php } ?>
            </ul>
            <!--end::Navigation-->
        </div>
    </div>

<?php
$contents = ob_get_clean();
return $contents;
}

function button($data)
{
	ob_start(); ?>
    <a class="btn btn-<?= $data[
    	"color"
    ] ?> btn-sm" href="<?= site_url($data["url"]) ?>"><?= $data["title"] ?></a>
<?php
$contents = ob_get_clean();
return $contents;
}
