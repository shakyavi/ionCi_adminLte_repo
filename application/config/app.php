<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//for image paths
$config['site_title'] = "Penrith bin and recycling";
$config['assets_path'] = 'assets/';
$config['page_image_path'] = $config['assets_path'] . 'uploads/pages/';
$config['feedback_image_path'] = $config['assets_path'] . 'uploads/feedback/';


//for image root
$config['assets_root'] = FCPATH . 'assets/';
$config['page_image_root'] = $config['assets_root'] . 'uploads/pages/';
$config['feedback_image_root'] = $config['assets_root'] . 'uploads/feedback/';

/**
 * other config
 */

$config['type_of_waste'] = array(
                            '1' => 'Red',
                            '2' => 'Green',
                            '3' => 'Yellow',);

$config['type_of_calendar'] = array(
                            '1' => 'Bin',
                            '2' => 'Other',);

$config['calendar_bin_type'] = array(
                            '1' => 'Red',
                            '2' => 'Green',
                            '3' => 'Yellow',);

$config['week_days'] = array(
                            'SUN' => 'Sunday',
                            'MON' => 'Monday',
                            'TUE' => 'Tuesday',
                            'WED' => 'Wednesday',
                            'THU' => 'Thursday',
                            'FRI' => 'Friday',
                            'SAT' => 'Saturday',
        );
$config['week_collection_type'] = array( 'ODD'=>'ODD', 'EVEN'=>'EVEN');

$config['log_path'] = FCPATH.'application/logs/log.txt';


/* End of file app.php */
/* Location: ./application/config/app.php */
