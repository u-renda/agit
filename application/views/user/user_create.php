<div class="page-content" id="page_user_create">
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>User Create</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Administrator</a>
            </li>
            <li class="active">User</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row marginbottom30">
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-body form">
                    <form class="form-horizontal" id="form-user-create" role="form" action="<?php echo $this->config->item('link_user_create'); ?>" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Position <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <select class="form-control" name="id_position" id="id_position">
                                        <option value="">-- Pilih Salah Satu --</option>
                                        <?php foreach ($position_lists as $row) { ?>
                                            <option value="<?php echo $row->id_position; ?>"><?php echo ucwords($row->name); ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="font-red-thunderbird" id="errorbox_id_position"></div>
                                </div>
                            </div>
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
                                <label class="col-md-3 control-label">Name <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" id="name" />
                                    <div class="font-red-thunderbird" id="errorbox_name"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" id="email" />
                                    <div class="font-red-thunderbird" id="errorbox_email"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Username <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="username" id="username" />
                                    <div class="font-red-thunderbird" id="errorbox_username"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" id="password" />
                                    <div class="font-red-thunderbird" id="errorbox_password"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Role <span class="font-red-thunderbird">*</span></label>
                                <div class="col-md-9">
                                    <select class="form-control" name="role" id="role">
                                        <option value="">-- Pilih Salah Satu --</option>
                                        <?php foreach ($code_user_role as $key => $val) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo ucwords($val); ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="font-red-thunderbird" id="errorbox_role"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">NIK</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nik" id="nik" />
                                </div>
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" name="submit" id="btn-user-create" value="submit">Create</button>
                                    <a type="button" class="btn default" href="<?php echo $this->config->item('link_user_lists'); ?>">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>