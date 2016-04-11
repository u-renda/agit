<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('company_model');
		$this->load->model('position_model');
		$this->load->model('user_model');
    }

    function user_create()
	{
		if ($this->input->post('submit') == TRUE)
		{
			$this->form_validation->set_rules('id_position', 'Position', 'required');
			$this->form_validation->set_rules('id_company', 'Company', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['id_position'] = $this->input->post('id_position');
				$param['id_company'] = $this->input->post('id_company');
				$param['email'] = $this->input->post('email');
				$param['username'] = $this->input->post('username');
				$param['password'] = md5($this->input->post('password'));
				$param['name'] = $this->input->post('name');
				$param['role'] = $this->input->post('role');
				$param['nik'] = $this->input->post('nik');
				$param['status'] = 1;
				$query = $this->user_model->create($param);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Create user');
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_user_lists'));
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$query = $this->position_model->lists(array());
		$query2 = $this->company_model->lists(array());
		$position_lists = array();
		$company_lists = array();
		
		if ($query->num_rows() > 0)
		{
			$position_lists = $query->result();
		}
		
		if ($query2->num_rows() > 0)
		{
			$company_lists = $query2->result();
		}
		
		$data = array();
		$data['position_lists'] = $position_lists;
		$data['company_lists'] = $company_lists;
		$data['code_user_role'] = $this->config->item('code_user_role');
		$data['frame_content'] = 'user/user_create';
		$this->load->view('template/frame', $data);
	}
	
	function user_delete()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');
		
		$get = $this->user_model->info(array('id_user' => $data['id']));
		
		if ($get->num_rows() > 0)
		{
			if ($this->input->post('delete'))
			{
				$query = $this->user_model->delete($data['id']);
				
				if ($query > 0)
				{
					// Logging
					logging_create('Delete user '.strtoupper($get->row()->name));
					
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
	
	function user_edit()
	{
		$data = array();
		$data['id'] = $this->input->get_post('id');
		$data['grid'] = $this->input->get_post('grid');
		
		$get = $this->user_model->info(array('id_user' => $data['id']));
		
		if ($get->num_rows() > 0)
		{
			if ($this->input->post('submit') == TRUE)
			{
				$this->form_validation->set_rules('id_position', 'Position', 'required');
				$this->form_validation->set_rules('id_company', 'Company', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('role', 'Role', 'required');
				
				if ($this->form_validation->run() == TRUE)
				{
					$param = array();
					$param['id_position'] = $this->input->post('id_position');
					$param['id_company'] = $this->input->post('id_company');
					$param['email'] = $this->input->post('email');
					$param['username'] = $this->input->post('username');
					$param['name'] = $this->input->post('name');
					$param['role'] = $this->input->post('role');
					$param['nik'] = $this->input->post('nik');
					
					if ($this->input->post('password') != '')
					{
						$param['password'] = md5($this->input->post('password'));
					}
					
					$query3 = $this->user_model->update($data['id'], $param);
					
					if ($query3 > 0)
					{
						// Logging
						logging_create('Update user '.$get->row()->id_user);
						
						$response =  array('msg' => 'Update data success', 'type' => 'success', 'grid' => $data['grid']);
					}
					else
					{
						$response =  array('msg' => 'Update data failed', 'type' => 'error');
					}
					
					echo json_encode($response);
					exit();
				}
			}
			else
			{
				$query = $this->position_model->lists(array());
				$query2 = $this->company_model->lists(array());
				$position_lists = array();
				$company_lists = array();
				
				if ($query->num_rows() > 0)
				{
					$position_lists = $query->result();
				}
				
				if ($query2->num_rows() > 0)
				{
					$company_lists = $query2->result();
				}
				
				$data['position_lists'] = $position_lists;
				$data['company_lists'] = $company_lists;
				$data['code_user_role'] = $this->config->item('code_user_role');
				$data['code_user_status'] = $this->config->item('code_user_status');
				$data['result'] = $get->row();
				$this->load->view('user/user_edit', $data);
			}
		}
		else
		{
			echo "Data Not Found";
		}
	}
	
	function user_get()
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
		
		$get = $this->user_model->lists(array());
		$total = $this->user_model->lists_count(array());
		
		if ($get->num_rows() > 0)
		{
			$code_user_role = $this->config->item('code_user_role');
			$jsonData = array('data' => array(), 'total' => $total);
			
			foreach ($get->result() as $row)
			{
				$action = '<a title="View" id="'.$row->id_user.'" class="view '.$row->id_user.'-view" href="#"><i class="fa fa-folder-open font-larger color-view"></i></a>&nbsp;
						<a title="Edit" id="'.$row->id_user.'" class="edit '.$row->id_user.'-edit" href="#"><i class="fa fa-pencil font-larger color-edit"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_user.'" class="delete '.$row->id_user.'-delete" href="#"><i class="fa fa-times font-larger color-delete"></i></a>';
				
				$nik = '-';
				if ($row->nik != '')
				{
					$nik = $row->nik;
				}
				
				$entry = array(
					'No' => $i,
					'Name' => ucwords($row->name),
					'NIK' => $nik,
					'Role' => ucwords($code_user_role[$row->role]),
					'Position' => $row->position_name,
					'Company' => $row->company_name,
					'Action' => $action
				);
				
				$jsonData['data'][] = $entry;
				$i++;
			}
			
			echo json_encode($jsonData);
		}
	}

    function user_lists()
	{
		$data = array();
		$data['frame_content'] = 'user/user_lists';
		$this->load->view('template/frame', $data);
	}

    function user_profile()
	{
		$data = array();
		$data['frame_content'] = 'user/user_profile';
		$this->load->view('template/frame', $data);
	}
	
	function user_view()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
		$data['action'] = $this->input->post('action');
		
		$get = $this->user_model->info(array('id_user' => $data['id']));
		
		if ($get->num_rows() > 0)
		{
			$code_user_role = $this->config->item('code_user_role');
			$result = $get->row_array();
			$result['role_name'] = $code_user_role[$result['role']];
			
			$data['result'] = (object) $result;
			$this->load->view('user/user_view', $data);
		}
		else
		{
			echo "Data Not Found";
		}
	}
}
