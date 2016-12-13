<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property section_model $section_model 
 */
class ManageSections extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('section_model');
        
        $title = "Manage Sections";
        Template::set('title', $title);
        Template::add_title_segment($title);
        
           if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() )
		{
			redirect('login/login/log', 'refresh');
		}
    }

    public function _remap($method, $params)
    {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else
            return $this->index($method);
    }

    public function index()
    {     $config['base_url'] = base_url('index.php/admin_sections/ManageSections/');
        $config['total_rows']= $this->section_model->record_count();
        $config['per_page']=1;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $page= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['sections'] = $this->section_model->get_all($config['per_page'], $page);
        //$this->data['sections'] = $this->section_model->get_all();
       
        Template::set_layout('template/admin');
        Template::render('admin_sections/index', $this->data);
    }

    function add()
    {
        if ($this->input->post()) {
            $this->_add_edit_section(0);
        }
        $this->data['parent_sections'] = render_select($this->section_model->where('section.parent_id = 0 OR section.parent_id IS NOT NULL')->get_all(), 'parent_id', set_value('parent_id'), 'class="form-control" ','id','title',array('set_top_blank' => TRUE));

        $this->data['edit'] = FALSE;
               Template::set_layout('template/admin');
        Template::render('admin_sections/form', $this->data);
    }

    function edit($id = 0)
    {
        $id = (int) $id;

        $id || redirect('admin/sections');

        $this->data['section_detail'] = $this->section_model->get($id);
        $this->data['section_detail'] || redirect('admin_sections/ManageSections/');
        $this->data['edit'] = TRUE;

        if ($this->input->post()) {
            //echo $id;
            $this->_add_edit_section($id);
        }
        $this->data['parent_sections'] = render_select($this->section_model->where('section.parent_id = 0 OR section.parent_id IS NOT NULL')->get_all(), 'parent_id', set_value('parent_id',$this->data['section_detail']->parent_id), 'class="form-control" ','id','title',array('set_top_blank' => TRUE));
       Template::set_layout('template/admin');
        Template::render('admin_sections/form', $this->data);
    }

    function _add_edit_section($id)
    {
        $this->load->library('form_validation');
        
        $data = $this->input->post();
        
        $this->form_validation->set_rules(
                array(
                    array('field' => 'title', 'label' => 'Title', 'rules' => 'required|trim|min_length[2]'),
                    array('field' => 'parent_id', 'label' => 'Parent Section ', 'rules' => 'trim'),
//                    array('field' => 'content', 'label' => 'Content', 'rules' => 'trim|xss_clean'),
                    array('field' => 'status', 'label' => 'Status', 'rules' => 'trim'),
                )
        );

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run($this) === FALSE) {
            return FALSE;
        }
        
        $data['status'] = $this->input->post('status') ? '1' : '0';
        $data['parent_id'] = $this->input->post('parent_id') ?: '0';

        if ($id == 0) {
            $this->section_model->insert($data);
            $this->session->set_flashdata('success_message', 'Data inserted successfully.');
        } else {
            
            $this->section_model->update($id, $data);
            
            $this->session->set_flashdata('success_message', 'Data updated successfully.');
        }

        redirect('admin_sections/ManageSections', 'refresh');
    }

    function toggle_status()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $status = $this->input->post('status') == 'true' ? '1' : '0';
            $this->section_model->update($id, array('section_status' => $status));

            $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => 'ok')));
        }
    }

    function delete($id)
    {
        $res = $this->section_model->get($id);
        if ($res and $res->type == '1') {            
            $this->session->set_flashdata('error_message', 'Data deletion failed. Cannot delete default type.');
        } elseif ($this->section_model->check_child_sections($id)) {
            $this->session->set_flashdata('error_message', 'Data deletion failed. Has clild sections.');
        } elseif ($this->section_model->check_section_pages($id)) {
            $this->session->set_flashdata('error_message', 'Data deletion failed. Has section pages.');
        } else {
            $this->section_model->delete($id);
            $this->session->set_flashdata('success_message', 'Data deleted successfully.');
        }
        redirect('admin_sections/ManageSections', 'refresh');
    }

}
