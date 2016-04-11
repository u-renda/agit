<div class="page-content" id="page_user_lists">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Users</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Administrator</a>
            </li>
            <li class="active">Users</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row marginbottom30">
        <div class="col-md-12">
            <div id="grid_user_lists"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary" role="button" id="btn-user-create" href="<?php echo $this->config->item('link_user_create'); ?>">
               Add User
            </a>
        </div>
    </div>
</div>