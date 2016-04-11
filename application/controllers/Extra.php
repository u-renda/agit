<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
    }

    function check_username()
	{
		$selfusername = $this->input->post('selfusername');
		$username = $this->input->post('username');
		$result = $this->user_model->info(array('username' => $username));
	
		if ($result->num_rows() > 0 && $selfusername != $username)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
}
