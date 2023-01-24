<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?= $content['title'] ?></h5>

            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="<?= base_url($this->uri->segment(1)) ?>" class="<?= $this->uri->segment(1) !== null ? 'text' : 'text-muted' ?>"><?= $this->uri->segment(1) ?></a>
                </li>
                <li class="<?= $this->uri->segment(2) !== null ? 'breadcrumb-item' : '' ?>">
                    <a href="<?= base_url($this->uri->segment(1) . "/" . $this->uri->segment(2)) ?>" class="<?= $this->uri->segment(2) !== null ? 'text' : 'text-muted' ?>"><?= $this->uri->segment(2) ?></a>
                </li>
                <li class="<?= $this->uri->segment(3) !== null ? 'breadcrumb-item' : '' ?>">
                    <a href="<?= base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3)) ?>" class="<?= $this->uri->segment(3) !== null ? 'text' : 'text-muted' ?>"><?= $this->uri->segment(3) ?></a>
                </li>
                <li class="<?= $this->uri->segment(4) !== null ? 'breadcrumb-item' : '' ?>">
                    <a href="<?= base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3) . "/" . $this->uri->segment(4)) ?>" class="<?= $this->uri->segment(4) !== null ? 'text' : 'text-muted' ?>"><?= $this->uri->segment(4) ?></a>
                </li>
            </ul>
            <!--end::Actions-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->

        <!--end::Toolbar-->
    </div>
</div>