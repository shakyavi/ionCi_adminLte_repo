<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->input->is_ajax_request()) {
			exit('Permission Denied.');
		}
	}
        
        function get_bin_type_color() {
            $bin_type_id = (int) $this->input->post('bin_type_id');
            $bin_color = $this->db->from('bin_type_color')->join('bin_color','bin_color_id = bin_color.id')->where('bin_type_id',$bin_type_id)->get()->result();
            
            $bin_color = render_select($bin_color, 'bin_color', '', 'class="form-control"  id="bin_color" ','id','color',array('set_top_blank'=>($this->input->post('section_id')== 2 ? TRUE: FALSE)));
            $html = '';
            if($bin_color)
                $html = "
                    <div class=\"form-group\">
                        <label for=\"bin_color\" class=\"control-label col-lg-3\">Color *</label>
                        <div class=\"col-lg-5\">
                            $bin_color
                        </div>
                    </div>";
            $this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('status'=>'ok','html'=>$html)));
        }
	
}