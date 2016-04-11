<div class="page-content" id="page_project_type_create">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Project Type Create</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Administrator</a>
            </li>
            <li class="active">Project Type Lists</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row marginbottom30">
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form class="form-horizontal" id="form-project-type-create" role="form" action="<?php echo $this->config->item('link_project_type_create'); ?>" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" id="name" />
                                    <div class="font-red-thunderbird" id="errorbox_name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" name="submit" id="btn-project-type-create" value="submit">Create</button>
                                    <a type="button" class="btn default" href="<?php echo $this->config->item('link_project_type_lists'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>