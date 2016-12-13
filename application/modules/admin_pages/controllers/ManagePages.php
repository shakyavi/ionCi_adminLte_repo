<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManagePages
 *
 * @author ubuntu
 */
class ManagePages extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
         $this->load->model('page_model');
        $this->load->helper('image');
        $this->data['logo_error'] = '';
        
        $title = "Manage Pages";
        Template::set('title', $title);
        Template::add_title_segment($title);
               if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() )
		{
			redirect('login/login/log', 'refresh');
		}
    }
    
    public function index(){
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('index.php/admin_pages/ManagePages/');
        $config['total_rows']= $this->page_model->record_count();
        $config['per_page']=10;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $page= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$this->data['pg'] = $this->page_model->fetch($config['per_page'], $page);
         $this->data['pages'] = $this->page_model->get_all($config['per_page'], $page);
        //$this->data['count']= $this->page_model->record_count();
           Template::set_layout('template/admin');
        Template::render('index', $this->data);
            }
            
    public function addPages(){
         $this->data['data'] = "Hello pages";
                                                        Template::set_layout('template/admin');
        Template::render('admin_pages/addPagesView',  $this->data);
    }
    
      
    public function _remap($method, $params) {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else
            return $this->index($method);
    }
    
 

    function add() {
        if ($this->input->post()) {
            $this->_add_edit_page(0);
        }

        $this->data['edit'] = FALSE;
               
        $this->_load_required_data();
        Template::set_layout('template/admin');
        Template::render('admin_pages/form', $this->data);
    }

    function edit($id = 0) {
        $id = (int) $id;
       
        $id || redirect('admin/pages');
 
//        $this->data['page_detail'] = $this->page_model->select("*,pages.id as id,calendar_bin_type.bin_type_color_id as calendar_bin_type_color_id,waste_bin_type.bin_type_color_id as waste_bin_type_color_id")->join('calendar_bin_type','calendar_bin_type.page_id = pages.id','left')->join('waste_bin_type','waste_bin_type.page_id = pages.id','left')->get($id);
        $this->data['page_detail'] = $this->page_model->get_page_detail($id);
        $this->data['page_detail'] || redirect('admin/page/');
        $this->data['edit'] = TRUE;
        //echo var_dump($this->data['page_detail']);
//debug($this->data['page_detail']);die;
        if ($this->input->post()) {
        //    echo $id;
        $this->_add_edit_page($id);
        }                
        
        $this->_load_required_data();
        echo $id;
        Template::set_layout('template/admin');
        Template::render('admin_pages/form', $this->data);
    }
    
    private function _load_required_data()
    {
        $this->load->helper(array('form', 'ckeditor'));
        
        $this->load->model(array('admin_sections/section_model'));
        $this->data['sections'] = render_select($this->section_model->get_all(), 'section_id', set_value('section_id',$this->data['edit'] ? $this->data['page_detail']->section_id : ''), 'class="form-control"  id="section_id" ');

        $this->load->model('bin_model');
        $binMdl = $this->bin_model;
        $bin_types_options = $bin_types = $binMdl->get_bin_type();
        $bin_type = '';
        $bin_color = '';
        $cal_type = '';
        
        //for waste material
        if($this->data['edit'] and $this->data['page_detail']->section_id == 2) {
            
            $sel_opt = new stdClass();
            $sel_opt->id = '0';
            $sel_opt->title = 'All';
            array_unshift($bin_types, $sel_opt);
            
            $bin_color_id = '';
//            if($bin_type_color_id = $this->data['page_detail']->waste_bin_type_color_id) {
                $bin_type = $this->data['page_detail']->waste_bin_type_id;
                $bin_color_id = $this->data['page_detail']->waste_bin_color_id;
                
//            }
            
            $bin_color = $this->db->from('bin_type_color')->join('bin_color','bin_color_id = bin_color.id')->where('bin_type_id',$bin_type)->get()->result();
            
            $bin_color = render_select($bin_color, 'bin_color', $bin_color_id , 'class="form-control"  id="bin_color" ','id','color',array('set_top_blank'=>TRUE));
            
            if($bin_color)
                $bin_color = "
                    <div class=\"form-group\">
                        <label for=\"bin_color\" class=\"control-label col-lg-3\">Color *</label>
                        <div class=\"col-lg-5\">
                            $bin_color
                        </div>
                    </div>";
            
        }
        //for calendar
        elseif($this->data['edit'] and $this->data['page_detail']->section_id == 3) {
            
            $cal_type = $this->data['page_detail']->type_of_calendar;
            $bin_color_id = $this->data['page_detail']->calendar_bin_type_bt ?: '';
            $bin_type = $this->data['page_detail']->bin_type;
            if($bin_type_color_id = $this->data['page_detail']->calendar_bin_type_color_id) {
                $bin_type = $this->data['page_detail']->cal_bin_type_id;
                $bin_color_id = $this->data['page_detail']->cal_bin_color_id;
                
            }
            
            $bin_color = $this->db->from('bin_type_color')->join('bin_color','bin_color_id = bin_color.id')->where('bin_type_id',$bin_type)->get()->result();
            
            $bin_color = render_select($bin_color, 'bin_color', $bin_color_id , 'class="form-control"  id="bin_color" ','id','color');
            
            if($bin_color)
                $bin_color = "
                    <div class=\"form-group\">
                        <label for=\"bin_color\" class=\"control-label col-lg-3\">Color *</label>
                        <div class=\"col-lg-5\">
                            $bin_color
                        </div>
                    </div>";
            

        }
        
        //option for calendar bin type
        
        $this->data['bin_type'] = render_select($bin_types, 'bin_type', set_value('bin_type',$this->data['edit'] ? $bin_type : ''), 'class="form-control"  id="bin_type" ');
        $this->data['bin_color'] = $bin_color;
        
        $this->data['cal_bin_type_option'] = render_select_option($bin_types_options);

        $sel_opt = new stdClass();
        $sel_opt->id = '0';
        $sel_opt->title = 'All';
        array_unshift($bin_types_options, $sel_opt);

        $this->data['waste_bin_type_option'] = render_select_option($bin_types_options);
        
        $this->data['type_of_calendar'] = form_dropdown('type_of_calendar', config_item('type_of_calendar'), $cal_type, 'class="form-control" id="type_of_calendar" ');

        Template::add_css(base_url()."assets/lib/jasny/css/jasny-bootstrap.min.css");
        Template::add_js( base_url()."assets/lib/jasny/js/jasny-bootstrap.min.js", TRUE);
        Template::add_js( base_url()."assets/lib/jquery.blockUI.js", TRUE);
        
        Template::add_css( base_url()."assets/lib/validationEngine/css/validationEngine.jquery.css");
        Template::add_js( base_url()."assets/lib/validationengine/js/jquery.validationEngine.js", TRUE);
        Template::add_js( base_url()."assets/lib/validationengine/js/languages/jquery.validationEngine-en.js", TRUE);
        
    }

    function _add_edit_page($id) {
      //  echo "<br> id =".$id;
        $this->load->library('form_validation');
        
        $data = $this->input->post();
        
        $this->form_validation->set_rules(
                array(
                    array('field' => 'page_title', 'label' => 'Title', 'rules' => 'required|trim|min_length[2]'),
                    array('field' => 'section_id', 'label' => 'Section', 'rules' => 'trim|required'),
                    array('field' => 'page_description', 'label' => 'Short description', 'rules' => 'trim'),
                    array('field' => 'page_content', 'label' => 'Content', 'rules' => 'trim'),
                    array('field' => 'allowed', 'label' => 'Allowed', 'rules' => 'trim'),
                    array('field' => 'not_allowed', 'label' => 'Not Allowed', 'rules' => 'trim'),
                    array('field' => 'page_content', 'label' => 'Content', 'rules' => 'trim'),
                    array('field' => 'page_status', 'label' => 'Status', 'rules' => 'trim'),
                )
        );

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run($this) === FALSE) {
            return FALSE;
        }
		
        $page_image = NULL;
        //echo $_FILES('page_image');
        if($_FILES['page_image']['name']) {
                if($result = upload_image('page_image', config_item('page_image_root'),FALSE)) {				
                        $image_path = config_item('page_image_root').$result;
//                        echo "<br>result = ".$result;
//                        echo "<br> image path = ".$image_path;
                        list($width, $height, $imgtype, $attr) = getimagesize($image_path);
    //				resize of file uploaded
                        if($width > 800 || $height > 600) {
                                create_thumb($image_path,$image_path, array('w'=>'800','h'=>'600'), TRUE);
                        }
                        $page_image = $result;
                } else {
                        $this->data['logo_error'] = $this->upload->display_errors('<span class="help-block">','</span>');
                        return FALSE;
                }
        }

        unset($data['page_image']);

        !$page_image || ($data['page_image'] = $page_image);

        $data['page_status'] = $this->input->post('page_status') ? '1' : '0';
        
        //set type of waste 0 if section is not waste
        if($data['section_id'] != 2)    $data['type_of_waste'] = '0';
        
        //set type of waste 0 if section is not calendar
        if($data['section_id'] != 3) {
            $data['type_of_calendar'] = '0';
        } else {
            $data['page_description'] = '';
            $data['page_content'] = '';
            $data['page_image'] = '';
            $data['latitude'] = '';
            $data['longitude'] = '';
            
        }

        $this->load->model('general_model');
        if ($id == 0) {
            if($page_id = $this->page_model->insert($data)) {
                //save bin type if section is calendar 
                if($data['section_id'] == 3) {
                    if($data['type_of_calendar'] == '1') {
                        $bin_type_color_id = (int) @$this->general_model->get_single_row('bin_type_color',array('bin_type_id'=>$data['bin_type'],'bin_color_id'=>$data['bin_color']))->id;
                        
                    } else $bin_type_color_id = 0;
                    $insArr = array(
                        'page_id' => $page_id,
                        'bin_type_color_id' => $bin_type_color_id,
                        'bin_type' => $data['bin_type'],
                        'allowed' => $data['allowed'],
                        'not_allowed' => $data['not_allowed'],
                    );
                    
                    $this->page_model->save_calendar_bin_type($insArr);
                }
                //for waste material
                elseif($data['section_id'] == 2) {
                    $bin_type_color_id = (int) @$this->general_model->get_single_row('bin_type_color',array('bin_type_id'=>$data['bin_type'],'bin_color_id'=>$data['bin_color']))->id;
                    $insArr = array(
                        'page_id' => $page_id,
                        'bin_type_color_id' => $bin_type_color_id,
                        'bin_type_id' => $data['bin_type'],
                        'bin_color_id' => (isset($data['bin_color']) ? $data['bin_color'] : 0),
                    );
                    
                    $this->page_model->save_waste_bin_type($insArr);
                    
                }
                $this->session->set_flashdata('success_message', 'Data inserted successfully.');
                
            }
                
        } else {//exit(); 
            $this->page_model->update($id, $data);
                //save bin type if section is calendar 
                if($data['section_id'] == 3) {
                    if($data['type_of_calendar'] == '1') {
                        $bin_type_color_id = (int) @$this->general_model->get_single_row('bin_type_color',array('bin_type_id'=>$data['bin_type'],'bin_color_id'=>$data['bin_color']))->id;
                        
                    } else $bin_type_color_id = 0;
                    $insArr = array(
                        'page_id' => $id,
                        'bin_type_color_id' => $bin_type_color_id,
                        'bin_type' => $data['bin_type'],
                        'allowed' => $data['allowed'],
                        'not_allowed' => $data['not_allowed'],
                    );
                    
                    $this->page_model->save_calendar_bin_type($insArr);
                    $this->page_model->delete_waste_bin_type($id);
                }
                //for waste material
                elseif($data['section_id'] == 2) {
                    $bin_type_color_id = (int) @$this->general_model->get_single_row('bin_type_color',array('bin_type_id'=>$data['bin_type'],'bin_color_id'=>$data['bin_color']))->id;
                    $insArr = array(
                        'page_id' => $id,
                        'bin_type_color_id' => $bin_type_color_id,
                        'bin_type_id' => $data['bin_type'],
                        'bin_color_id' => (isset($data['bin_color']) ? $data['bin_color'] : 0),
                    );
                    
                    $this->page_model->save_waste_bin_type($insArr);
                    $this->page_model->delete_calendar_bin_type($id);
                    
                } else {
                    $this->page_model->delete_calendar_bin_type($id);
                    $this->page_model->delete_waste_bin_type($id);
                }
            $this->session->set_flashdata('success_message', 'Data updated successfully.');
        }
        
        redirect('admin_pages/ManagePages', 'refresh');
    }

    function toggle_status() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $status = $this->input->post('status') == 'true' ? '1' : '0';
            $this->page_model->update($id, array('page_status' => $status));

            $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => 'ok')));
        }
    }

    function delete($id) {
        if ($this->page_model->delete($id)) {
            $this->session->set_flashdata('success_message', 'Data deleted successfully.');
        } else {
            $this->session->set_flashdata('error_message', 'Data deletion failed.');
        }
        redirect('admin_pages/ManagePages', 'refresh');
    }

}
