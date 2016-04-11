<div class="marginbottom15">
    <form class="form-horizontal" id="form-user-edit" role="form" action="<?php echo $this->config->item('link_user_edit'); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="grid" value="<?php echo $grid; ?>">
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Position <span class="font-red-thunderbird">*</span></label>
                <div class="col-md-9">
                    <select class="form-control" name="id_position" id="id_position">
                        <option value="">-- Pilih Salah Satu --</option>
                        <?php foreach ($position_lists as $row) { ?>
                        <option value="<?php echo $row->id_position; ?>" <?php if ($result->id_position == $row->id_position) { echo 'selected="selected"'; } ?>>
                            <?php echo ucwords($row->name); ?>
                        </option>
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
                        <option value="<?php echo $row->id_company; ?>" <?php if ($result->id_company == $row->id_company) { echo 'selected="selected"'; } ?>>
                            <?php echo ucwords($row->name); ?>
                        </option>
                        <?php } ?>
                    </select>
                    <div class="font-red-thunderbird" id="errorbox_id_company"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Name <span class="font-red-thunderbird">*</span></label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo ucwords($result->name); ?>" />
                    <div class="font-red-thunderbird" id="errorbox_name"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Email <span class="font-red-thunderbird">*</span></label>
                <div class="col-md-9">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $result->email; ?>" />
                    <div class="font-red-thunderbird" id="errorbox_email"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Username <span class="font-red-thunderbird">*</span></label>
                <div class="col-md-9">
                    <input type="hidden" id="selfusername" name="selfusername" value="<?php echo $result->username; ?>"/>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $result->username; ?>" />
                    <div class="font-red-thunderbird" id="errorbox_username"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Role <span class="font-red-thunderbird">*</span></label>
                <div class="col-md-9">
                    <select class="form-control" name="role" id="role">
                        <option value="">-- Pilih Salah Satu --</option>
                        <?php foreach ($code_user_role as $key => $val) { ?>
                        <option value="<?php echo $key; ?>" <?php if ($result->role == $key) { echo 'selected="selected"'; } ?>>
                            <?php echo ucwords($val); ?>
                        </option>
                        <?php } ?>
                    </select>
                    <div class="font-red-thunderbird" id="errorbox_role"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="password" id="password" />
                    <div class="font-red-thunderbird" id="errorbox_password"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">NIK</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nik" id="nik" value="<?php echo $result->nik; ?>" />
                </div>
            </div>
        </div>
        <div class="form-action paddingtop15 border-top1">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green" name="submit" id="btn-user-edit" value="submit">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
$("#form-user-edit").validate({
    rules: {
        id_position: "required",
        id_company: "required",
        name: "required",
        role: "required",
        username: {
            required: true,
            remote: {
                url: newPathname + "check_username",
                type: "post",
                data: {
                    selfusername: function() {
                        return $("#selfusername").val();
                    },
                    username: function() {
                        return $("#username").val();
                    }
                }
            }
        },
        email: {
            required: true,
            email: true
        },
        password: {
            minlength: 5
        }
    },
    messages: {
        id_position: {
            required:"Please select position."
        },
        id_company: {
            required:"Please select company."
        },
        name: {
            required:"Please insert name."
        },
        role: {
            required: "Please insert role."
        },
        username: {
            required: "Please insert username.",
            remote: "Username already exist"
        },
        email: {
            required: "Please insert email.",
            email: "Please enter a valid email."
        },
        password: {
            minlength: "Password min 5 characters."
        }
    },
    errorElement: "div",
    errorPlacement: function(error, element) {
        id = element.attr('id');
        error.appendTo($('#errorbox_'+id));
    },
    submitHandler: function(form) {
        $('.modal-title').text('Please wait...');
        $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
        $('.modal-dialog').addClass('modal-sm');
        $('#myModal').modal('show');
        $.ajax(
        {
            type: "POST",
            url: form.action,
            data: $(form).serialize(), 
            cache: false,
            success: function(data)
            {
                var response = $.parseJSON(data);
                $('#myModal').modal('hide');
                $('#' + response.grid).data('kendoGrid').dataSource.read();
                $('#' + response.grid).data('kendoGrid').refresh();
                noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 5000});
            }
        });
        return false;
    }
});
</script>