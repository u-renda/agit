<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
		
		$this->load->model('project_issue_model');
		$this->load->model('project_model');
		$this->load->model('project_user_model');
		$this->load->model('user_overtime_model');
    }

    function project_monitoring_lists()
	{
		$data = array();
		// Total Project
		$data['total_project'] = $this->project_model->lists_count(array());
		
		// Project by status
		$data['project_closed'] = $this->project_model->lists_count(array('status' => 1));
		$data['project_in_progress'] = $this->project_model->lists_count(array('status' => 3));
		
		// Issue by category
		$data['issue_critical'] = $this->project_issue_model->lists_count(array('category' => 1, 'status' => 2));
		$data['issue_major'] = $this->project_issue_model->lists_count(array('category' => 2, 'status' => 2));
		$data['issue_minor'] = $this->project_issue_model->lists_count(array('category' => 3, 'status' => 2));
		
		// Percent
		$project_closed_percent = 0;
		$project_in_progress_percent = 0;
		
		if(isset($total_project) && $total_project != 0)
		{
			$project_closed_percent = ($project_closed/$total_project)*100;
			$project_in_progress_percent = ($project_in_progress/$total_project)*100;
		}
		
		$data['project_closed_percent'] = $project_closed_percent;
		$data['project_in_progress_percent'] = $project_in_progress_percent;
		$data['frame_content'] = 'home/project_monitoring_lists';
		$this->load->view('template/frame', $data);
	}
	
	function project_monitoring_get()
	{
        $get_open = $this->project_model->lists_count(array('status' => 1));
        $get_progress = $this->project_model->lists_count(array('status' => 2));
        $get_closed = $this->project_model->lists_count(array('status' => 3));
		$title = array('Open', 'In Progress', 'Closed', '-> Actual', '-> On This Month');
		
		// Belum pecah data untuk tiap bulannya
		$jsonData = array('data' => array());
		
		foreach ($title as $key => $val)
		{
			$entry = array(
				'ProjectActivities' => $val,
				'Total' => 1,
				'Jan' => 2,
				'Feb' => 3,
				'Mar' => 4,
				'Apr' => 5,
				'May' => 6,
				'Jun' => 2,
				'Jul' => 4,
				'Aug' => 3,
				'Sep' => 4,
				'Oct' => 1,
				'Nov' => 7,
				'Dec' => 4
			);
			
			$jsonData['data'][] = $entry;
		}
		
		echo json_encode($jsonData);
	}

    function resource_monitoring_lists()
	{
		$data = array();
		$data['frame_content'] = 'home/resource_monitoring_lists';
		$this->load->view('template/frame', $data);
	}
	
	function resource_monitoring_get()
	{
		// Project User
		$query = $this->project_user_model->lists(array('group_by' => 'id_user'));
		
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$id_user = $row->id_user;
				
				// Count Project per user
				$total_project = $this->project_user_model->lists_count(array('id_user' => $id_user));
				
				// Count Project by status
				$param3 = array();
				$param3['id_user'] = $id_user;
				$param3['status'] = 1;
				$project_completed = $this->project_model->lists_count($param3);
				
				$param4 = array();
				$param4['id_user'] = $id_user;
				$param4['status'] = 3;
				$project_in_progress = $this->project_model->lists_count($param4);
				
				$param5 = array();
				$param5['id_user'] = $id_user;
				$param5['status'] = 4;
				$project_delay = $this->project_model->lists_count($param5);
				
				// Overtime by category
				$param = array();
				$param['id_user'] = $id_user;
				$param['category'] = 1;
				$overtime_workday = $this->user_overtime_model->lists_count($param);
				
				$param2 = array();
				$param2['id_user'] = $id_user;
				$param2['category'] = 2;
				$overtime_holiday = $this->user_overtime_model->lists_count($param2);
			}
		}
	}
}
