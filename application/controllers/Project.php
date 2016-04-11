<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('company_model');
		$this->load->model('project_issue_model');
		$this->load->model('project_model');
		$this->load->model('project_task_model');
		$this->load->model('project_type_model');
		$this->load->model('user_model');
    }
	
	function project_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('id_company', 'Company', 'required');
			$this->form_validation->set_rules('id_project_type', 'Project Type', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('division', 'Division', 'required');
			$this->form_validation->set_rules('department', 'Department', 'required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				// Project type = others
				$id_project_type = $this->input->post('id_project_type');
				
				if ($this->input->post('project_type_others_name') != '')
				{
					$param2 = array();
					$param2['name'] = $this->input->post('project_type_others_name');
					$id_project_type = $this->project_type_model->create($param2);
				}
				
				$param = array();
				$param['id_company'] = $this->input->post('id_company');
				$param['id_project_type'] = $id_project_type;
				$param['name'] = $this->input->post('name');
				$param['requirement'] = $this->input->post('requirement');
				$param['description'] = $this->input->post('description');
				$param['division'] = $this->input->post('division');
				$param['department'] = $this->input->post('department');
				$param['start_date'] = date('Y-m-d', strtotime($this->input->post('start_date')));
				$param['end_date'] = date('Y-m-d', strtotime($this->input->post('end_date')));
				$param['status'] = 2;
				$query = $this->project_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create project');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_project_lists'));
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data = array();
		$query3 = $this->company_model->lists(array());
		
		if ($query3->num_rows() > 0)
		{
			$data['company_lists'] = $query3->result();
		}
		
		$query2 = $this->project_type_model->lists(array());
		
		if ($query2->num_rows() > 0)
		{
			$data['project_type_lists'] = $query2->result();
		}
		
		$data['frame_content'] = 'project/project_create';
		$this->load->view('template/frame', $data);
	}
	
	function project_document_lists()
	{
		//if ($this->input->get('id_project') == FALSE) { redirect($this->config->item('link_project_lists')); }
		
		$data = array();
		$data['frame_content'] = 'project/project_document_lists';
		$this->load->view('template/frame', $data);
	}
	
	function project_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
		$pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
		$offset = ($page - 1) * $pageSize;
		$i = $offset * 1 + 1;
		
		if ($this->input->post('sort'))
		{
			$order = $_POST['sort'][0]['field'];
			$sort = $_POST['sort'][0]['dir'];
		}
		
		if ($this->input->post('filter'))
		{
			$q = $_POST['filter']['filters'][0]['value'];
		}
		
		$get = $this->project_model->lists(array());
		$total = $this->project_model->lists_count(array());
		
		if ($get->num_rows() > 0)
		{
			$jsonData = array('data' => array(), 'total' => $total);
			
			foreach ($get->result() as $row)
			{
				// Duration
				$start_date = new DateTime($row->start_date);
				$end_date = new DateTime($row->end_date);
				$duration = $end_date->diff($start_date);
				
				// Finished date
				$finished_date = '-';
				
				if ($row->finished_date != '0000-00-00 00:00:00')
				{
					$finished_date = $row->finished_date;
				}
				
				// Status - color
				$status = color_project_status($row->status);
				
				// Project name
				$project = '<a title="Overview" href="'.$this->config->item('link_project_overview_lists').'?id_project='.$row->id_project.'">'.ucwords($row->name).'</a>';
				
				$entry = array(
					'No' => $i,
					'Projects' => $project,
					'Duration' => $duration->format('%a'),
					'Started' => $row->start_date,
					'Target' => $row->end_date,
					'Finished' => $finished_date,
					'Percent' => '',
					'Status' => $status
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
			
			echo json_encode($jsonData);
		}
	}
	
	function project_issue_lists()
	{
		//if ($this->input->get('id_project') == FALSE) { redirect($this->config->item('link_project_lists')); }
		
		$data = array();
		$data['frame_content'] = 'project/project_issue_lists';
		$this->load->view('template/frame', $data);
	}
	
	function project_lists()
	{
		// delete session id_project
		$this->session->unset_userdata('id_project');
		
		$data = array();
		$data['frame_content'] = 'project/project_lists';
		$this->load->view('template/frame', $data);
	}
	
	function project_overtime_lists()
	{
		//if ($this->input->get('id_project') == FALSE) { redirect($this->config->item('link_project_lists')); }
		
		$data = array();
		$data['frame_content'] = 'project/project_overtime_lists';
		$this->load->view('template/frame', $data);
	}
	
	function project_overview_get1()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
		$pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
		$offset = ($page - 1) * $pageSize;
		
		if ($this->input->post('sort'))
		{
			$order = $_POST['sort'][0]['field'];
			$sort = $_POST['sort'][0]['dir'];
		}
		
		if ($this->input->post('filter'))
		{
			$q = $_POST['filter']['filters'][0]['value'];
		}
		
		//$get = $this->project_task_model->lists(array('group_by' => 'group'));
		//
		//if ($get->num_rows() > 0)
		//{
			$code_project_task_group = $this->config->item('code_project_task_group');
			$jsonData = array('data' => array());
			
			foreach ($code_project_task_group as $key => $val)
			{
				// group by group_task-nya trs cek statusnya -> baru diitung brp persennya
				$complete = 0;
				$delay = 0;
				$count1 = $this->project_task_model->lists_count(array('group_task' => $key));
				
				if ($count1 > 0)
				{
					
				}
				
				$entry = array(
					'Tasks' => ucwords($val),
					'Complete' => '',
					'Delay' => '',
					'RAG' => ''
				);
				
				$jsonData['data'][] = $entry;
			}
			
			echo json_encode($jsonData);
		//}
	}
	
	function project_overview_lists()
	{
		if ($this->input->get('id_project') == FALSE) { redirect($this->config->item('link_project_lists')); }
		
		// Create session for id_project
		$id_project = $this->input->get('id_project');
		$this->session->set_userdata(array('id_project' => $id_project));
		
		$get = $this->project_model->info(array('id_project' => $id_project));
		
		if ($get->num_rows() > 0)
		{
			$data = array();
			$project = $get->row();
			
			// Issue
			$data['issue_critical'] = $this->project_issue_model->lists_count(array('id_project' => $id_project, 'category' => 1, 'status' => 2));
			$data['issue_major'] = $this->project_issue_model->lists_count(array('id_project' => $id_project, 'category' => 2, 'status' => 2));
			$data['issue_minor'] = $this->project_issue_model->lists_count(array('id_project' => $id_project, 'category' => 3, 'status' => 2));

			// Ongoing activities
			
			
			$data['project'] = $project;
			$data['frame_content'] = 'project/project_overview_lists';
			$this->load->view('template/frame', $data);
		}
		else
		{
			echo "Data Not Found";
		}
	}
	
	function project_task_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('id_user', 'PIC Name', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('group', 'Group', 'required');
			$this->form_validation->set_rules('start_date', 'Description', 'required');
			$this->form_validation->set_rules('end_date', 'Division', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['id_project'] = $this->session->userdata('id_project');
				$param['id_user'] = $this->input->post('id_user');
				$param['name'] = $this->input->post('name');
				$param['status'] = 2;
				$param['group_task'] = $this->input->post('group_task');
				$param['start_date'] = date('Y-m-d', strtotime($this->input->post('start_date')));
				$param['end_date'] = date('Y-m-d', strtotime($this->input->post('end_date')));
				$query = $this->project_task_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create project task');
					redirect($this->config->item('link_project_timeline_lists'));
				}
			}
		}
		
		$data = array();
		$query3 = $this->user_model->lists(array());
		
		if ($query3->num_rows() > 0)
		{
			$data['user_lists'] = $query3->result();
		}
		
		$data['code_project_task_group'] = $this->config->item('code_project_task_group');
		$data['frame_content'] = 'project/project_task_create';
		$this->load->view('template/frame', $data);
	}
	
	function project_timeline_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
		$pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
		$offset = ($page - 1) * $pageSize;
		
		if ($this->input->post('sort'))
		{
			$order = $_POST['sort'][0]['field'];
			$sort = $_POST['sort'][0]['dir'];
		}
		
		if ($this->input->post('filter'))
		{
			$q = $_POST['filter']['filters'][0]['value'];
		}
		
		$get = $this->project_task_model->lists(array());
		$total = $this->project_task_model->lists_count(array());
		
		if ($get->num_rows() > 0)
		{
			$code_project_task_group = $this->config->item('code_project_task_group');
			$jsonData = array('data' => array(), 'total' => $total);
			
			foreach ($get->result() as $row)
			{
				// Finished date
				$finished_date = '-';
				
				if ($row->finished_date != '0000-00-00 00:00:00')
				{
					$finished_date = $row->finished_date;
				}
				
				// Status - color
				$status = color_project_task_status($row->status);
				
				// Task name
				//$task_name = '<strong>'.ucwords($code_project_task_group[$row->group]).'</strong>';
				
				$action = '<a title="Edit" href="position_edit?id='.$row->id_project_task.'"><i class="fa fa-pencil font-larger color-edit"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_project_task.'" class="delete '.$row->id_project_task.'-delete" href="#"><i class="fa fa-times font-larger color-delete"></i></a>';
				
				$entry = array(
					'TaskName' => ucwords($row->name),
					'PIC' => ucwords($row->user_name),
					'Start' => $row->start_date,
					'Target' => $row->end_date,
					'Finish' => $finished_date,
					'Status' => $status,
					'Group' => ucwords($code_project_task_group[$row->group]),
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
			}
			
			echo json_encode($jsonData);
		}
	}
	
	function project_timeline_lists()
	{
		//if ($this->input->get('id_project') == FALSE) { redirect($this->config->item('link_project_lists')); }
		
		$data = array();
		$query = $this->project_model->info(array('id_project' => $this->session->userdata('id_project')));
		
		if ($query->num_rows() > 0)
		{
			$data['project_name'] = ucwords($query->row()->name);
		}
		
		$data['frame_content'] = 'project/project_timeline_lists';
		$this->load->view('template/frame', $data);
	}

    function project_type_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$query = $this->project_type_model->create($param);
				
				if ($query != 0 || $query != '')
				{
					// Logging
					logging_create('Create project type');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_project_type_lists'));
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data = array();
		$data['frame_content'] = 'project/project_type_create';
		$this->load->view('template/frame', $data);
	}
	
	function project_type_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->project_type_model->info(array('id_project_type' => $data['id']));
		
		if ($get->num_rows() > 0)
		{
			if ($this->input->post('delete'))
			{
				$query = $this->project_type_model->delete($data['id']);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Delete position '.strtoupper($get->row()->name));
					
					$response =  array('msg' => 'Delete data success', 'type' => 'success');
				}
				else
				{
					$response =  array('msg' => 'Delete data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
			else
			{
				$this->load->view('delete_confirm', $data);
			}
		}
		else
		{
			echo "Data Not Found";
		}
	}
	
	function project_type_get()
	{
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
		$pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
		$offset = ($page - 1) * $pageSize;
		$i = $offset * 1 + 1;
		
		if ($this->input->post('sort'))
		{
			$order = $_POST['sort'][0]['field'];
			$sort = $_POST['sort'][0]['dir'];
		}
		
		if ($this->input->post('filter'))
		{
			$q = $_POST['filter']['filters'][0]['value'];
		}
		
		$get = $this->project_type_model->lists(array());
		$total = $this->project_type_model->lists_count(array());
		
		if ($get->num_rows() > 0)
		{
			$jsonData = array('data' => array(), 'total' => $total);
			
			foreach ($get->result() as $row)
			{
				$action = '<a title="Edit" href="position_edit?id='.$row->id_project_type.'"><i class="fa fa-pencil font-larger color-edit"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_project_type.'" class="delete '.$row->id_project_type.'-delete" href="#"><i class="fa fa-times font-larger color-delete"></i></a>';
				
				$entry = array(
					'No' => $i,
					'Name' => ucwords($row->name),
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
			
			echo json_encode($jsonData);
		}
	}

    function project_type_lists()
	{
		$data = array();
		$data['frame_content'] = 'project/project_type_lists';
		$this->load->view('template/frame', $data);
	}
	
	function project_visit_lists()
	{
		//if ($this->input->get('id_project') == FALSE) { redirect($this->config->item('link_project_lists')); }
		
		$data = array();
		$data['frame_content'] = 'project/project_visit_lists';
		$this->load->view('template/frame', $data);
	}
}
