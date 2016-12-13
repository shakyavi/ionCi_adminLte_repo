<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManageUsers
 *
 * @author ubuntu
 */
class ManageUsers extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
                       if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() )
		{
			// redirect them to the login page
                                                        //echo 'a';
			redirect('login/login/log', 'refresh');
		}
    }
    
    public function index(){
                     $data = $this->session->userdata('userList');
                                                        Template::set_layout('template/admin');
        Template::render('admin_manage_users/adminLoggedIn',$data);
		
    }
}
