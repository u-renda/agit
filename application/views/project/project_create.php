<div class="page-content" id="page_project_create">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Project Create</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Administrator</a>
            </li>
            <li class="active">Project</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row marginbottom30">
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form class="form-horizontal" id="form-project-create" role="form" action="<?php echo $this->config->item('link_project_create'); ?>" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Company <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <select class="form-control" name="id_company" id="id_company">
                                        <option value="">-- Pilih Salah Satu --</option>
                                        <?php foreach ($company_lists as $row) { ?>
                                            <option value="<?php echo $row->id_company; ?>"><?php echo ucwords($row->name); ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="font-red-thunderbird" id="errorbox_id_company"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Project Type <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <div class="radio-list">
                                        <?php foreach ($project_type_lists as $row) { ?>
                                        <label>
                                            <input type="radio" name="id_project_type" id="id_project_type" class="id_project_type" value="<?php echo $row->id_project_type; ?>"> <?php echo ucwords($row->name); ?>
                                        </label>
                                        <?php } ?>
                                        <label>
                                            <input type="radio" name="id_project_type" id="id_project_type" class="id_project_type" value="others"> Others
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="project_type_others_name" id="project_type_others_name" placeholder="Please insert new project type name" />
                                    <div class="font-red-thunderbird" id="errorbox_id_project_type"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" id="name" />
                                    <div class="font-red-thunderbird" id="errorbox_name"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Division <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="division" id="division" />
                                    <div class="font-red-thunderbird" id="errorbox_division"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Department <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="department" id="department" />
                                    <div class="font-red-thunderbird" id="errorbox_department"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Timeline <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <div class="input-group input-large date-picker input-daterange" data-date="10-11-2012" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="start_date" id="start_date">
                                        <span class="input-group-addon"> to </span>
                                        <input type="text" class="form-control" name="end_date" id="end_date">
                                    </div>
                                    <div class="font-red-thunderbird" id="errorbox_start_date"></div>
                                    <div class="font-red-thunderbird" id="errorbox_end_date"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Requirement</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="requirement" id="requirement"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" name="submit" id="btn-project-create" value="submit">Create</button>
                                    <a type="button" class="btn default" href="<?php echo $this->config->item('link_project_lists'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>