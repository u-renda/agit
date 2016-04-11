<div class="page-content" id="page_hcm_resource_competency">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Resources Competency</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">HCM</a>
            </li>
            <li class="active">Resources Competency</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <?php $this->load->view('hcm/resource_competency/profile'); ?>
                <?php $this->load->view('hcm/resource_competency/skill'); ?>
            </div>
            <!-- END PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $this->load->view('hcm/resource_competency/detail'); ?>
                        <?php $this->load->view('hcm/resource_competency/experience'); ?>
                        <?php $this->load->view('hcm/resource_competency/erp_system'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>