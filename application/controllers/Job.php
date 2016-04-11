<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('job_analyst_model');
		$this->load->model('job_role_model');
    }

    function analyst_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['description'] = $this->input->post('description');
				$query = $this->job_analyst_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create job analyst');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_job_analyst_lists'));
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
		$data['frame_content'] = 'job/analyst_create';
		$this->load->view('template/frame', $data);
	}
	
	function analyst_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->job_analyst_model->info(array('id_job_analyst' => $data['id']));
		
		if ($get->num_rows() > 0)
		{
			if ($this->input->post('delete'))
			{
				$query = $this->job_analyst_model->delete($data['id']);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Delete job analyst '.strtoupper($get->row()->name));
					
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
	
	function analyst_get()
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
		
		$get = $this->job_analyst_model->lists(array());
		$total = $this->job_analyst_model->lists_count(array());
		
		if ($get->num_rows() > 0)
		{
			$jsonData = array('data' => array(), 'total' => $total);
			
			foreach ($get->result() as $row)
			{
				$action = '<a title="Edit" href="analyst_edit?id='.$row->id_job_analyst.'"><i class="fa fa-pencil font-larger color-edit"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_job_analyst.'" class="delete '.$row->id_job_analyst.'-delete" href="#"><i class="fa fa-times font-larger color-delete"></i></a>';
				
				$entry = array(
					'No' => $i,
					'Name' => ucwords($row->name),
					'Description' => $row->description,
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
			
			echo json_encode($jsonData);
		}
	}

    function analyst_lists()
	{
		$data = array();
		$data['frame_content'] = 'job/analyst_lists';
		$this->load->view('template/frame', $data);
	}

    function role_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['description'] = $this->input->post('description');
				$query = $this->job_role_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create job role');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_job_role_lists'));
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
		$data['frame_content'] = 'job/role_create';
		$this->load->view('template/frame', $data);
	}
	
	function role_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->job_role_model->info(array('id_job_role' => $data['id']));
		
		if ($get->num_rows() > 0)
		{
			if ($this->input->post('delete'))
			{
				$query = $this->job_role_model->delete($data['id']);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Delete job role '.strtoupper($get->row()->name));
					
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
	
	function role_get()
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
		
		$get = $this->job_role_model->lists(array());
		$total = $this->job_role_model->lists_count(array());
		
		if ($get->num_rows() > 0)
		{
			$jsonData = array('data' => array(), 'total' => $total);
			
			foreach ($get->result() as $row)
			{
				$action = '<a title="Edit" href="analyst_edit?id='.$row->id_job_role.'"><i class="fa fa-pencil font-larger color-edit"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_job_role.'" class="delete '.$row->id_job_role.'-delete" href="#"><i class="fa fa-times font-larger color-delete"></i></a>';
				
				$entry = array(
					'No' => $i,
					'Name' => ucwords($row->name),
					'Description' => $row->description,
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
			
			echo json_encode($jsonData);
		}
	}

    function role_lists()
	{
		$data = array();
		$data['frame_content'] = 'job/role_lists';
		$this->load->view('template/frame', $data);
	}
}
