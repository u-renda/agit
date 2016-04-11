<div class="page-content" id="page_project_task_create">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Project Task Create</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Administrator</a>
            </li>
            <li class="active">Project Timeline</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row marginbottom30">
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form class="form-horizontal" id="form-project-task-create" role="form" action="<?php echo $this->config->item('link_project_task_create'); ?>" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" id="name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">PIC Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="id_user" id="id_user">
                                        <option value="">-- Pilih Salah Satu --</option>
                                        <?php foreach ($user_lists as $row) { ?>
                                            <option value="<?php echo $row->id_user; ?>"><?php echo ucwords($row->name); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Group of</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="group_task" id="group_task">
                                        <option value="">-- Pilih Salah Satu --</option>
                                        <?php foreach ($code_project_task_group as $key => $val) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo ucwords($val); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Timeline</label>
                                <div class="col-md-9">
                                    <div class="input-group input-large date-picker input-daterange" data-date="10-11-2012" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="start_date">
                                        <span class="input-group-addon"> to </span>
                                        <input type="text" class="form-control" name="end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" name="submit" id="btn-project-sub-task-create" value="submit">Create</button>
                                    <a type="button" class="btn default" href="<?php echo $this->config->item('link_project_timeline_lists'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>