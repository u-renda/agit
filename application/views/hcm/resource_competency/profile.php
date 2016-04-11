<div class="portlet light profile-sidebar-portlet bordered">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
        <img src="<?php echo base_url('assets/images').'/user_default_600.png'; ?>" class="img-responsive" alt=""> </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name"><?php echo $this->session->userdata('name'); ?></div>
        <div class="profile-usertitle-job"><?php echo $this->session->userdata('position'); ?></div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav">
            <li class="active">
                <a href="<?php echo $this->config->item('link_resource_competency'); ?>">
                    <i class="fa fa-home"></i> Overview
                </a>
            </li>
            <li>
                <a href="<?php echo $this->config->item('link_resource_setting'); ?>">
                    <i class="fa fa-cog"></i> Account Settings
                </a>
            </li>
        </ul>
    </div>
    <!-- END MENU -->
</div>