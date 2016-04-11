<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_setting extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		//if ($this->input->get('id_project') == FALSE) { redirect($this->config->item('link_project_lists')); }
    }
	
	function project_info()
	{
		$data = array();
		$data['frame_content'] = 'project_setting/project_info';
		$this->load->view('template/frame', $data);
	}
	
	function project_member()
	{
		$data = array();
		$data['frame_content'] = 'project_setting/project_member';
		$this->load->view('template/frame', $data);
	}
}
