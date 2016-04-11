<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('company_model');
		$this->load->model('position_model');
		$this->load->model('project_type_model');
    }

    function company_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['status'] = 1;
				$query = $this->company_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create company');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_company_lists'));
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
		$data['frame_content'] = 'others/company_create';
		$this->load->view('template/frame', $data);
	}
	
	function company_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->company_model->info(array('id_company' => $data['id']));
		
		if ($get->num_rows() > 0)
		{
			if ($this->input->post('delete'))
			{
				$query = $this->company_model->delete($data['id']);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Delete company '.strtoupper($get->row()->name));
					
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
	
	function company_get()
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
		
		$get = $this->company_model->lists(array());
		$total = $this->company_model->lists_count(array());
		
		if ($get->num_rows() > 0)
		{
			$jsonData = array('data' => array(), 'total' => $total);
			
			foreach ($get->result() as $row)
			{
				$action = '<a title="Edit" href="company_edit?id='.$row->id_company.'"><i class="fa fa-pencil font-larger color-edit"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_company.'" class="delete '.$row->id_company.'-delete" href="#"><i class="fa fa-times font-larger color-delete"></i></a>';
				
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

    function company_lists()
	{
		$data = array();
		$data['frame_content'] = 'others/company_lists';
		$this->load->view('template/frame', $data);
	}

    function position_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['status'] = 1;
				$query = $this->position_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create position');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_position_lists'));
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
		$data['frame_content'] = 'others/position_create';
		$this->load->view('template/frame', $data);
	}
	
	function position_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->position_model->info(array('id_position' => $data['id']));
		
		if ($get->num_rows() > 0)
		{
			if ($this->input->post('delete'))
			{
				$query = $this->position_model->delete($data['id']);
				
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
	
	function position_get()
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
		
		$get = $this->position_model->lists(array());
		$total = $this->position_model->lists_count(array());
		
		if ($get->num_rows() > 0)
		{
			$jsonData = array('data' => array(), 'total' => $total);
			
			foreach ($get->result() as $row)
			{
				$action = '<a title="Edit" href="position_edit?id='.$row->id_position.'"><i class="fa fa-pencil font-larger color-edit"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_position.'" class="delete '.$row->id_position.'-delete" href="#"><i class="fa fa-times font-larger color-delete"></i></a>';
				
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

    function position_lists()
	{
		$data = array();
		$data['frame_content'] = 'others/position_lists';
		$this->load->view('template/frame', $data);
	}
}
