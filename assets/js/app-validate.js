$(function () {
    // User - Create
    if (document.getElementById('page_user_create') != null) {
        $("#form-user-create").validate({
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
                            email: function() {
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
                    required: true,
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
                    required: "Please provide a password.",
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
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 5000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Job Analyst - Create
    if (document.getElementById('page_job_analyst_create') != null) {
        $("#form-job-analyst-create").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: {
                    required:"Please insert name."
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
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 5000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Job Role - Create
    if (document.getElementById('page_job_role_create') != null) {
        $("#form-job-role-create").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: {
                    required:"Please insert name."
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
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 5000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Others Company - Create
    if (document.getElementById('page_company_create') != null) {
        $("#form-company-create").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: {
                    required:"Please insert name."
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
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 5000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Others Position - Create
    if (document.getElementById('page_position_create') != null) {
        $("#form-position-create").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: {
                    required:"Please insert name."
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
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 5000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Project Type - Create
    if (document.getElementById('page_project_type_create') != null) {
        $("#form-project-type-create").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: {
                    required:"Please insert name."
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
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 5000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Project - Create
    if (document.getElementById('page_project_create') != null) {
        $("#form-project-create").validate({
            rules: {
                id_company: "required",
                id_project_type: "required",
                name: "required",
                division: "required",
                department: "required",
                start_date: "required",
                end_date: "required"
            },
            messages: {
                id_company: {
                    required:"Please insert company."
                },
                id_project_type: {
                    required:"Please insert project type."
                },
                name: {
                    required:"Please insert name."
                },
                division: {
                    required:"Please insert division."
                },
                department: {
                    required:"Please insert department."
                },
                start_date: {
                    required:"Please insert timeline from."
                },
                end_date: {
                    required:"Please insert timeline to."
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
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 5000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
        
        $('#project_type_others_name').hide();
        $('.id_project_type').change(function() {
            if (this.value == 'others') {
                $("#project_type_others_name").show();
            }
            else {
                $("#project_type_others_name").hide();
            }
        });
    }
});