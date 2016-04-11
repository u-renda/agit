<div class="page-content" id="page_project_timeline">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Project - Timeline</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Project</a>
            </li>
            <li class="active">Timeline</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row marginbottom30">
        <div class="col-sm-2">Project Name:</div>
        <div class="col-sm-10"><?php echo $project_name; ?></div>
    </div>
    <div class="clearfix"></div>
    <div class="row marginbottom30">
        <div class="col-md-12">
            <div id="grid_project_timeline"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary" href="<?php echo $this->config->item('link_project_task_create'); ?>" role="button">New Tasks</a>
            <a class="btn btn-danger pull-right" href="#" role="button">Project Closed</a>
        </div>
    </div>
</div>