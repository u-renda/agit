<!-- BEGIN HEADER -->
<header class="page-header">
    <nav class="navbar mega-menu" role="navigation">
        <div class="container-fluid">
            <div class="clearfix navbar-fixed-top">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </span>
                </button>
                <!-- End Toggle Button -->
                <!-- BEGIN LOGO -->
                <a id="index" class="page-logo" href="<?php echo $this->config->item('link_dashboard_project'); ?>">
                    <img src="<?php echo base_url('assets/images').'/logo.png'; ?>" alt="Logo"> </a>
                <!-- END LOGO -->
                <!-- BEGIN TOPBAR ACTIONS -->
                <div class="topbar-actions">
                    <!-- BEGIN USER PROFILE -->
                    <div class="btn-group-img btn-group">
                        <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span>Hi, Admin</span>
                            <img src="<?php echo base_url('assets/images').'/user_default_35.png'; ?>" alt=""> </button>
                        <ul class="dropdown-menu-v2" role="menu">
                            <li>
                                <a href="<?php echo $this->config->item('link_user_profile'); ?>">
                                    <i class="fa fa-user"></i> My Profile
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="<?php echo $this->config->item('link_logout'); ?>">
                                    <i class="fa fa-power-off"></i> Log Out </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END USER PROFILE -->
                </div>
                <!-- END TOPBAR ACTIONS -->
            </div>
            <!-- BEGIN HEADER MENU -->
            <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-fw nav-grand">
                        <a href="javascript:;" class="text-uppercase">
                            <i class="fa fa-home"></i> Home
                        </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_project_monitoring_lists'); ?>">
                                    <i class="fa fa-suitcase"></i> Projects Monitoring
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_resource_monitoring_lists'); ?>">
                                    <i class="fa fa-cogs"></i> Resources Monitoring
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-fw nav-grand">
                        <a href="javascript:;" class="text-uppercase">
                            <i class="fa fa-files-o"></i> Projects
                        </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_project_lists'); ?>">
                                    <i class="fa fa-list"></i> Lists
                                </a>
                            </li>
                            <?php if ($this->session->userdata('id_project') == TRUE) { ?>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_project_overview_lists').'?id_project='.$this->session->userdata('id_project'); ?>">
                                    <i class="fa fa-binoculars"></i> Overview
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_project_timeline_lists'); ?>">
                                    <i class="fa fa-hourglass-half"></i> Timeline
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_gantt_chart'); ?>">
                                    <i class="fa fa-sliders"></i> Gantt Chart
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_project_visit_lists'); ?>">
                                    <i class="fa fa-map-marker"></i> Visit Request
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_calendar'); ?>">
                                    <i class="fa fa-calendar"></i> Calendar
                                </a>
                            </li>
                            <li class="dropdown more-dropdown-sub nav-parent">
                                <a href="javascript:;"> More </a>
                                <ul class="dropdown-menu">
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_project_issue_lists'); ?>">
                                            <i class="fa fa-exclamation-triangle"></i> Outstanding Issues
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_project_overtime_lists'); ?>">
                                            <i class="fa fa-clock-o"></i> Overtime
                                        </a>
                                    </li>
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_project_document_lists'); ?>">
                                            <i class="fa fa-folder-open-o"></i> Documents
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown more-dropdown-sub nav-parent">
                                <a href="javascript:;">
                                    <i class="fa fa-briefcase"></i> Project Setting
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_project_info'); ?>"> Information </a>
                                    </li>
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_project_member'); ?>"> Members </a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-fw nav-grand">
                        <a href="javascript:;" class="text-uppercase">
                            <i class="fa fa-thumbs-o-down"></i> Complaints
                        </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_complaint_lists'); ?>">
                                    <i class="fa fa-list"></i> Lists
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-fw nav-grand">
                        <a href="javascript:;" class="text-uppercase">
                            <i class="fa fa-user-secret"></i> Administrator
                        </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_user_lists'); ?>">
                                    <i class="fa fa-users"></i> User
                                </a>
                            </li>
                            <li class="dropdown more-dropdown-sub nav-parent">
                                <a href="javascript:;">
                                    <i class="fa fa-briefcase"></i> Job
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_job_analyst_lists'); ?>"> Job Analyst </a>
                                    </li>
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_job_role_lists'); ?>"> Job Role </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown more-dropdown-sub nav-parent">
                                <a href="javascript:;">
                                    <i class="icon-settings"></i> Others
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_company_lists'); ?>"> Company </a>
                                    </li>
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_position_lists'); ?>"> Position </a>
                                    </li>
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_project_type_lists'); ?>"> Project Type </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-fw nav-grand">
                        <a href="javascript:;" class="text-uppercase">
                            <i class="fa fa-building-o"></i> HCM
                        </a>
                        <ul class="dropdown-menu dropdown-menu-fw">
                            <li class="dropdown more-dropdown-sub nav-parent">
                                <a href="javascript:;">
                                    <i class="fa fa-files-o"></i> Project
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_activities_monitoring_lists'); ?>"> Progress Activities Monitoring </a>
                                    </li>
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_activities_detail_lists'); ?>"> Progress Activities Detail </a>
                                    </li>
                                    <li class="list-item">
                                        <a href="<?php echo $this->config->item('link_project_portfolio_lists'); ?>"> Portfolio </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_operation_monitoring_lists'); ?>">
                                    <i class="fa fa-wrench"></i> Operation Progress Activities Monitoring
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_resource_competency'); ?>">
                                    <i class="fa fa-users"></i> Resources Competency
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="<?php echo $this->config->item('link_training_lists'); ?>">
                                    <i class="fa fa-area-chart"></i> Training
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!--/container-->
    </nav>
</header>
<!-- END HEADER -->