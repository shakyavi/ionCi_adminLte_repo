<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminCalendar
 *
 * @author ubuntu
 */
class AdminCalendar extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
    }
    public function index(){
         if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() )
		{
			// redirect them to the login page
                                                        //echo 'a';
			redirect('login/login/log', 'refresh');
		}
		elseif ($this->ion_auth->is_admin() && $this->ion_auth->logged_in()) // remove this elseif if you want to enable this for non-admins
		{                   //echo 'b';
			// redirect them to the home page because they must be an administrator to view this
			//return show_error('You must be an administrator to view this page.');
                                                       //$this->_render_page('welcome/welcome_message', ' ');
                                                       //Template::render('admin/dashboard');
                                                        //redirect('welcome/welcome','refresh');
                     $data = ' ';
                    Template::set_layout('template/admin');
        Template::render('admin_calendar/calendar',$data);
		}
      
    }
}
