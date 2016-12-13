<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'pages';
        $this->field_prefix = '';
        $this->set_modified = TRUE;
        $this->set_created = TRUE;
        $this->log_user = FALSE;
    }

    function get_all($limit=5,$start=0,$return_type = 0)
    {
        $this->select('pages.*, s.title as section')->join('section as s','s.id = section_id');
        return parent::get_all($limit,$start,$return_type);
    }
    
    function get_page_detail($id)
    {
        $select = "*"
                . ",pages.id as id"
                . ",calendar_bin_type.bin_type_color_id as calendar_bin_type_color_id"
                . ",calendar_bin_type.bin_type as calendar_bin_type_bt"
//                . ",waste_bin_type.bin_type_color_id as waste_bin_type_color_id"
                . ",waste_bin_type.bin_type_id as waste_bin_type_id"
                . ",waste_bin_type.bin_color_id as waste_bin_color_id"
                . ",cal_btc.bin_type_id as cal_bin_type_id"
                . ",cal_btc.bin_color_id as cal_bin_color_id";
        return $this->select($select)
                ->join('calendar_bin_type','calendar_bin_type.page_id = pages.id','left')
                ->join('waste_bin_type','waste_bin_type.page_id = pages.id','left')
//                ->join('bin_type_color','waste_bin_type.bin_type_color_id = bin_type_color.id','left')
                ->join('bin_type_color as cal_btc','calendar_bin_type.bin_type_color_id = cal_btc.id','left')
                ->get($id);
    }
    
    function save_calendar_bin_type($data)
    {
        $keys = array_keys($data);
        $insert = implode(',',$keys);
        $values = array();
        foreach($keys as $val) {
            $values[] = "'{$data[$val]}'";
        }
        $values = implode(',',$values);
        $update = array();
        unset($data['page_id']);
        
        foreach($data as $key=>$val) {
            $update[] = " {$key} = '{$val}'";
        }
        $update = implode(',',$update);
//        
        $query = "INSERT INTO `calendar_bin_type` ({$insert})
                VALUES ({$values})
                ON DUPLICATE KEY UPDATE {$update} 
                ";
                
        return $this->db->query($query);
        
    }
    function save_waste_bin_type($data)
    {
        $keys = array_keys($data);
        $insert = implode(',',$keys);
        $values = array();
        foreach($keys as $val) {
            $values[] = "'{$data[$val]}'";
        }
        $values = implode(',',$values);
        $update = array();
        unset($data['page_id']);
        
        foreach($data as $key=>$val) {
            $update[] = " {$key} = '{$val}'";
        }
        $update = implode(',',$update);
//        
        $query = "INSERT INTO `waste_bin_type` ({$insert})
                VALUES ({$values})
                ON DUPLICATE KEY UPDATE {$update} 
                ";
                
        return $this->db->query($query);
        
    }
    
    function delete_calendar_bin_type($id)
    {
        return $this->db->delete('calendar_bin_type',"page_id = {$id}");
    }
    
    function delete_waste_bin_type($id)
    {
        return $this->db->delete('waste_bin_type',"page_id = {$id}");
    }
    
    public function record_count(){
        return $this->db->count_all("pages");
    }
  }
