<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }

    function complaint_lists()
	{
		$data = array();
		$data['frame_content'] = 'complaint/complaint_lists';
		$this->load->view('template/frame', $data);
	}
}
