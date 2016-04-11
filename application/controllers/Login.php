<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
		$this->load->model('logging_model');
		$this->load->model('position_model');
    }

    function check_password($password, $username)
    {
        $result = user_valid(array('username' => $username, 'password' => $password));
		
        if ($result == TRUE)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_password', 'Wrong Username or Password');
            return FALSE;
        }
    }

	function index()
	{
        if ($this->session->userdata('is_login') == TRUE) { redirect($this->config->item('link_project_monitoring_lists')); }
		
		$code_user_role = $this->config->item('code_user_role');
        
		$data = array();
		if ($this->input->cookie('username') != '' && $this->input->cookie('password') != '')
		{
			$username = decode($this->input->cookie('username'), $this->config->item('cookie_key'));
			$getdata = $this->user_model->info(array('username' => $username));
			
			if ($getdata->num_rows() > 0)
			{
				$admin = $getdata->row();
				$check_pass = sha1($admin->password);
				
				if ($check_pass == $this->input->cookie('password'))
				{
					$query3 = $this->position_model->info(array('id_position' => $admin->id_position, 'status' => 1));
					
					$position = '-';
					if ($query3->num_rows() > 0)
					{
						$position = $query3->row()->name;
					}
					
					$cached = array(
						'id_user'=> $admin->id_user,
						'username'=> $admin->username,
						'name'=> $admin->name,
						'email'=> $admin->email,
						'role'=> $code_user_role[$admin->role],
						'position'=> $position,
						'nik'=> $admin->nik,
						'is_login' => TRUE
					);
					
					// Set session
					$this->session->set_userdata($cached);
					
					// Logging
					logging_create('Login');
					
					redirect($this->config->item('link_project_monitoring_lists'));
				}
			}
		}
		elseif ($this->input->post('submit'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_password['.$this->input->post('username').']');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$query = $this->user_model->info(array('username' => $this->input->post('username')));

				if ($query->num_rows() > 0)
				{
					$admin = $query->row();
					
					$query3 = $this->position_model->info(array('id_position' => $admin->id_position, 'status' => 1));
					
					$position = '-';
					if ($query3->num_rows() > 0)
					{
						$position = $query3->row()->name;
					}
					
					$cached = array(
						'id_user'=> $admin->id_user,
						'username'=> $admin->username,
						'name'=> $admin->name,
						'email'=> $admin->email,
						'role'=> $code_user_role[$admin->role],
						'position'=> $position,
						'nik'=> $admin->nik,
						'is_login' => TRUE
					);
					
					// Set session
					$this->session->set_userdata($cached);

					// Set cookie
					if ($this->input->post('logged'))
					{
						$cookie_user = encode($username, $this->config->item('cookie_key'));
						$cookie_pass = sha1($admin->password);
						
						$cookie_username = array(
							'name' => 'username',
							'value' => ''.$cookie_user.'',
							'expire' => '1728000'
						);
						$cookie_password = array(
							'name' => 'password',
							'value' => ''.$cookie_pass.'',
							'expire' => '1728000'
						);
						
						$this->input->set_cookie($cookie_username);
						$this->input->set_cookie($cookie_password);
					}
					
					// Logging
					logging_create('Login');
					
					redirect($this->config->item('link_project_monitoring_lists'));
				}
			}
		}
		
        $this->load->view('login');
	}

    function logout()
    {
		if ($this->session->userdata('id_user') == TRUE)
		{
			logging_create('Logout');
		}
		
		$this->session->sess_destroy();
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('position');
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('id_project');
		
		delete_cookie('username');
		delete_cookie('password');
		
        redirect($this->config->item('link_login'));
    }
}
