<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Section_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'section';
        $this->log_user = FALSE;
    }

    function get_all($limit=5,$start=0,$return_type = 0)
    {   
        $this->select('section.*, IFNULL(cs.title, "None") as parent_section', FALSE)->join($this->table.' as cs','cs.id = section.parent_id', 'left');
        return parent::get_all($limit,$start,$return_type);
    }
    
    function check_child_sections($id)
    {
        return $this->db->where("parent_id = $id")->count_all_results($this->table);
        
    }
    function check_section_pages($id)
    {
        return $this->db->where("section_id = $id")->count_all_results('pages');
        
    }
 public function record_count(){
        return $this->db->count_all("section");
    }
    
}
