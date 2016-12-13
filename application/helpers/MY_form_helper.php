<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @access public
 * 
 * @param object $data Dropdown options
 * @param string $name Name attribute
 * @param string $selected_id Selected option
 * @param string $attr Extra element attributes
 * @param string $val_type Option value field
 * @param string $title_field Option title field
 * 
 */
if ( ! function_exists('render_select'))
{
	function render_select($data, $name = "my_select", $selected_id = FALSE, $attr = '', $val_field = 'id', $title_field = 'title',$extra_config = array())
	{        
		$return = '<select name="'.$name.'" '.$attr.' >';
		if(isset($extra_config['set_top_blank']) and $extra_config['set_top_blank'])
			$return .= '<option value = "">---</option>';
        
		if(is_array($data) and !empty($data)) {
			// conditon to maximize the preformance while looping
			if(!$selected_id) {
				foreach($data as $key => $val):
                    $return .= '<option value="'.$val->{$val_field}.'">'.$val->{$title_field}.'</option>';
				endforeach;
			}else {
				if(!is_array($selected_id)) {
					$selected_id = array($selected_id);
				}
				
				foreach($data as $key => $val):
					$selected = (in_array($val->{$val_field}, $selected_id)) ? 'selected="selected"' : '';
					$return .= '<option '.$selected.' value="'.$val->{$val_field}.'">'.$val->{$title_field}.'</option>';
				endforeach;
			}

			$return .= '</select>';
			return $return;
		}else {
			return FALSE;
		}

	}
}

if ( ! function_exists('render_select_option'))
{
	function render_select_option($data, $selected_id = FALSE, $val_field = 'id', $title_field = 'title',$extra_config = array())
	{        
		$return = '';
		if(isset($extra_config['set_top_blank']))
			$return .= '<option value = "">---</option>';
        
		if(is_array($data) and !empty($data)) {
			// conditon to maximize the preformance while looping
			if(!$selected_id) {
				foreach($data as $key => $val):
                    $return .= '<option value="'.$val->{$val_field}.'">'.$val->{$title_field}.'</option>';
				endforeach;
			}else {
				if(!is_array($selected_id)) {
					$selected_id = array($selected_id);
				}
				
				foreach($data as $key => $val):
					$selected = (in_array($val->{$val_field}, $selected_id)) ? 'selected="selected"' : '';
					$return .= '<option '.$selected.' value="'.$val->{$val_field}.'">'.$val->{$title_field}.'</option>';
				endforeach;
			}
                        
			return $return;
		}else {
			return FALSE;
		}

	}
}

/* End of file my_form_helper.php */
/* Location: ./application/helpers/my_form_helper.php */