<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property General_model $general_model 
 */
class Bin_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
                $this->load->model('general_model');
	}
        
        function get_bin_color_type_by_id($id)
        {
            return $this->general_model->getById('bin_type_color', 'id', $id);
        }
	
        function get_bin_type()
        {
            return $this->general_model->getAll('bin_type');
        }
        
        function get_bin_color()
        {
            return $this->general_model->getAll('bin_color');
        }

}