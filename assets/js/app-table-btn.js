$(function () {
    // Others Company - Lists
    if (document.getElementById('page_company_lists') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "company_delete";
            var grid = "grid_company_lists";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger color-delete"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // Others Position - Lists
    if (document.getElementById('page_position_lists') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "position_delete";
            var grid = "grid_position_lists";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger color-delete"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // Job Analyst - Lists
    if (document.getElementById('page_job_analyst_lists') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "job_analyst_delete";
            var grid = "grid_job_analyst_lists";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger color-delete"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // Job Role - Lists
    if (document.getElementById('page_job_role_lists') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "job_role_delete";
            var grid = "grid_job_role_lists";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger color-delete"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // User - Lists
    if (document.getElementById('page_user_lists') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "user_delete";
            var grid = "grid_user_lists";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger color-delete"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
        
        $(this).delegate(".view", "click", function() {
            var id = $(this).attr("id");
            var action = "user_view";
            var dataString = 'id='+ id +'&action='+ action;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-view').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-view').html('<i class="fa fa-folder-open font-larger color-view"></i>');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-title').text('Detail');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
        
        $(this).delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            var action = "user_edit";
            var grid = "grid_user_lists";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-edit').html('<i class="fa fa-pencil font-larger color-edit"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-title').text('Edit Data');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
    
    // Project Type - Lists
    if (document.getElementById('page_project_type_lists') != null) {
        $(this).delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "project_type_delete";
            var grid = "grid_project_type_lists";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString, 
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-delete').html('<i class="fa fa-times font-larger color-delete"></i>');
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('.modal-title').text('Confirm Delete');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
    }
});