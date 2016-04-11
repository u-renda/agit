<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hcm extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

    function activities_detail_lists()
	{
		$data = array();
		$data['frame_content'] = 'hcm/activities_detail_lists';
		$this->load->view('template/frame', $data);
	}

    function activities_monitoring_lists()
	{
		$data = array();
		$data['frame_content'] = 'hcm/activities_monitoring_lists';
		$this->load->view('template/frame', $data);
	}

    function operation_monitoring_lists()
	{
		$data = array();
		$data['frame_content'] = 'hcm/operation_monitoring_lists';
		$this->load->view('template/frame', $data);
	}

    function project_portfolio_lists()
	{
		$data = array();
		$data['frame_content'] = 'hcm/project_portfolio_lists';
		$this->load->view('template/frame', $data);
	}

    function resource_competency()
	{
		$data = array();
		$data['frame_content'] = 'hcm/resource_competency';
		$this->load->view('template/frame', $data);
	}

    function resource_setting()
	{
		$data = array();
		$data['frame_content'] = 'hcm/resource_setting';
		$this->load->view('template/frame', $data);
	}

    function training_lists()
	{
		$data = array();
		$data['frame_content'] = 'hcm/training_lists';
		$this->load->view('template/frame', $data);
	}
}
