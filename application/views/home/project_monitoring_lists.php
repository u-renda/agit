<div class="page-content" id="page_project_monitoring">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Projects Monitoring</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">Projects Monitoring</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual visual-text">Total Projects</div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="1349"><?php echo $total_project; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual visual-text">Project Closed</div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="1349"><?php echo $project_closed; ?></span>
                    </div>
                    <div class="desc"><?php echo $project_closed_percent.'%'; ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual visual-text">In Progress</div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="1349"><?php echo $project_in_progress; ?></span>
                    </div>
                    <div class="desc"><?php echo $project_in_progress_percent.'%'; ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual visual-text">Developer</div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="1349">2</span>
                    </div>
                    <div class="desc"> Members </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-other-text">
                <div class="font-bold">Outstanding Issues :</div>
                <div><?php echo 'Critical : '.$issue_critical; ?></div>
                <div><?php echo 'Major : '.$issue_major; ?></div>
                <div><?php echo 'Minor : '.$issue_minor; ?></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- BEGIN CHART PORTLETS-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN BASIC CHART PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Basic Chart</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="chart_1" style="width:100%; height:400px;"> </div>
                </div>
            </div>
            <!-- END BASIC CHART PORTLET-->
        </div>
    </div>
    <!-- END DASHBOARD STATS 1-->
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div id="grid_project_monitoring"></div>
        </div>
    </div>
</div>