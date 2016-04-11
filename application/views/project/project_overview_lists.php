<div class="page-content" id="page_project_overview">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Project - Overview</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Project</a>
            </li>
            <li class="active">Overview</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row marginbottom15">
        <div class="col-sm-2 text-right">Project Name:</div>
        <div class="col-sm-10"><?php echo ucwords($project->name); ?></div>
    </div>
    <div class="clearfix"></div>
    <div class="row marginbottom30">
        <div class="col-sm-2">Project Status: merah</div>
        <div class="col-sm-2">Completed: 78,34%</div>
        <div class="col-sm-2">Outstanding Issues:</div>
        <div class="col-sm-2">Critical: <?php echo $issue_critical; ?></div>
        <div class="col-sm-2">Major: <?php echo $issue_major; ?></div>
        <div class="col-sm-2">Minor: <?php echo $issue_minor; ?></div>
    </div>
    <div class="clearfix"></div>
    <div class="row marginbottom30">
        <div class="col-md-6">
            <h4>Ongoing Activities:</h4>
            <div id="grid_project_overview1"></div>
        </div>
        <div class="col-md-6">
            <h4>Detail of All Member Project:</h4>
            <div class="row border1 paddingtb10">
                <div class="col-sm-12"><strong>Project Manager :</strong></div>
                <div class="col-sm-12">Jajang Surajang</div>
                <div class="col-sm-12 margintop15"><strong>Quality Control :</strong></div>
                <div class="col-sm-12">Jamal Argito</div>
                <div class="col-sm-12 margintop15"><strong>Developer :</strong></div>
                <div class="col-sm-12">Udin Maerudin, Saepuloh</div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <h4>Latest Activity:</h4>
            <div id="grid_project_overview2"></div>
        </div>
    </div>
</div>