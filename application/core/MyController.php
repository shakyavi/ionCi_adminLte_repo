<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyController
 *
 * @author ubuntu
 */
class MyController extends CI_Controller {
    
       //put your code here
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
                  //Template::set_layout('template/admin');
	}

	// redirect if needed, otherwise display the user list
	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
                                                        //echo 'a';
			redirect('login/login/log', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{                   //echo 'b';
			// redirect them to the home page because they must be an administrator to view this
			//return show_error('You must be an administrator to view this page.');
                                                       //$this->_render_page('welcome/welcome_message', ' ');
                                                       //Template::render('admin/dashboard');
                                                        redirect('welcome/welcome','refresh');
		}
		else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
                        $this->session->set_userdata('userList',$this->data);
                        redirect('admin_manage_users/ManageUsers','refresh');
                        //$this->_render_page('login/adminLoggedIn', $this->data);
                        // Load the admin LTE login view
        //Template::set_layout('template/admin');
        //Template::render('login/adminLoggedIn',$this->data);
                        
		}
	}
        
        
                public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

    }
