<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * default layout
 * Location: application/views/
 */
$config['template_layout'] = 'template/layout';

/**
 * default css
 */
$config['template_css'] = array(
//    '/assets/css/index.css' => 'screen'
);

/**
 * default javascript
 * load javascript on header: FALSE
 * load javascript on footer: TRUE
 */
$config['template_js'] = array(
//    'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' => FALSE,
//    '/assets/js/index.js' => TRUE
);

/**
 * default variable
 */
$config['template_vars'] = array(
    'site_description' => 'Fitness Calender',
    'site_keywords' => 'Fitness Calender'
);

/**
 * default site title
 */
$config['base_title'] = 'Fitness Calender';

/**
 * default title separator
 */
$config['title_separator'] = ' | ';