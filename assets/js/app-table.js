$(function () {
    // Dashboard - Project Monitoring
    $("#grid_project_monitoring").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_monitoring_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "ProjectActivities",
                title: "Project Activities",
                width: 250
            },
            { field: "Total" }, { field: "Jan" }, { field: "Feb" }, { field: "Mar" }, { field: "Apr"},
            { field: "May" }, { field: "Jun" }, { field: "Jul" }, { field: "Aug" }, { field: "Sep" },
            { field: "Oct" }, { field: "Nov" }, { field: "Dec" }
        ]
    });
    
    // Dashboard - Resource Monitoring
    $("#grid_resource_monitoring").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "resource_monitoring_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Nama"
            }, {
                field: "Projects"
            }, {
                title: "Projects Status",
                columns: [{
                    field: "Activities"
                }, {
                    field: "Completed"
                }, {
                    field: "InProgress",
                    title: "In Progress"
                }, {
                    field: "Delay"
                }]
            }, {
                field: "Overtime",
                columns: [{
                    field: "Workday"
                }, {
                    field: "Holiday"
                }]
            }
        ]
    });
    
    // Project - Lists
    $("#grid_project_lists").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Projects",
                template: "#= data.Projects #",
            }, {
                field: "Duration",
                title: "Duration (days)"
            }, {
                field: "Started"
            }, {
                field: "Target"
            }, {
                field: "Finished"
            }, {
                field: "Percent",
                title: "%"
            }, {
                field: "Status",
                template: "#= data.Status #",
                sortable: false
            }
        ]
    });
    
    // Project - Overview
    $("#grid_project_overview1").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_overview_get1",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "Tasks"
            }, {
                field: "Complete",
                title: "Complete (%)"
            }, {
                field: "Delay",
                title: "Delay (%)"
            }, {
                field: "RAG"
            }
        ]
    });
    
    $("#grid_project_overview2").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_overview_get2",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "TaskName",
                title: "Task Name"
            }, {
                field: "PIC"
            }, {
                field: "Start"
            }, {
                field: "Target"
            }, {
                field: "Finish"
            }, {
                field: "Status"
            }
        ]
    });
    
    // Project - Timeline
    $("#grid_project_timeline").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_timeline_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20,
            group: {
                field: "Group",
                dir: "asc"
            }
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "TaskName",
                title: "Task Name",
                template: "#= data.TaskName #",
                sortable: false
            }, {
                field: "PIC"
            }, {
                field: "Start"
            }, {
                field: "Target"
            }, {
                field: "Finish"
            }, {
                field: "Status",
                template: "#= data.Status #",
                sortable: false
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // Project - Visit Request
    $("#grid_project_visit").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_visit_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "TaskName",
                title: "Task Name"
            }, {
                field: "Requester"
            }, {
                field: "Start"
            }, {
                field: "Finish"
            }, {
                field: "Approval"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // Project - Outstanding Issues
    $("#grid_project_issue").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_issue_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Task"
            }, {
                field: "Categories"
            }, {
                field: "Description"
            }, {
                field: "DateEntered",
                title: "Date Entered"
            }, {
                field: "DateResolved",
                title: "Date Resolved"
            }, {
                field: "Owner"
            }, {
                field: "Resolver"
            }, {
                field: "Status"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // Project - Overtime Confirmation
    $("#grid_project_overtime").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_overtime_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Date"
            }, {
                field: "TaskName",
                title: "Task Name"
            }, {
                field: "OvertimeType",
                title: "Overtime Type"
            }, {
                field: "OfficeHoliday",
                title: "Office hours / Holiday"
            }, {
                field: "Description"
            }, {
                field: "OvertimeDate",
                title: "Overtime Date"
            }, {
                field: "Confirm"
            }
        ]
    });
    
    // Project - Documents
    $("#grid_project_document").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_document_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Title"
            }, {
                field: "Category"
            }, {
                field: "Description"
            }, {
                field: "Download"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // Project Setting - Members
    $("#grid_project_member").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_member_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "User"
            }, {
                field: "Role"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // Complaint - Lists
    $("#grid_complaint_lists").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "complaint_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "IssueName",
                title: "Issue Name"
            }, {
                field: "Date"
            }, {
                field: "ResourcesName",
                title: "Resources Name"
            }, {
                field: "Type"
            }, {
                field: "Description"
            }, {
                field: "IssuedBy",
                title: "Issued By"
            }
        ]
    });
    
    // HCM - Project Monitoring
    $("#grid_hcm_project_monitoring").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "hcm_project_monitoring_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "Status"
            }, {
                field: "POName",
                title: "PO Name"
            }, {
                field: "NumberOfProject",
                title: "Number of Project"
            }, {
                field: "Delay"
            }, {
                field: "InProgress",
                title: "In Progress"
            }, {
                field: "ProjectClosed",
                title: "Project Closed"
            }, {
                field: "StartDate",
                title: "Start Date"
            }, {
                field: "FinishedDate",
                title: "Finished Date"
            }
        ]
    });
    
    // HCM - Project Detail
    var dataSource_hcm_project_detail = new kendo.data.DataSource({
        transport: {
            read: {
                url: newPathname + "hcm_project_detail_get",
                dataType: "json"
            }
        },
        schema: {
            data: "data",
            total: "total"
        },
        pageSize: 20
    });
    
    $("#grid_hcm_project_detail1").kendoGrid({
        dataSource: dataSource_hcm_project_detail,
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                title: "Projects Status",
                columns: [{
                    field: "Activities1",
                    title: "Activities"
                }, {
                    field: "Completed1",
                    title: "Completed"
                }, {
                    field: "InProgress1",
                    title: "In Progress"
                }, {
                    field: "Delay1",
                    title: "Delay"
                }]
            }, {
                title: "Overtime",
                columns: [{
                    field: "Workday1",
                    title: "Workday"
                }, {
                    field: "Holiday1",
                    title: "Holiday"
                }]
            }
        ]
    });
    
    $("#grid_hcm_project_detail2").kendoGrid({
        dataSource: dataSource_hcm_project_detail,
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "ProjectName",
                title: "Project Name"
            }, {
                field: "RAG"
            }, {
                title: "Projects Status",
                columns: [{
                    field: "Activities2",
                    title: "Activities"
                }, {
                    field: "Completed2",
                    title: "Completed"
                }, {
                    field: "InProgress2",
                    title: "In Progress"
                }, {
                    field: "Delay2",
                    title: "Delay"
                }]
            }, {
                title: "Overtime",
                columns: [{
                    field: "Workday2",
                    title: "Workday"
                }, {
                    field: "Holiday2",
                    title: "Holiday"
                }]
            }
        ]
    });
    
    // HCM - Operation Monitoring
    $("#grid_hcm_operation_monitoring").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "hcm_operation_monitoring_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "Status"
            }, {
                field: "ProjectGroup",
                title: "Project Group"
            }, {
                field: "NumberOfActivities",
                title: "Number of Activities"
            }, {
                field: "Delay"
            }, {
                field: "InProgress",
                title: "In Progress"
            }, {
                field: "ActivitiesClosed",
                title: "Activities Closed"
            }, {
                field: "StartDate",
                title: "Start Date"
            }, {
                field: "FinishedDate",
                title: "Finished Date"
            }
        ]
    });
    
    // HCM - Project Detail
    var dataSource_hcm_project_portfolio = new kendo.data.DataSource({
        transport: {
            read: {
                url: newPathname + "hcm_project_portfolio_get",
                dataType: "json"
            }
        },
        schema: {
            data: "data",
            total: "total"
        },
        pageSize: 20
    });
    
    $("#grid_hcm_project_portfolio1").kendoGrid({
        dataSource: dataSource_hcm_project_portfolio,
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No1",
                title: "No",
                width: 40,
                sortable: false
            }, {
                field: "ProjectName1",
                title: "Project Name"
            }, {
                field: "SoftwareRequirement1",
                title: "Software Requirement"
            }, {
                field: "Action1",
                title: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    $("#grid_hcm_project_portfolio2").kendoGrid({
        dataSource: dataSource_hcm_project_portfolio,
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No2",
                title: "No",
                width: 40,
                sortable: false
            }, {
                field: "ProjectName2",
                title: "Project Name"
            }, {
                field: "SoftwareRequirement2",
                title: "Software Requirement"
            }, {
                field: "Action2",
                title: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // HCM - Resource Competency
    $("#grid_hcm_resource_competency").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "hcm_resource_competency_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "ProjectName",
                title: "Project Name"
            }, {
                field: "SoftwareRequirement",
                title: "Software Requirement"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // HCM - Training
    $("#grid_hcm_training").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "hcm_training_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "Position"
            }, {
                field: "Client"
            }, {
                field: "POName",
                title: "PO Name"
            }, {
                field: "ProjectGroup",
                title: "Project Group"
            }, {
                field: "Project"
            }, {
                field: "Training"
            }, {
                field: "App"
            }
        ]
    });
    
    // User - User Lists
    $("#grid_user_lists").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "user_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "NIK"
            }, {
                field: "Role"
            }, {
                field: "Position"
            }, {
                field: "Company"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // Others - Company Lists
    $("#grid_company_lists").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "company_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // Others - Position Lists
    $("#grid_position_lists").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "position_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
    
    // Job - Analyst
    $("#grid_job_analyst_lists").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "job_analyst_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "Description",
                sortable: false
            }, {
                field: "Action",
                template: "#= data.Action #",
                width: 100,
                sortable: false
            }
        ]
    });
    
    // Job - Role
    $("#grid_job_role_lists").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "job_role_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "Description",
                sortable: false
            }, {
                field: "Action",
                template: "#= data.Action #",
                width: 100,
                sortable: false
            }
        ]
    });
    
    // Other - Project Type
    $("#grid_project_type_lists").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: newPathname + "project_type_get",
                    dataType: "json"
                }
            },
            schema: {
                data: "data",
                total: "total"
            },
            pageSize: 20
        },
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {
                field: "No",
                width: 40,
                sortable: false
            }, {
                field: "Name"
            }, {
                field: "Action",
                template: "#= data.Action #",
                sortable: false
            }
        ]
    });
});